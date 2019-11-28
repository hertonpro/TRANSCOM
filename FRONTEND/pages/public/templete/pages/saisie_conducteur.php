<?php
//session_start();
include('connexion.php');
$id;

?>
<?php
$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_mt'];

echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$scan_identite_cond=$_FILES['scan_identite_cond'] ['name'];
$file_tmp_name=$_FILES['scan_identite_cond'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"../imgs/$scan_identite_cond");

$photo_cond=$_FILES['photo_cond'] ['name'];
$file_tmp_name=$_FILES['photo_cond'] ['tmp_name'];
move_uploaded_file($file_tmp_name,"../imgs/$photo_cond");

$nom_cond=$_POST['nom_cond'];
$postnom_cond=$_POST['postnom_cond'];
$prenom_cond=$_POST['prenom_cond'];
$sexe_cond=$_POST['sexe_cond'];
$date_naiss_cond=$_POST['date_naiss_cond'];
$lieu_naiss_cond=$_POST['lieu_naiss_cond'];
$province_cond=$_POST['province_cond'];
$ville_cond=$_POST['ville_cond'];
$commune_cond=$_POST['commune_cond'];
$quartier_cond=$_POST['quartier_cond'];
$avennue_cond=$_POST['avennue_cond'];
$num_domicile_cond=$_POST['num_domicile_cond'];
$tel1_cond=$_POST['tel1_cond'];
$tel2_cond=$_POST['tel2_cond'];
$email_cond=$_POST['email_cond'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];
$id_mt_fk=$_POST['id_mt_fk'];
$num_plaque_mt_fk=$_POST['num_plaque_mt_fk'];

$req1="INSERT INTO conducteur (nom_cond,postnom_cond,prenom_cond,sexe_cond,date_naiss_cond,lieu_naiss_cond,province_cond,ville_cond,commune_cond,quartier_cond,avennue_cond,num_domicile_cond,tel1_cond,tel2_cond,email_cond,scan_identite_cond,photo_cond,id_ut_fk,nom_ut_fk,id_mt_fk,num_plaque_mt_fk)

VALUES ('$nom_cond','$postnom_cond','$prenom_cond','$sexe_cond','$date_naiss_cond','$lieu_naiss_cond','$province_cond','$ville_cond','$commune_cond','$quartier_cond','$avennue_cond','$num_domicile_cond','$tel1_cond','$tel2_cond','$email_cond','$scan_identite_cond','$photo_cond','$id_ut_fk','$nom_ut_fk','$id_mt_fk','$num_plaque_mt_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: apercu_moyen_de_transport.php ');
}
?>

  <?php 
  include ('menu_mt.php');
  ?><br>


<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
           <h4>CONDUCTEUR DE MOYEN DE TRANSPORT NUMERO:<strong><?php echo ($_GET['id_mt'])?></strong></h4>
          <div class="panel-heading">Fiche d'identification Proprietaire</div>
          <!-- /.panel-heading -->
            <div class="panel-body">

                <form  method="GET" action="chercher_conducteur_affect.php">
                  <div class="input-group custom-search-form">
                        <input id="search-input" name="recherche_nom_cond"  placeholder="Recherche..." placeholder="chercher conducteur"  type="text" class="form-control" >
                          <span class="input-group-btn">
                          <button class="btn btn-default" type="submit" name="submit"> <i class="fa fa-search"></i> </button>
                          </span>
                  </div>
                </form>

                <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
                  NOM: <input type="text" class="form-control" name="nom_cond" required=""><br>
                  POSTNOM: <input type="text" class="form-control" name="postnom_cond"><br>
                  PRENOM: <input type="text" class="form-control" name="prenom_cond"><br>
                  <div class="form-group">
                    <label>Sexe</label>
                    <label class="form-group">
                      <select name="sexe_cond" required="">
                        <option value="" selected="" >---Selectionnez</option>
                        <option value="MASCULIN">MASCULIN</option>
                        <option value="FEMININ">FEMININ</option>
                      </select>
                    </label>
                  </div>
                  DATE DE NAISSANCE: <input type="date" class="form-control" name="date_naiss_cond"><br><br>
                  LIEU DE NAISSANCE: <input type="text" class="form-control" name="lieu_naiss_cond"><br>
                  PROVINCE: 
                <select required="" name="province_cond">
                  <option value="">---Selectionnez---</option>
                  <option value="Sud-Kivu">Sud-Kivu</option>
                  <option value="Nord-Kivu">Nord-Kivu</option>
                </select>
                <br>
                  VILLE: <input type="text" class="form-control" name="ville_cond"><br>
                  COMMUNE: <input type="text" class="form-control" name="commune_cond"><br>
                  QUARTIER: <input type="text" class="form-control" name="quartier_cond"><br>
                  AVENNUE: <input type="text" class="form-control" name="avennue_cond"><br>
                  NUMERO DOMICILE : <input type="text" class="form-control" name="num_domicile_cond"><br>
                  TELEPHONE 1: <input type="text" class="form-control" name="tel1_cond"><br>
                  TELEPHONE 2: <input type="text" class="form-control" name="tel2_cond"><br>
                  ADRESSE MAIL: <input type="text" class="form-control" name="email_cond"><br>
                  SCAN IDENTITE: <input type="file" name="scan_identite_cond"><br>
                  PHOTO: <input type="file" name="photo_cond"><br>

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


                  <input type="submit" name="submit" value="Enregistrer">
                </form>
            </div>
      </div>
    </div>
    <div class="col-lg-6">
</div>



       <h2 class="mb-4">APERCU GENERAL CONDUCTEUR</h2>

      <hr class="two">
      <?php
      $req=("SELECT * FROM conducteur WHERE id_mt_fk='".$_SESSION['id_mt']."' ORDER BY date_enreg_conducteur DESC ");
      $res=mysqli_query($conn,$req) or die(mysqli_error());
      ?>

      <?php while ($aff=mysqli_fetch_assoc($res)){?>

    NOM: <?php echo ($aff['nom_cond'])?><br>
    POSTNOM: <?php echo ($aff['postnom_cond'])?><br>
    PRENOM: <?php echo ($aff['prenom_cond'])?><br>

<br>
<a href="?p=affectation_conducteur&&id_cond=<?php echo ($aff['id_cond'])?>"><button > Aller affecter le Taximan </button></a>
   <hr class="two">
      <?php }?>

</body>
</html>