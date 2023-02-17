<?php
  if(isset($rutas[1])){
      $circulares = ControladorCircular::ctrBuscador($rutas[1] , 0, 5);
      $totalArticulos = ControladorCircular::ctrTotalBuscador($rutas[1]);
      $totalPaginas=ceil(count($totalArticulos)/5);
      $paginaActual = 1;
  }
?>

<!--=====================================
CONTENIDO BUSCADOR CIRCULAR
======================================-->
<div class="container-fluid bg-white contenidoInicio pb-4">
    <div class="row">

      <!-- COLUMNA IZQUIERDA 
        <div class="col-lg-3 columanIzquierda"> 
          <div class="col-lg-12">
            <h3>Filtrar por:</h3>
            <div class="row col-lg-12">
              <label>Ordenado Por:</label>
              <select class="browser-default">
                  <option value="1">Más recientes</option>
                  <option value="2">Más antiguas</option>
              </select>
            </div>
           </div>
          </div>-->

      <!-- COLUMNA DERECHA-->
      <div class="col-lg-12">

        <?php foreach ($circulares as $key => $value) :?>
        
          <hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
          <ol id='<?php echo $value['id'];?>'>
            <div>
              <h3 class="d-lg-block"><?php echo $value['denominacion'].'-'.$value['numero'].'-'.$value['acronimo'].'-'.$value['anio'];?></h3>
              <h5><?php echo $value["temageneral"];?></h5> 
            </div>
            <span>
              <a href="#verCircular<?php echo $value['id']; ?>" data-toggle="modal">
                <i class="btn btn-danger verCircular">Ver</i>
              </a>
            </span>
          </ol>
                        
          <div id="verCircular<?php echo $value['id']; ?>" class="modal fade">
            <div class="modal-dialog modal-content">
              <div class="modal-header" style="border:1px solid #eee">
                <h3 class="modal-title"><?php echo $value['denominacion'].'-'.$value['numero'].'-'.$value['acronimo'].'-'.$value['anio'];?></h3>
              </div>
              <div class="modal-body" style="border:1px solid #eee">
                <h5><?php echo $value["temageneral"];?></h5>
                <p class=""><?php echo $value["extracto"];?></p>
              </div>
              <div class="modal-footer d-flex justify-content-between">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary float-right"><a class="text-white"target="_blank" href ="https://asesorialetrada.sanjuan.gob.ar/cms/public/<?php echo $value["rutapdf"];?>">Descargar</a></button>
              </div>  
            </div>
          7</div> 

        <?php endforeach ?>
        
      <div class="container d-none d-md-block">       
        <ul class="pagination justify-content-center" totalPaginas="<?php echo $totalPaginas; ?>" paginaActual="<?php echo $paginaActual?>"></ul>
      </div>

  </div>
</div>
</div>      

<input type="hidden" id="rutaActual" value="<?php echo $pagina["dominio"].$pagina['rutaBuscadorCir'];?>">

<!-- pagination -->
<script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/pagination.min.js"></script>

  <script>
    var totalPaginas = Number($(".pagination").attr("totalPaginas"));
    var paginaActual = Number($(".pagination").attr("paginaActual"));
    var rutaActual = $("#rutaActual").val();
    var rutaPagina = $(".pagination").attr("rutaPagina");

    if($(".pagination").length != 0){

        $(".pagination").twbsPagination({

          totalPages: totalPaginas,
          startPage: paginaActual,
          
          visiblePages: 5,
          first:"Primero",
          last:"Último",
          prev:'<i class="fas fa-angle-left"></i>',
          next:'<i class="fas fa-angle-right"></i>'

        }).on("page", function(evt, page){

            if(rutaPagina != ""){

               window.location = rutaActual+"/"+page;

           }else{

              window.location = rutaActual+page;
    
          } 

     })
    };
    
  </script>   
          

     