<?php

    include_once('connection.php');

    require_once('queries.php');

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="index.css">
    
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>
    <div class="box">
        <form action='pesquisa.php?uuid='   method="POST">
            <fieldset>
                <legend class="title"><b>NPS</b></legend>
                <br>
                <h3>Pesquisa de satisfação: </h3>
 

                <div class="container">   
                    <?php
                        getQuests($connection);
                    ?>
                </div>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>