

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

                <section class="content-header">
                    <h1>
                        Badges
                        <small>Liste des badges des élèves pour la période de "Toussaint" </small>
                    </h1>

                </section>
                <br>

                <div class="row">
                    <div class="col-md-11">
                        <!-- Custom Tabs -->
                        <small>Classe "1C1"</small>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Listes des badges Blanc</a></li>

                                <li><a href="#tab_2" data-toggle="tab">Listes des badges Jaune</a></li>
                                <li><a href="#tab_3" data-toggle="tab">Listes des badges Bleue</a></li>
                                <li><a href="#tab_4" data-toggle="tab">Listes des badges Orange</a></li>
                                <li><a href="#tab_5" data-toggle="tab">Listes des badges Violet</a></li>
                                <li><a href="#tab_6" data-toggle="tab">Listes des badges Vert</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">

                                    <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>




                                            </tr>
                                            </thead>
                                            <tbody
                                            <?php $var = 1 ?>
                                            <?php foreach ($Blanc as $list): ?>
                                                    <tr>

                                                        <td><?php echo $var++ ?></td>
                                                        <td><?= $this->nettoyer($list['name']) ?></td>
                                                        <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_2">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Jaune as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="tab_3">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Bleue as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Orange as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="tab_5">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Violet as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="tab_6">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Vert as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>

                    <!-- /.col -->
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-11">
                        <!-- Custom Tabs -->
                        <small>Classe "1C2"</small>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#2tab_1" data-toggle="tab">Listes des badges Blanc</a></li>
                                <li><a href="#2tab_2" data-toggle="tab">Listes des badges Jaune</a></li>
                                <li><a href="#2tab_3" data-toggle="tab">Listes des badges Bleue</a></li>
                                <li><a href="#2tab_4" data-toggle="tab">Listes des badges Orange</a></li>
                                <li><a href="#2tab_5" data-toggle="tab">Listes des badges Violet</a></li>
                                <li><a href="#2tab_6" data-toggle="tab">Listes des badges Vert</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="2tab_1">

                                    <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>




                                            </tr>
                                            </thead>
                                            <tbody
                                            <?php $var = 1 ?>
                                            <?php foreach ($Blanc2 as $list): ?>
                                                    <tr>

                                                        <td><?php echo $var++ ?></td>
                                                        <td><?= $this->nettoyer($list['name']) ?></td>
                                                        <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="2tab_2">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Jaune2 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="2tab_3">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Bleue2 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="2tab_4">
                                    <div class="tab-pane active" id="2tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Orange2 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="2tab_5">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Violet2 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="2tab_6">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Vert2 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>

                    <!-- /.col -->
                </div>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-md-11">
                        <!-- Custom Tabs -->
                        <small>Classe "1C3"</small>
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#3tab_1" data-toggle="tab">Listes des badges Blanc</a></li>
                                <li><a href="#3tab_2" data-toggle="tab">Listes des badges Jaune</a></li>
                                <li><a href="#3tab_3" data-toggle="tab">Listes des badges Bleue</a></li>
                                <li><a href="#3tab_4" data-toggle="tab">Listes des badges Orange</a></li>
                                <li><a href="#3tab_5" data-toggle="tab">Listes des badges Violet</a></li>
                                <li><a href="#3tab_6" data-toggle="tab">Listes des badges Vert</a></li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="3tab_1">

                                    <div class="box-body table-responsive no-padding">
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                            <th>N°</th>
                                            <th>Nom</th>
                                            <th>Prénom</th>




                                            </tr>
                                            </thead>
                                            <tbody
                                            <?php $var = 1 ?>
                                            <?php foreach ($Blanc3 as $list): ?>
                                                    <tr>

                                                        <td><?php echo $var++ ?></td>
                                                        <td><?= $this->nettoyer($list['name']) ?></td>
                                                        <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                    </tr>

                                                <?php endforeach; ?>

                                            </tbody>


                                        </table>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="3tab_2">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Jaune3 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                                <div class="tab-pane" id="3tab_3">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Bleue3 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="3tab_4">
                                    <div class="tab-pane active" id="2tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Orange3 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="3tab_5">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Violet3 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <div class="tab-pane" id="3tab_6">
                                    <div class="tab-pane active" id="tab_1">

                                        <div class="box-body table-responsive no-padding">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                <th>N°</th>
                                                <th>Nom</th>
                                                <th>Prénom</th>




                                                </tr>
                                                </thead>
                                                <tbody
                                                <?php $var = 1 ?>
                                                <?php foreach ($Vert3 as $list): ?>
                                                        <tr>

                                                            <td><?php echo $var++ ?></td>
                                                            <td><?= $this->nettoyer($list['name']) ?></td>
                                                            <td><?= $this->nettoyer($list['firstName']) ?></td>
                                                        </tr>

                                                    <?php endforeach; ?>

                                                </tbody>


                                            </table>
                                        </div>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
                    </div>

                    <!-- /.col -->
                </div>
            </section>


            <!-- Main content -->

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


