<?php
$filePath = 'C:\xampp\htdocs\SportsMS\src\Data\emailconfig.json';
$scriptPath = 'C:\xampp\htdocs\SportsMS\src\Scripts\automatedEmail.js';
$projectDir = 'C:\xampp\htdocs\SportsMS';
$nodePath = 'C:\Program Files\nodejs\node.exe';
if(!empty($_POST['email'])&&!empty($_POST['text'])){

    $newData = [
        "to" => $_POST['email'],
        "subject" => "UMDC Sports Department - ADMIN",
        "text" => $_POST['text']
    ];

    $jsonData = json_encode($newData, JSON_PRETTY_PRINT);

    if (file_put_contents($filePath, $jsonData)) {
        // echo "JSON updated successfully!";
        $command = "cd \"$projectDir\" && \"$nodePath\" \"$scriptPath\"";
        $output = shell_exec($command);
        echo "Success";
    } else {
        echo "Failed to update JSON file.";
    }

}else{
    echo "Error";
}
?>