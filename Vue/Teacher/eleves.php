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
        <?php require 'Vue/_Commun/navPrincTeacher.php'; ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    La classe
                    <small><?= $nomClasse['yearSexion'] ?></small>


                </h1>


            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <?php if ($nbrE['nbr'] == 0): ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-warning"></i>
                                        Vous n'avez pas encore évaluer cette classe.
                                    </div>

                                <?php elseif ($nbrE == $nbrT): ?>
                                    <div class="alert alert-success alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-check"></i>
                                        Vous avez terminé l'évaluation de cette classe.
                                    </div>

                                <?php else: ?>
                                    <div class="alert alert-warning alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                        <i class="icon fa fa-warning"></i>
                                        Votre évaluation est en cours. Il vous reste <?= $nbrT['nbr'] - ($nbrE['nbr']) ?> étudiant(s) à évaluer.
                                    </div>
                                <?php endif; ?>





                            </div>
                            <!-- /.box-header -->
                            <?php
                            ?>
                            <div class="box-body table-responsive no-padding">
                                <table  id="example1" class="table table-bordered table-striped">

                                    <thead>
                                        <tr>
                                            <th><div><span>N°</span></div></th>
                                            <th><div><span>Nom</span></div></th>
                                            <th><div><span>Prénom</span></div></th>
                                            <th><div><span>Action</span></div></th>
                                            <th><div><span>Fait</span></div></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php $tableau = array(); ?>
                                        <?php foreach ($studentF as $liste): ?>

                                            <?php
                                            //initialisation d'un tableau d'élève évalué par le professeur TYPE ( ARRAY)
                                            $tableau[] = $this->nettoyer($liste['idE']);
                                            ?>

                                        <?php endforeach; ?>
                                        <?php
                                        $var = 1;
                                        ?>
                                        <?php foreach ($student as $list): ?>


                                            <tr>

                                                <td><?php echo $var++ ?></td>
                                                <td><?= $this->nettoyer($list['name']) ?></td>
                                                <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                <td><a href="teacher/jevalue/<?= $this->nettoyer($list['id_student']) ?>" class="btn btn-primary btn-xs">J'évalue</a></td>

                                                <td>

                                                    <div>
                                                        <span>
                                                            <?PHP
                                                            // Comparaison d'un array avec une variable si elle est dedans
                                                            if (in_array($this->nettoyer($list['id_student']), $tableau)) {
                                                                ?><span> <i class="fa fa-check" aria-hidden="true" style="font-size:15px;color:green;"></i></span>
                                                            <?PHP } else {
                                                                ?>   <span> <i class="fa fa-close" aria-hidden="true" style="font-size:15px;color:red;"></i></span><?PHP
                                                                }
                                                                ?>

                                                        </span>

                                                    </div>

                                                </td>


                                            </tr>

                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--
                                                        <div class="box-body table-responsive no-padding">
                                                            <table  id="example1" class="table table-bordered table-striped">

                                                                <thead>
                                                                    <tr>
                                                                        <th><div><span>N°</span></div></th>
                                                                        <th><div><span>Nom</span></div></th>
                                                                        <th><div><span>Prénom</span></div></th>

                                                                        <th><div><span>Fait</span></div></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    //foreach ($tableau as $valeur) {
                                                                     //   echo $valeur, '<br/>';

                                                                    ?>

                                                                </tbody>
                                                            </table>
                                                        </div>-->
                            <!-- /.box-body -->
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
        th.rotate {
            /* Something you can count on */
            height: 20px;
            white-space: nowrap;
        }

        th.rotate > div {
            transform:
                /* Magic Numbers */
                translate(30px, 0px)
                /* 45 is really 360 - 45 */
                rotate(315deg);
            width: 30px;
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
    <!-- page script -->
    <script>
        $(function() {
            $("#example1").DataTable({
                "pageLength": 25
            });
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