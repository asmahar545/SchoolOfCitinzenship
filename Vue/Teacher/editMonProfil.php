  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php $this->titre = "Student"; ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
     <!-- Date Picker -->

  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

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
<?php require 'Vue/_Commun/navPrincTeacher.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
     
        <section class="content-header">
      <h1>
        Mon profil
      </h1>
      
        </section>  
       <!-- Main content -->
    <section class="content">



<div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Mes informations</a></li>
              
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                 <form action="Teacher/exeEditTeacher"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Modification d'un Professeur</h3>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon">Nom</span>
                                <input name="name" type="text" class="form-control" required="true" value="<?= $adult['name']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Prénom</span>
                                <input name="firstname" type="text" class="form-control" required="true"placeholder="" value="<?= $adult['firstname']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Adresse</span>
                                <input name="adress" type="text" class="form-control" required="true" value="<?= $adult['adress']?>">
                            </div>
                
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Date de naissance</span>
                                <input name="birthday"  class="form-control" id="datepicker" value="<?= $adult['birthday'] ?> ">
                            </div>
                            <br>
                             <?php if ($adult['sexe']== "femme"): ?>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Sexe</span>
                                  <select name="sexe"  class="form-control" value="<?= $adult['sexe'] ?> " placeholder=" ">
                                      <option >homme </option>
                                      <option selected="selected">femme</option>
                                </select> 
                            </div>
                            
                            <br>
                            <?php else: ?>
                              <div class="input-group">
                                <span class="input-group-addon">Sexe</span>
                                  <select name="sexe"  class="form-control" value="<?= $adult['sexe'] ?> " placeholder=" ">
                                      <option selected="selected">homme </option>
                                      <option >femme</option>
                                </select> 
                            </div>
                            
                            <br>
                            <?php endif; ?>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Télèphone</span>
                                <input name="phone" type="number" class="form-control" placeholder="" required="true" value="<?= $adult['phone']?>">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input name="email" type= "email" class="form-control" placeholder="" required="true" value="<?= $adult['email']?>">
                            </div>
                            <br>
                             <div class="input-group">
                                <span class="input-group-addon">Commentaire</span>
                                <input name="commentaire"  type= "text" class="form-control" placeholder=""required="true" value="<?= $adult['commentaire']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Password</span>
                                <input name="password" type="text" class="form-control" placeholder="" required="true" value="<?= $adult['password']?>">
                            </div>
                            <br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Catégorie</span>
                                <select name="id_adultCategory" type="text" class="form-control" required="true" placeholder="">
                                    <?php
                                    foreach ($cat as $list):

                                        echo '<option value="' . $this->nettoyer($list['id_adultCategory']) . '">' . $this->nettoyer($list['name']) . '</option>';
                                        ?>
                                    <?php endforeach; ?>

                                </select> 
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">

                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
                            </div>

                    </form>
                 
                </div>
                <!-- /.post -->
              </div>
        
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
   <script>
    $('#datepicker').datepicker({
      autoclose: true
    });</script>
</body>

