
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
        <li href= "admin"class="header">Menu principal</li>
         <li class="treeview">
          <a href="admin/">
            <i class="fa fa-th-list"></i>
            <span>Bureau</span>
           
          </a>
         
        </li>
        <li class="treeview">
          <a href="admin/configuration">
            <i class="fa fa-calendar-plus-o"></i>
            <span>Sessions d'évaluation</span>
           
          </a>
          
        </li>
        <li class="treeview">
          <a href="admin/professeur">
            <i class="fa fa-user"></i>
            <span>Professeurs</span>
            
          </a>
          
        </li>
         <li class="treeview">
          <a href="admin/student">
            <i class="fa fa-users"></i>
            <span>Jeunes</span>
           
          </a>
          
        </li>
        <li>
          <a href="admin/classe">
            <i class="fa fa-th"></i> <span>Classes</span>
            <span class="pull-right-container">
              
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="admin/grille">
            <i class="fa fa-file-text"></i>
            <span>Grille citoyenne</span>
            
          </a>
          
        </li>
        <li class="treeview">
          <a href="admin/droit">
            <i class="fa fa-unlink"></i>
            <span>Autorisations</span>
            
          </a>
         
        </li>
        <li class="treeview">
          <a href="admin/documentation">
            <i class="fa fa-play"></i> <span>Tutoriel</span>
            
          </a>
         
        </li>
      
       
      
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>