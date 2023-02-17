/*=============================================
CAPTURANDO LA RUTA DE MI CMS
=============================================*/

var ruta = $("#ruta").val();



/*=============================================
AGREGAR RED
=============================================*/

$(document).on("click", ".agregarRed", function(){

	var url = $("#url_red").val();
	//console.log("url", url);
	var icono = $("#icono_red").val().split(",")[0];
	//console.log("icono",icono);
	var color = $("#icono_red").val().split(",")[1];
	//console.log("color",color );


 	$(".listadoRed").append(`
 		<div class="col-lg-12">
         <div class="input-group mb-3">
           <div class="input-group-prepend">
             <div class="input-group-text text-white" style="background:`+color+`">             
                 <i class="`+icono+`"></i>
             </div>
           </div>
           <input type="text" class="form-control" value="`+url+`">
           <div class="input-group-prepend">
             <div class="input-group-text" style="cursor:pointer">
                 <span class="bg-danger px-2 rounded-circle eliminarRed" red="`+icono+`" url="`+url+`">&times;</span>
             </div>
           </div>
         </div>
       </div>

 	`)

 	// Actualizar el registro de la BD//

 	var listaRed = JSON.parse($("#listaRed").val());
 	console.log("listaRed",listaRed);
	
 	listaRed.push({

 	 	 "url": url,
 	 	 "icono": icono,
 	 	 "background": color

 	})

 	$("#listaRed").val(JSON.stringify(listaRed));

})

/*=============================================
ELIMINAR RED
=============================================*/

$(document).on("click", ".eliminarRed", function(){

	var listaRed = JSON.parse($("#listaRed").val());

	var red = $(this).attr("red");
	var url = $(this).attr("url");

	for(var i = 0; i < listaRed.length; i++){

		if(red == listaRed[i]["icono"] && url == listaRed[i]["url"]){
			
			listaRed.splice(i, 1);
			
			$(this).parent().parent().parent().parent().remove();

			$("#listaRed").val(JSON.stringify(listaRed));

		}

	}

})

/*=============================================
PREVISUALIZAR IMÁGENES TEMPORALES
=============================================*/
$("input[type='file']").change(function(){

	var imagen = this.files[0];
	console.log("imagen", imagen);
	var tipo = $(this).attr("name");
	console.log("tipo", tipo);
	var ext = $( this ).val().split('.').pop();
	console.log("ext", ext);

	/*=============================================
    VALIDAMOS EL FORMATO PDF
  =============================================*/
		  if ($( this ).val() != '') {
		    if(ext == "pdf" || ext == "PDF") {
		      alert("La extensión es: " + ext);
		      if($(this)[0].files[0].size > 15000000){
		        console.log("El documento excede el tamaño máximo");
		        $('#modal-title').text('¡Precaución!');
		        $('#modal-msg').html("Se solicita un archivo no mayor a 10MB. Por favor verifica.");
		        $("#modal-gral").modal();           
		        $(this).val('');
		      }else{
		        $("#modal-gral").hide();
		      }
		    }
		    else{

		    	

	
	/*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
  =============================================*/

    
    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png"){

    	$("input[type='file']").val("");

    	notie.alert({

		    type: 3,
		    text: '¡La imagen debe estar en formato JPG o PNG!',
		    time: 5

		 })

    }else if(imagen["size"] > 15000000){

    	$("input[type='file']").val("");

    	notie.alert({

		    type: 3,
		    text: '¡La imagen no debe pesar más de 2MB!',
		    time: 5

		 })

    }else{

    	var datosImagen = new FileReader;
    	datosImagen.readAsDataURL(imagen);

    	$(datosImagen).on("load", function(event){

    		var rutaImagen = event.target.result;

    		$(".previsualizarImg_"+tipo).attr("src", rutaImagen);

    	})
    }
	}
}
})


/*=============================================
Preguntar antes de Eliminar Registro
=============================================*/
$(document).on("click", ".eliminarRegistro", function(){
 	var action = $(this).attr("action"); 
   	var method = $(this).attr("method");
   	var pagina = $(this).attr("pagina");
   	var token = $(this).attr("token");

   	swal({
   		 title: '¿Está seguro de eliminar este registro?',
   		 text: "¡Si no lo está puede cancelar la acción!",
   		 type: 'warning',
   		 showCancelButton: true,
   		 confirmButtonColor: '#871c28',
   		 cancelButtonColor: '#d33',
   		 cancelButtonText: 'Cancelar',
   		 confirmButtonText: 'Si, eliminar registro!'
   	}).then(function(result){
   		if(result.value){
   			//console.log("Se elimino el registro")
				var datos = new FormData();
				datos.append("_method", method);
				datos.append("_token", token);
				$.ajax({
				 	url: action,
   	 			method: "POST",
   	 			data: datos,
   	 			cache: false,
   	 			contentType: false,
       		processData: false,
       			success:function(respuesta){
       			 if(respuesta == "ok"){
     			 				swal({
		                  type:"success",
		                  title: "¡El registro ha sido eliminado!",
		                  showConfirmButton: true,
		                  confirmButtonText: "Cerrar"                  
		             }).then(function(result){
			           	if(result.value){
			             		window.location = ruta+'/'+pagina; 
			            	}
		            })
       			 }
        		},
		         error: function (jqXHR, textStatus, errorThrown) {
		             console.error(textStatus + " " + errorThrown);
		         }
  		 	})
  		}
  	})
})

/*=============================================
   Evitar repetir Circulares
 =============================================*/
$(document).on("change", ".numero_circulares", function(){

	$(".alert").remove();

	 var valorNumero = $(this).val();
	 console.log("valorNumero", valorNumero);
	 var validarNumero = $(".validarNumero");
	 var valorAnio= $(".anio_circulares").val();
	 console.log("valorAnio", valorAnio);
	 var validarAnio = $(".validarAnio");
	
	 
		 for(var i = 0; i < validarAnio.length; ++i ){
	
	
	console.log($(validarAnio[i]).html());

	 	if($(validarAnio[i]).html() == valorAnio){
				
				for(var i = 0; i < validarNumero.length; ++i ){
					
						if($(validarNumero[i]).html() == valorNumero){

							$(".numero_circulares").val("");
							$(".numero_circulares").parent().after(`

									<div class="alert alert-danger">¡Error! Este Nuemero de Circular ya existe para el Año especificado.</div>

							     `)
						}
					}
			
	 		}

		 }

})

