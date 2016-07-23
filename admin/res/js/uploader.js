ImageUploader = function(){
	this.url = "http://www.awards-mart.com/admin/upload";
}
ImageUploader.prototype.createNewUploader = function(uploader,callback){
	var url = this.url;

	if($(uploader).length > 0){
	    $(uploader).fileupload({
	        url: url,
	        dataType: 'json',
	        send:function(){
	        	Lobibox.notify("info",{msg:"Starting upload..."});
	        },
	        done: function (e, data) {
	        	if(typeof callback != "undefined")
	        		callback(data);

	        	Lobibox.notify("success",{msg:"Upload complete!"});

	        	console.log(data);
	        },
	        progressall: function (e, data) {
	            var progress = parseInt(data.loaded / data.total * 100, 10);
	            if(typeof progress_callback != "undefined")
	            	progress_callback(progress);

	            console.log(progress);
	        }
	    }).prop('disabled', !$.support.fileInput)
	        .parent().addClass($.support.fileInput ? undefined : 'disabled');
    }

}

window.file_uploader = new ImageUploader();