
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/teacher.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $adult['name']?></p><strong><?= $adult['firstname']?></strong>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menu principal</li>
            <li class="treeview">
          <a href="teacher">
            <i class="fa fa-th-list"></i>
            <span>Bureau</span>
          </a>
          
        </li>
       <li class="treeview">
          <a href="teacher/monprofil">
            <i class="fa fa-user"></i>
            <span>Profil personnel</span>
          </a>
          
        </li>
         <li>
          <a href="teacher/mesclasses">
            <i class="fa fa-users"></i> <span> Mes étudiants</span>
          </a>
        </li>
        <li>
          <a href="teacher/classe">
            <i class="fa fa-users"></i> <span>Ma classe(titulaire)</span>
          </a>
        </li>
        
        <li class="treeview">
          <a href="teacher/documentation">
             <i class="fa fa-edit"></i> <span>Tutoriel</span>
          </a>
          
        </li>
      
      
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>   