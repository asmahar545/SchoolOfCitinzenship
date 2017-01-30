<?php $this->titre = "Documentation"; ?>
<?= require_once ('Vue/_Commun/headerPrinc.php');?>

<body class="hold-transition skin-blue sidebar-mini">
<div class="content-wrapper">
  
     
        <section class="content-header">
      <h1>
        Mon Profil
      </h1>
     
        </section>  
       <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-success">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="dist/img/teacherHomme.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?= $adult['name']?> <?= $adult['firstname']?></h3>

              <p class="text-muted text-center">Professeur</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Nombre d'étudiant</b> <a class="pull-right">150</a>
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">A propos</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Email</strong>

              <p class="text-muted">
               <?= $adult['email']?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted"><?= $adult['adress']?></p>

              <hr>
              <strong><i class="fa fa-map-marker margin-r-5"></i> Tél</strong>

              <p class="text-muted"><?= $adult['phone']?></p>

              <hr>

              <strong><i class=" fa fa-birthday-cake"></i> Date de naissance</strong>

             <p class="text-muted"><?= $adult['birthday']?></p>

            <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
             <p class="text-muted"><?= $adult['commentaire']?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Mes informations</a></li>
              
             
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                 <form action="Teacher/exeEditTeacher"class="form-horizontal form-label-left" method="post">
                        <div class="box-header with-border">
                            <h3 class="box-title">Modification d'un Professeur</A></h3>
                        </div>
                        <div class="box-body">
                            <div class="input-group">
                                <span class="input-group-addon">Nom</span>
                                <input name="name" type="text" class="form-control" required="true" value="<?= $adult['name']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Prénom</span>
                                <input name="firstname" type="text" class="form-control" required="true"placeholder="" value="<?= $adult['firstname']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Adresse</span>
                                <input name="adress" type="text" class="form-control" required="true" value="<?= $adult['adress']?>">
                            </div>
                
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Date de naissance</span>
                                <input name="birthday" type="cale" class="form-control"id="datepicker" required="true"value="<?= $adult['birthday']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Sexe</span>
                                  <select name="sexe" type="text" class="form-control" placeholder="" required="true" value="<?= $adult['sexe']?>">
                                      <option>homme </option>
                                      <option>femme</option>
                                </select> 
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Télèphone</span>
                                <input name="phone" type="number" class="form-control" placeholder="" required="true" value="<?= $adult['phone']?>">
                            </div>
                            <br>

                            <div class="input-group">
                                <span class="input-group-addon">Email</span>
                                <input name="email" type= "email" class="form-control" placeholder="" required="true" value="<?= $adult['email']?>">
                            </div>
                            <br>
                             <div class="input-group">
                                <span class="input-group-addon">Commentaire</span>
                                <input name="commentaire"  type= "text" class="form-control" placeholder=""required="true" value="<?= $adult['commentaire']?>">
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-addon">Password</span>
                                <input name="password" type="text" class="form-control" placeholder="" required="true" value="<?= $adult['password']?>">
                            </div>
                            <br>
                            
                            <div class="input-group">
                                <span class="input-group-addon">Catégorie</span>
                                <select name="id_adultCategory" type="text" class="form-control" required="true" placeholder="">
                                    <?php
                                    foreach ($cat as $list):

                                        echo '<option value="' . $this->nettoyer($list['id_adultCategory']) . '">' . $this->nettoyer($list['name']) . '</option>';
                                        ?>
                                    <?php endforeach; ?>

                                </select> 
                                
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-10">

                                    <button type="submit" class="btn btn-warning">Modifier</button>
                                </div>
                            </div>

                    </form>
                 
                </div>
                <!-- /.post -->
              </div>
        
              
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
 
<?= require_once ('Vue/_Commun/navPrincTeacher.php');?>
</body>
<br>
<br>


