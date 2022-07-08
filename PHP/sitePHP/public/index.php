<?php include "templates/header.php"; ?>
<nav>
    <ul>
        <li><a href="index.php" class="active">Accueil</a></li>
        <li><a href="create.php">Ajouter</a></li>
        <li><a href="read.php">Rechercher</a></li>
        <li><a href="update.php">Modifier</a></li>
        <li><a href="delete.php">Supprimer</a></li>
    </ul>
</nav>

<div class="container">

<ul class="accueil">
    <li>
        <a href="create.php"><strong>Création</strong></a> - Ajout d'utilisateur
    </li>
    <li>
        <a href="read.php"><strong>Lecture</strong></a> - Recherche d'utilisateur
    </li>
    <li>
        <a href="update.php"><strong>Modification</strong></a> - Modification d'utilisateur
    </li>
    <li>
        <a href="delete.php"><strong>Suppression</strong></a> - Supprimer un utilisateur
    </li>
</ul>
</div>
<?php include "templates/footer.php"; ?>


