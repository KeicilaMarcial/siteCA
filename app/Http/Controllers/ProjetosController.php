<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProjetoRequest;
use App\Models\Projeto;
use App\User;
use DB;
class ProjetosController extends Controller
{
     public function projetos()
    {	
         $projetos = Projeto::all()->sortBy('name');
        return view("projetos")->with( ['projetos' => $projetos] );
    }
      public function create()
    {
        return view("projetos");
    }

     public function store(ProjetoRequest $request)
    {
       // dd($request->imagem);
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
        $upload = $request->imagem->storeAs('/imagens/projetos', $nameFile);
        
        // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
 
        // Verifica se NÃO deu certo o upload (Redireciona de volta)
        if ( !$upload )
            return redirect()
                        ->back()
                        ->with('error', 'Falha ao fazer upload')
                        ->withInput();
 
    }
     /*(Projeto::create([
        'user_id' => $request->user_id,
        'nome'     =>$request->nome,
        'descricao'=>$request->descricao,
        'status'   =>$request->status,
        'imagem'    =>$upload

     ]);*/
        /*$post = $request->user()
                            ->projetos()
                            ->create($data);
        */
        Projeto::create($data);
        return redirect()
                    ->route('projetos')
                    ->withSuccess('Cadastro realizado com sucesso!');
    }

    public function update(ProjetoRequest $request, $id)
    {   
       
         $data = ($request->all());
         $projeto=Projeto::find($id);
        //$dataForm=$request->all();
        /* if($request->imagem){
            $imagem= $request->imagem;
            $extensao = $imagem->getClientOriginalExtension();
        }
        //mover a foto para pasta public
        if($request->foto){
            $imagem->move(public_path().'\images\foto_cadastro_aluno','/aluno-id_'.$alun->id.'.'.$extensao);
            $alun->foto='\foto_cadastro_aluno/aluno-id_'.$alun->id.'.'.$extensao;
            $alun->save();
        }
        */
          if ($request->has('imagem')) { 

                 // Define um aleatório para o arquivo baseado no timestamps atual
                 $name = uniqid(date('HisYmd'));
                // Recupera a extensão do arquivo
                 $extension = $request->imagem->extension();
                // Define finalmente o nome
                $nameFile = "{$name}.{$extension}";
                 $data['imagem'] = $nameFile;
                // Faz o upload:
                $upload = $request->imagem->storeAs('/imagens/projetos', $nameFile);
                //dd($request->imagem);
                 $update= $projeto->update($data);
                }
            if ($request->imagem==null){
            $update= $projeto->update([
                'nome' => $request->nome,
                 'descricao' =>$request->descricao,
                 'status'   =>$request->status
            ]);
          }
       return redirect('/projetos')->with('success','Atualizado com sucesso');    
    }

     public function destroy($id)
    {
        Projeto::destroy($id);
        return redirect()
                    ->route('projetos')
                    ->withSuccess('Projeto Excluido com sucesso');
    }
}
