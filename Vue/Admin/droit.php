
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
        <?php require 'Vue/_Commun/navPrinc.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Autorisations
                    <small>Consultez un droit d'un professeur.</small>
                </h1>

            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title"> </h3>


                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table id="example1" class="table table-bordered table-striped">

                                    <thead>
                                    <th>N°</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Classe</th>
                                    <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <?php $var = 1 ?>
                                        <?php foreach ($teacher as $list): ?>

                                            <tr>
                                                <td class=" " ><?php echo $var++ ?></td>
                                                <td class=" " ><?= $this->nettoyer($list['name']) ?></td>
                                                <td class=" " ><?= $this->nettoyer($list['firstname']) ?></td>
                                                <td class=" " ><?= $this->nettoyer($list['yearSexion']) ?></td>
                                                <td><button data-toggle="modal" data-target="#loginModal1" class="btn btn-success btn-xs"><i class="fa fa-plus "></i></button>
                                                    <button data-toggle="modal" data-target="#loginModal2" class="btn btn-danger btn-xs"><i class="fa fa-close "></i></button></td>
                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>



                            <div class="modal" id="loginModal1"tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                            <h4 class="modal-title">Ajouter une autorisation:</h4>
                                        </div>

                                        <br>
                                        <div class="modal-body">
                                            <div class="box box-success">
                                                <form action="admin/exeAddDroit"class="form-horizontal form-label-left" method="post">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Sélectionner le professeur ainsi que la classe</h3>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Classe</span>
                                                        <select name="classe" type="text" class="form-control" placeholder="">
                                                            <?php
                                                            foreach ($clas as $list):

                                                                echo '<option value="' . $this->nettoyer($list['id']) . '">' . $this->nettoyer($list['yearSexion']) . '</option>';
                                                                ?>
                                                            <?php endforeach; ?>

                                                        </select>

                                                    </div>
                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">Professeur</span>
                                                        <select name="adult" type="text" class="form-control" placeholder="">
                                                            <?php
                                                            foreach ($teachers as $list):

                                                                echo '<option value="' . $this->nettoyer($list['id_adult']) . '">' . $this->nettoyer($list['name']) . ' ' . $this->nettoyer($list['firstname']) . '</option>';
                                                                ?>
                                                            <?php endforeach; ?>

                                                        </select>

                                                    </div>
                                                    <br>

                                                    <br>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-10">

                                                            <button type="submit" class="btn btn-succes">Ajouter</button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            <a href="admin/droit"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- MODAL SUPPRESSION--->
                            <div class="modal" id="loginModal2"tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">x</button>
                                            <h4 class="modal-title">Supression d'une autorisation:</h4><br><br>
                                            <p>Attention, en supprimant une autorisation d'un professeur ayant <b>conclu</b> l'évaluation d'une classe,
                                                celle-ci sera, par conséquent, effacée</p>
                                        </div>

                                        <br>
                                        <div class="modal-body">
                                            <div class="box box-danger">
                                                <form action="admin/exeDeleteAutorisation/"class="form-horizontal form-label-left" method="post">
                                                    <div class="box-header with-border">
                                                        <h3 class="box-title">Sélectionner le professeur ainsi que la classe</h3>
                                                    </div>
                                                    <br>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">Classe</span>
                                                        <select name="classe" type="text" class="form-control" placeholder="">
                                                            <?php
                                                            foreach ($classe2 as $list):

                                                                echo '<option value="' . $this->nettoyer($list['id']) . '">' . $this->nettoyer($list['yearSexion']) . '</option>';
                                                                ?>
                                                            <?php endforeach; ?>

                                                        </select>

                                                    </div>
                                                    <br>

                                                    <div class="input-group">
                                                        <span class="input-group-addon">Professeur</span>
                                                        <select name="adult" type="text" class="form-control" placeholder="">
                                                            <?php
                                                            foreach ($teacher2 as $list):

                                                                echo '<option value="' . $this->nettoyer($list['id_adult']) . '">' . $this->nettoyer($list['name']) . ' ' . $this->nettoyer($list['firstname']) . '</option>';
                                                                ?>
                                                            <?php endforeach; ?>

                                                        </select>

                                                    </div>
                                                    <br>

                                                    <br>
                                                    <div class="form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-9">

                                                            <button type="submit" class="btn btn-danger">Supprimer</button>
                                                        </div>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                        <div class="modal-footer">

                                            <a href="admin/droit"><button class="btn btn-primary" type="button"><i class="icon icon-check icon-lg"></i> Retour</button></a>

                                        </div>
                                    </div>
                                </div>
                            </div>

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
        $(function() {
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
</body>