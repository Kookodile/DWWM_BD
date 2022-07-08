
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

<?php include "templates/header.php"; ?>

<h1>Nos artistes: </h1>
<div class="container">

    <table>
        <thead>
        <tr>
            <th>Nom</th>
        </tr>
        </thead>
        <tbody>
		<?php
		foreach($result as $row) :
			?>
            <tr>
                <td><?php echo escape($row["nom_artiste"]); ?></td>
            </tr>
		<?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php include "templates/footer.php"; ?>


