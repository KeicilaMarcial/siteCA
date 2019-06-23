	@extends("theme.$theme.layout")
@section('content') 
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabela de Projetos</h3>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Cadatrar Novo Projeto
              </button>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
               @foreach ($projetos as $p)
                <tr>
                  <td>{{$p->nome}}</td>
                  <td><a href="#editarProjeto{{$p->id}}" data-toggle="modal" data-target="#editarProjeto{{$p->id}}"><i class="fa fa-edit"></i></i></a></td>
                  <td><a href="#"
                    onclick="
                    var result = confirm('Deseja realmete excluir o projeto {{$p->nome}}?');
                    if(result){
                      event.preventDefault();
                      document.getElementById('delete-form{{$p->id}}').submit();

                    } "><i class="fa fa-fw fa-remove"></i>{{$p->id}}</i></a></td>
                      <form  id="delete-form{{$p->id}}"  method="POST" action="{{ action('ProjetosController@destroy',$p->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="delete">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
          <div class="modal fade" id="editarProjeto{{$p->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cadastro</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="PUT" action="{{ action('ProjetosController@update',$p->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $p->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome do Projeto</label>
                  <input type="text" class="form-control" name="nome" value="{{$p->nome}}" required>
                </div>
                 <!-- textarea -->
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" name="descricao" required>  {{ $p->descricao ?? old('descricao') }}</textarea>
                </div>
                <div class="form-group">
                  @php
                    if ($p->imagem)
                        $pathImage = url("storage/imagens/projetos/{$p->imagem}");
                @endphp
               <img src="{{ $pathImage }}" class="img-circle"  height="200" width="200">
               <p class="help-block">Imagem Atual.</p>
              </div>
              
                <!-- radio -->
                <div class="form-group">
                    <label>Status</label><br>
                    @if($p->status==0)
                     <!-- <input type="radio" name="status" id="op1" value="1"><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Inativo</label>
                        -->
                       <label>
                        <input type="radio" name="status" class="minimal"  value="1">Ativo
                      </label>
                      <label>
                       <input type="radio"name="status" class="minimal" value="0" checked>Inativo
                      </label>
                    @else
                     <!--<input type="radio" name="status" id="op1" value="1"checked><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" ><label>Inativo</label>-->
                      <label>
                      <input type="radio" name="status" class="minimal"  value="1"  checked>Ativo
                     </label>
                    <label>
                  <input type="radio"name="status" class="minimal" value="0">Inativo
                </label>
                    @endif
                  </div>
                    <div class="form-group">
                  <label for="exampleInputFile">Alterar Imagem</label>
                   <input type="file" id="exampleInputFile" name="imagem" >
                  <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>

              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <div class="modal fade" id="modal-default">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><label>Cadastro</label></h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="POST" action="{{ action('ProjetosController@store') }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">  
              <div class="box-body">
                <div class="form-group">
                  <label>Nome do Projeto</label>
                  <input type="text" class="form-control" name="nome" required>
                </div>
                 <!-- textarea -->
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" name="descricao" required></textarea>
                </div>
                <!-- radio -->
               <div class="form-group">
                  <label>Status</label><br>
                <label>
                  <input type="radio" name="status" class="minimal"  value="1">Ativo
                </label>
                <label>
                  <input type="radio"name="status" class="minimal" value="0" checked>Inativo
                </label>
              </div>

              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagem</label>
                  <input type="file" id="exampleInputFile" name="imagem" required>
                  <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>

              </div>
             
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

</section>
@endsection
