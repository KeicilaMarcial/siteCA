	@extends("theme.$theme.layout")
@section('content')
 
  <section class="content">
  
        <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Atualizar Conteúdo 
                <small>Sobre nós</small>
              </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
            @foreach ($textos as $t)
               <form method="PUT" action="{{ action('TextosController@update',$t->id) }}">
               	<input type="hidden" name="_token" value="{{ csrf_token() }}">
               	<input type="hidden" name="user_id" value="{{ $t->id}}">
    				 <textarea class="textarea" name="descricao"  placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          	{{ $t->descricao ?? old('descricao') }}
                          </textarea>
                     {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                 </form>

             @endforeach   
             @if(empty($t))
             	<form method="POST" action="{{ action('TextosController@store') }}">
               	<input type="hidden" name="_token" value="{{ csrf_token() }}">	
				<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">	
    				 <textarea class="textarea" name="descricao"  placeholder="Place some text here"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                          </textarea>
                     {{Form::submit('Submit',['class'=>'btn btn-primary'])}}
                 </form>
             @endif          
			</form>
            </div>
          </div>
        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
     
</section>


@endsection
