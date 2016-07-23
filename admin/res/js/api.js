function API(){
	this.url = "http://www.awards-mart.com/admin/api/";
	//this.url = "/2016/shopping-cart-awards/admin/api/";
}

API.prototype.call = function(action,d,callback) {
	var _self = this;
	if(typeof action != "undefined"){
		$.ajax({
			url:_self.url+action,
			data:d,
			beforeSend: function(){				
				$("#ajax-loading").fadeTo("slow",100);
			}			
		}).done(function(r){
			console.log(r);
			$("#ajax-loading").fadeTo("slow",0);
			if(typeof callback != "undefined"){
				callback(r);
			}
		})
	}
};

var api = new API();