<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administradores;
use App\Pagina;

class PaginaController extends Controller
{
   
    /*===================================
        Mostrar todos los registros
    ====================================*/
    public function index(){
        $pagina = Pagina::all();
        $administradores=Administradores::all();


        return view("paginas.pagina", array("pagina"=> $pagina, "administradores"=>$administradores));
    }

    /*===================================
        Actualizar un registro
    ====================================*/
    public function update($id, Request $request){
       
       //Recoger datos
       $datos = array( "dominio"=>$request->input("dominio"),
       
                       "servidor"=>$request->input("servidor"),
                       "titulo"=>$request->input("titulo"),
                       "descripcion"=>$request->input("descripcion"),
                       "palabras_claves"=>$request->input("palabras_claves"),
                       "redes_sociales"=>$request->input("redes_sociales"),
                       "logo_actual"=>$request->input("logo_actual"),
                       "portada_actual"=>$request->input("portada_actual"),
                       "icono_actual"=>$request->input("icono_actual")
                    ); 
        

        //Recoger las imágenes

        $logo = array("logo_temporal"=>$request->file("logo"));
        $portada = array("portada_temporal"=>$request->file("portada"));
        $icono = array("icono_temporal"=>$request->file("icono"));

        

        // Validar los datos
        if(!empty($datos)){

            $validar = \Validator::make($datos, [

                "dominio" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "servidor" => 'required|regex:/^[-\\_\\:\\.\\0-9a-z]+$/i',
                "titulo" => 'required|regex:/^[0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "descripcion" => 'required|regex:/^[=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "palabras_claves" => 'required|regex:/^[,\\0-9a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i',
                "redes_sociales" => 'required',
                "logo_actual" => 'required',
                "portada_actual" => 'required',
                "icono_actual" => 'required'
            ]);


            //Validar imágenes logo
            if($logo["logo_temporal"] != ""){
                $validarLogo = \Validator::make($logo, [
                    "logo_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if($validarLogo->fails()){
                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }

            //Validar imágenes portada
            if($portada["portada_temporal"] != ""){
                $validarPortada = \Validator::make($portada, [
                    "portada_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if($validarPortada->fails()){
                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }

             //Validar imágenes icono
            if($icono["icono_temporal"] != ""){
                $validarIcono = \Validator::make($icono, [
                    "icono_temporal" => 'required|image|mimes:jpg,jpeg,png|max:2000000'
                ]);
                if($validarIcono->fails()){
                    return redirect("/")->with("no-validacion-imagen", "");
                }
            }

            //Revisar la validación
            if(!$validar->fails()){
                return redirect("/")->with("no-validacion","");
            }else{

                //Subir al servidor la imagen logo
                if($logo["logo_temporal"] != ""){
                    //unlink($datos["logo_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $rutaLogo = "img/pagina/".$aleatorio.".".$logo["logo_temporal"]->guessExtension();
                    move_uploaded_file($logo["logo_temporal"], $rutaLogo);

                    //Redimensionar Imágen
                    // list($ancho, $alto) = getimagesize($logo["logo_temporal"]);

                    // $nuevoAncho = 280;
                    // $nuevoAlto = 70;

                    // if($logo["logo_temporal"]->guessExtension() == "jpg" || $logo["logo_temporal"]->guessExtension() == "jpeg"){

                    //     $origen = imagecreatefromjpeg($logo["logo_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagejpeg($destino, $rutaLogo);

                    // }

                    // if($logo["logo_temporal"]->guessExtension() == "png"){

                    //     $origen = imagecreatefrompng($logo["logo_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagealphablending($destino, FALSE); 
                    //     imagesavealpha($destino, TRUE);
                    //     imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagepng($destino, $rutaLogo);
                        
                    // }

                }else{

                    $rutaLogo = $datos["logo_actual"];
                }

                //Subir al servidor la imagen portada
                if($portada["portada_temporal"] != ""){
                    //unlink($datos["portada_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $rutaPortada = "img/pagina/".$aleatorio.".".$portada["portada_temporal"]->guessExtension();
                    move_uploaded_file($portada["portada_temporal"], $rutaPortada);

                    //Redimensionar Imágen
                    // list($ancho, $alto) = getimagesize($portada["portada_temporal"]);

                    // $nuevoAncho = 800;
                    // $nuevoAlto = 445;

                    // if($portada["portada_temporal"]->guessExtension() == "jpg"  || $portada["portada_temporal"]->guessExtension() == "jpeg"){

                    //     $origen = imagecreatefromjpeg($portada["portada_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagejpeg($destino, $rutaPortada);

                    // }

                    // if($portada["portada_temporal"]->guessExtension() == "png"){

                    //     $origen = imagecreatefrompng($portada["portada_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagealphablending( $destino, FALSE); 
                    //     imagesavealpha( $destino, TRUE);
                    //     imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagepng($destino, $rutaPortada);
                        
                    // }

                    // echo '<pre>';print_r($portada);'</pre>';

                    // return;

                }else{
                    $rutaPortada = $datos["portada_actual"];
                }

                 //Subir al servidor la imagen icono
                 if($icono["icono_temporal"] != ""){
                    //unlink($datos["icono_actual"]);
                    $aleatorio = mt_rand(100,999);
                    $rutaIcono = "img/pagina/".$aleatorio.".".$icono["icono_temporal"]->guessExtension();
                    move_uploaded_file($icono["icono_temporal"], $rutaIcono);

                    //Redimensionar Imágen
                    // list($ancho, $alto) = getimagesize($icono["icono_temporal"]);

                    // $nuevoAncho = 192;
                    // $nuevoAlto = 192;

                    // if($icono["icono_temporal"]->guessExtension() == "jpg"  || $icono["icono_temporal"]->guessExtension() == "jpeg"){

                    //     $origen = imagecreatefromjpeg($icono["icono_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagejpeg($destino, $rutaIcono);

                    // }

                    // if($icono["icono_temporal"]->guessExtension() == "png"){

                    //     $origen = imagecreatefrompng($icono["icono_temporal"]);
                    //     $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
                    //     imagealphablending($destino, false); 
                    //     imagesavealpha($destino, true);
                    //     imagecopyresampled($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
                    //     imagepng($destino, $rutaIcono);
                        
                    // }

                }else{
                    $rutaIcono = $datos["icono_actual"];
                }

                //Mover todos los ficheros temporales de blog al destino final

                // $origen = glob('img/temp/pagina/*');

                // foreach ($origen as $fichero){
                    
                //     copy($fichero,"img/pagina/".substr($fichero, 14));

                //     unlink($fichero);

                // }

                //$pagina = Pagina::all();
              
                $actualizar = array("dominio"=> $datos["dominio"],
                                    "servidor"=> $datos["servidor"],
                                    "titulo" => $datos["titulo"],
                                    "descripcion" => $datos["descripcion"],
                                    "palabras_claves" => json_encode(explode(",", $datos["palabras_claves"])),
                                    "redes_sociales" => $datos["redes_sociales"],
                                    "logo"=>$rutaLogo,
                                    "portada"=>$rutaPortada,
                                    "icono"=>$rutaIcono
                                    
                                );


                $pagina = Pagina::where("id", $id)->update($actualizar);
                return redirect("/")->with("ok-editar","");
            }
        }else{
            return redirect("/")->with("error","");
        }
    }

}