<?php
require "../config.php";
require "../common.php";

if (isset($_GET["id"])) {
	try {
		$connection = new PDO($dsn, $username, $password, $options);

		$id = $_GET["id"];

		$sql = "DELETE FROM users WHERE id = :id";

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

	$sql = "SELECT * FROM users";

	$statement = $connection->prepare($sql);
	$statement->execute();

	$result = $statement->fetchAll();
} catch(PDOException $error) {
	echo $sql . "<br>" . $error->getMessage();
}
?>
<?php require "templates/header.php"; ?>
<div class="container">


    <nav>
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="create.php">Ajouter</a></li>
            <li><a href="read.php">Rechercher</a></li>
            <li><a href="update.php">Modifier</a></li>
            <li><a href="delete.php"class="active" >Supprimer</a></li>
        </ul>
    </nav>
	<h2>Supprimer un utilisateur</h2>

<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['prenom']); ?> a été supprimé.
<?php endif; ?>

	<table>
		<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Email</th>
			<th>Age</th>
			<th>Localité</th>
			<th>Date</th>
			<th>Supprimer</th>
		</tr>
		</thead>
		<tbody>
		<?php foreach ($result as $row) : ?>
			<tr>
				<td><?php echo escape($row["id"]); ?></td>
				<td><?php echo escape($row["nom"]); ?></td>
				<td><?php echo escape($row["prenom"]); ?></td>
				<td><?php echo escape($row["email"]); ?></td>
				<td><?php echo escape($row["age"]); ?></td>
				<td><?php echo escape($row["localite"]); ?></td>
				<td><?php echo escape($row["date"]); ?> </td>
				<td><a class="btn btn-danger" href="delete.php?id=<?php echo escape($row["id"]); ?>">Supprimer</a></td>
			</tr>
		<?php endforeach; ?>
		</tbody>
	</table>
</div>


<?php require "templates/footer.php"; ?>