<?php
include 'connection.php';

if(!empty($fn = $_POST['fullName'])&&
!empty($email = $_POST['email'])&&
!empty($category = $_POST['category'])&&
!empty($code = $_POST['code'])&&
!empty($birthDate = $_POST['birthDate'])){

    $fn = $_POST['fullName'];
    $email = $_POST['email'];
    $category = $_POST['category'];
    $code = $_POST['code'];
    $birthDate = $_POST['birthDate'];
    $wins = 0;
    $loses = 0;
    $games = 0;
    $coach = "Champ";
    $status = "Active";

    $sql = "INSERT INTO athletes (Name, Email, Category, Code, BirthDate, Wins, Loses, Games, Coach, Status) VALUES (:fullName, :email, :category, :code, :birthDate, :wins, :loses, :games, :coach, :status)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':fullName' => $fn,
        ':email' => $email,
        ':category' => $category,
        ':code' => $code,
        ':birthDate' => $birthDate,
        ':wins' => $wins,
        ':loses' => $loses,
        ':games' => $games,
        ':coach' => $coach,
        ':status' => $status
    ]);
    $sql = "DELETE FROM pending WHERE studentID = '$code'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    if($stmt){
        $sql = "DELETE FROM pending WHERE studentID = '$code'";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo "Success";
    }
}

?>