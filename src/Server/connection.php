<?php 
    $db_server = "mysql:host=localhost;";
    $db_user = "root";
    $db_pass = "";
    $db_name = "dbname=sports_ms";

    try{
        $conn = new PDO($db_server.$db_name, $db_user, $db_pass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected";
    }catch(PDOException $e){
        $error = $e->getMessage();
        echo $error;
    }
?>