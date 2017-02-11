<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "classe"; ?>

    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">

  
    
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

 
    <section class="content-header">
      <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <div class="box box-success">
                    <form action="admin/exeAddCat"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une Catégorie</h3>
                        </div>
                        <div class="box-body">
                            <br>
                           
                             <div class="input-group">
                                <span class="input-group-addon">Nom de la Catégorie</span>
                                <input name="name" type="text" class="form-control"  required="required">
                            </div>
                            <br>
                             <div class="input-group">
                                <span class="input-group-addon">Requirement</span>
                                <input name="req" type="text" class="form-control" required="required">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">

                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
          <div class="col-lg-2">

            </div>
      </div>
    </section>
    
  </div>
   
 
  
<?= require_once ('Vue/_Commun/navPrinc.php');?>
     
</body>