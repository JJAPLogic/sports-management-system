<?php 
include 'connection.php';
header('Content-Type: application/json');

$pending = [];
$winRate = 0;

$sql = "SELECT * FROM pending WHERE Status = 'Passed'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($rows){
    foreach($rows as $row){
    $pending[] = [
        "fullName" => $row['fullName'],
        "email" => $row['email'],
        "studentID" => $row['studentID'],
        "category" => $row['category'],
        "birthDate" => $row['birthDate'],
        "Status" => $row['Status']
    ];
}
echo json_encode($pending);
}else{
    // EMPTY
}
?>