
<?php
 //verification de parametre P(parametre de page) a était signaler 
        
        if (isset($_GET['p'])) {
            //si oui 
            include($_GET['p'].'.php');
        }else {
            //si non
            include('dashboard_operateur.php');
        }
?>