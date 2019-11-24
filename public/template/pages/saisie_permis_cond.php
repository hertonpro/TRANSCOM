<?php
  //session_start();
  include('connexion.php');
  $alerte;

  $id_mt=htmlspecialchars($_GET['id_mt'])  ;

  $_SESSION['id_mt']=htmlentities ($_GET['id_mt']);

  //echo $_SESSION['id_mt'];

  echo $_SESSION['nom_ut'];

  if(isset($_POST['submit']))
  {
    $date_jour= date('Y/m/d');
    $scan_permis=$_FILES['scan_permis'] ['name'];
    $file_tmp_name=$_FILES['scan_permis'] ['tmp_name'];

    move_uploaded_file($file_tmp_name,"./imgs/$scan_permis");

    $type_permis=$_POST['type_permis'];
    $date_livraison_permis=$_POST['date_livraison_permis'];
    $date_expiration_permis=$_POST['date_expiration_permis'];

    $id_ut_fk=$_POST['id_ut_fk'];
    $nom_ut_fk=$_POST['nom_ut_fk'];
    $id_pro_cond_fk=$_POST['id_pro_cond_fk'];
    $nom_pro_cond_fk=$_POST['nom_pro_cond_fk'];
    $postnom_pro_cond_fk=$_POST['postnom_pro_cond_fk'];
    $prenom_pro_cond_fk=$_POST['prenom_pro_cond_fk'];

    $req1="INSERT INTO permis (type_permis,date_livraison_permis,date_expiration_permis,scan_permis,date_jour,id_ut_fk,nom_ut_fk,id_pro_cond_fk,nom_pro_cond_fk,postnom_pro_cond_fk,prenom_pro_cond_fk)

    VALUES ('$type_permis','$date_livraison_permis','$date_expiration_permis','$scan_permis','$date_jour','$id_ut_fk','$nom_ut_fk','$id_pro_cond_fk','$nom_pro_cond_fk','$postnom_pro_cond_fk','$prenom_pro_cond_fk')";

    mysqli_query($conn,$req1)  or die(mysqli_error()) ;
    //header('location: saisie_proprietaire.php ');
  }

?>



<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Saisie permis</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
              <div class="form-group">
                <label>Type de permis</label>
                <select class="form-control" name="type_permis">
                  <option value="A,B,C,D">A,B,C,D</option>
                  <option value="A,B,C,D,E,F">A,B,C,D,E,F</option>
                </select>
              </div>
              <div class="form-group">Date de livraison
                <input class="form-control" type="date" name="date_livraison_permis">
              </div>
              <div class="form-group">Date d'expiration
                <input class="form-control" type="date" name="date_expiration_permis">
              </div>
              <div class="form-group">Scan permis
                <input class="form-control" type="file" name="scan_permis">
              </div>

                <?php
                  $req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
                  $res2=mysqli_query($conn,$req2) or die(mysqli_error());
                ?>

                <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
                  <input class="text" type="hidden" name="id_ut_fk" value="<?php echo ($aff2['id_ut'])?>">
                  <input class="text" type="hidden" name="nom_ut_fk" value="<?php echo ($aff2['nom_ut'])?>">
                <?php }?>

                <?php
                  //echo $_SESSION['id_cond'];
                  $req2=("SELECT * FROM conducteur WHERE id_cond='".$_SESSION['id_cond']."'  ");
                  $res2=mysqli_query($conn,$req2) or die(mysqli_error());
                ?>

                <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
                  <input class="text" type="hidden" name="id_pro_cond_fk" value="<?php echo ($aff2['id_cond'])?>">
                  <input class="text" type="hidden" name="nom_pro_cond_fk" value="<?php echo ($aff2['prenom_cond'])?>">
                  <input class="text" type="hidden" name="postnom_pro_cond_fk" value="<?php echo ($aff2['postnom_cond'])?>">
                  <input class="text" type="hidden" name="prenom_pro_cond_fk" value="<?php echo ($aff2['nom_cond'])?>">
                <?php }?>

                <?php
                ?>

              <div class="text-right">
                <button type="submit" class="btn btn-primary btn-positio-left" value="" name="submit">Enregistrer</button>
              </div>
            </form>
          </div>
        </div>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Apercy general permis</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <p>Document scané </p>
            <img src="../images/bg-01.jpg" class="img-thumbnail">
            <?php
              $req=("SELECT * FROM permis WHERE id_pro_cond_fk='".$_SESSION['id_cond']."' ORDER BY date_enreg_permis DESC ");
              $res=mysqli_query($conn,$req) or die(mysqli_error());
            ?>
            <?php while ($aff=mysqli_fetch_assoc($res)){?>

          TYPE: <?php echo ($aff['type_permis'])?><br>
          DATE LIVRAISON: <?php echo ($aff['date_livraison_permis'])?><br>
          DATE EXPIRATION: <?php echo ($aff['date_expiration_permis'])?><br>

                <?php $x=abs(floor(strtotime($aff['date_expiration_permis'])/ (60*60*24)));
                //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
                <?php  $date_jour= date('Y/m/d'); ?>
              
                <?php $z=abs(floor(strtotime($aff['date_livraison_permis'])/ (60*60*24)));
                $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
              

            $rest_jours=$x-$y;
                
                echo $x-$z .' Jour(s) de validité'.'<br>'; 
                //echo $z .'<br>'; 
                //echo $rest_jours .'<br>';
                ?>  

              <?php
                if($rest_jours>=0){

                  echo $alerte='<strong>'.'<p class="">'."Le permis de conduire reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
                }

                elseif($rest_jours<0){
                  echo $alerte='<strong>'.'<p class="blue" >'."Le permis a expiré il y a ".$rest_jours.'</p>'.'<strong>';
                }
                ?>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
</div>

<?php
mysqli_close($conn);
?>

