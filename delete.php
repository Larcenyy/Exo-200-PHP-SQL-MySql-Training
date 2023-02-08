<?php

require "Classe/DbPDO.php";
DbPDO::connect();

    if (isset($_GET['deleteId'])){
        $id = $_GET['deleteId'];
        $hiker = DbPDO::deleteHiker($id);
        header('Location: ./read.php');
        echo "<div style='background: darkred; color: white; font-size: 20px'>Ce randonneur à était supprimé avec succès</div>";

    }
    else{
        echo "Vous ne pouvez pas faire cela.";
    }

