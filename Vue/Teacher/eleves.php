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
                        <table  id="example1" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th>N°</th>
                                <th>Classe</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $var=1?>
                            <?php foreach ($student as $list): ?>
                                <tr>
                                    
                                    <td><?php echo $var++ ?></td>
                                    <td><?= $this->nettoyer($list['name']) ?></td>
                                    <td><?= $this->nettoyer($list['firstName']) ?></td>
                                    
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
     
<?= require_once ('Vue/_Commun/navPrincTeacher.php');?>