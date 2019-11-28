<?php
//session_start();
include('connexion.php');
$id;



$id_mt=htmlspecialchars($_GET['id_mt']);

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_mt'];

echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{


$type_alerte=implode(',',$_POST['type_alerte']);
$autre_alerte=$_POST['autre_alerte'];
$date_alerte=$_POST['date_alerte'];
$lieu_alerte=$_POST['lieu_alerte'];
$description_alerte=$_POST['description_alerte'];
$casier_mt=$_POST['casier_mt'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO alerte (type_alerte,autre_alerte,date_alerte,lieu_alerte,description_alerte,casier_mt,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$type_alerte','$autre_alerte','$date_alerte','$lieu_alerte','$description_alerte','$casier_mt','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}


?>

<div class="row">
  <h3>SAISIE ALERTE</h3>
     <?php 
        include ('menu_mt.php');
      ?><br>
    <div class="col-lg-12">
      
      <br>
    </div>
    <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">Saisie alertes</div>
          <!-- /.panel-heading -->
          <div class="panel-body">
            <div class="form-group">
              <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
                <label>Type alerte</label><br>

<input type="hidden" type="checkbox" name="type_alerte[]"  value="" checked=""> Vehicule ou moto volé<br>             
<input type="checkbox" name="type_alerte[]"  value="vehicule ou moto volé"> Vehicule ou moto volé<br>
<input type="checkbox" name="type_alerte[]"  value="accident"> Accidenté<br>
<input type="checkbox" name="type_alerte[]"  value=" fouille la PCR"> Fouille la PCR<br>
<input type="checkbox" name="type_alerte[]"  value=" autres degats routier"> Autres degats routier<br><br>

                  <div class="form-group">Autre alerte
                    <input class="form-control" type="text" name="autre_alerte">
                  </div>
                  <div class="form-group">Date d'alerte
                    <input class="form-control" type="date" name="date_alerte">
                  </div>
                  <div class="form-group">Lieu d'alerte
                    <input class="form-control" type="text" name="lieu_alerte">
                  </div>
                  <div class="form-group">Obeservation
                    <textarea class="form-control" name="description_alerte" type="text" rows="5" ></textarea>
                  </div>
                  <div class="form-group">
                    <input class="hidden" class="form-control" value="non reglé" type="text" name="casier_mt">
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
      </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">Apercu general des alertes</div>
          <!-- /.panel-heading -->
            <div class="panel-body">
                  <?php
                  $req=("SELECT * FROM alerte WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_alerte DESC ");

                  //$req=("SELECT * FROM alerte WHERE casier_mt=1 AND type_Alerte='vol' AND id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_alerte DESC ");
                  $res=mysqli_query($conn,$req) or die(mysqli_error());
                  ?>

                  <?php while ($aff=mysqli_fetch_assoc($res)){?>

                Type d'alerte:<br><?php echo  ($aff['type_alerte'])?><br><br>
                Date d'alerte: <?php echo ($aff['date_alerte'])?><br>
                Lieu d'alerte: <?php echo ($aff['lieu_alerte'])?><br>
                Observation: <?php echo ($aff['description_alerte'])?><br>
                <?php $reg=  ($aff['casier_mt'])?>


                <?php  
                if ($reg!="non reglé") {
                echo "L'affaire est déjà reglée reglé en vert".'<br>';
                }
                else{
                  echo "L'affaire est non reglé en rouge".'<br>';
                }

                ?>


               <a href="modifier_alerte.php?id_alerte=<?php echo ($aff['id_alerte']) ?>"><button ><strong>Modifier Alerte:</strong> </button></a><br>
                  <hr>
                <?php }?>
            </div>
          </div>
        </div>
    </div>
</div>