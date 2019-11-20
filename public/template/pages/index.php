
<?php
session_start();
include('connexion.php');
$id;

//declaration pour la session

if(isset($_POST['submit'])){
$nom_ut=htmlspecialchars($_POST['nom_ut']);
$mdp_ut=htmlspecialchars($_POST['mdp_ut']);

$req="SELECT * FROM utilisateur WHERE nom_ut='".$nom_ut."' AND mdp_ut='".$mdp_ut."' AND act_desact=1 AND role='operateur' limit 1";

$res=mysqli_query($conn,$req);

if(mysqli_num_rows($res)>=1){
$_SESSION['nom_ut'] =htmlentities ($_POST['nom_ut']);

header('location:main.php');
}

elseif(mysqli_num_rows($res)!==1) {

 $req="SELECT * FROM utilisateur WHERE nom_ut='".$nom_ut."' AND mdp_ut='".$mdp_ut."' AND act_desact=1 AND role='roullage' limit 1";

$res=mysqli_query($conn,$req);
 
$_SESSION['nom_ut'] =htmlentities ($_POST['nom_ut']);
header('location:main.php'); 
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>TRANSCOM</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="../images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="POST" >
				<span class="login100-form-title p-b-37">
					TRANSCOM
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
					<input class="input100" type="text" id="nom_ut" name="nom_ut" placeholder="ID utilisateur ou email">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Mot de pass">
					<input class="input100" type="password" name="mdp_ut" id="mdp_ut" placeholder="password">
					<span class="focus-input100"></span>
				</div>

				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit" name="submit" value="Connexion">
            Connexion
					</button>
				</div>
			</form>

			
		</div>
	</div>
	
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/bootstrap/js/popper.js"></script>
	<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/daterangepicker/moment.min.js"></script>
	<script src="../vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>