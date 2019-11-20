<?php
session_start();
include('connexion.php');
$id;


echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$nom_doc=implode('<br>',$_POST['nom_doc']) ;
$montant=$_POST['montant'];
$date_note=$_POST['date_note'];
$etat_note=$_POST['etat_note'];
$id_controle_fk=$_POST['id_controle_fk'];
$nom_doc_manquant_fk=$_POST['nom_doc_manquant_fk'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO note_perception (nom_doc,montant,date_note,etat_note,id_controle_fk,nom_doc_manquant_fk,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$nom_doc','$montant','$date_note','$etat_note','$id_controle_fk','$nom_doc_manquant_fk','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');

}

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>

    <?php 
  include ('menu_roullage.php');
  ?><br>
</head>
<body>
 <a href="deconnexion.php">Deconnexion</a><br>

      <hr class="two">
      <?php
      $req=("SELECT * FROM vignette WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_vignette DESC LIMIT 1");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <!-- Refference : <?php echo ($aff['reff_vignette'])?><br>
    Date livraison: <?php echo ($aff['date_livraison_vignette'])?><br>
    Date d'expiration: <?php echo ($aff['date_expiration_vignette'])?><br> -->

      <?php $x=abs(floor(strtotime($aff['date_expiration_vignette'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_vignette'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      //echo $x-$z .' Jour(s) de validité'.'<br>'; 
      //echo $z .'<br>'; 
      //echo $rest_jours .'<br>';
      ?>  

     <?php
      if($rest_jours>=0){

        echo $alerte='<strong>'.'<p class="">'."La Vignette reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
         echo $alerte='<strong>'.'<p class="blue" >'."La Vignette a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>
   <hr class="two">
      <?php }?>

      <hr class="two">
      <?php
      $req=("SELECT * FROM taxe_voirie WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_taxe_voirie DESC LIMIT 1 ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

   <!--  Numero matricule: <?php echo ($aff['reff_taxe_voirie'])?><br>
    Numero matricule: <?php echo ($aff['date_livraison_taxe_voirie'])?><br>
    Numero matricule: <?php echo ($aff['date_expiration_taxe_voirie'])?><br> -->

      <?php $x=abs(floor(strtotime($aff['date_expiration_taxe_voirie'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_taxe_voirie'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      //echo $x-$z .' Jour(s) de validité'.'<br>'; 
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

      <hr class="two">
      <?php
      $req=("SELECT * FROM controle_technique WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_controle_technique DESC LIMIT 1 ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <!-- Numero matricule: <?php echo ($aff['reff_controle_technique'])?><br>
    Numero matricule: <?php echo ($aff['date_livraison_controle_technique'])?><br>
    Numero matricule: <?php echo ($aff['date_expiration_controle_technique'])?><br> -->


      <?php $x=abs(floor(strtotime($aff['date_expiration_controle_technique'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_controle_technique'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      //echo $x-$z .' Jour(s) de validité'.'<br>'; 
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

      <hr class="two">
      <?php
      $req=("SELECT * FROM assurance WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_assurance DESC LIMIT 1");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

   <!--  REFFERENCE ASSURANCE: <?php echo ($aff['reff_assurance'])?><br>
    DATE DE LIVRAISON: <?php echo ($aff['date_livraison_assurance'])?><br>
    DATE D'EXPIRATION: <?php echo ($aff['date_expiration_assurance'])?><br> -->

      <?php $x=abs(floor(strtotime($aff['date_expiration_assurance'])/ (60*60*24)));
      //echo " Nbre de Jrs jusqu'a l'exp: ".$z."</br>";  ?>
      <?php  $date_jour= date('Y/m/d'); ?>
     
      <?php $z=abs(floor(strtotime($aff['date_livraison_assurance'])/ (60*60*24)));
      $y=abs(floor(strtotime($date_jour)/ (60*60*24)));
     

   $rest_jours=$x-$y;
      
      //echo $x-$z .' Jour(s) de validité'.'<br>'; 
      //echo $z .'<br>'; 
      //echo $rest_jours .'<br>';
      ?>  

     <?php
      if($rest_jours>=0){

        echo $alerte='<strong>'.'<p class="">'."L'assurance reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
         echo $alerte='<strong>'.'<p class="blue" >'."L'assurance a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>

<hr class="two">
      <?php }?>

<form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">

   <input type="hidden" type="checkbox" name="nom_doc[]"  value="" checked="" >
   <input type="checkbox" name="nom_doc[]"  value="taxe_voirie" > TAXE VOIRIES<br>
   <input type="checkbox" name="nom_doc[]"  value="vignette"> VIGNETTE<br>
   <input type="checkbox" name="nom_doc[]"  value="assurance"> ASSURANCE<br>
   <input type="checkbox" name="nom_doc[]"  value="controle_technique"> CONTROLE TECHNIQUE<br>
   <input type="checkbox" name="nom_doc[]"  value="permis"> PERMIS DE CONDUIRE<br>
   <input type="text" name="montant" > montant<br>
   <input type="date" name="date_note"  > Date<br>
   <input type="hidden" name="etat_note" value="non_reglé" > <br>

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

<?php
//echo $_SESSION['id_mt'];
$req2=("SELECT * FROM controle_roullage WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_controle_roullage DESC LIMIT 1 ");
$res2=mysqli_query($conn,$req2) or die(mysqli_error());
?>

 <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
        
<input class="text" type="hidde" name="id_controle_fk" value="<?php echo ($aff2['id_controle'])?>"><br>
<input class="text" type="hidde" name="nom_doc_manquant_fk" value="<?php echo ($aff2['nom_doc_manquant'])?>">                  
<?php }?>

  <input type="submit" name="submit" value="Enregistrer">
</form>

APERCU AMENDES <br>

<?php
$req=("SELECT * FROM note_perception WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_note DESC LIMIT 2 ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>

              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
                documents manquants: <br><?php echo ($aff['nom_doc'])?><br>
                Numero Plaque :<?php echo ($aff['num_plaque_mt_fk'])?><br>
                Montant a payer comme amende: <?php echo ($aff['montant'])?><br>
                Date: <?php echo ($aff['date_note'])?><br>
           
<?php $etat_note=  ($aff['etat_note'])?>


 <?php  
if ($etat_note!="non_reglé") {
 echo "Deja reglé".'<br>';
}
else {
echo "Pas encore reglé".'<br>';
}

?>

<a href="apercu_note_perception.php?id_note=<?php echo ($aff['id_note']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir et Imprimer</strong> </button></a>
<hr>
<?php }?>

</body>
</html>




