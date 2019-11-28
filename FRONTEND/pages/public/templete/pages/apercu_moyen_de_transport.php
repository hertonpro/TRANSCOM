<?php
ob_start();
//session_start();    
include('connexion.php');
echo $_SESSION['nom_ut'].'<br>';
echo $_SESSION['id_mt'];
?>


<!-- =================execution de saisie proprietaire -->

<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;
$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);

if(isset($_POST['submit']))
{

$scan_identite_pro=$_FILES['scan_identite_pro'] ['name'];
$file_tmp_name=$_FILES['scan_identite_pro'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"../imgs/$scan_identite_pro");

$photo_pro=$_FILES['photo_pro'] ['name'];
$file_tmp_name=$_FILES['photo_pro'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"../imgs/$photo_pro");

$nom_pro=$_POST['nom_pro'];
$postnom_pro=$_POST['postnom_pro'];
$prenom_pro=$_POST['prenom_pro'];
$sexe_pro=$_POST['sexe_pro'];
$date_naiss_pro=$_POST['date_naiss_pro'];
$lieu_naiss_pro=$_POST['lieu_naiss_pro'];
$province_pro=$_POST['province_pro'];
$ville_pro=$_POST['ville_pro'];
$commune_pro=$_POST['commune_pro'];
$quartier_pro=$_POST['quartier_pro'];
$avennue_pro=$_POST['avennue_pro'];
$num_domicile_pro=$_POST['num_domicile_pro'];
$tel1_pro=$_POST['tel1_pro'];
$tel2_pro=$_POST['tel2_pro'];
$email_pro=$_POST['email_pro'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO proprietaire (nom_pro,postnom_pro,prenom_pro,sexe_pro,date_naiss_pro,lieu_naiss_pro,province_pro,ville_pro,commune_pro,quartier_pro,avennue_pro,num_domicile_pro,tel1_pro,tel2_pro,email_pro,scan_identite_pro,photo_pro,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$nom_pro','$postnom_pro','$prenom_pro','$sexe_pro','$date_naiss_pro','$lieu_naiss_pro','$province_pro','$ville_pro','$commune_pro','$quartier_pro','$avennue_pro','$num_domicile_pro','$tel1_pro','$tel2_pro','$email_pro','$scan_identite_pro','$photo_pro','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;

//header('location: saisie_proprietaire.php ');
}
ob_end_flush();
?>
<!-- ============================Apercu moyen de transport================================ -->
<?php


$req=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>            
<?php while ($aff=mysqli_fetch_assoc($res)){?>

<div class="row">
    <h3>APERCU MOYEN DE TRANSPORT</h3>
    <div class="col-lg-12">
        <?php 
            include ('menu_mt.php');
        ?>
    </div>
    <div class="col-lg-6">
    <div class="page-header">
        <h4> MOYEN DE TRANSPORT <strong><?php echo ($aff['id_mt'])?></strong></h4>
    </div>
        <div class="panel panel-default">
            <div class="panel-heading">Réferences</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <p> <strong>Numero de plaque: </strong><?php echo ($aff['num_plaque_mt'])?> </p>
                <p> <strong>Modele : </strong><?php echo ($aff['model_mt']) ?></p>
                <p> <strong>Marque: </strong><?php echo ($aff['marque_mt'])?></p>
                <p> <strong>Annee de fabrication: </strong><?php echo ($aff['annee_fabrication_mt'])?></p>
                <p> <strong>Numero de chassis: </strong><?php echo ($aff['num_chassis_mt'])?></p>
                <p> <strong>Numero moteur: </strong><?php echo ($aff['num_moteur_mt'])?></p>
                <p> <strong>Position de volant: </strong><?php echo ($aff['main_mt'])?></p>
                <p> <strong>Clouleur: </strong><?php echo ($aff['couleur_mt'])?></p>
                <a href="?p=details_moyen_de_transport&&id_mt=<?php echo ($aff['id_mt']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en detail:</strong> </button></a>
            </div>
 <?php }?>


<!-- ============================Apercu Proprietaire============================= -->


<?php
       $req=("SELECT * FROM affectation_pro, proprietaire ,moyen_de_transport WHERE proprietaire.id_pro = affectation_pro.id_pro_affect AND moyen_de_transport.id_mt = affectation_pro.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ORDER BY date_enreg_affect_pro DESC LIMIT 1");
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
            <a href="?p=apercu_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en detail:</strong> </button></a>
            </div>
      <?php }?>      

<!-- =======================================Apercu Conducteur============================= -->

<?php
           $req=("SELECT * FROM affectation_conducteur, conducteur ,moyen_de_transport WHERE conducteur.id_cond = affectation_conducteur.id_cond_affect AND moyen_de_transport.id_mt = affectation_conducteur.id_mt_affect AND  id_mt_affect='".$_SESSION['id_mt']."' ORDER BY date_enreg_affect_cond DESC LIMIT 1");

        $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

<?php while ($aff=mysqli_fetch_assoc($res)){?>

            <br>
            <div class="panel-heading"><h4><strong>Conducteur </strong></h4></div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <p> <strong>Nom: </strong><?php echo ($aff['nom_cond'])?></p>
                <p> <strong>Postnom: </strong><?php echo ($aff['postnom_cond'])?></p>
                <p> <strong>Prenom: </strong><?php echo ($aff['prenom_cond'])?></p>
            <a href="?p=apercu_conducteur&&id_cond=<?php echo ($aff['id_cond']) ?>"><button class="btn btn-warning btn-sm" ><strong>Voir en detail:</strong> </button></a>
            </div>
      <?php }?> 

       </div>
    </div> 
<!--=========================================== Apercu Image============================== -->
    
<?php
$req=("SELECT * FROM moyen_de_transport WHERE id_mt='".$_SESSION['id_mt']."'");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
             
  <?php while ($aff=mysqli_fetch_assoc($res)){?>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Images de l'automobile 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- <img src="../images/rav4.png"  class="img-thumbnail"> -->
                <img  class="img-thumbnail" alt="..." src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>
                <br><br>
            <div class="row">
            <div class="col-lg-12">
            
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="This is my title" data-caption="Some lovely red flowers" data-image="http://onelive.us/wp-content/uploads/2014/08/flower-delivery-online.jpg" data-target="#image-gallery">
                    <img  class="img-thumbnail" alt="..." src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>    
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="The car i dream about" data-caption="If you sponsor me, I can drive this car" data-image="http://www.picturesnew.com/media/images/car-image.jpg" data-target="#image-gallery">
                     <img  class="img-thumbnail" alt="..." src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>    
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                        <img  class="img-thumbnail" alt="..." src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a class="thumbnail" href="#" data-image-id="" data-toggle="modal" data-title="Im so nice" data-caption="And if there is money left, my girlfriend will receive this car" data-image="http://upload.wikimedia.org/wikipedia/commons/7/78/1997_Fiat_Panda.JPG" data-target="#image-gallery">
                        <img  class="img-thumbnail" alt="..." src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>
                    </a>
                </div>
              
            </div>
           

            <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="image-gallery-title"></h4>
                        </div>
                        <div class="modal-body">
                            <img id="image-gallery-image" class="img-responsive"  src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/>
                        </div>
                        <div class="modal-footer">
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                            </div>
                            <div class="col-md-8 text-justify" id="image-gallery-caption">
                                <P>comentaires</P>
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                            <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
