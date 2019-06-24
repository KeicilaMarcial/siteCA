	@extends("theme.$theme.layout")
@section('content') 
 <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tabela de Imagens</h3>
            </div>
            <div class="box-body">
              <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-default">
                Cadatrar Nova Imagem
              </button>
             </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Status</th>
                  <th>Visualizar</th>
                  <th>Editar</th>
                  <th>Excluir</th>
                </tr>
                </thead>
                <tbody>
               @foreach ($imagens_1 as $i)
                <tr>
                  <td>@if($i->status==0)
                      <p>Inativo</p>
                      @else
                      <p>Ativo</p>
                      @endif
                  </td>
                   <td><a href="#visualizarImagem{{$i->id}}" data-toggle="modal" data-target="#visualizarImagem{{$i->id}}"><i class="fa fa-fw fa-eye-slash"></i></a></td>
                  <td><a href="#editarImagem{{$i->id}}" data-toggle="modal" data-target="#editarImagem{{$i->id}}"><i class="fa fa-edit"></i></i></a></td>
                  
                  <td><a href="#"
                    onclick="
                    var result = confirm('Deseja realmete excluir a imagem?');
                    if(result){
                      event.preventDefault();
                      document.getElementById('delete-form{{$i->id}}').submit();

                    } "><i class="fa fa-fw fa-remove"></i></i></a></td>
                      <form  id="delete-form{{$i->id}}"  method="POST" action="{{ action('ImagensController@destroy',$i->id) }}" enctype="multipart/form-data">
                        <input type="hidden" name="_method" value="delete">
                         <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      </form>
          <div class="modal fade" id="editarImagem{{$i->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Atualizar Status</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="post" action="{{ action('ImagensController@update',$i->id) }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              @method('GET')
                <input type="hidden" name="user_id" value="{{ $i->id}}">
              <div class="box-body">
                <!-- radio -->
                <div class="form-group">
                    <label>Status</label><br>
                    @if($i->status==0)
                       <label>
                        <input type="radio" name="status" class="minimal"  value="1">Ativo
                      </label>
                      <label>
                       <input type="radio"name="status" class="minimal" value="0" checked>Inativo
                      </label>
                    @else
                      <label>
                      <input type="radio" name="status" class="minimal"  value="1"  checked>Ativo
                     </label>
                    <label>
                  <input type="radio"name="status" class="minimal" value="0">Inativo
                </label>
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


              <div class="modal fade" id="visualizarImagem{{$i->id}}">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vizualizar</h4>
              </div>
              <div class="modal-body">
              <!-- form start -->
            <form role="form" method="#" action="#" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="box-body">
                   <div class="form-group">
                  @php
                    if ($i->imagem)
                        $iathImage = url("storage/imagens/banner/{$i->imagem}");
                @endphp
               <img src="{{ $iathImage }}" class="img-circle"  height="200" width="200">
               <p class="help-block">Imagem Atual.</p>
              </div>
              
              
              <!-- /.box-body -->
              <div class="box-footer">
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
                  <th>Status</th>
                   <th>Visualizar</th>
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
            <form role="form" method="POST" action="{{ action('ImagensController@store') }}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id}}">  
              <div class="box-body">
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
