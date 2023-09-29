<?php

    include_once('connection.php');

    require_once('principal.php');

    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="./css/pesquisa.css">
    
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>
    <div class="box">
        <form method="POST">
            <fieldset>
                <legend class="title"><b>NPS</b></legend>
                <br>
                <h3>
                    Pesquisa de Satisfação: 
                    <?php
                        getName($connection,$sql)
                    ?>
                </h3>

                    <?php
                        query($connection,$sql);

                    ?>

                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>