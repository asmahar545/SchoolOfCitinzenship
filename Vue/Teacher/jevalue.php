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
        <div class="col-xs-12">
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
                                <th>#</th>
                            </tr>
                     </thead>
                            <tbody>
                            <?php $var=1?>
                            <?php foreach ($item as $list): ?>
                                <tr>
                                    
                                    <td><?php echo $var++ ?></td>
                                    <td><?= $this->nettoyer($list['itemname']) ?></td>
                                    <?php if ($var %2 ==1) :?>
                                    <td> <span class="label label-success"><?= $this->nettoyer($list['nameCat']) ?></span></td>
                                    <?php else :?>
                                    <td> <span class="label label-warning"><?= $this->nettoyer($list['nameCat']) ?></span></td>
                                    <?php endif; ?>
                                    <td><input id="idchek1" type='checkbox'checked></td>
                                </tr>
                            
                            <?php endforeach; ?>
                            </tbody>
                
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
            <div class="col-xs-9">
               <div class="col-md-6 col-sm-6 col-xs-10 col-md-offset-12">

                <button type="submit" class="btn btn-warning">J'ai términé mon évaluation</button>
                  </div> 
        </div><!-- /.box -->
        
    </section>
    <!-- /.content -->
</div>
     
<?= require_once ('Vue/_Commun/navPrincTeacher.php');?>