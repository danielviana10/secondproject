<?php
    session_start();

    
    include_once('connection.php');

    $sql1 = "SELECT * FROM nps_ctrl";

    $result1 = $connection -> query($sql1);

    if($result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()){
            $uuidAct[] = $row1['uuid'];
        }
    }

    $urlWithUUID = "pesquisa.php?uuid=" . urldecode(($uuidAct[0]));

    header("Location: " . $urlWithUUID);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
</body>
</html>