<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "Item"; ?>

 
<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

 
    <section class="content-header">
      <div class="row">
            <div class="col-lg-2">

            </div>
            <div class="col-lg-8">
                <div class="box box-success">
                    <form action="admin/exeAddItem"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter un Item</h3>
                        </div>
                        <div class="box-body">
                            <br>
                           
                            <div class="input-group">
                                <span class="input-group-addon">Nom du Item</span>
                                <input name="name" type="text" class="form-control"  required="required">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Decription</span>
                                <input name="des" type="text" class="form-control" required="required">
                            </div>
                            <br>
                              <div class="input-group">
                                <span class="input-group-addon">Catégorie</span>
                                <select name="iditemcat" type="text" class="form-control" placeholder="">
                                    <?php
                                    foreach ($cat as $list):

                                        echo '<option value="' . $this->nettoyer($list['idItemCat']) . '">' . $this->nettoyer($list['name']) . '</option>';
                                        ?>
                                    <?php endforeach; ?>

                                </select> 
                                
                            </div>
                            <br>
                              <div class="input-group">
                                <span class="input-group-addon">Grille</span>
                                <select name="idgrid" type="text" class="form-control" placeholder="">
                                    <?php
                                    foreach ($grille as $list):

                                        echo '<option value="' . $this->nettoyer($list['idGrid']) . '">' . $this->nettoyer($list['nameGrille']) . '</option>';
                                        ?>
                                    <?php endforeach; ?>

                                </select> 
                                
                            </div>
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
    
 
</div>

<?= require_once ('Vue/_Commun/navPrinc.php');?>
     
</body>
