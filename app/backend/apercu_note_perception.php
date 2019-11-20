<?php
session_start();	
include('connexion.php');
?>

<?php
$req=("SELECT * FROM note_perception WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_note DESC LIMIT 2 ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>

              <?php while ($aff=mysqli_fetch_assoc($res)){?>
              
                documents manquants: <br><?php echo ($aff['nom_doc'])?><br>
                Numero Plaque :<?php echo ($aff['num_plaque_mt_fk'])?><br>
                Montant a payer comme amende: <?php echo ($aff['montant'])?><br>
                Date: <?php echo ($aff['date_note'])?><br>
           
				<?php $nom_doc=  ($aff['nom_doc'])?>


<?php
echo $nom_doc;

if(strpos($nom_doc, 'assurance')){

echo '<br>'."ok";
$assurance=180;
}

if(strpos($nom_doc, 'vignette')){
	echo '<br>'."ok";
$vignette=15;
}

if(strpos($nom_doc, 'taxe_voirie')){
	echo '<br>'."ok";
$tv=20;
}

if(strpos($nom_doc, 'controle_technique')){
	echo '<br>'."ok";
$ctt=15;
}

if(strpos($nom_doc, 'permis')){
	echo '<br>'."ok";
$permis=20;
}


echo $assurance .'<br>';
echo $vignette.'<br>';
echo $ctt.'<br>';
echo $tv.'<br>';
echo $permis.'<br>';

echo $total=$assurance+$vignette+$ctt+$tv+$permis;
?>

<hr>
           
<?php }?>

<?php


?>