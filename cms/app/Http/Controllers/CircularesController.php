<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Circulares;
use App\Administradores;
use App\Pagina;

class CircularesController extends Controller{
    public function index(){
        if(request()->ajax()){
             return datatables()->of(Circulares::all())
             -> addColumn('acciones', function($data){
                $acciones = '<button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina = "circulares" token="'.csrf_token().'">
                               <i class="fas fa-trash-alt text-white"></i>
                            </button>

                         </div>';   
                return $acciones;
             })
             -> rawColumns(['acciones'])
             -> make(true);
          }
        $circulares = Circulares::all();
        $pagina = Pagina::all();
        $administradores = Administradores::all();

        return view("paginas.circulares", array("circulares"=> $circulares, "pagina"=> $pagina, "administradores"=>$administradores));
    }

   
/*=============================================
Crear un registro
=============================================*/
public function store(Request $request){

        //Recoger datos
        $datos = array( "denominacion" => $request->input("denominacion_circulares"),
                        "numero"=>$request->input("numero_circulares"),
                        "acronimo"=>$request->input("acronimo_circulares"),
                        "anio"=>$request->input("anio_circulares"),
                        "temageneral"=>$request->input("temageneral_circulares"),
                        "caracter"=>$request->input("caracter_circulares"),
                        "extracto"=>$request->input("extracto_circulares"),
						"fechaemision"=>$request->input("fechaemision_circulares"),
                        "rutapdf"=>$request->file("rutapdf_circulares")
                    );

        $nombreArchivo = $datos['rutapdf']->getClientOriginalName();
        $rutaTMP = $datos['rutapdf']->getPathname();
        $rutaServidorPdf = 'img/pdf/'.$nombreArchivo;
        $resultado = move_uploaded_file($rutaTMP,$rutaServidorPdf);

        if(!$resultado){
           return redirect("/circulares")->with("error-pdf", "");
        }

      //  echo '<pre>';print_r($datos);'</pre>';
       // return;
              
        

                            $circulares = new Circulares();
                            $circulares->denominacion = $datos["denominacion"];
                            $circulares->numero = $datos["numero"];
                            $circulares->acronimo = $datos["acronimo"];
                            $circulares->anio = $datos["anio"];
                            $circulares->temageneral = $datos["temageneral"];
                            $circulares->caracter= $datos["caracter"];
                            $circulares->extracto = $datos["extracto"];
							$circulares->fechaemision = $datos["fechaemision"];
                            $circulares->rutapdf = $rutaServidorPdf;

                            $circulares->save();

                            return redirect("/circulares")->with("ok-crear", "");
                        //}
                //}

            }

     /*=====================================================
   Eliminar un registro
   ====================================================*/
   public function destroy($id, Request $request){
      $validar = Circulares::where("id", $id)->get();
      // echo "<pre>";print_r($validar); echo"</pre>";
      // return;       
      if(!empty($validar) && $id != 1){
         //if(!empty($validar[0]["foto"])){
         //   unlink($validar[0]["foto"]);
         //}
         $circulares = Circulares::where("id", $validar[0]["id"])->delete();
        // return redirect("/administradores")->with("ok-eliminar", "");
         
         //Responder al AJAX de js
         return "ok";
      }else{
         return redirect("/circulares")->with("no-borrar", "");
      }
   }
                

    
}
