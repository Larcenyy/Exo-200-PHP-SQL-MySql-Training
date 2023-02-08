<?php

require "Classe/DbPDO.php";
DbPDO::connect();

DbPDO::showClient();

?>

<a href="create.php">Créer un randonneur</a>

