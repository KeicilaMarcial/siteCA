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
         $arquivos_1 = Arquivo::all()->sortBy('name');

        return view("arquivos_1")->with( ['arquivos' => $arquivos_1] );
    }
      public function create()
    {
        return view("arquivos_1");
    }

       public function store(ArquivoRequest $request)
    {
    	//dd($request->all());
    	 $data = $request->all();
    	//Define o valor default para a variável que contém o nome do arquivo 
    	$nameFile = null;
    	if ($request->hasFile('arquivo')) {
    		// Define um aleatório para o arquivo baseado no timestamps atual
        	$name = uniqid(date('HisYmd'));
        	// Recupera a extensão do arquivo
        	$extension = $request->arquivo->extension();
 			 // Define finalmente o nome
	         $nameFile = "{$name}.{$extension}";
	         $data['arquivo'] = $nameFile;
 			  // Faz o upload:
      	  $upload = $request->arquivo->storeAs('/arquivos', $nameFile);
	     // Verifica se NÃO deu certo o upload (Redireciona de volta)
	        if ( !$upload ){
	            return redirect()
	                        ->back()
	                        ->with('error', 'Falha ao fazer upload')
	                        ->withInput();
	        }
		}
		 Arquivo::create($data);
        return redirect()
                    ->route('arquivos')
                    ->withSuccess('Upload realizado com sucesso!');

	}
    public function update(ArquivoRequest $request, $id)
    {   
         $arquivo=Arquivo::find($id);
            $update= $arquivo->update([
                'nome' => $request->nome,
                'status'   =>$request->status,
                 'tipo' =>$request->tipo
                 
            ]);
          
       return redirect('/arquivos_1')->with('success','Atualizado com sucesso');    
    }

     public function destroy($id)
    {
        Arquivo::destroy($id);
       return redirect('/arquivos_1')->with('success','Excluido com sucesso'); 
    }


}