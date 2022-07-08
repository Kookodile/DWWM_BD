<?php
if (isset($_POST['submit'])) {
	require "../config.php";
	require "../common.php";

	try {
		$connection = new PDO($dsn, $username, $password, $options);
		$new_user = array(
                "nom_artiste"       => $_POST['nom'],);
		$sql = sprintf(
                "INSERT INTO %s (%s) values (%s)",
                "artistes",
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

    <div class="container">
        <h2> Ajout d'un artiste</h2>

	    <?php if (isset($_POST['submit']) && $statement) { ?>
            <p style = "text-align: center"><?php echo escape($_POST['nom']); ?> a bien été ajouté !</p>
	    <?php } ?>

        <form method="post" class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" required>
            <div class="mt-3 text-center">
                <input type="submit" name="submit" value="Valider" class="btn btn-primary">
            </div>

        </form>

    </div>

<?php include "templates/footer.php"; ?>