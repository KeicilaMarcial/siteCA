<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArquivoRequest;
use App\Models\Arquivo;
use App\User;

class ArquivosController extends Controller
{
     public function arquivos()
    {	
         $arquivos = Arquivo::all()->sortBy('name');
        return view("arquivos")->with( ['arquivos' => $arquivos] );
    }
      public function create()
    {
        return view("arquivos");
    }
}
