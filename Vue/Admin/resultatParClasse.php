<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  
  <?php $this->titre = "Résultat"; ?>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables/jquery.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="plugins/datatables/buttons.dataTables.min.css">
 
  
 
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
<body  class="hold-transition skin-black sidebar-mini">
<div class="wrapper">
<?php require 'Vue/_Commun/headerPrinc.php'; ?>
<?php require 'Vue/_Commun/navPrinc.php'; ?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Grille récapitulative par classe pour la période de <?= $period['period']?> 
        <small></small>
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h3 class="box-title">Classe: <?= $nomClass['yearSexion'] ?></h3><br><br>
              Nombre de professeurs ou d'éducateurs ayant évalué: <?= $nbteacher ?>  
            </div>
             
              
            <!-- /.box-header -->
           <div class="box-body table-responsive no-padding">
                <table  id="example1" class="table table-bordered table-striped"> 

                           <thead>
                            <tr >
                                <th class ="font">Grille citoyenne  
                                
                                
                                </th>
                            <?php foreach ($nomStudent as $list): ?>
                                 
                            <th class ="font" colspan="1" class="info" ><div><span ><?= $this->nettoyer($list['firstE']) ?> <?= $this->nettoyer($list['nameE']) ?>  </span></div></th>
                            
                            <?php endforeach; ?>
                            
                            </tr>
                            </thead>
                            <tfoot>
                              <tr >
                                  <th colspan="1" class="info"><?= $period['period']?> </th>
                                   <th colspan="5" class="warning" >Nombre de professeur de la classe : <?= $nbteachers ?> </th>
                                   <th colspan="5" class="danger" ><i class="fa fa-check">   </i> Ultimatum de voix positives</th> 
                                   
                                   <th colspan="4"  ><a  href="javascript:window.print()"  class="btn bg-purple btn-xs"><i class="fa fa-print"></i> Imprimer</a></th>
                                </tr>
                            </tfoot>
                            <tbody>
                               
                                
                                 <tr><th class="item" class="danger">Je suis respectueux envers les personnes</th>
                                     <?php foreach ($item1 as $list): ?>
                                     
                                     <?php 
                                     
                                     if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                   <?php endforeach; ?>    
                                    </tr>
                                 <tr><th class="item" class="danger">J’adopte une attitude non violente</th> <?php foreach ($item2 as $list): ?>
                                    
                                     <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                     
                                    
                                    
                                   
                                   <?php endforeach; ?>   </tr>
                                 <tr><th class="item" class="danger">Je suis respectueux du matériel et de l’environnement</th> <?php foreach ($item3 as $list): ?>
                                    
                                    <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                    
                                   
                                   <?php endforeach; ?>   </tr>
                                 <tr><th class="item"lass="danger">Je parle de façon adéquate</th> <?php foreach ($item4 as $list): ?>
                                    <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                   
                                   <?php endforeach; ?>   </tr>
                                 <tr><th class="item" class="danger">Je suis solidaire</th> <?php foreach ($item5 as $list): ?>
                                    
                                   <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                   
                                   <?php endforeach; ?>   </tr>
                                     
                                    <tr><th class="item" class="danger">Je respecte les règles de l’école</th> <?php foreach ($item6 as $list): ?>
                                    
                                    <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                               
                                   
                                   <?php endforeach; ?>   </tr>
                                        <tr><th class="item" class="danger">Je m’organise et je deviens autonome
                                            </th> <?php foreach ($item7 as $list): ?>
                                 <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                   <?php endforeach; ?>   </tr> 
                                        <tr><th class="item"  class="danger">J’écoute les professeurs et les élèves sans les interrompre
                                            </th> <?php foreach ($item8 as $list): ?>
                                     <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                    
                                   <?php endforeach; ?>   </tr> 
                                            <tr><th class="item" class="danger">Je circule dans l’école calmement
                                            </th> <?php foreach ($item9 as $list): ?>
                                    
                                    <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                    
                                   <?php endforeach; ?>   </tr> 
                                              <tr><th class="item" class="danger">Je donne le meilleur de moi-même
                                            </th> <?php foreach ($item10 as $list): ?>
                                    
                                   <?php if ($list['resultat'] ==$nbteacher): ?>
                                    <td><i class="fa fa-check"></i></td>
                                     <?php else: ?>
                                     <td><?= $list['resultat']?>/<?= $nbteacher ?> </td>
                                     <?php endif; ?>
                                    
                                    
                                   <?php endforeach; ?>   </tr>
                               
                            </tbody>
                            
                        </table>
         
                                   
                    </div>
             
             </div>
             
 

        
          
          <!-- /.box -->

          
          <!-- /.box -->
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
<style>
    th.item{
        font-size: 45%
    }
th.font{
        font-size: 40%;
    }
    th.rotate {
  /* Something you can count on */
  height: 20px;
  white-space: nowrap;
}

th.rotate > div {
  transform: 
    /* Magic Numbers */
    translate(10px, 0px)
    /* 45 is really 360 - 45 */
    rotate(90deg);
  width: 100px;
}
th.rotate > div > span {
  border-bottom: 1px solid #ccc;
  padding: 5px 10px;
}
/* These aren't needed and will be weird if transforms don't work */
.csstransforms & th.rotate {
  height: 140px;
  white-space: nowrap;
}
    </style>
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
<script src="plugins/pdf/jquery.dataTables.min.js"></script>
  <script src="plugins/pdf/dataTables.buttons.min.js"></script>
  <script src="plugins/pdf/pdfmake.min.js"></script>
  <script src="plugins/pdf/vfs_fonts.js"></script>
  <script src="plugins/pdf/buttons.html5.min.js"></script>
  	
<!-- page script 
<script>
 
$(document).ready(function() {
    $('#example1').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                orientation: 'landscape',
                pageSize: 'LEGAL'
            }
        ]
    } );
} );-->



</body>