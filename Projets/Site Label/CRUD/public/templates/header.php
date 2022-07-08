<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Bootstrap --->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2"
            crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="CSS/style.css">
    <title>DB App</title>
</head>
<body>
<div    id = "bg"
        class="p-5 text-center bg-image img-fluid"
        style="
      background-image: url('../../img/concert.jpg');
      height: 400px;
    "
>
    <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
            <div class="text-white mt-12">
                <h1 class="mb-3">Music Hall</h1>
                <h4 class="mb-3">Parce que la musique nous unis</h4>
            </div>
        </div>
    </div>
</div>
    <nav class="text-center">
        <ul>
            <li><a href="index.php">Accueil</a></li>
            <li><a href="create.php">Ajouter un artiste</a></li>
            <li><a href="read.php">Trouver un artiste</a></li>
            <li><a href="update.php">Modifier un artiste</a></li>
            <li><a href="   delete.php">Retirer un artiste</a></li>
            <li><a href="   welcome.php">Compte</a></li>
        </ul>
    </nav>
</body>
</html>
<?php
