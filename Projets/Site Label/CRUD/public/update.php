<?php require "templates/header.php" ?>

<?php

try {
	require '../common.php';
	require '../config.php';
	$connection = new PDO($dsn, $username, $password, $options);
	$sql = "SELECT * FROM artistes";

	$statement = $connection->prepare($sql);
	$statement->execute();
	$result = $statement->fetchAll();
}

catch(PDOException $error) {
	echo "$sql \n".$error->getMessage();
}

?>


<div class="container">


<h2> Mise à jour artiste</h2>
<?php if (isset($_POST['submit']) && $statement) : ?>
	<?php echo escape($_POST['nom_artiste']); ?> a été mis à jour.
<?php endif; ?>
<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	<?php
	foreach($result as $row) :
	?>
	<tr>
		<td><?php echo escape($row["idcode_artiste"]); ?></td>
		<td><?php echo escape($row["nom_artiste"]); ?></td>

		<td><a class="btn btn-warning" href="update-single.php?id=<?php echo escape($row["idcode_artiste"]); ?>">Edit</a></td>

	</tr>
	<?php endforeach; ?>
	</tbody>
</table>
</div>
