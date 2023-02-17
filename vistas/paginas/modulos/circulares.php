<!-- CIRCULARES  -->
<section>
  <hr class="divisor-seccion border-secondary" aria-hidden="true">
  <h2 class="text-center text-secondary">Circulares</h2>
  <br>
  <div class="row col-12 intro-padre">
    <!-- COLUMNA IZQUIERDA -->
    <div class=" col-lg-12  intro">

      <div class="row">
      <?php
      
      foreach($circulares as $key => $value){
      
      
          echo '
          <div class="col-lg-4">
             <hr aria-hidden="true" style="min-height: 0.1rem!important; background: url(https://d1pucn86e4upao.cloudfront.net/templates/g5_hydrogen/custom/images/borde-colores.svg)!important;">
                        <ol id='.$value['id'].'>
                          <div>
                            <h3 class="d-lg-block">'.$value["denominacion"].'-'.$value["numero"].'-'.$value["acronimo"].'-'.$value["anio"].'</h3>
                            <h5>'.$value["temageneral"].'</h5> 
                          </div>
                          <span>
                            <a href="#verCircular'.$value['id'].'" data-toggle="modal">                          
                            	<i class="btn btn-danger verCircular">Ver</i>
                            </a>
                          </span>
                        </ol>
                        
                        <div id="verCircular'.$value['id'].'" class="modal fade">
                          <div class="modal-dialog modal-content">
                            <div class="modal-header" style="border:1px solid #eee">
                              <h3 class="modal-title">'.$value["denominacion"].'-'.$value["numero"].'-'.$value["acronimo"].'-'.$value["anio"].'</h3>
                            </div>
                            <div class="modal-body" style="border:1px solid #eee">
                              <h5>'.$value["temageneral"].'</h5>
                              <p class="">'.$value["extracto"].'</p>
                            </div>
                            <div class="modal-footer d-flex justify-content-between">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                              <button type="submit" class="btn btn-primary float-right"><a class="text-white"target="_blank" href ="https://asesorialetrada.sanjuan.gob.ar/cms/public/'.$value["rutapdf"].'">Descargar</a></button>
                            
                            </div>  
                          </div>
                        </div>
                      </div>';

                     // }
                }
                     
          ?> 
        
           </div>
        </div>
          

</section>
