<?php
require "../config.php";
require "../common.php";

if (isset($_GET["id"])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);

		$id = $_GET["id"];

		$sql = "DELETE FROM artistes WHERE idcode_artiste = :id";

		$statement = $connection->prepare($sql);
		$statement->bindValue(':id', $id);
		$statement->execute();

		$success = "User successfully deleted";
	} catch(PDOException $error) {
		echo $sql . "<br>" . $error->getMessage();
	}
}

try {
	$connection = new PDO($dsn, $username, $password, $options);

	$sql = "SELECT * FROM artistes";

	$statement = $connection->prepare($sql);
	$statement->execute();

	$result = $statement->fetchAll();
} catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
<div class="container">


	<h2>Supprimer un artiste</h2>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['nom']); ?> a été supprimé.
<?php endif; ?>

	<table>
		<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Supprimer</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $row) : ?>
			<tr>
				<td><?php echo escape($row["idcode_artiste"]); ?></td>
				<td><?php echo escape($row["nom_artiste"]); ?></td>
				<td><a class="btn btn-danger" href="delete.php?id=<?php echo escape($row["idcode_artiste"]); ?>">Supprimer</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>


<?php require "templates/footer.php"; ?>