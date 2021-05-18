<?php
    function getDatabaseData($query) {
        $connection = new PDO('mysql:host=localhost;dbname=characters;', 'root', 'mysql');

        $data = $connection->prepare($query);
        $data ->execute();
        $data = $data->fetchAll();

        return $data;
    }

    function getAll($table) {
        return getDatabaseData("SELECT * FROM $table ORDER BY name");
    }

    function getOne($table, $id) {
        return getDatabaseData("SELECT * FROM $table WHERE id = $id")[0];         
    }

    function getOtherLocations($id) {
        return getDatabaseData("SELECT * FROM locations WHERE id != $id");
    }

    function updateLocation($location, $id) {
        return getDatabaseData("UPDATE characters SET location = $location WHERE id = $id");
    }
    
    function AddLocation($location) {
        return getDatabaseData("INSERT INTO locations(name) VALUES ('$location')");
    }

    function deleteLocation($location) {
      return getDatabaseData("DELETE FROM locations WHERE id = $location");
    }

    function adddefaultlocations() {
        getDatabaseData(" UPDATE `characters` SET location = 1 WHERE id = 4;
        UPDATE `characters` SET location = 2 WHERE id = 1;
        UPDATE `characters` SET location = 3 WHERE id = 6;
        UPDATE `characters` SET location = 4 WHERE id = 8;
        UPDATE `characters` SET location = 5 WHERE id = 5 OR id = 10;
        UPDATE `characters` SET location = 6 WHERE id = 2 OR id = 3 OR id = 9;
        UPDATE `characters` SET location = 7 WHERE id = 7;");
        

    }
?>