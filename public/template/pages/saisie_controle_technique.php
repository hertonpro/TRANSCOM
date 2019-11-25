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


$reff_controle_technique=$_POST['reff_controle_technique'];
$date_livraison_controle_technique=$_POST['date_livraison_controle_technique'];
$date_expiration_controle_technique=$_POST['date_expiration_controle_technique'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO controle_technique (reff_controle_technique,date_livraison_controle_technique,date_expiration_controle_technique,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$reff_controle_technique','$date_livraison_controle_technique','$date_expiration_controle_technique','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}


?>


  <div class="row">
    <div class="col-lg-12">
      <?php 
        include ('menu_mt.php');
      ?><br>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Saisie controle technique</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
              <div class="form-group">Refference controle technique
                <input class="form-control" type="text" name="reff_controle_technique">
              </div>
              <div class="form-group">Date de livraison
                <input class="form-control" type="date" name="date_livraison_controle_technique">
              </div>
              <div class="form-group">Date d'expiration
                <input class="form-control" type="date" name="date_expiration_controle_technique">
              </div>
              <div class="form-group">Scan controle technique
                <input class="form-control" type="file" name="scan_controle_technique">
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
          <div class="panel-heading">Apercu general vignette</div>
          <!-- /.panel-heading -->
            <div class="panel-body">
              <?php
                $req=("SELECT * FROM controle_technique WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_controle_technique DESC ");
                $res=mysqli_query($conn,$req) or die(mysqli_error());
                ?>

                <?php while ($aff=mysqli_fetch_assoc($res)){?>

                Numero matricule: <?php echo ($aff['reff_controle_technique'])?><br>
                Numero matricule: <?php echo ($aff['date_livraison_controle_technique'])?><br>
                Numero matricule: <?php echo ($aff['date_expiration_controle_technique'])?><br>


                <?php $x=abs(floor(strtotime($aff['date_expiration_controle_technique'])/ (60*60*24)));
                //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
                <?php  $date_jour= date('Y/m/d'); ?>

                <?php $z=abs(floor(strtotime($aff['date_livraison_controle_technique'])/ (60*60*24)));
                $y=abs(floor(strtotime($date_jour)/ (60*60*24)));


                $rest_jours=$x-$y;

                echo $x-$z .' Jour(s) de validité'.'<br>'; 
                //echo $z .'<br>'; 
                //echo $rest_jours .'<br>';
                ?>  

                <?php
                if($rest_jours>=0){

                  echo $alerte='<strong>'.'<p class="">'."Le controle_technique reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
                }

                elseif($rest_jours<0){
                  echo $alerte='<strong>'.'<p class="blue" >'."Le controle_technique a expiré il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
                }
              ?>
              <hr class="two">
              <?php }?>

            </div>
          </div>
        </div>
    </div>  