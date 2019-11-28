
</html>


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

$req=("SELECT * FROM conducteur ORDER BY date_enreg_conducteur DESC ");
$res=mysqli_query($conn,$req) or die(mysqli_error());

?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Postnom</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                             
                            <tr class="odd gradeX">
                        <?php while ($aff=mysqli_fetch_assoc($res)){?>

                              
                                            <td><a href="?p=apercu_conducteur&&id_cond=<?php echo ($aff['id_cond']) ?>"><?php echo ($aff['id_cond'])?></a></td>

                                            <td width="10"><a href="?p=apercu_conducteur&&id_mt=<?php echo ($aff['id_cond']) ?>"><img height="40" width="40" class="rounded-circle" src=" ../imgs/<?php echo ($aff['photo_cond']) ?>"/></a></td>
                                            
                                            <td><a href="?p=apercu_conducteur&&id_cond=<?php echo ($aff['id_cond']) ?>"> <?php echo ($aff['nom_cond'])?></a></td>

                                            <td><a href="?p=apercu_conducteur&&id_con=<?php echo ($aff['id_cond']) ?>"> <?php echo ($aff['photo_cond'])?></a></td>
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