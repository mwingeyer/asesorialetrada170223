<?php
    // CONTROLADOR DE PAGINA//
    $pagina = controladorPagina::ctrMostrarPagina();

    // CONTROLADOR DE DICTAMENES//
    $dictamenesBusca = controladorDictamenes::ctrMostrarDictamenesBusca(0, 5, null, null);
    $totalDictamenes =  controladorDictamenes::ctrMostrarTotalDictamenes();
    $totalPaginasDic = ceil(count($totalDictamenes)/5);

    // CONTROLADOR DE DICTAMENES//
    $circulares = controladorCircular::ctrMostrarCirculares(3 , null, null);
    $circularesBusca = controladorCircular::ctrMostrarCircularesBusca(0, 5, null, null);
    $totalCirculares =  controladorCircular::ctrMostrarTotalCirculares();
    $totalPaginas = ceil(count($totalCirculares)/5);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo $pagina["titulo"]; ?></title>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Sitio Oficial de Asesoria Juridica y de control de Legalidad de Gobierno de la Provincia de San Juan, Argentina">
        <meta name="keywords" content="control,legalidad,asesoria juridica,asesoria,letrada,sanjuan,sanjuan.gov.ar,Portal de San Juan">
        <meta name="author" content="Gobierno de la Provincia de San Juan">
        
        <link rel="stylesheet" type="text/css" href="<?php echo $pagina['dominio'];?>vistas/css/custom-bootstrap.min.css" />
        <link type="text/css" rel="stylesheet" href="<?php echo $pagina['dominio'];?>vistas/css/patron.css">
        <link type="text/css" rel="stylesheet" href="<?php echo $pagina['dominio'];?>vistas/css/patron-iconos.css">
        <link rel="stylesheet" type="text/css" href="<?php echo $pagina['dominio'];?>vistas/css/style.css"/>
        <link rel="shortcut icon" type="image/png" href="<?php echo $pagina['dominio'];?>vistas/img/favicon.png"/>


        <script type="text/javascript" src="<?php echo $pagina['dominio'];?>vistas/gen/v.js"></script>
        <script type="text/javascript" src="<?php echo $pagina['dominio'];?>vistas/js/sitio.min.js"></script>
        <script type="text/javascript" src="<?php echo $pagina['dominio'];?>vistas/js/all.min.js"></script> 
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        

        <script type="text/javascript" src="<?php echo $pagina['dominio'];?>vistas/js/script.js"></script>
       

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

        <!-- JdSlider -->
        <!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html 
        <script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/jquery.jdSlider-latest.js"></script>-->
        
        <!-- pagination -->
        <!-- http://josecebe.github.io/twbs-pagination/ -->
        <script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/pagination.min.js"></script>

        <!-- scrollup -->
        <!-- https://markgoodyear.com/labs/scrollup/ -->
        <!-- https://easings.net/es# 
        <script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/scrollUP.js"></script>
        <script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/jquery.easing.js"></script>-->

        <!-- Shape Share -->
        <!-- https://www.jqueryscript.net/social-media/Social-Share-Plugin-jQuery-Open-Graph-Shape-Share.html 
        <script src="<?php echo $pagina['dominio'];?>vistas/js/plugins/shape.share.js"></script>-->

        <!-- Alerta Notie -->
        <script href="<?php echo $pagina['dominio'];?>vistas/js/plugins/notie.js"></script>
        <script href="<?php echo $pagina['dominio'];?>vistas/js/plugins/notie.min.js"></script>


	<!-- =======================================================
	    Theme Name: Asesoria Letrada
	    Theme URL: 
		Author: Wingeyer Marcelo
	============================================================ -->
	<!-- Google tag (gtag.js) -->
			<script async src="https://www.googletagmanager.com/gtag/js?id=G-5Y0KLZWVG2"></script>
			<script>
			  window.dataLayer = window.dataLayer || [];
			  function gtag(){dataLayer.push(arguments);}
			  gtag('js', new Date());

			  gtag('config', 'G-5Y0KLZWVG2');
			</script>
  
	</head>


<body>

	<?php

        /* =======================================================
          MODULOS FIJO SUPERIOR
        ============================================================ */

        include "paginas/modulos/menu.php";
        

        /* =======================================================
            NAVEGAR ENTRE PAGINAS
        ============================================================ */
        if(isset($_GET['pagina'])){

            $rutas = explode("/", $_GET['pagina']);

                if(isset($rutas[1]) && !is_numeric($rutas[1])){

                 //echo '<pre>'; print_r($rutas); echo '</pre>';

                 include "paginas/buscador.php";

                
                }else{
            
                    foreach($pagina as $key => $value){
                    
                        if($rutas[0] == $pagina['rutaBuscadorCir']){
                    
                            include "paginas/buscadorCir.php";
                            break;
                    
                         }else{
                    
                            if($rutas[0] == $pagina['rutaBuscadorDic']){
                    
                                include "paginas/buscadorDic.php";
                                break;
                    
                            include "paginas/404.php";
                                break;
                    
                            }
                        } 
                    }
                }

        }else{

            include "paginas/inicio.php";
       
        }          

        /* =======================================================
           MODULOS FIJOS INFERIORES
        ============================================================ */

        include "paginas/modulos/footer.php";


	?>

    <script>
        function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
                x[i].style.display = "none";
            }

            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-border-red", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.firstElementChild.className += " w3-border-red";
        }
    </script>
	

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>
</html>