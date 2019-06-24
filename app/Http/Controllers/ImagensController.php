<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ImagemRequest;
use App\Models\Imagem;
use App\User;
class ImagensController extends Controller
{
     public function imagens()
    {	
         $imagens_1 = Imagem::all()->sortBy('name');

        return view("imagens_1")->with( ['imagens_1' => $imagens_1] );
    }

   
      public function store(ImagemRequest $request)
    {
    	 $imagens_1 = Imagem::all();
    	 $cont=0;
    	 foreach ($imagens_1 as $i) {
         	if($i->status==1){
         		$cont++;
           	}
         }
         if($cont>=1){
         return redirect('/imagens_1')->with('error','Já existe uma imagem ativa'); 
       
         }else{
		    	 $data = $request->all();
		    	//Define o valor default para a variável que contém o nome da imagem 
		    	$nameFile = null;
		 
			    // Verifica se informou o arquivo e se é válido
			    if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
			         
			        // Define um aleatório para o arquivo baseado no timestamps atual
			        $name = uniqid(date('HisYmd'));
			 
			        // Recupera a extensão do arquivo
			        $extension = $request->imagem->extension();
			 
			        // Define finalmente o nome
			        $nameFile = "{$name}.{$extension}";
			         $data['imagem'] = $nameFile;
			        // Faz o upload:
			        $upload = $request->imagem->storeAs('/imagens/banner', $nameFile);
			        
			        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
			 
			        // Verifica se NÃO deu certo o upload (Redireciona de volta)
			        if ( !$upload )
			            return redirect()
			                        ->back()
			                        ->with('error', 'Falha ao fazer upload')
			                        ->withInput();
			 
   				 }
      			  Imagem::create($data);

      			 return redirect('/imagens_1')->with('success','Cadastrado com sucesso');
       } 
    }

 public function update(ImagemRequest $request, $id)
    {   
    	$cont=0;
        $imagens_1 = Imagem::all();
    	 foreach ($imagens_1 as $i) {
         	if( $i->status==1){
         		$cont++;
         	}
         }
         if($cont>=2){
         	return redirect('/imagens_1')->with('error','Já existe uma imagem ativa'); 
         }else{
         $imagem=Imagem::find($id);
            $update= $imagem->update([
                 'status'   =>$request->status
            ]);

       return redirect('/imagens_1')->with('success','Atualizado com sucesso'); 
       }   
    }

      public function destroy($id)
    {
        Imagem::destroy($id);
        return redirect()
                    ->route('imagens')
                    ->withSuccess('Evento Excluido com sucesso');
    }
}
