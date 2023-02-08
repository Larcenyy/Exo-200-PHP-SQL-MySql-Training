<?php

class DbPDO
{
    private static string $server = 'localhost';
    private static string $username = 'root';
    private static string $password = '';
    private static string $database = 'test';
    private static ?PDO $db = null;

    public static function connect(): ?PDO {
        if (self::$db == null){
            try {
                self::$db = new PDO("mysql:host=".self::$server.";dbname=".self::$database, self::$username, self::$password);
                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            catch (PDOException $e) {
                echo "Erreur de la connexion à la dn : " . $e->getMessage();
                die();
            }
        }
        return self::$db;
    }

    public static function showClient() {
        $request = self::$db->prepare("SELECT * FROM hiking ORDER BY id ASC");
        $check = $request->execute();
        if ($check){
            foreach ($request as $item){
                echo "<a href='./update.php?id=" . $item['id'] . "'>Nom : " . $item['name'] . "</a> " . 'ID : ' . $item['id'] . "     <a href='../delete.php?deleteId=" . $item["id"] . "' >❌  Supprimé</a>" . "<br>";
        }
        }
        else{
            echo "Une erreur est survenu..";
        }
    }

    public static function addRando() {
        $request = self::$db->prepare(" INSERT INTO hiking (name, difficulty, duration, height_difference)
        VALUES (:name, :difficulty, :duration, :height_difference)");

        $request->bindParam(":name", $_POST['name']);
        $request->bindParam(":difficulty", $_POST['difficulty']);
        $request->bindParam(":duration", $_POST['duration']);
        $request->bindParam(":height_difference", $_POST['height_difference']);

        $check = $request->execute();
        if ($check){
            echo "<div style='background: green; color: white; font-size: 20px'>Un randonneur à était ajouté avec succès</div>";
        }
    }

    public static function updateRando() {
        $request = self::$db->prepare("UPDATE hiking SET name = :name, difficulty = :difficulty, duration = :duration, height_difference = :height_difference WHERE id = :idRando");
        $request->bindParam(":name", $_POST['name']);
        $request->bindParam(":difficulty", $_POST['difficulty']);
        $request->bindParam(":duration", $_POST['duration']);
        $request->bindParam(":height_difference", $_POST['height_difference']);
        $request->bindParam(":idRando", $_GET['id']);

        $check = $request->execute();
        if ($check){
            echo "<div style='background: green; color: white; font-size: 20px'>Ce randonneur à était modifié avec succès</div>";
        }
    }


    public static function getHikerById($id) {
        $request = self::$db->prepare("SELECT * FROM hiking WHERE id = :id");
        $request->execute(['id' => $id]);
        $hiker = $request->fetch();
        if ($hiker) {
            return $hiker;
        } else {
            return false;
        }
    }

    public static function deleteHiker($id){
        $request = self::$db->prepare("DELETE FROM hiking WHERE id = :id");
        $request->execute(['id' => $id]);
        $hiker = $request->fetch();
        if ($hiker){
            return $hiker;
        }
        else {
            return false;
        }
    }
}