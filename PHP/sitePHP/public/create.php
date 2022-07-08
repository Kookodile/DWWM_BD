<?php
if (isset($_POST['submit'])) {
	require "../config.php";
	require "../common.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$new_user = array(
                "nom"       => $_POST['nom'],
                "prenom"    => $_POST['prenom'],
                "email"     => $_POST['email'],
                "age"       => $_POST['age'],
                "localite"  => $_POST['localite']);
		$sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "users",
                implode(", ", array_keys($new_user)),
                ":" . implode(", :", array_keys($new_user)));
		$statement = $connection->prepare($sql);
		$statement->execute($new_user);
	} catch (PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>

<?php include "templates/header.php"; ?>



    <nav>
        <ul class="text-center">
            <li><a href="index.php">Accueil</a></li>
            <li><a href="create.php" class="active">Ajouter</a></li>
            <li><a href="read.php">Rechercher</a></li>
            <li><a href="update.php">Modifier</a></li>
            <li><a href="delete.php">Supprimer</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2> Ajout d'un utilisateur</h2>

	    <?php if (isset($_POST['submit']) && $statement) { ?>
            <p style = "text-align: center"><?php echo escape($_POST['prenom']); ?> a bien été ajouté !</p>
	    <?php } ?>

        <form method="post" class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
            <label for="prenom">Prénom</label>
            <input type="text" name="prenom" id="prenom" class="form-control" required>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" class="form-control" required>
            <label for="age">Age</label>
            <input type="text" name="age" id="age" class="form-control" required>
            <label for="localite">Localité</label>
            <input type="text" name="localite" id="localite" class="form-control" required>
            <div class="mt-3 text-center">
                <input type="submit" name="submit" value="Valider" class="btn btn-primary">
            </div>

        </form>

    </div>

<?php include "templates/footer.php"; ?>