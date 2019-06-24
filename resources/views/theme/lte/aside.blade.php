  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("assets/$theme/dist/img/logo.png")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">NAVEGAÇÃO</li>
        <li>
          <a href="{{ url('arquivos_1') }}">
            <i class="fa fa-fw fa-file-pdf-o"></i> <span>Arquivos</span>
          </a>
        </li>
        <li>
          <a href="{{ url('textos') }}">
            <i class="fa fa-fw fa-file-word-o"></i> <span>Textos</span>
          </a>
        </li>
         <li>
          <a href="{{ url('projetos') }}">
            <i class="fa fa-fw fa-clone"></i> <span>Projetos</span>
          </a>
        </li>
         <li>
          <a href="{{ url('eventos') }}">
            <i class="fa fa-fw fa-file-archive-o"></i> <span>Eventos</span>
          </a>
        </li>
         <li>
          <a href="{{ url('imagens_1') }}">
            <i class="fa fa-fw fa-file-image-o"></i> <span>Imagens</span>
          </a>
        </li>
      
        </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
