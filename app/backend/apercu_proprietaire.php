<?php
session_start();	
include('connexion.php');

?>

<?php
include('menu.php');

?>
<form  method="GET" action="chercher_proprietaire.php">
         <input id="search-input" name="recherch_nom_pro" value="" placeholder="chercher Proprietaire"  type="text" >
         
         <button type="submit"  name="submit">Go</button>
         </span> 
    </form>


<h5 class="">IDENTITE MOYEN DE TRANSPORT</h5>
              
<?php
$id_pro=$_GET['id_pro'];

$_SESSION['id_pro']=htmlentities ($_GET['id_pro']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM proprietaire WHERE id_pro='".$_SESSION['id_pro']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src=" imgs/<?php echo ($aff['photo_pro']) ?>"/>
</div>
<br><br><hr class="two">

                NOM: <?php echo ($aff['nom_pro']) ?> <br>
                POSTNOM: <?php echo ($aff['postnom_pro'])?><br>
                PRENOM:  <?php echo ($aff['prenom_pro'])?><br>
                Etc...
            

                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->



       <h2 class="mb-4">APERCU GENERAL DES VEHICULES DEJA EN POSSESSION</h2>

      <hr class="two">
      <?php
      $id_pro=$_GET['id_pro']  ;

       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_pro_affect=".$_SESSION['id_pro']." ORDER BY date_enreg_affect_pro DESC ");

        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <?php $etat=  ($aff['etat_affect'])?>


 <?php  
if ($etat!="oui") {
 echo "pas encore vendeu".'<br>';
}
else {
echo "deja vendu".'<br>';
}

?>


      Etat : <?php echo ($aff['etat_affect'])?><br>
       Marque: <?php echo ($aff['marque_mt'])?><br>
        Modele : <?php echo ($aff['model_mt'])?><br>
      Main : <?php echo ($aff['main_mt'])?><br>
      Etc...

      <hr class="two">
      <?php }?>
      
<?php
 //include('footer.php');
 ?>
</body>
</html>