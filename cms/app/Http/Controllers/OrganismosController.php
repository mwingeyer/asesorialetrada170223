<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organismos;
use App\Administradores;
use App\Pagina;

class OrganismosController extends Controller
{
   public function index(){
       if(request()->ajax()){
             return datatables()->of(Organismos::all())
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

        $organismos = Organismos::all();
        $pagina = Pagina::all();
        $administradores=Administradores::all();

        return view("paginas.organismos", array("organismos"=> $organismos, "pagina"=> $pagina, "administradores"=>$administradores));

    }



/*=============================================
Crear un registro
=============================================*/
public function store(Request $request){

        //Recoger datos
        $datos = array( "nombre" => $request->input("nombre_organismo"),
                        "acronimo"=>$request->input("acronimo_organismo")
                        
                    );


         $organismos = new Organismos();
         $organismos->nombre = $datos["nombre"];
         $organismos->acronimo = $datos["acronimo"];
                          
                            
         $organismos->save();

         return redirect("/organismos")->with("ok-crear", "");
         
   }

    
}            

    

