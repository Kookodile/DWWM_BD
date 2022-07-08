<?php
require '../common.php';
require '../config.php';


if (isset($_POST['submit'])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);
        //print_r($_POST['nom_artiste']);
        //print_r($_POST['idcode_artiste']);
		$user =[
			"idcode_artiste" => $_POST['idcode_artiste'],
			"nom_artiste" => $_POST['nom_artiste'],
		];
		$sql = "UPDATE artistes SET nom_artiste= :nom_artiste WHERE idcode_artiste= :idcode_artiste";
		$stmt= $connection->prepare($sql);
		$stmt->execute( $user);
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
}

if(isset($_GET['id'])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$id = $_GET['id'];
		$sql = "SELECT * FROM artistes WHERE idcode_artiste=:id" ;
		$statement = $connection->prepare($sql);
		$statement->bindValue('id', $id);

		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_ASSOC);
	}
	catch(PDOException $error) {
		echo "$sql \n".$error->getMessage();
	}
}
/*else {
	echo "Erreur";
	exit;
} */
?>

 <?php  require "templates/header.php" ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['nom_artiste']); ?> a été mis à jour.
<?php endif; ?>
<div class="center w-25">
    <h2> Modifier un utilisateur</h2>
    <div class="form-group">
        <form method="post">
			<?php foreach($user as $key => $value) : ?>
                <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
                <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?> class="form-control">
			<?php endforeach; ?>
            <input type="submit" name="submit" value="Valider" class="btn btn-warning m-2 center">
            <a href="update.php">Retour</a>
            <a href="index.php">Accueil</a>
        </form>
    </div>


</div>

<?php   require "templates/footer.php"; ?>

