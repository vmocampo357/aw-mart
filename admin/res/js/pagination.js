function Paginator(){
	// Setup per page, etc.
	this.per_page 		= 15;
	this.current_page 	= 1;
	this.limit 			= (this.per_page == 1) ? 1 : this.per_page;
	this.offset 		= 0
}

Paginator.prototype.create = function(count) {
	
	var _self = this;
	
	/**
	* Creates the actual paginator's html **/
	this.total_pages = Math.ceil( count / this.per_page );
	var parent 	= $("#pagination-target");
	var base_ul = $("<ul></ul>").addClass("pagination");
	for($i=1;$i<=this.total_pages;$i++){
		var append_li = $("<li></li>");
			append_li.attr("data-index",$i);
			append_li.html("<a data-index='"+$i+"' href='#'>"+$i+"</a>");
			base_ul.append(append_li);
	}
	parent.html(base_ul);

	/**
	* Adds handlers (these are the ones we can attach to) **/
	$(document).on("click","#pagination-target ul li",function(e){
		e.preventDefault();
		var a = $(this).find("a");
		var index = a.attr("data-index");
		_self.changePage(index);
	});

};

Paginator.prototype.onPageChanged = function(i) {
	// override here
}

Paginator.prototype.changePage = function(i) {
	// Set offset
	this.offset = (i-1) * this.per_page;		


	var _self = this;
	var parent = $("#pagination-target ul");
	var collection = $("#pagination-target ul li")
	var li = $("#pagination-target ul li[data-index='"+i+"']");
	if(li.length > 0){
		console.log(li);
		collection.removeClass("active");
		li.addClass("active");
	}
	_self.current_page = i;
	_self.onPageChanged(i);
}
