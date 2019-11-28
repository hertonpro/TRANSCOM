<?php
//session_start();	
include('connexion.php');
echo $_SESSION['nom_ut'].'<br>';
echo $_SESSION['id_mt'].'<br>';
echo $_SESSION['id_pro'];
?>

<?php
include('menu_pro.php');

?>



<form  method="GET" action="chercher_proprietaire.php">
         <input id="search-input" name="recherche_nom_pro" value="" placeholder="chercher Proprietaire"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>


<h5 class="">IDENTITE PROPRIETAIRE</h5>
              
<?php
$id_pro=$_GET['id_pro'];

$_SESSION['id_pro']=htmlentities ($_GET['id_pro']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM proprietaire WHERE id_pro='".$_SESSION['id_pro']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src="../imgs/<?php echo ($aff['photo_pro']) ?>"/>
</div>
<br><br><hr class="two">

                NOM: <?php echo ($aff['nom_pro']) ?> <br>
                POSTNOM: <?php echo ($aff['postnom_pro'])?><br>
                PRENOM:  <?php echo ($aff['prenom_pro'])?><br>
                Etc...
            

<a href="?p=details_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en details:</strong> </button></a>
                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->



       <h2 class="mb-4">APERCU GENERAL DES VEHICULES DEJA EN POSSESSION</h2>

      <hr class="two">
      <?php
      $id_pro=$_GET['id_pro']  ;

       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_pro_affect=".$_SESSION['id_pro']." ORDER BY date_enreg_affect_pro DESC LIMIT 1");

        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <?php $etat=  ($aff['etat_affect'])?>


 <?php  
if ($etat!="oui") {
 echo "N'est plus proprietaire".'<br>';
}
else {
echo "Vrai proprietaire".'<br>';
}

?>


      Etat : <?php echo ($aff['etat_affect'])?><br>
       Marque: <?php echo ($aff['marque_mt'])?><br>
        Modele : <?php echo ($aff['model_mt'])?><br>
      Main : <?php echo ($aff['main_mt'])?><br>
      Etc...


 <label>Consulter Vehicule:</label>
 <a href="?p=apercu_moyen_de_transport&&id_mt=<?php echo ($aff['id_mt']) ?>"><button class="btn btn-warning btn-sm" ><strong>Consulter Vehicule:</strong> </button></a>

      <hr>
      <?php }?>
      
       <h2 class="mb-4">APERCU GENERAL PERMIS</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM permis WHERE id_pro_cond_fk='".$_SESSION['id_pro']."' ORDER BY date_enreg_permis DESC ");
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
      
<hr>
      <?php }?>
<?php
 //include('footer.php');
 ?>
</body>
</html>