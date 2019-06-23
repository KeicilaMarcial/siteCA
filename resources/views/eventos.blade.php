	@extends("theme.$theme.layout")
@section('content')
<section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabela de Eventos</h3>
            </div>
             <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Cadatrar Novo Evento
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
               @foreach ($eventos as $e)
                <tr>
                  <td>{{$e->nome}}</td>
                  <td><a href="#editarProjeto{{$e->id}}" data-toggle="modal" data-target="#editarEvento{{$e->id}}"><i class="fa fa-edit"></i></i></a></td>
                  <td><a href="#"
                    onclick="
                    var result = confirm('Deseja realmete excluir o evento {{$e->nome}}?');
                    if(result){
                      event.preventDefault();
                      document.getElementById('delete-form{{$e->id}}').submit();

                    } "><i class="fa fa-fw fa-remove"></i>{{$e->id}}</i></a></td>
                      <form  id="delete-form{{$e->id}}"  method="POST" action="{{ action('EventosController@destroy',$e->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="delete">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
          <div class="modal fade" id="editarEvento{{$e->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Evento</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="PUT" action="{{ action('EventosController@update',$e->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $e->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome do Evento</label>
                  <input type="text" class="form-control" name="nome" value="{{$e->nome}}" required>
                </div>
                <div class="form-group">
                  <label>Link da página do evento</label>
                  <input type="text" class="form-control" name="nome" value="{{$e->link}}" required>
                </div>
                 <!-- textarea -->
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" name="descricao" required>  {{ $e->descricao ?? old('descricao') }}</textarea>
                </div>
                <div class="form-group">
                  @php
                    if ($e->imagem)
                        $eathImage = url("storage/imagens/eventos/{$e->imagem}");
                @endphp
               <img src="{{ $eathImage }}" class="img-circle"  height="200" width="200">
              </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagem</label>
                   <input type="file" id="exampleInputFile" name="imagem" >
                  <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
                <!-- radio -->
                <div class="form-group">
                  <div class="radio" >
                    <label><label>Status</label><br>
                    @if($e->status==0)
                      <input type="radio" name="status" id="op1" value="1"><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Inativo</label>
                    @else
                     <input type="radio" name="status" id="op1" value="1"checked><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" ><label>Inativo</label>
                    @endif
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
                <h4 class="modal-title">Cadastro</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="POST" action="{{ action('EventosController@store') }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">  
              <div class="box-body">
                <div class="form-group">
                  <label>Nome do evento</label>
                  <input type="text" class="form-control" name="nome" required>
                </div>
                 <!-- textarea -->
                <div class="form-group">
                  <label>Descrição</label>
                  <textarea class="form-control" rows="3" name="descricao" required></textarea>
                </div>
                <div class="form-group">
                  <label>Link da página do evento</label>
                  <input type="text" class="form-control" name="link">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Imagem</label>
                  <input type="file" id="exampleInputFile" name="imagem" required>
                  <!--<p class="help-block">Example block-level help text here.</p>-->
                </div>
                <!-- radio -->
                <div class="form-group">
                  <div class="radio" >
                    <label><label>Status</label><br>
                      <input type="radio" name="status" id="op1" value="1"><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Inativo</label>
                    </label>
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

    </section>         
@endsection
