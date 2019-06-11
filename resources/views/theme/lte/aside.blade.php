  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset("assets/$theme/dist/img/user2-160x160.jpg")}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrador</p>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-pdf-o"></i> <span>Arquivos</span>
             <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview active">
          <a href="#">
            <i  class="fa fa-fw fa-file-archive-o"></i>
            <span>Projetos</span>
          </a>
        </li>
        <li>
          <a href="{{ url('textos') }}">
            <i class="fa fa-fw fa-file-word-o"></i> <span>Textos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-file-image-o"></i>
            <span>Imagens</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-fw fa-users"></i>
            <span>Membros</span>
          </a>
         
        </li>
            </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
