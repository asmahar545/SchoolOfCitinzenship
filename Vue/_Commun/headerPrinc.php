
<header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>valio</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>valio</b></span>
      
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/connexion.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $adult['name']?> <?= $adult['firstname']?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="dist/img/teacher.png" class="img-circle" alt="User Image">

                <p>
                  <?= $adult['name']?> <?= $adult['firstname']?> </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-12 text-center ">
                       <a href="connexion/"><button class="btn btn-succes" type="button"><i class="icon icon-check icon-lg"></i>Deconnexion</button></a>
                  </div>
                  
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
               
                <div class="pull-right">
                  
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button 
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gear"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
<!-- Fenetre  mettre à jour pour  déconnecter-
    <div class="modal" id="loginModal" tabindex="-1">
                      <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                          <h4 class="modal-title">Déconnexio</h4>
                       </div>
                        <div class="modal-body">
                      Êtes-vous sûr de vouloir vous déconnecter?
                         </div>
                       <div class="modal-footer">
        
                       <a href="connexion/"><button class="btn btn-succes" type="button"><i class="icon icon-check icon-lg"></i>Oui</button></a>
                   <a href="admin/"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>
                      </div>
                 </div>
          </div>
  </div>
<!--fin de la fênetre-->