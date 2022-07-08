<?php include "templates/header.php"; ?>

<div class="container">
    <h2>Trouver un artiste</h2>
<?php

/**
 * Recuperer des infos en se basant sur le paramètre localité
 */

if (isset($_POST['submit'])) {
	try {
		require "../config.php";
		require "../common.php";

		$connection = new PDO($dsn, $username, $password, $options);

		$sql = " SELECT *
    FROM artistes
    WHERE nom_artiste LIKE :nom";

		$nom = $_POST['nom'];

		$statement = $connection->prepare($sql);
		$statement->bindParam(':nom', $nom, PDO::PARAM_STR);
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

        <table>
            <thead>
            <tr>
                <th>#</th>
                <th>Nom</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach ($result as $row) { ?>
                <tr>
                    <td><?php echo escape($row["idcode_artiste"]); ?></td>
                    <td><?php echo escape($row["nom_artiste"]); ?></td>

                </tr>
			<?php } ?>
            </tbody>
        </table>
	<?php } else { ?>
        > Pas de résultat pour <?php echo escape($_POST['nom']); ?>.
	<?php }
} ?>

    <form method="post" class="text-center">
        <label for="localite">Cherchez un artiste:</label>
        <div class="col text-center pt-2">
            <input type="text" id="nom" name="nom" placeholder=Artiste class="form-control col-lg">
            <input class="btn btn-info text-white col-sm mt-2" type="submit" name="submit" value="Valider">
        </div>

    </form>
    </div>
<?php include "templates/footer.php"; ?>