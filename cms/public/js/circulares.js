/*=============================================
DataTables Servidor de circulares
=============================================*/

// $.ajax({

// 	url: "https://asesorialetrada.sanjuan.gob.ar/cms/public/circulares",
//xhrFields:{withCredentials:true },
// 	success: function(respuesta){
//		console.log(ruta);
// 		console.log("respuesta", respuesta);

// 	},
// 	error: function (jqXHR, textStatus, errorThrown) {
//         console.error(textStatus + " " + errorThrown);
//     }

 // })


/*=============================================
DataTables de adminisradores
=============================================*/
var tablaCirculares = $("#tablaCirculares").DataTable({

'pageLength':1000000,

	processing: true,
	serverSide: true,
	ajax:{
		//dataType:'JSON',
		url: "https://asesorialetrada.sanjuan.gob.ar/cms/public/circulares",xhrFields:{withCredentials:true },
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
			data:'caracter',
			name:'caracter'
		},
		{
			data:'extracto',
			name:'extracto'
		},
		{
			data:'fechaemision',
			name:'fecha'
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

tablaCirculares.on('order.dt search.dt', function(){

	tablaCirculares.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();