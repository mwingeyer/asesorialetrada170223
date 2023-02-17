<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Voces;
use App\Administradores;
use App\Pagina;

class VocesController extends Controller
{
     public function index(){

        $voces = Voces::all();
        $pagina = Pagina::all();
        $administradores=Administradores::all();
        
        return view("paginas.voces", array("voces"=> $voces, "pagina"=> $pagina, "administradores"=>$administradores));

    }
}
