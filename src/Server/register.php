<?php
include 'Connection.php';

if($_POST['firstName']&&
$_POST['middleInitial']&&
$_POST['lastName']&&
$_POST['email']&&
$_POST['category']&&
$_POST['studentID']&&
$_POST['birthDate']){
    $fn = $_POST['firstName'];
    $mi = $_POST['middleInitial'];
    $ln = $_POST['lastName'];
    $email = $_POST['email'];
    $sID = $_POST['studentID'];
    $category = $_POST['category'];
    $bday = $_POST['birthDate'];
    $fullName = $fn." ".$mi.". ".$ln;
    $Status = "Passed";

    $sql = "INSERT INTO pending (fullName, email, studentID, category, birthDate, Status)VALUES (:fullName, :email, :studentID, :category, :birthDate, :Status)";
    $stmt = $conn->prepare($sql);
    $success = $stmt->execute([
        ':fullName' => $fullName,
        ':email' => $email,
        ':studentID' => $sID,
        ':category' => $category,
        ':birthDate' => $bday,
        ':Status' => $Status
    ]);

    if($success){
        echo "Success";
    }else{
        echo "Something went wrongs";
    }
}
?>