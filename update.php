<?php
    require "Classe/DbPDO.php";
    DbPDO::connect();

    if (isset($_GET['id'])) {

        $id = $_GET['id'];
        $hiker = DbPDO::getHikerById($id);
        if ($hiker) {
            echo "Vous  êtes sur le profil de : " . $name = $hiker['name'];
            $name = $hiker['name'];
            $difficulty = $hiker['difficulty'];
            $duration = $hiker['duration'];
            $height_difference = $hiker['height_difference'];
        }
    }
    else{
        echo "Problème est survenu, vous n'êtes sur aucun profil..";
    }
    if (isset($_POST['update_rando'])) {
        DbPDO::updateRando() ;
    }

?>

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
    <input type="text" name="name" placeholder="Nom du randonneur" value="<?= $name ?? '' ?>">
    <select name="difficulty" id="difficulty">
        <option value="très facile" <?= $difficulty === 'très facile' ? 'selected' : '' ?>>Très facile</option>
        <option value="facile" <?= $difficulty === 'facile' ? 'selected' : '' ?>>Facile</option>
        <option value="moyen" <?= $difficulty === 'moyen' ? 'selected' : '' ?>>Moyen</option>
        <option value="difficile" <?= $difficulty === 'difficile' ? 'selected' : '' ?>>Difficile</option>
        <option value="très difficile" <?= $difficulty === 'très difficile' ? 'selected' : '' ?>>Très difficile</option>
    </select>
    <input type="number" name="duration" value="<?= $duration ?? '' ?>">
    <input type="number" name="height_difference" value="<?= $height_difference ?? '' ?>">
    <input type="submit" name="update_rando" value="Modifié ce randonneur">
</form>

<a href="../read.php">Allez vers read.php</a>
<a href="../create.php">Allez vers create.php</a>
</body>
</html>

