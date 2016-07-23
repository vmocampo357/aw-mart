/**
* Individual Page Codes **/

/////////////////////////////////////////////////////////////////////////////////////
// Category Tree, used on /taxonomies
CategoryTree = function(){
	Handlebars.registerHelper('subHelper', function(cats) {		
	    var template = Handlebars.compile($('#taxonomy-tree-sub-template').html());
	    return template({"categories":cats});
	});	
	this.setHandlers();
	this.setup();
}
CategoryTree.prototype.setup = function(){
	this.createTree(3,"#taxonomy-tree");
	this.createTree(4,"#taxonomy-tree-themes");		
}
CategoryTree.prototype.createTree = function(root,targetid){
	api.call("taxonomies/get-tree",{"root":root},function(r){
		console.log(r);
		if(r.data.tree !== 0){
			var testData	= {categories:r.data.tree};
			var source   	= $("#taxonomy-tree-template").html();
			var template 	= Handlebars.compile(source);
			var html 		= template(testData);
			$(targetid).html( html );	
		}
	});	
},
CategoryTree.prototype.setModalData = function(hidden,meta){
	if(typeof hidden != "undefined"){
		$("#current-taxonomy-id").val(hidden.id);
		$("#current-parent-id").val(hidden.parent);
	}
	if(typeof meta != "undefined"){
		$("#editing-taxonomy-name").val(meta.title);
		$("#editing-taxonomy-description").val(meta.description);
		$("#taxonomy-image-preview").attr("src",meta.image);
		$("#selected-taxonomy-image").val(meta.image);
	}else{
		$("#editing-taxonomy-name").val("");
		$("#editing-taxonomy-description").val("");
	}
},
CategoryTree.prototype.getModalData = function(){
	var returnVal = {
		hidden:{
			id:$("#current-taxonomy-id").val(),
			parent:$("#current-parent-id").val()
		},
		meta:{
			title:$("#editing-taxonomy-name").val(),
			description:$("#editing-taxonomy-description").val(),
			image:$("#selected-taxonomy-image").val()
		}		
	};
	return returnVal;
},
CategoryTree.prototype.setHandlers = function(){

	// Instance
	var _self = this;

	// Image uploader
	file_uploader.createNewUploader("#taxonomy-image-upload",
		function(fileData){
			var uploaded_image = fileData.result.files[0];
			//$("input[name='product_thumbnail_image']").val(uploaded_image.thumbnailUrl);
			$("#selected-taxonomy-image").val(uploaded_image.url);
			$("#taxonomy-image-preview").attr("src",uploaded_image.url);
		}
	);	

	// Modify taxonomy	
	$(document).on("click",".trigger-edit-child",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var parent = $(this).attr("data-parent");
		api.call("taxonomies/get-details",{"id":id},function(r){
			if(r.data.result){
				console.log("Getting taxonomy");
				var inner_data = r.data.result.data;
				console.log(inner_data);				
				// Get the data from the tax, load into the modal
				_self.setModalData({
					"id":id,
					"parent":parent
				},{
					"title":inner_data.taxonomy_label,
					"description":inner_data.taxonomy_description,
					"image":inner_data.taxonomy_image_url
				})
				$("#saveTaxonomy").modal();							
			}else{
				// Something went wrong!
			}
		});
	});

	// Remove taxonomy
	$(document).on("click",".trigger-remove-child",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");			
		if(confirm("Are you sure you want to remove this taxonomy?")){
			api.call("taxonomies/remove-taxonomy",{"id":id},function(r){
				if(r.data.result){
					console.log("Taxonomy removed!");
					Lobibox.notify("success",{msg:"Taxonomy has been removed!"});
					_self.setup();
				}
			});
		}
	});

	// Add new taxonomy child
	$(document).on("click",".trigger-add-child",function(e){
		e.preventDefault();
		var parent = $(this).attr("data-id");				
		api.call("taxonomies/create-draft",{},function(r){
			var id = r.data.draft;
			_self.setModalData({
				"id":id,"parent":parent
			})			
			$("#saveTaxonomy").modal();
			Lobibox.notify("success",{msg:"Taxonomy has been added!"});
		});
	});

	// Actual action of SAVING a TAXONOMY
	$(document).on("click",".trigger-save-taxonomy",function(e){
		var modalData = _self.getModalData();
		api.call("taxonomies/save-details",modalData,function(r){
			if(r.data.result){
				// Rebuild the lists..basically..
				_self.setup();			
				$("#saveTaxonomy").modal('toggle');	
				Lobibox.notify("success",{msg:"Taxonomy details have been saved!"});
			}else{
				// Something went wrong!
			}
		});		
	});

	// Collapsing Code (maybe animate someday)
	$(document).on("click",".tree-sublevel h1",function(e){
		var isCollapsed = $(this).attr("collapsed");
		if(isCollapsed == 1){
			$(this).parent().parent().css("max-height","none");
			$(this).find(".fa").removeClass("fa-plus");
			$(this).find(".fa").addClass("fa-minus");			
			$(this).attr("collapsed",0);
		}else{
			$(this).parent().parent().css("max-height","40px");
			$(this).find(".fa").removeClass("fa-minus");
			$(this).find(".fa").addClass("fa-plus");
			$(this).attr("collapsed",1);
		}		
	});
}

/////////////////////////////////////////////////////////////////////////////////////
// Product List, Navigation, Etc.
OrderList = function(){
	// Construct stuff
	// Set up pagination, filter, query information

	// Set up handlers
	this.setHandlers();
}
OrderList.prototype.setHandlers = function() {

	// Get product count
	var order_count = $("input[name='total-count']").val();

	// Create a paginator, set handlers
	window.orders_paginator = new Paginator();
	orders_paginator.onPageChanged = function(num){
		api.call("orders/get-backend-orders",{
			limit:orders_paginator.limit,
			offset:orders_paginator.offset
		},function(r){
			console.log("orders");
			console.log(r);
			var source   	= $("#order-list-template").html();
			var template 	= Handlebars.compile(source);
			var html 		= template(r.data);
			$("#order-list-target").html( html );				
		});
	}	
	orders_paginator.create(order_count);
	orders_paginator.changePage( $("[name='current-page']").val() );
};

/////////////////////////////////////////////////////////////////////////////////////
// Product List, Navigation, Etc.
ProductsList = function(){
	// Construct stuff
	// Set up pagination, filter, query information
	this.filters = {
		"name":"",
		"taxonomy":"",
		"status":-1,
		"page":1
	};

	// Set up handlers
	this.setHandlers();
}
ProductsList.prototype.load = function(reload){
	// This one will take the pagination data now, will use any active filters
	
	if(typeof reload == "undefined" || reload == false){
		// First, we'll see if there's any query string info to consider.
		var incoming = $.getQueryParameters(location.search);

		if(typeof incoming != "undefined" && incoming != ""){
			jQuery.extend(this.filters, incoming);
			this.updateForm();
		}
	}

	// Get product count
	/*var product_count = $("input[name='total-count']").val();*/
	var instance = this;

	api.call("products/get-backend-products",{
		count:true,
		filters:instance.filters
	},function(result){

		window.products_paginator = new Paginator();
		products_paginator.onPageChanged = function(num){
			instance.filters.page = num;
			history.pushState({}, "Title", "products?"+$.param(instance.filters));
		/////////////////////////////////////////////////
			api.call("products/get-backend-products",{
				count:false,
				filters:instance.filters,
				limit:products_paginator.limit,
				offset:products_paginator.offset
			},function(r){
				var source   	= $("#product-list-template").html();
				var template 	= Handlebars.compile(source);
				var html 		= template(r.data);
				$("#product-list-target").html( html );				
			});			
		/////////////////////////////////////////////////
		}
		products_paginator.create(result.data.count);
		products_paginator.changePage(instance.filters.page);

	});

},
ProductsList.prototype.updateForm = function(){
	for(var key in this.filters){		
		var inputt = $("[filter-type="+key+"]");
		console.log(inputt);
		if(inputt.length > 0){
			inputt.val(this.filters[key]);
		}
	}
},
ProductsList.prototype.reload = function(){
	// This will update our filter object
	this.filters.page = 1;

	var instance = this;

	api.call("products/get-backend-products",{
		count:true,
		filters:instance.filters
	},function(result){

		products_paginator.create(result.data.count);
		products_paginator.changePage(instance.filters.page);

	});

},
ProductsList.prototype.setHandlers = function() {

	// Handle setting filters
	$(document).on("click",".products-filter-activate",function(e){
		e.preventDefault();
		var collection = $(".products-filter");
		for(i=0;i<collection.length;i++){
			var inputt 
				= $(collection[i]);
			var value 
				= inputt.val();
			var type 
				= inputt.attr("filter-type");
			if(typeof type != "undefined" && type != ""){
				products.filters[type] = value;
			}
		}
		products.reload();
	});

	// Handle deletion too
	$(document).on("click",".trigger-product-delete",function(e){
		e.preventDefault();
		var index = $(this).data("id");
		if(confirm("Are you sure you want to deactivate this product?")){
			api.call("products/delete-product",{id:index},function(r){
				if(r.data.result == 1){
					alert("Product deactivated!");
					window.location.reload();					
				}				
			});
		}
	});

	this.load();
};

/////////////////////////////////////////////////////////////////////////////////////
// Product Editor
ProductEditor = function(){
	this.pushHistory();
	this.setHandlers();	
}
ProductEditor.prototype.setHandlers = function(){

	var _self = this;

	// Init TINYMCE WHOOOO!!
	tinymce.init({ selector:'.tiny-baby' });

	// This page's uploader
	// Handles a single image, the primary product image and thumbnail.
	file_uploader.createNewUploader("#fileupload",
		function(fileData){
			var uploaded_image = fileData.result.files[0];
			$("input[name='product_thumbnail_image']").val(uploaded_image.thumbnailUrl);
			$("input[name='product_featured_image']").val(uploaded_image.url);
			$("#edit-product-image-placeholder").css("background-image","url("+uploaded_image.url+")");
		}
	);

	/**
	* Form Sumbission Interruption **/
	/***********************************************************************/
	$("#main-product-form").on("submit",function(e){
		e.preventDefault();
		var form = this;		
		var html_content = tinymce.activeEditor.getContent();
		$("input[name='details[product-html-description]']").val(html_content);
		Lobibox.notify("info",{msg:"Submitting product details..."});
		form.submit();		
	});

	/**
	* Attributes Modal
	************************************************************************/
	
	// Init call to get the attributes to populate the modal dropdown.
	api.call("attributes/top-level-list",{},function(r){

		// Set up the first attribute typeahead...
		// constructs the suggestion engine
		var stateArray = r.data.list;
		var states = new Bloodhound({
			datumTokenizer: Bloodhound.tokenizers.whitespace,
			queryTokenizer: Bloodhound.tokenizers.whitespace,
			// `states` is an array of state names defined in "The Basics"		
			local: stateArray
		});

		$('#choose-top-attribute').typeahead({
			hint: true,
			highlight: true,
			minLength: 1
		},
		{
			name: 'states',
			source: states
		});

	});

	// When exiting the top attribute, it will use it as the "primary" attribute
	$('#choose-top-attribute').on("focusout",function(e){		
		$("#children-attributes").fadeIn("fast");
		$("#children-attributes ul").html("");
		$("span[name=linked-parent-attribute-name]").html($(this).val());
	});

	// After a "primary" attribute is selected, give the option for the children
	$(document).on("click",".trigger-add-child-attribute",function(e){
		
		// Adding new form elements
		var new_form_element = $("<li></li>");
			new_form_element.addClass("child-attribute-li");
			new_form_element.html("<input type='text' class='child-attribute-input typeahead' />");
		
		// Adding to the list
		$("#children-attributes ul").append(new_form_element);

		var keyword = $("#choose-top-attribute").val();

		$('.child-attribute-input').typeahead('destroy');

		api.call("attributes/child-level-list",{term:keyword},function(r){

			// Set up the first attribute typeahead...
			// constructs the suggestion engine
			var newListArray = r.data.list;
			var newList = new Bloodhound({
				datumTokenizer: Bloodhound.tokenizers.whitespace,
				queryTokenizer: Bloodhound.tokenizers.whitespace,
				// `states` is an array of state names defined in "The Basics"		
				local: newListArray
			});

			$('.child-attribute-input').typeahead({
				hint: true,
				highlight: true,
				minLength: 1
			},
			{
				name: 'newList',
				source: newList
			});

		});		

	});

	// Final saver. This will take all the attributes and send them off for a reply.
	$(".trigger-add-final-attribute").click(function(e){
		var attributes_object = _self.getDesiredAttributes();
			attributes_object.product_id = $("#product-id").val();
		console.log("Showing send attributes...");
		api.call("attributes/save-product-attributes",attributes_object,function(r){
			console.log("Getting save results...");
			if(typeof r.data != "undefined"){
				var source   	= $("#attribute-line-template").html();
				var template 	= Handlebars.compile(source);
				for(i=0;i<r.data.ids.length;i++){
					var attribute_response = r.data.ids[i];
					var html = template(attribute_response);
					$("#inline-attributes").append(html);
				}			
				$("#addAttribute").modal('hide');
				Lobibox.notify("success",{msg:"Your attributes were succesfully added!"});	
				Lobibox.notify("info",{msg:"Submitting product details..."});
				$("#main-product-form").submit();					
			}
		});
	});

	// Modal handler for attributes
	$(".trigger-add-attribute").click(function(e){
		$("#addAttribute").modal();
		e.preventDefault();		
	});	

	// Action to remove

	/*************************************************************************/	

	/**
	* Prices Modal
	************************************************************************/
	$(".trigger-add-price").click(function(e){
		$("#addPrice").modal();
		e.preventDefault();
	});

	// EDIT VARIANT
	$(".trigger-edit-price").click(function(e){
		var sid = $(this).attr("data-id");
		api.call("products/get-size-details",{id:sid},function(r){
			if(typeof r.data.result != "undefined" && r.data.result){
				var info = r.data.result.data;
				console.log("INFO:: Size info loaded!");
				console.log(info);

				// Ghetto load up the modal data here
				$("#edit-price-size").val(info.size_inches);
				$("#edit-price-unit").val(info.size_unit);
				$("#editing-size-id").val(info.size_id);

				if(info.prices.length > 0){
					var target = $("#edit-price-quantities ul");
						target.html("");
					// Go through each price, add a mini row
					for(ii=0;ii<info.prices.length;ii++){
						var price = info.prices[ii];					
						var newElement = $("<li></li>");
							newElement.attr("data-id",price.range_id);
							newElement.html(
								'<input value="'+price.range_text+'" type="text" placeholder="Quantity range" class="form-control qty-range" />'+
								'<input value="'+price.price_usd+'" type="text" placeholder="Price for range" class="form-control qty-price" />'
							);
						target.append(newElement);					
					}
				}

				$("#editPrice").modal();
			}
		});
		
		e.preventDefault();
	});

	$(".trigger-new-quantity").click(function(e){
		e.preventDefault();
		var target = $("#current-price-quantities ul");
		var newElement = $("<li></li>");
			newElement.html(
				'<input type="text" placeholder="Quantity range" class="form-control qty-range" />'+
				'<input type="text" placeholder="Price for range" class="form-control qty-price" />'
			);
		target.append(newElement);
	});

	// EDIT VARIANT
	$(".trigger-new-edit-quantity").click(function(e){
		e.preventDefault();
		var target = $("#edit-price-quantities ul");
		var newElement = $("<li></li>");
			newElement.attr("data-id",0);
			newElement.html(
				'<input type="text" placeholder="Quantity range" class="form-control qty-range" />'+
				'<input type="text" placeholder="Price for range" class="form-control qty-price" />'
			);
		target.append(newElement);
	});

	$(".trigger-add-final-size").click(function(e){
		var send = {};
			//send.sku = $("#current-price-sku").val();
			send.size = $("#current-price-size").val();
			send.unit = $("#current-price-unit").val();
			send.prices = [];
		var collection = $("#current-price-quantities ul li");
			for(i=0;i<collection.length;i++){	
				var el = $(collection[i]);
				var range = el.find(".qty-range");
				var price = el.find(".qty-price");
				var add = {
					"range":range.val(),
					"price":price.val()
				};
				send.prices.push(add);
			}
		api.call("products/save-product-size",{d:send,id:$product_id},function(r){
			if(r.data.result){
				Lobibox.notify("success",{msg:"Your new size was added!"});
				$("#addPrice").modal("hide");
				Lobibox.notify("info",{msg:"Submitting product details..."});
				$("#main-product-form").submit();					
			}
		});
	});

	// EDIT VARIANT
	$(".trigger-edit-final-size").click(function(e){
		var send = {};
		var $product_id = $("#product-id").val();
			//send.sku = $("#current-price-sku").val();
			send.size = $("#edit-price-size").val();
			send.unit = $("#edit-price-unit").val();
			send.size_id = $("#editing-size-id").val();
			send.prices = [];
		var collection = $("#edit-price-quantities ul li");
			for(i=0;i<collection.length;i++){	
				var el = $(collection[i]);
				var range = el.find(".qty-range");
				var price = el.find(".qty-price");
				var range_id = el.attr("data-id");
				var add = {
					"range_id":range_id,
					"range":range.val(),
					"price":price.val()
				};
				send.prices.push(add);
			}
		console.log("DEBUG:: Seeing if edits would work...");
		console.log(send);
		api.call("products/update-product-size",{d:send,id:$product_id},function(r){
			if(r.data.result){
				Lobibox.notify("success",{msg:"Your size has been updated!"});
				$("#editPrice").modal("hide");
			}
		});
	});

	/**
	* Taxonomy Modal
	************************************************************************/

	// Modal handler for taxonomies
	$(".trigger-add-taxonomy").click(function(e){
		$("#addTaxonomy").modal();
		e.preventDefault();		
	});	

	// Final saver. This will take the last selected taxonomy and add it to the product
	// TO-DO: Add it in real-time
	$(".trigger-add-final-taxonomy").click(function(e){
		var last_element = $("#taxonomy-child-dropdowns li:last-child");
		if(last_element.length > 0){			
			var id = last_element.attr("data-id");
			var select = $(".taxonomy-dropdown[data-id='"+id+"']");			
			console.log(select);
			if(select.length > 0){
				var $taxonomy = select.val();
				var $product_id = $("#product-id").val();
				api.call("products/add-product-taxonomy",{id:$product_id,taxonomy:$taxonomy},function(r){
					if(r.data.result){
						var source   	= $("#taxonomy-line-template").html();
						var template 	= Handlebars.compile(source);												
						var html 		= template(r.data.result);
						$("#inline-taxonomies").append(html);						
						$("#addTaxonomy").modal('hide');	
						Lobibox.notify("success",{msg:"Your taxonomy was succesfully added!"});			
						Lobibox.notify("info",{msg:"Submitting product details..."});
						$("#main-product-form").submit();							
					}else{
						// Something went wrong!
					}
				});							
			}
		}
	});

	// First of the many taxonomy selects
	$("#first-taxonomy-dropdown").on("change",function(e){
		var id = $(this).val();
		api.call("taxonomies/get-children",{root:id},function(r){	
			console.log(r.data.result.data);		
			var source   	= $("#taxonomy-select-template").html();
			var template 	= Handlebars.compile(source);
			var html 		= template(r.data.result.data);
			$("#taxonomy-child-dropdowns").html( html );				
		});
	});

	// All secondary taxonomy selects
	$(document).on("change",".taxonomy-dropdown",function(e){
		var id = $(this).val();
		var parent_id = $(this).attr("data-id");
		api.call("taxonomies/get-children",{root:id},function(r){
			console.log(r.data.result.data);
			var source   	= $("#taxonomy-select-template").html();
			var template 	= Handlebars.compile(source);
			var html 		= template(r.data.result.data);
			/////////////////////////////////////////////////////////////
			var child_element = $(".dropdown-set[data-parent='"+parent_id+"']");
			console.log(child_element);
			if(child_element.length > 0){
				child_element.replaceWith(html);
			}else{
				$("#taxonomy-child-dropdowns").append( html );				
			}	
		
		});
	});

	// Action to remove
	$(document).on("click",".trigger-remove-attribute-from-product",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var product = $("#product-id").val();
		if(confirm("Are you sure you want to remove this attribute?")){
			api.call("products/remove-attribute",{"id":id,"p":product},function(r){
				console.log("Removed attribute...");
				Lobibox.notify("success",{msg:"Attribute succesfully removed!"});
				$("#inline-attributes .edit-product-breadcrumb[data-id='"+id+"']").remove();
			});
		}
	});

	// Action to remove
	$(document).on("click",".trigger-remove-taxonomy-from-product",function(e){
		e.preventDefault();
		var id = $(this).attr("data-id");
		var product = $("#product-id").val();
		if(confirm("Are you sure you want to remove this taxonomy?")){
			api.call("products/remove-taxonomy",{"id":id,"p":product},function(r){
				console.log("Removed taxonomy...");
				Lobibox.notify("success",{msg:"Taxonomy succesfully removed!"});
				$("#inline-taxonomies .edit-product-breadcrumb[data-id='"+id+"']").remove();
			});
		}
	});	

	/*************************************************************************/	
}
ProductEditor.prototype.pushHistory = function(){
	var _self = this;
	$product_id = $("#product-id").val();
	this.product_id = $product_id;
	if($product_id > 0){
		// Code for the regular edit product stuff
	}else{
		api.call("products/save-product-draft",{},function(r){
			var push = r.data.draft;
			$("#product-id").val(push);
			history.pushState({}, "Title", "save?id="+push);	
		});				
	}	
}
ProductEditor.prototype.getDesiredAttributes = function(){
	var _self = this;
	/**
	* This method will go through each child attribute for the
	* selected parent, and document them in a data-send ready object.
	**/
	var send = {};
		send.primary_attribute = $("#choose-top-attribute").val();
		send.children_attributes = [];
	var collection = $(".child-attribute-input");
	for(i=0;i<collection.length;i++){
		var obj = $(collection[i]);
		if(obj.val() != "")
			send.children_attributes.push(obj.val());
	}
	return send;
}

/**
* SITEWIDE
* ---
* Each page should have a hidden input,
* with an identifier. This will allow the page dependent
* JS to load properly.
**/

var globals = "";

var identifierInput = $("#identifier");

jQuery.extend({

  getQueryParameters : function(str) {
	  return (str || document.location.search).replace(/(^\?)/,'').split("&").map(function(n){return n = n.split("="),this[n[0]] = n[1],this}.bind({}))[0];
  }

});

$(document).ready(function(){
	switch(identifierInput.val()){		

		/**
		* Handles code on the Product list **/
		case('product-list'):

			window.products = new ProductsList();

		break;
		/**
		* Handles code on the Order list **/
		case('order-list'):

			window.orders = new OrderList();

		break;
		/**
		* Handles the cool tree code on taxonomies **/
		case('taxonomies'):

			window.categories = new CategoryTree();

		break;
		/**
		* Handles opening a new draft. **/
		case('edit-product'):
			
			window.edit_product = new ProductEditor();	

		break;
		//////////////////////
	}
});