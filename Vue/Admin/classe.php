<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "classe"; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Classes
            <small>tables</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
   



                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title"> Data class</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Classe</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $var=1?>
                            <?php foreach ($classes as $list): ?>
                                <tr>
                                    
                                    <td><?php echo $var++ ?></td>
                                    <td><?= $this->nettoyer($list['yearSexion']) ?></td>
                                    <td>
                                        <a href="admin/addClass " class="btn btn-success btn-xs"><i class="fa fa-folder"></i> Ajouter</a>
                                        <a href ="admin/editClass/<?= $this->nettoyer($list['id']) ?> " class="btn btn-warning btn-xs"><i class="fa fa-folder"></i> Modifier</a>
                                        <button data-toggle="modal"  data-target="#loginModal" class="btn btn-danger btn-xs">Supprimer</button>
                                        <a href="admin/listStudentClass/<?= $this->nettoyer($list['id']) ?>" class="btn btn-primary btn-xs">Student</button>
                          
                                    </td>
                                </tr>
                            
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
          <div class="modal" id="loginModal"tabindex="-1">
                                    <div class="modal-dialog">
                                         <div class="modal-content">
                                         <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                                    <h4 class="modal-title">Informations</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Etes-vous sûr de vouloir supprimer cette classe?
                                                        </div>
                                                        <div class="modal-footer">
        
                                                         <a href="admin/exeDeleteClass/<?= $this->nettoyer($list['yearSexion']) ?>"><button class="btn btn-succes" type="button"><i class="icon icon-check icon-lg"></i>Oui</button></a>
                                                       <a href="admin/classe"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>
                                                     </div>
                                                  </div>
                                                </div>
                                           </div>
<?= require_once ('Vue/_Commun/navPrinc.php');?>

                           
