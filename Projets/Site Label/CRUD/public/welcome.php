<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
	header("location: login.php");
	exit;
}
?>

<?php require 'templates/header.php' ?>
<body>
<h1 class="my-5 text-center">Bonjour, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenue sur notre site.</h1>
<p class="text-center">
	<a href="reset-password.php" class="btn btn-warning">Reinitialiser le mot de passe</a>
	<a href="logout.php" class="btn btn-danger ml-3">Déconnexion</a>
</p>
</body>
</html>