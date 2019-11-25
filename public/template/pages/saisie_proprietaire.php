<?php
//session_start();  
include('connexion.php');

$id_mt=htmlspecialchars($_GET['id_mt'])  ;

$_SESSION['id_mt']=htmlentities ($_GET['id_mt']);
//echo $_SESSION['id_mt'];
?>


<div class="row">
    <div class="col-lg-12">
        <?php 
            include ('menu_pro.php');
        ?>
    </div>
    <div class="col-lg-6">
        <div class="page-header">
            <h4>PROPRIETAIRE MOYEN DE TRANSPORT <strong><?php echo ($_GET['id_mt'])?></strong></h4>
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">fiche d'identification Proprietaire</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                        <form role="form" method="POST" action="?p=apercu_moyen_de_transport&&id_mt=<?php echo $id_mt ?>" enctype="multipart/form-data" accept-charset="utf-8">
                            <div class="form-group">Nom
                                <input class="form-control" placeholder="Nom" name="nom_pro">
                            </div>
                            <div class="form-group">Postnom
                                <input class="form-control" placeholder="Postnom" name="postnom_pro">
                            </div>
                            <div class="form-group">
                              <label>Prenom </label>
                              <input class="form-control" placeholder="Prenom" name="prenom_pro">
                            </div>
                            <div class="form-group">
                                <label>Sexe</label>
                                    <label class="form-group">
                                        <select name="sexe_pro" required="">
                                            <option value="" selected="" >---Selectionnez</option>
                                            <option value="MASCULIN">MASCULIN</option>
                                            <option value="FEMININ">FEMININ</option>
                                        </select>
                                    </label>
                            </div>    
							<div class="form-group">
                                <label>Date de naissance</label>
                                <input type="date" class="form-control" name="date_naiss_pro">
                            </div>
							<div class="form-group">
							  <label>Lieu de naissance</label>
							  <input class="form-control" placeholder="Lieu de naissance" name="lieu_naiss_pro">
                            </div>
							<div class="form-group">
                            	<hr>
                                ADRESSE ACTUELLE
                                <hr>
                            </div>
                            <div class="form-group"> Province
                              <select name="province_pro" required="">
                                  <option value="Sud_Kivu">SUD-KIVU</option>
                                  <option value="Nord_Kivu">NORD-KIVU</option>
                                  <option value="Kinshasa">KINSHASA</option>
                              </select>
                            </div>
							<div class="form-group"> Ville
							  <input class="form-control" placeholder="ville" name="ville_pro">
                            </div>
							<div class="form-group">Commune&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input class="form-control" placeholder="Enter text" name="commune_pro">
                            </div>
							<div class="form-group"> Quartier
							  <input class="form-control" placeholder="Enter text" name="quartier_pro">
                            </div>
							<div class="form-group">Avennue&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                <input class="form-control" placeholder="Enter text" name="avennue_pro">
                            </div>
						    <div class="form-group"> Numero domicile
						        <input class="form-control" placeholder="Enter text" name="num_domicile_pro">
                            </div>
							<div class="form-group">Phone 1&nbsp; &nbsp; &nbsp; &nbsp;
                                <input class="form-control" placeholder="Phone 1" name="tel1_pro">
                            </div>
                            <div class="form-group">Phone 2&nbsp; &nbsp; &nbsp; &nbsp;
                                <input class="form-control" placeholder="Phone 2" name="tel2_pro">
                            </div>
							<div class="form-group">Mail&nbsp; &nbsp; &nbsp; &nbsp;
                                <input type="mail" class="form-control" placeholder="exemple(exemple@mail.com)" name="email_pro">
                            </div>
                            <div class="form-group">
                                    <label>Image</label>
                                    <input class="form-control" type="file" placeholder="Inserer l'image" name="photo_pro">
                            </div>
							<div class="form-group">
                                    <label>Scan ID</label>
                                    <input class="form-control" type="file" placeholder="Scan ID" name="scan_identite_pro">
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

                            <div class="text-right">
                                <button type="submit" class="btn btn-primary btn-positio-left" value="" name="submit">Enregistrer</button>
                            </div>

                            <button type="reset" class="btn btn-default" >Reset Button</button>
                        </form>
            </div>
        </div>
    </div>
</div>                