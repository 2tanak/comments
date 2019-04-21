

alert(8)


var control = document.getElementById("uploadInput");
var blok = document.getElementById("blok");
var progressBar = $('#progressbar');
 var data;
if(control){
	alert(7);return false;
control.addEventListener("change", function(event) {
	progressBar.val('');
	var files = control.files;
        len = files.length;
		 var i = 0,
        files = control.files,
        len = files.length;
  var f = files[0];

 
 


 	 data = new FormData();
             
                  
					data.append("file", files[0]);
                    	
 
 
  //alert(f.result);
   var reader = new FileReader();
		  reader.onload = (function(theFile) {
            return function(e) {
				
                // Render thumbnail.
                var span = document.createElement('span');
                var t=blok.innerHTML = ['<img style="width:1000px" class="thumb" title="', escape(theFile.name), '" src="', e.target.result, '" />'].join('');
				
                document.getElementById('output').insertBefore(span, null);
            };
        })(f);
		 reader.readAsDataURL(f);
		var photo_path = files[0].name;
			if(files[0].size > 5000000){
									//var mm7m = "Размер фото не должен превышать 5mb"
			        				//$("#info_page").hide().delay(1000).show(1000).html(mm7m);
			        				//$("#info_page").delay(3000).hide(1000);
			        				//numberfiles -= 1;
									//exit;
								}
		
	
		

				  
				  






})

}





