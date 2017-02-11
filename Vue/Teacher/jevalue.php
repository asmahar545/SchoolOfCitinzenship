<?= require_once ('Vue/_Commun/headerPrinc.php');?>
<?php $this->titre = "classe"; ?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Evaluation
            <small>items</small>
        </h1>

    </section>

     <!-- Main content -->
    <section class="content">
        

               <div class="col-lg-8">
                <div class="box box-success">
                    <form action="teacher/exeEvaluationStudent"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Ajouter une Grille d'évaluations de ...</h3>
                        </div>
                        <div class="box-body">
                            <br>
                            <?php $var=1?>
                            <?php foreach ($item as $list): ?>
                            <?php $var++ ?>
                            <div class="input-group">
                                  <span class="input-group-addon"><?= $this->nettoyer($list['itemname']) ?>  </span>
                            <?php echo"<input name=".$var." type='checkbox'>"?>
                            </div>
                           
                            <br>
                            <?php endforeach; ?>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">
                                    <button type="submit" class="btn btn-success">Confirmer</button>
                                </div>
                            </div>
                        </div>

                    </form>
<form action="index.php" method="post">
   <input type="checkbox" name="prenom[]" value="adriana" />Adriana<br>
   <input type="checkbox" name="prenom[]" value="alessandra" />Alessandra<br>
   <input type="checkbox" name="prenom[]" value="candice" />Candice<br>
   <input type="checkbox" name="prenom[]" value="lili" />Lili<br>
   <input type="submit" value="Envoyer" />
</form>
 <!--/*Le tableau $_POST['prenom'] contient les valeurs des checkbox cochées
foreach($_POST['prenom'] as $valeur)
{
   echo "La checkbox $valeur a été cochée
   
   <br>";
} */ 
if(!$_POST['prenom']){
   echo "Aucune checkbox n'a été cochée";
}



ou 



echo"<td><input type='checkbox' name="test[]" value='".$data['id']."'></td>";
$checkboxes = isset($_POST['test']) ? $_POST['test'] : array();
foreach($checkboxes as $value) {
    // ici tu récupères les valeurs (ID dans ton cas) des checkboxes... Et tu traite l'information à partir de cet ID. Donc
    echo $value; // te donneras l'ID de tes checkboxes
} 

 -->          </div>
            </div>
     <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Grilles d'évaluation</h3>
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
        </div>
     </div>
</div>
    
    </section>
    <!-- /.content -->
</div>
     
<?= require_once ('Vue/_Commun/navPrincTeacher.php');?>