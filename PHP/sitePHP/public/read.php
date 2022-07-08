<?php include "templates/header.php"; ?>
    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="create.php">Ajouter</a></li>
            <li><a href="read.php"class="active">Rechercher</a></li>
            <li><a href="update.php">Modifier</a></li>
            <li><a href="delete.php" >Supprimer</a></li>
        </ul>
    </nav>
<div class="container">
    <h2>Trouver un utilisateur via sa localité</h2>
<?php

/**
 * Recuperer des infos en se basant sur le paramètre localité
 */

if (isset($_POST['submit'])) {
	try {
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = "SELECT *
    FROM users
    WHERE localite = :localite";

		$localite = $_POST['localite'];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':localite', $localite, PDO::PARAM_STR);
		$statement->execute();

		$result = $statement->fetchAll();
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}

}
?>

<?php
if (isset($_POST['submit'])) {
	if ($result && $statement->rowCount() > 0) { ?>
        <h2>Chercher un utilisateur</h2>

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email Address</th>
                <th>Age</th>
                <th>localite</th>
                <th>Date d'enregistrement</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["id"]); ?></td>
                    <td><?php echo escape($row["prenom"]); ?></td>
                    <td><?php echo escape($row["nom"]); ?></td>
                    <td><?php echo escape($row["email"]); ?></td>
                    <td><?php echo escape($row["age"]); ?></td>
                    <td><?php echo escape($row["localite"]); ?></td>
                    <td><?php echo escape($row["date"]); ?> </td>
                </tr>
			<?php } ?>
            </tbody>
        </table>
	<?php } else { ?>
        > No results found for <?php echo escape($_POST['localite']); ?>.
	<?php }
} ?>

    <form method="post" class="text-center">
        <label for="localite">Entrez une ville:</label>
        <div class="col text-center pt-2">
            <input type="text" id="localite" name="localite" placeholder="Lille..." class="form-control col-lg">
            <input class="btn btn-info text-white col-sm mt-2" type="submit" name="submit" value="Valider">
        </div>

    </form>
    </div>
<?php include "templates/footer.php"; ?>