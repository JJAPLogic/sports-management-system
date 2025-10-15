<?php 
include 'connection.php';
header('Content-Type: application/json');

$members = [];
$winRate = 0;

$sql = "SELECT * FROM athletes";
$stmt = $conn->prepare($sql);
$stmt->execute();
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

if($rows){

    foreach($rows as $row){
    if ($row['Games'] > 0) {
            $winRate = round(($row['Wins'] / $row['Games']) * 100, 2);
        } else {
            $winRate = 0; // default to 0% if no games played
        }
    $members[] = [
        "name" => $row['Name'],
        "email" => $row['Email'],
        "status" => $row['Status'],
        "category" => $row['Category'],
        "code" => $row['Code'],
        "birthDate" => $row['BirthDate'],
        "games"=> $row['Games'],
        "wins" => $row['Wins'],
        "loses" => $row['Loses'],
        "performance" => $winRate,
        "coach" => $row['Coach']
    ];
}
echo json_encode($members);
}else{
    // EMPTY
}
?>