<?php
//session_start();    
include('connexion.php');
?>


<div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="main.php?p=saisie_transport_terrestre" class="btn btn-primary">Ajouter</a> DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">

<?php
//$id_div=$_GET['id_division_fk'];

//$_SESSION['id_div'] =$id_div;
//echo $_SESSION['id_div'];

$req=("SELECT * FROM proprietaire ORDER BY date_enreg_proprietaire DESC ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Non</th>
                                <th>postnom</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <tr class="odd gradeX">
                        <?php while ($aff=mysqli_fetch_assoc($res)){?>

                              
                                            <td><a href="?p=apercu_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><?php echo ($aff['id_pro'])?></a></td>

                                             <td width="10"><a href="?p=apercu_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><img height="40" width="40" class="rounded-circle" src=" ../imgs/<?php echo ($aff['photo_pro']) ?>"/></a></td>
                                            
                                            <td><a href="?p=apercu_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><?php echo ($aff['nom_pro'])?></a></td>

                                            <td><a href="?p=apercu_proprietaire&&id_pro=<?php echo ($aff['id_pro']) ?>"><?php echo ($aff['prenom_pro'])?></a></td>
                                            
                                           
                            </tr>
                        <?php }?>
                 
                    
                        </tbody>
                    </table>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->