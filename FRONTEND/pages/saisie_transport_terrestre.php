<?php
//session_start();
include('connexion.php');
$id;
echo $_SESSION['nom_ut'];

if(isset($_POST['submit']))
{

$image_mt=$_FILES['image_mt'] ['name'];
$file_tmp_name=$_FILES['image_mt'] ['tmp_name'];

move_uploaded_file($file_tmp_name,"../imgs/$image_mt");

$num_plaque_mt=$_POST['num_plaque_mt'];
$marque_mt=$_POST['marque_mt'];
$model_mt=$_POST['model_mt'];
$type_mt=$_POST['type_mt'];
$annee_fabrication_mt=$_POST['annee_fabrication_mt'];
$num_chassis_mt=$_POST['num_chassis_mt'];
$num_moteur_mt=$_POST['num_moteur_mt'];
$main_mt=$_POST['main_mt'];
$couleur_mt=$_POST['couleur_mt'];

$id_ut_fk=$_POST['id_ut_fk'];
$nom_ut_fk=$_POST['nom_ut_fk'];

$req1="INSERT INTO moyen_de_transport (num_plaque_mt,marque_mt,model_mt,type_mt,annee_fabrication_mt,num_chassis_mt,num_moteur_mt,main_mt,couleur_mt,image_mt,id_ut_fk,nom_ut_fk)

VALUES ('$num_plaque_mt','$marque_mt','$model_mt','$type_mt','$annee_fabrication_mt','$num_chassis_mt','$num_moteur_mt','$main_mt','$couleur_mt','$image_mt','$id_ut_fk','$nom_ut_fk')";

mysqli_query($conn,$req1)  or die(mysqli_error()) ;
//header('location: saisie_proprietaire.php ');
}
?>

<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">fiche d'identification</div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                        <form method="POST" action="" enctype="multipart/form-data" accept-charset="utf-8">
                          <div class="form-group">Numéro plaque 
                              <input type="text" name="num_plaque_mt" required="" class="form-control" placeholder="Numéro de plaque">
                          </div>
                            <div class="form-group">Marque 
                              <input type="text" name="marque_mt" class="form-control" placeholder="Marque">
                            </div>
                            <div class="form-group">Modele
                              <input type="text" name="model_mt" class="form-control" placeholder="Modele">
                          </div>

                          <div >Type
                            <select name="type_mt" required="" class="form-group" name="type_mt" required="">
                                <option selected="" value="">---Selectionez---</option>
                                <option value="vehicule">Vehicule</option>
                                <option value="moto">Moto</option>
                            </select><br>
                          </div>

                            <div  class="form-group">Année de fabrication
                              <input type="date" name="annee_fabrication_mt" class="form-control" placeholder="Année de fabrication">
                            </div>
                            <div class="form-group">Num chassis
                              <input type="text" name="num_chassis_mt" class="form-control" placeholder="Numéro chassis">
                          </div>
                            <div class="form-group">Numéro moteur
                              <input type="text" name="num_moteur_mt" class="form-control" placeholder="Numéro moteur">
                            </div>
                            <div class="form-group">Position Volant

                            <select name="main_mt" required="">
                                        <option selected="" value="">---Selectionez---</option>
                                        <option value="GAUCHE"  >GAUCHE</option>
                                        <option value="DROITE">DROITE</option>
                                        <option value="AUTRE">AUTRE</option>
                            </select>
                          </div>
                            <div class="form-group">Couleur 
                              <input type="text" name="couleur_mt" class="form-control" placeholder="Couleur">
                            </div>
                            <div class="form-group">Image 
                              <input type="file" name="image_mt" class="form-control" placeholder="Image">
                            </div>

    <!-- =============Recuperation de l'ID de l'operateur=========== -->

        <?php
        $req2=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
        $res2=mysqli_query($conn,$req2) or die(mysqli_error());
        ?>

         <?php while ($aff2=mysqli_fetch_assoc($res2)){?>
                
        <input class="text" type="hidde" name="id_ut_fk" value="<?php echo ($aff2['id_ut'])?>">
        <input class="text" type="hidde" name="nom_ut_fk" value="<?php echo ($aff2['nom_ut'])?>">
                      
        <?php }?>

                            <button type="submit" name="submit" class="btn btn-primary">Enregistrer</button>
                        </form>
            </div>
        </div>
    </div> 

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                Images de l'automobile 
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <h5 class="header">visualiser image</h5>
                <div class="row">

            <div class="col-lg-12">
            <?php
//$id_div=$_GET['id_division_fk'];

//$_SESSION['id_div'] =$id_div;
//echo $_SESSION['id_div'];

$req=("SELECT * FROM moyen_de_transport ORDER BY date_enreg_mt DESC limit 1");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
                     VEHICULE ENREGISTRE <br><br>

                     <table border="1px">
                                    <thead>
                                        <tr>
                                           
                                            <th>ID</th>
                                            <th>NUMERO PLAQUE</th>
                                            <th>MARQUE</th>
                                            <th>MODELE</th>
                                            <th>IMAGE</th>
                                            

                                        </tr>
                                        
                                    </thead>
                                    <?php while ($aff=mysqli_fetch_assoc($res)){?>
                                    
                                        <tr>
                                            
                                            <td><?php echo ($aff['id_mt'])?></td>
                                            <td><?php echo ($aff['num_plaque_mt'])?></td>
                                            <td><?php echo ($aff['marque_mt'])?></td>
                                            <td width="10"><?php echo ($aff['model_mt'])?></td>
                                            <td width="10"><img height="40" width="40" class="rounded-circle" src=" ../imgs/<?php echo ($aff['image_mt']) ?>"/></td>

                                            <td><a href="?p=apercu_moyen_de_transport&&id_mt=<?php echo ($aff['id_mt']) ?>">Apercu</a></td>

                                        </tr>
                                    <?php }?>
                                </table>
    
            </div>
        </div>
    </div>

</div>                