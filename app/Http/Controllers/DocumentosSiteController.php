<?php

namespace App\Http\Controllers;
use App\Models\Arquivo;
use Illuminate\Http\Request;

class DocumentosSiteController extends Controller
{
      public function documentosSite()
    {

         $arquivos = Arquivo::paginate(10);
       return view("documentosSite")->with( ['arquivos' => $arquivos] );
    }
}
