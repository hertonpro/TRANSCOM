<?php
session_start();	
include('connexion.php');
?>

<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_mt'];

if(isset($_POST['submit']))
{

$nom_doc_manquant=implode(',',$_POST['nom_doc_manquant']);

$constant="vide";
$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO controle_roullage (nom_doc_manquant,constant,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$nom_doc_manquant','','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: redirection_apercu_mt.php' );

}
?>




<?php


   // ===================VIGNETTE======================================

      $req=("SELECT * FROM vignette WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_vignette DESC LIMIT 1");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

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

      	echo $vignette_manquant="";
        echo $alerte='<strong>'.'<p class="">'."La Vignette reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
      	echo $vignette_manquant='Vignette';

         echo $alerte='<strong>'.'<p class="blue" >'."La Vignette a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';

      }
      ?>
   <hr class="two">
   
      <?php }?>


<!-- =====================================TAXE VOIRIE========================= -->

      <hr class="two">
      <?php
      $req=("SELECT * FROM taxe_voirie WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_taxe_voirie DESC LIMIT 1 ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

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
      	echo $taxe_voirie_manquant="";
        echo $alerte='<strong>'.'<p class="">'."La Taxe Voirie reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
      	echo $taxe_voirie_manquant='Taxe voirie';
         echo $alerte='<strong>'.'<p class="blue" >'."La Taxe Voirie reste a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>

   <hr class="two">
      <?php }?>

<!-- =======================CONTROLE TECHNIQUE================================== -->

      <hr class="two">
      <?php
      $req=("SELECT * FROM controle_technique WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_controle_technique DESC LIMIT 1 ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

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
      	echo $controle_technique_manquant="";
        echo $alerte='<strong>'.'<p class="">'."Le controle_technique reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
      	echo $controle_technique_manquant="Controle technique";
         echo $alerte='<strong>'.'<p class="blue" >'."Le controle_technique a expiré il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>
   <hr class="two">
      <?php }?>

<!-- =======================ASSURANCE================================================ -->

      <hr class="two">
      <?php
      $req=("SELECT * FROM assurance WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_assurance DESC LIMIT 1");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

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
      	echo $assurance_manquant="";
        echo $alerte='<strong>'.'<p class="">'."L'assurance reste avec ". $rest_jours.' Jour(s)'.'</p>'.'</strong>';
      }

      elseif($rest_jours<0){
      	echo $assurance_manquant="Assurance";
         echo $alerte='<strong>'.'<p class="blue" >'."L'assurance a expirée il y a ".$rest_jours.' Jour(s)'. '</p>'.'<strong>';
      }
      ?>
   <hr>

      <?php }?>
<br>

<form  method="POST" action="apercu_moyen_de_transport_roullage.php?id_mt=<?php echo $id_mt ?>" enctype="multipart/form-data" accept-charset="utf-8">

<input type="hidde" name="nom_doc_manquant[]"  value="<?php echo $vignette_manquant?>" checked=""><br>
<input type="hidde"  name="nom_doc_manquant[]"  value="<?php echo $taxe_voirie_manquant?>" checked=""> <br>
<input type="hidde" name="nom_doc_manquant[]"  value="<?php echo $controle_technique_manquant?>" checked=""><br>
<input  type="hidde" ame="nom_doc_manquant[]"  value="<?php echo $assurance_manquant?>" checked=""> <br>

<?php
$req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'");
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

<input type="submit" name="submit" value="Continuer">
</form>


