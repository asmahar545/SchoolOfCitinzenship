<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "classe"; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Grilles
            <small>tables</small>
        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-10">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Grilles d'évaluation</h3>

              
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
               
                    <thead>
                            <tr>
                                <th>N°</th>
                                <th>Item</th>
                                <th>Prénom</th>
                                <th>Description</th>
                            </tr>
                     </thead>
                            <tbody>
                            <?php $var=1?>
                            <?php foreach ($grille as $list): ?>
                                <tr>
                                    
                                    <td><?php echo $var++ ?></td>
                                    <td><?= $this->nettoyer($list['itemname']) ?></td>
                                    <?php if ($var %2 ==1) :?>
                                    <td> <span class="label label-success"><?= $this->nettoyer($list['nameCat']) ?></span></td>
                                    <?php else :?>
                                    <td> <span class="label label-warning"><?= $this->nettoyer($list['nameCat']) ?></span></td>
                                    <?php endif; ?>
                                    <td> <span class="label label-danger"><?= $this->nettoyer($list['des']) ?></span></td>
                                </tr>
                            
                            <?php endforeach; ?>
                            </tbody>
                
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
            <div class="col-xs-2">
                 <table class="table table-bordered">
                <tr>
                  <th>Ajout d'un(e)</th>
                  
                </tr>
                <!-- Default -->
                <tr>
                  <td>
                    <div class="btn-group-vertical">
                        <a href= "admin/addGrid"  class="btn btn-primary">Grille</a>
                      <a href= "admin/addItem" type="button" class="btn btn-warning">Item
                      </a>
                      <a href= "admin/addCat" type="button" class="btn btn-success">Catégorie d'Item</a>
                    </div>
                  </td>
                </tr>
                 </table>
                
                
            </div>
        </div><!-- /.box -->
        <div class="row">
            <div class="col-xs-9">
                
            </div>
            <div class="col-xs-3">
                <a href= "admin/addGrid"><button  type="submit" class="btn btn-warning">J'ajoute une nouvelle Grille</button></a>   
            </div>
        </div>
        
    </section>
    <!-- /.content -->
</div>
     
<?= require_once ('Vue/_Commun/navPrinc.php');?>