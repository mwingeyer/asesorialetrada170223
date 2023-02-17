/*=============================================
DataTables Servidor de adminisradores
=============================================*/

// $.ajax({

// 	url: ruta+"/administradores",
// 	success: function(respuesta){
		
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
//         console.error(textStatus + " " + errorThrown);
//     }

// })


/*=============================================
DataTables de adminisradores
=============================================*/
var tablaDictamenes = $("#tablaDictamenes").DataTable({

'pageLength':1000000,

processing: true,
serverSide: true,
ajax:{
url: ruta+"/dictamenes",
},

"columnDefs":[{
"searchable":true,
"orderable":true,
"targets": 0
}],
"order":[[0, "desc"]],


columns:[
{
data:'id',
name:'id'
},
{
data:'numero',
name:'numero',
render: function(data, type, full, meta){
return '<p class="validarNumero">'+data+'</p>'
}
},
{
data:'acronimo',
name:'acronimo'
},
{
data:'anio',
name:'anio',
render: function(data, type, full, meta){
return '<p class="validarAnio">'+data+'</p>'
}
},
{
data:'temageneral',
name:'temageneral'
},
{
data:'orgproviene',
name:'orgproviene'
},
{
data:'voces',
name:'voces'
},
{
data:'refexpediente',
name:'refexpediente'
},{
data:'leyes',
name:'leyes'
},
{
data:'extracto',
name:'extracto'
},
{
data:'created_at',
name:'created_at'
},
{
data:'fechasancion',
name:'fechasancion'
},
{
data:'usuariocarga',
name:'usuario'
},
{
data:'acciones',
name:'acciones'
}

],

"language": {

   "sProcessing": "Procesando...",
   "sLengthMenu": "Mostrar _MENU_ registros",
   "sZeroRecords": "No se encontraron resultados",
   "sEmptyTable": "Ningún dato disponible en esta tabla",
   "sInfo": "Mostrando registros del _START_ al _END_",
   "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0",
   "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
   "sInfoPostFix": "",
   "sSearch": "Buscar:",
   "sUrl": "",
   "sInfoThousands": ",",
   "sLoadingRecords": "Cargando...",
   "oPaginate": {
     "sFirst": "Primero",
     "sLast": "Último",
     "sNext": "Siguiente",
     "sPrevious": "Anterior"
   },
   "oAria": {
     "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
     "sSortDescending": ": Activar para ordenar la columna de manera descendente"
   }

  }

});

tablaDictamenes.on('order.dt search.dt', function(){

tablaDictamenes.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();