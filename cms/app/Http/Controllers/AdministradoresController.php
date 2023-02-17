<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Administradores;
use App\Pagina;
use Illuminate\Support\Facades\Hash;


class AdministradoresController extends Controller{

    /*====================================================
      Mostrar todos los registro
    ====================================================*/
     public function index(){
        if(request()->ajax()){
         return datatables()->of(Administradores::all())
         -> addColumn('acciones', function($data){

            $acciones = '<div class="btn-group">

                        <a href="'.url()->current().'/'.$data->id.'" class="btn btn-warning btn-sm">
                           <i class="fas fa-pencil-alt text-white"></i>
                        </a>

                        <button class="btn btn-danger btn-sm eliminarRegistro" action="'.url()->current().'/'.$data->id.'" method="DELETE" pagina="administradores" token="'.csrf_token().'">
                           <i class="fas fa-trash-alt text-white"></i>
                        </button>

                     </div>';

            return $acciones;

         })
         -> rawColumns(['acciones'])
         -> make(true);
      }
      $pagina = Pagina::all();
      $administradores = Administradores::all();

      return view("paginas.administradores", array("pagina"=>$pagina,"administradores"=>$administradores ));


    }

    /*====================================================
            Mostrar un solo registro
    ===================================================*/
   
   public function show($id){

      $administrador = Administradores::where("id", $id)->get();
      $pagina = Pagina::all();
      $administradores = Administradores::all();

      if(count($administrador) != 0){

         return view("paginas.administradores", array("status"=>200, "administrador"=>$administrador, "pagina"=>$pagina,"administradores"=>$administradores));

      }else{

         return view("paginas.administradores", array("status"=>404,"pagina"=>$pagina,"administradores"=>$administradores));

      }
   }

   /*=====================================================
   Editar un registro
   ====================================================*/  
   
   public function update($id, Request $request){

      // Recoger datos
      $datos = array("name"=>$request->input("name"),
                     "email"=>$request->input("email"),
                     "password_actual"=>$request->input("password_actual"),
                     "rol"=>$request->input("rol"),
                     "imagen_actual"=>$request->input("imagen_actual")); 

      // echo "<pre>";print_r($datos); echo"</pre>";
      // return;

      $password = array("password"=>$request->input("password"));
      $foto = array("foto"=>$request->file("foto"));

      //Validar datos
      if(!empty($datos)){

         $validar = \Validator::make($datos,[

            'name'=>"required|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/i",
            'email'=> "required|regex:/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/i"

         ]);


            if($password["password"] != ""){
               $validarPassword = \Validator::make($password,[
                  "password" => "required|regex:/^[0-9a-zA-Z]+$/i"
               ]);   
                  if($validarPassword->fails()){
                     return redirect("/administradores")->with("no-validacion", "");
                  }else{
                     $nuevaPassword = Hash::make($password['password']);
                  }
               }else{
                  $nuevaPassword = $datos["password_actual"];
               }

            if($foto["foto"] != ""){
               $validarFoto = \Validator::make($foto,[
                  "foto"=>"required|image|mimes:jpg,jpeg,png|max:2000000"
               ]);
               if($validarFoto->fails()){
                  return redirect("/administradores")->with("no-validacion", "");   
               }  
            }

            if($validar->fails()){
               return redirect("/administradores")->with("no-validacion", "");
            }else{
               if($foto["foto"] != ""){
                  if(!empty($datos["imagen_actual"])){
                     if($datos["imagen_actual"] != "img\administradores\default.png"){
                        // echo '<pre>';print_r($datos); echo "</pre>";
                        // return;
                        unlink($datos["imagen_actual"]);
                     }                
                  }
                  $aleatorio = mt_rand(100,999);
                  $ruta = "img/administradores/".$aleatorio.".".$foto["foto"]->guessExtension();
                  move_uploaded_file($foto["foto"], $ruta);
               }else{
                  $ruta = $datos["imagen_actual"];
               }
               $datos = array('name' =>$datos["name"],
                              'email' =>$datos["email"],
                              'password' =>$nuevaPassword,
                              'rol' =>$datos["rol"],
                              'foto' =>$ruta);
               $administrador = Administradores::where('id', $id)->update($datos);
               return redirect("/administradores")->with("ok-editar", "");
            }
         }else{
            return redirect("/administradores")->with("error", "");
         }   
   }

   /*=====================================================
   Eliminar un registro
   ====================================================*/
   public function destroy($id, Request $request){
      $validar = Administradores::where("id", $id)->get();
      // echo "<pre>";print_r($validar); echo"</pre>";
      // return;       
      if(!empty($validar) && $id != 1){
         if(!empty($validar[0]["foto"])){
            unlink($validar[0]["foto"]);
         }
         $administrador = Administradores::where("id", $validar[0]["id"])->delete();
        // return redirect("/administradores")->with("ok-eliminar", "");
         
         //Responder al AJAX de js
         return "ok";
      }else{
         return redirect("/administradores")->with("no-borrar", "");
      }
   }

}
