

/*=============================================
BUSCADOR
=============================================*/
$(".buscador").change(function(){
//rutaActual = "http://localhost/asesoriaLetradaSJ/contenidoBuscadorCir"
var busqueda = $(this).val().toUpperCase();
var expresion = /^[A-Za-z0-9ñÑáéíóú ]*$/;
if(!expresion.test(busqueda)){
$(".buscador").val("");
}else{
var evaluarBusqueda = busqueda.replace(/[0-9ñáéíóú ]/g,"_");
var rutaBuscador = evaluarBusqueda;
$(".buscar").click(function(){
if($(".buscador").val() != ""){
window.location = rutaActual+"/"+rutaBuscador;
}
})
}
})

/*=============================================
BUSCADOR CON ENTER
=============================================*/
$(document).on("keyup", ".buscador", function(evento){
//rutaActual = "http://localhost/asesoriaLetradaSJ/contenidoBuscadorCir"
evento.preventDefault();
if(evento.keyCode == 13 && $(".buscador").val() != ""){
var busqueda = $(this).val().toUpperCase();
var expresion = /^[A-Za-z0-9ñÑáéíóú]*$/;
if(!expresion.test(busqueda)){
$(".buscador").val("");
}else{
var evaluarBusqueda = busqueda.replace(/[0-9ñáéíóú ]/g,"_");
var rutaBuscador = evaluarBusqueda;
window.location = rutaActual+"/"+rutaBuscador;
}
}
})


