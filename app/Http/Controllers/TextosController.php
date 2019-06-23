<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TextoRequest;
use DB;
use App\Models\Texto;
use App\User;
class TextosController extends Controller
{
	  private $texto;

    public function __construct(Texto $texto)
    {
        $this->texto = $texto;

        $this->middleware('auth')
                    ->except([
                        'index', 'show','update'
                    ]);
    }
     public function textos()
    {
    	 $textos = Texto::all();
        return view("textos")->with( ['textos' => $textos] );
    }

     public function create()
    {
        return view("textos");
    }

     public function store(Request $request)
    {
        $this->validate($request,[
        	'descricao' =>'required',

        ]);

       Texto::create($request->all());
       return redirect('/textos')->with('success','Texto Cadastrado');
    }

   public function updateTextos(TextoRequest $request, $id)
    {
    	
    	//$dataForm=$request->all();
        $texto=Texto::find($id);
        $update= $texto->update([
        	'descricao'=>$request->descricao

        ]);
         return redirect('/textos')->with('success','Atualizado com sucesso');
    }
}
