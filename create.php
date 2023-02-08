<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Randonnées, ajout</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name" placeholder="Nom de la randonnée">
        <select name="difficulty" id="difficulty">
            <option value="très facile">Très facile</option>
            <option value="facile">Facile</option>
            <option value="moyen">Moyen</option>
            <option value="difficile">Difficile</option>
            <option value="très difficile">Très difficile</option>
        </select>
        <input type="number" name="duration">
        <!-- Ajoutez un / des champs pour gérer la donnée de type time à insérer via PHP -->

        <input type="number" name="height_difference">
        <input type="submit" name="add_rando" value="Ajouter un randonneur">
    </form>

    <a href="./read.php">Allez vers read.php</a>
</body>
</html>
<?php
require "Classe/DbPDO.php";
DbPDO::connect();

if (isset($_POST['add_rando'])) {
    DbPDO::addRando() ;
}
