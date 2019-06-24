<?php

namespace App\Http\Controllers;
use App\Models\Arquivo;
use App\Models\Texto;
use App\Models\Projeto;
use App\Models\Evento;
use App\Models\Imagem;
use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
    {

    	 $textos = Texto::all();
    	 $projetos = Projeto::all()->sortBy('name');
    	 $eventos = Evento::all()->sortBy('name');
         $imagem = Imagem::all();
        return view("index")->with( ['textos' => $textos,
    		'projetos'=>$projetos,
    	    'eventos'=>$eventos,
            'imagem'=> $imagem]
    		);
        //return view("index");
    }

}
