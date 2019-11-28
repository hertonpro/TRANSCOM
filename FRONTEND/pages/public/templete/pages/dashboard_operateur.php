<?php
include('connexion.php');
?>

<?php
//echo 'Nom de l\'admin: '. $_SESSION['nom_ut'].'<br>';

$req=("SELECT * FROM utilisateur WHERE nom_ut='".$_SESSION['nom_ut']."'  ");
$res=mysqli_query($conn,$req) or die(mysqli_error());
?>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-car fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2>Moyen de Transport</h2>
                                    <div>
                                        <?php
                                        $sql="SELECT count(id_mt) AS total FROM moyen_de_transport ";
                                    $result=mysqli_query($conn,$sql);
                                    $values=mysqli_fetch_assoc($result);
                                    $num_rows=$values['total'];
                                    echo $num_rows;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?p=liste_mt">
                            <div class="panel-footer">
                                <span class="pull-left">Liste MT</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="?p=saisie_transport_terrestre">
                            <div class="panel-footer">
                                <span class="pull-left">Saisie MT</span>
                                <span class="pull-right"><i class="fa fa-edit"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-3x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2>Liste Proprietaire</h2>
                                    <div>
                                        <?php
                                    $sql="SELECT count(id_pro) AS total FROM proprietaire";
                                    $result=mysqli_query($conn,$sql);
                                    $values=mysqli_fetch_assoc($result);
                                    $num_rows=$values['total'];
                                    echo $num_rows;
                                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?p=liste_proprietaire">
                            <div class="panel-footer">
                                <span class="pull-left">Liste proprietaires</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-secret fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2>Liste Conducteurs</h2>
                                    <div>
                                        <?php
                                    $sql="SELECT count(id_cond) AS total FROM conducteur";
                                    $result=mysqli_query($conn,$sql);
                                    $values=mysqli_fetch_assoc($result);
                                    $num_rows=$values['total'];
                                    echo $num_rows;
                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="?p=liste_conducteur">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <h2>Statistique et Rapport</h2>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <a href="?p=statistique">
                            <div class="panel-footer">
                                <span class="pull-left">Voir les détails</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->