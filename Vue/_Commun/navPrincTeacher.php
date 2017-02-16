
           
    
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
        <li class="header">MAIN NAVIGATION</li>
       <li class="treeview">
          <a href="teacher/monprofil">
            <i class="fa fa-laptop"></i>
            <span>Mon Profil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="teacher/monprofil"><i class="fa fa-circle-o"></i>Mon Profil</a></li>
           
          </ul>
        </li>
         <li>
          <a href="teacher/mesclasses">
            <i class="fa fa-th"></i> <span>J'évalue mes élèves</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-green">ici</small>
            </span>
          </a>
        </li>
 
       
        <li class="treeview">
          <a href="teacher/mesclasses">
            <i class="fa fa-pie-chart"></i>
            <span>Grille</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="teacher/mesclasses"><i class="fa fa-circle-o"></i>Grilles</a></li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="teacher/documentation">
            <i class="fa fa-edit"></i> <span>Documentation</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="teacher/documentation"><i class="fa fa-circle-o"></i> Explications</a></li>
          
          </ul>
        </li>
      
      
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>   