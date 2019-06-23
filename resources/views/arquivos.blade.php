	@extends("theme.$theme.layout")
@section('content')
<section class="content">
      
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabela de Arquivos</h3>
            </div>
             <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Cadastrar Novo Arquivo
              </button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nome</th>
                  <th>Tipo</th>
                  <th>Visualizar</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
               @foreach ($arquivos as $a)
                <tr>
                  <td>{{$a->nome}}</td>
                  <td><a href="#editarProjeto{{$a->id}}" data-toggle="modal" data-target="#editarEvento{{$a->id}}"><i class="fa fa-edit"></i></i></a></td>
                  <td><a href="#"
                    onclick="
                    var result = confirm('Deseja realmete excluir o evento {{$a->nome}}?');
                    if(result){
                      event.preventDefault();
                      document.getElementById('delete-form{{$a->id}}').submit();

                    } "><i class="fa fa-fw fa-remove"></i>{{$a->id}}</i></a></td>
                      <form  id="delete-form{{$a->id}}"  method="POST" action="{{ action('ArquivosController@destroy',$a->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="delete">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
          <div class="modal fade" id="editarEvento{{$a->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Editar Arquivo</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="PUT" action="{{ action('ArquivosController@update',$a->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ $a->id}}">
              <div class="box-body">
                <div class="form-group">
                  <label>Nome do Arquivo</label>
                  <input type="text" class="form-control" name="nome" value="{{$a->nome}}" required>
                </div>
                <!-- radio -->
                <div class="form-group">
                  <div class="radio" >
                    <label><label>Status</label><br>
                    @if($a->status==0)
                      <input type="radio" name="status" id="op1" value="1"><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Inativo</label>
                    @else
                     <input type="radio" name="status" id="op1" value="1"checked><label>Ativo</label><br>
                      <input type="radio" name="status" id="op1" value="0" ><label>Inativo</label>
                    @endif
                  </div>
              </div>
               <!-- radio -->
                <div class="form-group">
                  <div class="radio" >
                    <label><label>Tipo</label><br>
                    @if($a->status==0)
                      <input type="radio" name="status" id="op1" value="1"><label>Público</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Privado</label>
                    @else
                     <input type="radio" name="status" id="op1" value="1"checked><label>Público</label><br>
                      <input type="radio" name="status" id="op1" value="0" ><label>Privado</label>
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
            <form role="form" method="POST" action="{{ action('ArquivosController@store') }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">  
              <div class="box-body">
                <div class="form-group">
                  <label>Nome Arquivo</label>
                  <input type="text" class="form-control" name="nome" required>
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
               <!-- radio -->
                <div class="form-group">
                  <div class="radio" >
                    <label><label>Tipo</label><br>
                      <input type="radio" name="status" id="op1" value="1"><label>Público</label><br>
                      <input type="radio" name="status" id="op1" value="0" checked><label>Privado</label>
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
