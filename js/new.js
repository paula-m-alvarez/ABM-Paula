/* Esta funcion sirve para ver la preview de las imagenes cuando agregamos un nuevo barrio */

$(window).load(function(){

    $(function() {
     $('#logo').change(function(e) {
         addImage(e); 
        });
   
        function addImage(e){
         var file = e.target.files[0],
         imageType = /image.*/;
       
         if (!file.type.match(imageType))
          return;
     
         var reader = new FileReader();
         reader.onload = fileOnload;
         reader.readAsDataURL(file);
        }
     
        function fileOnload(e) {
         var result=e.target.result;
         $('#imgSalida').attr("src",result);
        }
       });
     });
   
$(window).load(function(){

    $(function() {
        $('#banner').change(function(e) {
            addImage(e); 
            });
       
            function addImage(e){
             var file = e.target.files[0],
             imageType = /image.*/;
           
             if (!file.type.match(imageType))
              return;
         
             var reader = new FileReader();
             reader.onload = fileOnload;
             reader.readAsDataURL(file);
            }
         
            function fileOnload(e) {
             var result=e.target.result;
             $('#imgSalida2').attr("src",result);
            }
     });
});
       