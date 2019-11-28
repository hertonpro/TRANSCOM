<?php
ob_start();
//session_start();
require('connexion.php');
?>

<?php
// $date_enreg_affect_pro = new DateTime();
// echo $date_enreg_affect_pro->format('Y-m-d H:i:s');
?>
<?php
ob_start();

$id_pro=htmlspecialchars($_GET['id_pro']);

$_SESSION['id_pro']=htmlentities ($_GET['id_pro']);
//echo $_SESSION['id_pro'];
echo $_SESSION['nom_ut'];
//echo $_SESSION['id_mt'];

if(isset($_POST['submit']))
{

//$date_enreg_affect_pro=$_POST['date_enreg_affect_pro'];
$id_pro_affect=$_POST['id_pro_affect'];
$nom_pro_affect=$_POST['nom_pro_affect'];
$id_ut_affect=$_POST['id_ut_affect'];
$nom_ut_affect=$_POST['nom_ut_affect'];
$id_mt_affect=$_POST['id_mt_affect'];
$nom_mt_affect=$_POST['nom_mt_affect'];
$etat_affect=$_POST['etat_affect'];

$req1="INSERT INTO affectation_pro (id_pro_affect,nom_pro_affect,id_ut_affect,nom_ut_affect,id_mt_affect,nom_mt_affect,etat_affect)

VALUES ('$id_pro_affect','$nom_pro_affect','$id_ut_affect','$nom_ut_affect','$id_mt_affect','$nom_mt_affect','$etat_affect')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_transport_terrestre.php ');
}
ob_end_flush();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<a href="?p=saisie_transport_terrestre"><button class="btn btn-outline btn-primary">SAISIE MOYEN DE TRANSPORT</button></a><br>
</head>
<body>
  <h3>AFFECTATION PROPRIETAIRE</h3>
<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>
Le vehicule des specificités ci dessous:<br><br>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
NUMERO PLAQUE: <?php echo ($aff2['num_plaque_mt'])?><br>
MARQUE: <?php echo ($aff2['marque_mt'])?><br>  
MODELE: <?php echo ($aff2['model_mt'])?><br> 
NUMERO DE PLAQUE: <?php echo ($aff2['num_plaque_mt'])?><br>
TYPE :<?php echo ($aff2['type_mt'])?><br>
ANNEE DE FABRICATION: <?php echo ($aff2['annee_fabrication_mt'])?><br>
NUMERO CHASSIS: <?php echo ($aff2['num_chassis_mt'])?><br>
NUMERO MOTEUR: <?php echo ($aff2['num_moteur_mt'])?><br>
MAIN: <?php echo ($aff2['main_mt'])?><br>
COULEUR: <?php echo ($aff2['couleur_mt'])?><br>
                  
<?php }?>
<br><br>
Sera affecter au proprietaire:<br><br>

<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM proprietaire WHERE id_pro='".$_SESSION['id_pro']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
NOM: <?php echo ($aff2['nom_pro'])?><br> 
POSTNOM: <?php echo ($aff2['postnom_pro'])?><br>
PRENOM:<?php echo ($aff2['prenom_pro'])?><br>
                  
<?php }?>

</body>
</html>


<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
<?php
$req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_ut_affect" value="<?php echo ($aff2['id_ut'])?>"><br>
<input class="text" type="hidden" name="nom_ut_affect" value="<?php echo ($aff2['nom_ut'])?>"><br>
                  
<?php }?>


<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_mt_affect" value="<?php echo ($aff2['id_mt'])?>"><br>
<input class="text" type="hidden" name="nom_mt_affect" value="<?php echo ($aff2['model_mt'])?>"><br> 

                  
<?php }?>


<?php

//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM proprietaire WHERE id_pro='".$_SESSION['id_pro']."'  ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidden" name="id_pro_affect" value="<?php echo ($aff2['id_pro'])?>"><br>
<input class="text" type="hidden" name="nom_pro_affect" value="<?php echo ($aff2['nom_pro'])?>"><br> 
Affecter à une autre personne?<br>
<select name="etat_affect" required="oui">
	<option></option>
	<option class="non" value="non">Non</option>
	<option value="oui">Oui</option>
</select>
                  
<?php }?>
<input type="submit" name="submit" value="Affecter">
</form>

<!-- ============================Apercu Proprietaire============================= -->


<?php
       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ORDER BY date_enreg_affect_pro DESC");
        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

<?php while ($aff=mysqli_fetch_assoc($res)){?>

            <br>
            <div class="panel-heading"><h4><strong>Proprietaire</strong></h4></div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <p> <strong>Nom: </strong><?php echo ($aff['nom_pro'])?></p>
                <p> <strong>Postnom : </strong><?php echo ($aff['postnom_pro'])?></p>
                <p> <strong>Prenom: </strong><?php echo ($aff['prenom_pro'])?></p>
            
            </div>
      <?php }?>      

