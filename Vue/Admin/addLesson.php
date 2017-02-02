<!-- Input addon -->
<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "Professeur"; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

    <section class="content-header">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
                <div class="box box-success">
                    <form action="admin/exeAddLesson"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter un Professeur</A></h3>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon">Cours</span>
                                <input name="cours" type="text"  placeholder="text" class="form-control">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Nombre d'heures</span>
                                <input name="nombre" type="number"  placeholder="number" class="form-control" placeholder=" ">
                            </div>
                            <br>
                        
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">

                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>

                    </form>

                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<?= require_once ('Vue/_Commun/navPrinc.php');?>

