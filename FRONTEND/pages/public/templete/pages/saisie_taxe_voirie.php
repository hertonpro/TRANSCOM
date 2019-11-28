<?php
//session_start();
include('connexion.php');
$id;
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_mt'];

echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_taxe_voirie=$_FILES['scan_taxe_voirie'] ['name'];
$file_tmp_name=$_FILES['scan_taxe_voirie'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"./imgs/$scan_taxe_voirie");

$reff_taxe_voirie=$_POST['reff_taxe_voirie'];
$date_livraison_taxe_voirie=$_POST['date_livraison_taxe_voirie'];
$date_expiration_taxe_voirie=$_POST['date_expiration_taxe_voirie'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO taxe_voirie (reff_taxe_voirie,date_livraison_taxe_voirie,date_expiration_taxe_voirie,scan_taxe_voirie,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$reff_taxe_voirie','$date_livraison_taxe_voirie','$date_expiration_taxe_voirie','$scan_taxe_voirie','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}


?>

<div class="row">
   <h3>SAISIE TAXE VOIRIE</h3>
    <div class="col-lg-12">
      <?php 
        include ('menu_mt.php');
      ?><br>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Saisie taxe voirie</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
              <div class="form-group">Refference taxe voirie
                <input class="form-control" type="text" name="reff_taxe_voirie">
              </div>
              <div class="form-group">Date de livraison
                <input class="form-control" type="date" name="date_livraison_taxe_voirie">
              </div>
              <div class="form-group">Date d'expiration
                <input class="form-control" type="date" name="date_expiration_taxe_voirie">
              </div>
              <div class="form-group">taxe voirie
                <input class="form-control" type="file" name="scan_taxe_voirie">
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

              //echo $_SESSION['id_mt'];
              $req2=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'  ");
              $res2=mysqli_query($conn,$req2) or die(mysqli_error());
              ?>

              <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
                      
              <input class="text" type="hidden" name="id_mt_fk" value="<?php echo ($aff2['id_mt'])?>">
              <input class="text" type="hidden" name="num_plaque_mt_fk" value="<?php echo ($aff2['num_plaque_mt'])?>"> 
                                
              <?php }?>
              <button type="submit" class="btn btn-primary btn-positio-left" value="" name="submit">Enregistrer</button>
            </form>
          </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Apercu general taxe voirie</div>
          <!-- /.panel-heading -->
            <div class="panel-body">
                  <?php
                  $req=("SELECT * FROM taxe_voirie WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_taxe_voirie DESC ");
                  $res=mysqli_query($conn,$req) or die(mysqli_error());
                  ?>

                  <?php while ($aff=mysqli_fetch_assoc($res)){?>

                Reff taxe voirie: <?php echo ($aff['reff_taxe_voirie'])?><br>
                Date de livraison: <?php echo ($aff['date_livraison_taxe_voirie'])?><br>
                Date d'expiration: <?php echo ($aff['date_expiration_taxe_voirie'])?><br>

                  <?php $x=abs(floor(strtotime($aff['date_expiration_taxe_voirie'])/ (60*60*24)));
                  //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
                  <?php  $date_jour= date('Y/m/d'); ?>
                
                  <?php $z=abs(floor(strtotime($aff['date_livraison_taxe_voirie'])/ (60*60*24)));
                  $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
                

              $rest_jours=$x-$y;
                  
                  echo $x-$z .' Jour(s) de validité'.'<br>'; 
                  //echo $z .'<br>'; 
                  //echo $rest_jours .'<br>';
                  ?>  

                <?php
                  if($rest_jours>=0){

                    echo $alerte='<strong>'.'<p class="">'."La Taxe Voirie reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
                  }

                  elseif($rest_jours<0){
                    echo $alerte='<strong>'.'<p class="blue" >'."La Taxe Voirie reste a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
                  }
                  ?>

              <hr class="two">
                  <?php }?>
            </div>
        </div>
    </div>
</div>