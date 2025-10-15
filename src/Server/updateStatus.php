<?php
include 'connection.php';

if(!empty($code = $_POST['code'])){
    $code = $_POST['code'];
    $Status = "Passed";

    $sql = "UPDATE pending SET `Status`=:Status WHERE `studentID` = :code";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':Status' => $Status,
        ':code' => $code
    ]);
    if($stmt){
        echo "Success";
    }
}

?>