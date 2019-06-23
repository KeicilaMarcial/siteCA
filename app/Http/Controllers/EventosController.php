<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Http\Requests\EventoRequest;
use App\User;
class EventosController extends Controller
{
    public function eventos()
    {	
         $eventos = Evento::all()->sortBy('name');
        return view("eventos")->with( ['eventos' => $eventos] );
    }
      public function create()
    {
        return view("eventos");
    }

      public function store(EventoRequest $request)
    {
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
        $upload = $request->imagem->storeAs('/imagens/eventos', $nameFile);
        
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }
        Evento::create($data);
        return redirect()
                    ->route('eventos')
                    ->withSuccess('Cadastro realizado com sucesso!');
    }

    public function update(EventoRequest $request, $id)
    {   
       // dd($request->imagem);
         $data = ($request->all());
         $evento=Evento::find($id);
        //$dataForm=$request->all();
          if ($request->hasFile('imagem')) { 
                 // Define um aleatório para o arquivo baseado no timestamps atual
                 $name = uniqid(date('HisYmd'));
                // Recupera a extensão do arquivo
                 $extension = $request->imagem->extension();
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";
                 $data['imagem'] = $nameFile;
                // Faz o upload:
                $upload = $request->imagem->storeAs('/imagens/eventos', $nameFile);
                dd($request->imagem);
                 $update= $evento->update($data);
                }
            if ($request->imagem==null){
            $update= $evento->update([
                'nome' => $request->nome,
                 'descricao' =>$request->descricao,
                 'link'		 =>$request->link,
                 'status'   =>$request->status
            ]);
          }
       // return redirect('/projetos')->with('success','Atualizado com sucesso');    
    }

     public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()
                    ->route('eventos')
                    ->withSuccess('Evento Excluido com sucesso');
    }
}
