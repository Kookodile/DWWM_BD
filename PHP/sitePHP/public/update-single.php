<?php
require '../common.php';
require '../config.php';

if (isset($_POST['submit'])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$user =[
			"id"        => $_POST['id'],
			"nom" => $_POST['nom'],
			"prenom"  => $_POST['prenom'],
			"email"     => $_POST['email'],
			"age"       => $_POST['age'],
			"localite"  => $_POST['localite'],
			"date"      => $_POST['date']
		];

		$sql = "UPDATE users
            SET id = :id,
              nom = :nom,
              prenom = :prenom,
              email = :email,
              age = :age,
              localite = :localite,
              date = :date
            WHERE id = :id";

		$statement = $connection->prepare($sql);
		$statement->execute($user);
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
}

if(isset($_GET['id'])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$id = $_GET['id'];
		$sql = "SELECT * FROM users WHERE id= :id";
		$statement = $connection->prepare($sql);
		$statement->bindValue('id', $id);
		$statement->execute();
		$user = $statement->fetch(PDO::FETCH_ASSOC);
	}
	catch(PDOException $error) {
		echo "$sql \n".$error->getMessage();
	}
}
else {
	echo "Erreur";
	exit;
}
?>

<?php require "templates/header.php" ?>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['prenom']); ?> a été mis à jour.
<?php endif; ?>

<h2> Modifier un utilisateur</h2>

<form method="post">
	<?php foreach($user as $key => $value) : ?>
        <label for="<?php echo $key; ?>"><?php echo ucfirst($key); ?></label>
        <input type="text" name="<?php echo $key; ?>" id="<?php echo $key; ?>" value="<?php echo escape($value); ?>" <?php echo ($key === 'id' ? 'readonly' : null); ?>>
	<?php endforeach; ?>
	<input type="submit" name="submit" value="Valider">
</form>
<a href="update.php">Retour</a>
<a href="index.php">Accueil</a>
<?php   require "templates/footer.php"; ?>

