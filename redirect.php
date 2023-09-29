<?php
    include_once('connection.php');

    require_once('principal.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>

    <link rel="stylesheet" href="./css/redirect.css">
    <script src="https://use.fontawesome.com/fe459689b4.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
</head>
<body>
    <div class="box">
        <fieldset class='fieldRedirect'>
            <h2>
                <?php
                    getName($connection,$sql);
                ?>
            </h2>


            <p>
                <?php
                    validate($connection,$sql3)
                ?>
                
            </p>
        </fieldset>
    </div>
</body>
</html>