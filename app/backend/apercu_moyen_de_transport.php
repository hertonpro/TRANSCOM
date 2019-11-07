<?php
session_start();	
include('connexion.php');

?>

<?php
include('menu.php');

?>


<h5 class="">IDENTITE MOYEN DE TRANSPORT</h5>
              
<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_fonct'];

$req=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."' ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
<div class="">
  <img height="250" width="250" src=" imgs/<?php echo ($aff['image_mt']) ?>"/>
</div>
<br><br><hr class="two">

               NUMERO DE PLAQUE: <?php echo ($aff['num_plaque_mt'])?><br> 

                MODELE: <?php echo ($aff['model_mt']) ?> <br>
                TYPE: <?php echo ($aff['type_mt'])?><br>
                MARQUE:  <?php echo ($aff['marque_mt'])?><br>
                ANNEE DE FABRICATION:  <?php echo ($aff['annee_fabrication_mt'])?><br>

               NUMERO DE CHASSIS:  <?php echo ($aff['num_chassis_mt'])?><br>

               NUMERO MOTEUR:  <?php echo ($aff['num_moteur_mt'])?><br>

               POSITION DE VOLANT (MAIN):  <?php echo ($aff['main_mt'])?><br>

               COULEUR:  <?php echo ($aff['couleur_mt'])?><br>
            

                <hr class="two">

            <?php }?>


<!-- --------------------------------------------------------------------------- -->



       <h2 class="mb-4">APERCU GENERAL NOM PROPRIETAIRE</h2>

      <hr class="two">
      <?php
       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ");
        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>
       Non proprietaire: <?php echo ($aff['nom_pro'])?><br>
       Postnom proprietaire: <?php echo ($aff['postnom_pro'])?><br>
       Prenom: <?php echo ($aff['prenom_pro'])?><br>

      <hr class="two">
      <?php }?>
      
<h2 class="mb-4">APERCU GENERAL NOM CHAUFFEUR</h2>


<?php
 //include('footer.php');
 ?>
</body>
</html>