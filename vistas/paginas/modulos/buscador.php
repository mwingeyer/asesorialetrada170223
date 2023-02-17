<?php	
 $dominio = "https://asesorialetrada.sanjuan.gob.ar/buscadorCir"
?>


<!-- BUSCADOR -->
    <nav id="buscador" class="navbar navbar-expand-lg navbar-light lighten-2" style="background-color: #B71C1C;">
	  <div class="container-fluid">
		<div class="nav-wrapper col-lg-10">

			<!-- ENTRADA DEL BUSCADOR -->
			<div id="buscador">
				<div class="input-group float-right">	
					<input type="text" class="form-control buscador" placeholder="Buscar">
					<div class="input-group-append">	
						<span class="input-group-text bg-primary border-0" style="cursor:pointer">		
							<i class="fas fa-search buscar text-white"></i>
					    </span>
					    <a class="btn btn-dark float-lg-right" href="<?php echo $dominio ;?>">
						Volver
						</a>
					</div>
				</div>
				
			</div>
		</div>
	  </div>
	</nav>
	<!-- BUSCADOR -->