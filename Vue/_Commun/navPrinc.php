
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/admin.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $adult['name']?></p><strong><?= $adult['firstname']?></strong>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li href= "admin"class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="admin/professeur">
            <i class="fa fa-files-o"></i>
            <span>Configuration</span>
           
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/configuration"><i class="fa fa-circle-o"></i>Configuration</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="admin/professeur">
            <i class="fa fa-files-o"></i>
            <span>Professeur</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">nbrP</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/professeur"><i class="fa fa-circle-o"></i>Professeurs</a></li>
            
          </ul>
        </li>
         <li class="treeview">
          <a href="admin/professeur">
            <i class="fa fa-files-o"></i>
            <span>Eleves</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">nbrP</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/student"><i class="fa fa-circle-o"></i>Eleves</a></li>
            
          </ul>
        </li>
        <li>
          <a href="admin/classe">
            <i class="fa fa-th"></i> <span>Classe</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">new</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="admin/grille">
            <i class="fa fa-pie-chart"></i>
            <span>Grille</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/grille"><i class="fa fa-circle-o"></i>Grilles</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="admin/droit">
            <i class="fa fa-laptop"></i>
            <span>Classe d'accées</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/droit"><i class="fa fa-circle-o"></i>Classe d'accées</a></li>
           
          </ul>
        </li>
        <li class="treeview">
          <a href="admin/documentation">
            <i class="fa fa-edit"></i> <span>Documentation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="admin/documentation"><i class="fa fa-circle-o"></i> Explications</a></li>
          
          </ul>
        </li>
      
       
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>