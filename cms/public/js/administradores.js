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

var tablaAdministradores = $("#tablaAdministradores").DataTable({

	processing: true,
	serverSide: true,
	ajax:{
		url: "https://asesorialetrada.sanjuan.gob.ar/cms/public/administradores",
	},

	"columnDefs":[{
		"searchable":true,
		"orderable":true,
		"targets": 0
	}],
	"order":[[0, "asc"]],


	columns:[
		{
			data:'id',
			name:'id'
		},
		{
			data:'name',
			name:'name'
		},
		{
			data:'email',
			name:'email'
		},
		{
			data:'foto',
			name:'foto',
			render:function(data, tye, full, meta){

				if(data == null){

					return '<img src="https://asesorialetrada.sanjuan.gob.ar/cms/public/img/administradores/default.png" class="img-fluid rounded-circle">'
				}else{

					return '<img src="'+ruta+'/'+data+'" class="img-fluid rounded-circle">'
				}

			},

			orderable:false	
	
		},
		{
			data:'rol',
			name:'rol',render:function(data, tye, full, meta){

				if(data == null){

					return 'administrador'
				}else{

					return data
				}

			},

			orderable:true
	
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

tablaAdministradores.on('order.dt search.dt', function(){

	tablaAdministradores.column(0, {search:'applied', order:'applied'}).nodes().each(function(cell, i){ cell.innerHTML = i+1})


}).draw();