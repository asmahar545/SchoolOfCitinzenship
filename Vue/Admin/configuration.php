 <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php $this->titre = "Teacher"; ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
<?php require 'Vue/_Commun/headerPrinc.php'; ?>
<?php require 'Vue/_Commun/navPrinc.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
     <!-- Main content -->
    <section class="content">
     <div class="callout callout-success">
         
          <p>L'évaluation actuelle se porte sur la période de  <?= $period['period']?> du <?=  date("d-m-Y ", strtotime($period['dateStart']))?>  au <?=  date("d-m-Y ", strtotime($period['dateEnd']))?> </p>
        </div>
        <section class="content-header">
  <h1>
  Session d'évalution
    <small>Changez ou clotûrez une session. </small>
  </h1>
     
    </section>
     <br>

      <div class="row">
        <div class="col-md-9">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Changement de la période</a></li>
              <li><a href="#tab_2" data-toggle="tab">Fin de la période</a></li>
              
             
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>Informations importantes</b>

                <p>Changer la période consiste à ouvrir une nouvelle session d'évaluation avec une date de début ainsi que de fin. Les données de la session qui seront récoltés sont lié à la période séléctionner. 
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <b>Informations importantes</b>

                <p>Clotûrer la période consiste à supprimer les données précédement récoltés pour ainsi commencer une nouvelle session. Avant de clotûrer une période, il est important de sauvegarder les données générées de la session actuelle.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->
        </div>
          <div class="col-md-2">
        <div class="span1 offset1">
        <div class="btn-group btn-group-vertical">
          
            
                
        
         <a class="btn btn-warning" href="admin/finDePeriode">Changement de la période</a>
           <?php if (($nbrEvalue/10)==$nbrTotal): ?>
        
        <button data-toggle="modal"  data-target="#loginModal3"  class="btn btn-danger">Fin de la période</button>
        <?php else: ?>
        <button data-toggle="modal" disabled="disabled" data-target="#loginModal3"  class="btn btn-danger">Fin de la période </button>
        <?php endif; ?>
    </div>
</div>   
          </div>
        <!-- /.col --> 
      </div>
  </section>
  
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Professeurs qui n'ont pas débuté l'évaluation</h3>
            </div>
            <!-- /.box-header -->
             <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-hover">
                    <thead>
                            <tr>
                                <th>N°</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                               
                            </tr>
                     </thead>
                     <tbody>
                            <?php $var=1?>
                            <?php foreach ($teacherNon as $list): ?>
                                <tr>
                                    
                                    <td><?php echo $var++ ?></td>
                                    <td><?= $this->nettoyer($list['name']) ?></td>
                                    
                                    <td><?= $this->nettoyer($list['firstname']) ?></td>
                                   
                                    
                                    
                                </tr>
                            
                            <?php endforeach; ?>
                    </tbody>
           
          
                 </table>
              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
          <!-- /.box -->
        </div>
        <!-- /.col -->
         
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require 'Vue/_Commun/Folder.php'; ?>
<?php require 'Vue/_Commun/Aside.php'; ?>
 
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<!-- Fenetre  mettre à jour pour  déconnecter-->
    <div class="modal" id="loginModal3" tabindex="-1">
                      <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                          <h4 class="modal-title">Confirmez votre choix</h4>
                       </div>
                        <div class="modal-body">
                      
                      
                       <div class="alert alert-danger alert-dismissible">
                        
                          <h4><i class="icon fa fa-warning"></i> Attention !</h4>
                               Toutes les précédentes évaluations seront supprimées.
                         </div>
                         </div>
                       <div class="modal-footer">
        
                       <a href="admin/exeFinAnnee"><button class="btn btn-danger" type="button"><i class="icon icon-check icon-lg"></i>D'accord</button></a>
                   <a href="admin/configuration"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>
                      </div>
                 </div>
          </div>
  </div>
<!--fin de la fênetre-->
<!-- Fenetre  mettre à jour pour  déconnecter-->
    <div class="modal" id="loginModal4" tabindex="-1">
                      <div class="modal-dialog">
                     <div class="modal-content">
                         <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                          <h4 class="modal-title">Informations</h4>
                       </div>
                        <div class="modal-body">
                      
                      
                       <div class="alert alert-success alert-dismissible">
                        
                          <h4><i class="icon fa fa-warning"></i> Attention!</h4>
                             Vous voulez vraiment envoyer un e-mail à tout le professeurs et éducateurs
                         </div>
                         </div>
                       <div class="modal-footer">
        
                       <a href="admin/exeEnvoiEmail/"><button class="btn btn-danger" type="button"><i class="icon icon-check icon-lg"></i>Oui</button></a>
                   <a href="admin/configuration"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>
                      </div>
                 </div>
          </div>
  </div>
<!--fin de la fênetre-->
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
  
    </body>
