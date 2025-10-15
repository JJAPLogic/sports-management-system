<?php
include 'connection.php';
$user = $_POST["email"];
$location = $_POST["Location"];
if($location === "tryout"){
    $location = "pending";
}else{
    $location = "athletes";
}
$sql = "DELETE FROM $location WHERE email = '$user'";
$stmt = $conn->prepare($sql);
$stmt->execute();

if($stmt){
    echo "success";
}else{
    echo "fail";
}
?>