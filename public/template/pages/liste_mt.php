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

$req=("SELECT * FROM moyen_de_transport ORDER BY date_enreg_mt DESC");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Numéro Plaque</th>
                                <th>Marque</th>
                                <th>Modele</th>
                            </tr>
                        </thead>
                        <tbody>
                             
                            <tr class="odd gradeX">
                        <?php while ($aff=mysqli_fetch_assoc($res)){?>
                                            <td><a href="?p=apercu_moyen_de_transport&&id_mt=<?php echo ($aff['id_mt']) ?>"><?php echo ($aff['id_mt'])?></a></td>
                                            
                                            <td><a href="?p=apercu_moyen_de_transport&&id_mt=<?php echo ($aff['id_mt']) ?>"><?php echo ($aff['num_plaque_mt'])?></a></td>
                                            <td><?php echo ($aff['marque_mt'])?></td>
                                            <td width="10"><?php echo ($aff['model_mt'])?></td>           
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