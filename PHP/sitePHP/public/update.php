<?php require "templates/header.php" ?>

<?php

try {
	require '../common.php';
	require '../config.php';
	$connection = new PDO($dsn, $username, $password, $options);
	$sql = "SELECT * FROM users";

	$statement = $connection->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll();
}

catch(PDOException $error) {
	echo "$sql \n".$error->getMessage();
}

?>

<nav>
    <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="create.php">Ajouter</a></li>
        <li><a href="read.php">Rechercher</a></li>
        <li><a href="update.php"class="active" >Modifier</a></li>
        <li><a href="delete.php">Supprimer</a></li>
    </ul>
</nav>

<div class="container">


<h2> Mise à jour utilisateur</h2>
<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['prenom']); ?> a été mis à jour.
<?php endif; ?>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Prénom</th>
			<th>Nom</th>
			<th>Mail</th>
			<th>Age</th>
			<th>Localité</th>
			<th>Date</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($result as $row) :
	?>
	<tr>
		<td><?php echo escape($row["id"]); ?></td>
		<td><?php echo escape($row["prenom"]); ?></td>
		<td><?php echo escape($row["nom"]); ?></td>
		<td><?php echo escape($row["email"]); ?></td>
		<td><?php echo escape($row["age"]); ?></td>
		<td><?php echo escape($row["localite"]); ?></td>
		<td><?php echo escape($row["date"]);?></td>
		<td><a class="btn btn-warning" href="update-single.php?id=<?php echo escape($row["id"]); ?>">Edit</a></td>

	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
