
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
<?php
include('header_css.php');
?>
</head>
<body>
	
	
	<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form class="login100-form validate-form" method="POST" >
				<span class="login100-form-title p-b-37">
					TRANSCOM
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Entrer votre nom d'utilisateur">
					<input class="input100" type="text" id="nom_ut" name="nom_ut" placeholder="ID utilisateur ">
					<span class="focus-input100"></span>
				</div>

				<div class="wrap-input100 validate-input m-b-25" data-validate = "Entrer votre mot de passe">
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
	
<?php
include('footer_css.php');
?>

</body>
</html>