<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dictamenes;
use App\Administradores;
use App\Organismos;
use App\Pagina;

class DictamenesController extends Controller
{
   public function index(){
        if(request()->ajax()){
             return datatables()->of(Dictamenes::all())
             -> addColumn('acciones', function($data){
                $acciones = '<button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina = "administradores" token="'.csrf_token().'">
                               <i class="fas fa-trash-alt text-white"></i>
                            </button>

                         </div>';   
                return $acciones;
             })
             -> rawColumns(['acciones'])
             -> make(true);
          }
        $dictamenes = Dictamenes::all();
        $pagina = Pagina::all();
        $administradores = Administradores::all();
        $organismos = Organismos::all();

        return view("paginas.dictamenes", array("dictamenes"=> $dictamenes, "pagina"=> $pagina, "administradores"=>$administradores, "organismos"=> $organismos));

    }


/*=============================================
Crear un registro
=============================================*/
public function store(Request $request){

$dictamenes = Dictamenes::all();


        //Recoger datos
        $datos = array( "denominacion" => $request->input("denominacion_dictamen"),
       
                        "numero"=>$request->input("numero_dictamen"),  
                        "acronimo"=>$request->input("acronimo_dictamen"),
                        "anio"=>$request->input("anio_dictamen"),
                        "temageneral"=>$request->input("temageneral_dictamen"),
                        "voces"=>$request->input("voces_dictamen"),
                        "refexpediente"=>$request->input("refexpediente_dictamen"),
                        "leyes"=>$request->input("leyes_dictamen"),
                        "extracto"=>$request->input("extracto_dictamen"),
                        "orgproviene"=>$request->input("orgproviene_dictamen"),
                        "rutapdf"=>$request->file("rutapdf_dictamen"),
                        "fechasancion"=>$request->input("fechasancion_dictamen"),
                        "extracto"=>$request->input("extracto_dictamen")
                    );
			$nombreArchivo = $datos['rutapdf']->getClientOriginalName();
			$rutaTMP = $datos['rutapdf']->getPathname();
			$rutaServidorPdf = 'img/pdf/'.$nombreArchivo;
			$resultado = move_uploaded_file($rutaTMP,$rutaServidorPdf);

			if(!$resultado){
				return redirect("/circulares")->with("error-pdf", "");
			}

                            $dictamenes = new Dictamenes();
                            $dictamenes->denominacion = $datos["denominacion"];
                            $dictamenes->numero = $datos["numero"];
                            $dictamenes->acronimo = $datos["acronimo"];
                            $dictamenes->anio = $datos["anio"];
                            $dictamenes->temageneral = $datos["temageneral"];
                            $dictamenes->orgproviene = $datos["orgproviene"];
                            $dictamenes->voces = $datos["voces"];
                            $dictamenes->refexpediente = $datos["refexpediente"];
                            $dictamenes->leyes = $datos["leyes"];
                            $dictamenes->extracto = $datos["extracto"];
                            $dictamenes->fechasancion = $datos["fechasancion"];
                            $dictamenes->rutapdf = $rutaServidorPdf;

                            $dictamenes->save();

                            return redirect("/dictamenes")->with("ok-crear", "");
            

            }
}
