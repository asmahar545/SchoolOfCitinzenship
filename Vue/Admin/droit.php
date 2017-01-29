
<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "professeur"; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Droit d'accés
            <small>tables</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active">Data tables</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="well">
            Explication du contenu de droit
        </div>
        
           <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">

                            <thead>
                            <th>N°</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Classe</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                                <?php $var=1?>
                            <?php foreach ($teacher as $list): ?>

                                <tr>
                                    <td class=" " ><?php echo $var++ ?></td>
                                    <td class=" " ><?= $this->nettoyer($list['name']) ?></td>
                                    <td class=" " ><?= $this->nettoyer($list['firstname']) ?></td>
                                    <td class=" " ><?= $this->nettoyer($list['yearSexion']) ?></td>
                                    
                                </tr>

                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
             
            <button data-toggle="modal"  data-target="#loginModal" class="btn btn btn-success ">Ajouter un droit </button>
             
            <div class="modal" id="loginModal"tabindex="-1">
            <div class="modal-dialog">
         <div class="modal-content">
            <div class="modal-header">
             <button type="button" class="close" data-dismiss="modal">x</button>
               <h4 class="modal-title">Sélèctionez le professeur ainsi que la classe</h4>
               </div>
               <div class="modal-body">
                 <div class="box box-success">
                    <form action="admin/exeAddDroit"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter un  droit:</h3>
                        </div>
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
                     <div class="input-group">
                        <span class="input-group-addon">Classe</span>
                             <select name="adult" type="text" class="form-control" placeholder="">
                                <?php
                                foreach ($teachers as $list):

                                 echo '<option value="' . $this->nettoyer($list['id_adult']) . '">' . $this->nettoyer($list['name']) .' ' .$this->nettoyer($list['firstname']) .  '</option>';
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
            
             


   
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<?= require_once ('Vue/_Commun/navPrinc.php');?>
</body>
