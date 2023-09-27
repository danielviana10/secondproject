<?php


    session_start();

    include_once('connection.php');

    if (isset($_GET['uuid'])) {
        
        $uuid = $_GET['uuid'];

    }


        $sql = "SELECT 
        conf.id               AS confId,
        conf.descricao        AS confDescricao, 
        perg.id               AS pergId,  
        perg.descricao        AS pergDescricao,
        ctrl.nps_cliente_id   AS userId,
        ctrl.data_termino     AS dataLimite
            FROM
        nps_ctrl ctrl
            JOIN nps_conf conf
        ON ctrl.nps_conf_id = conf.id
            JOIN nps_item perg
        ON perg.nps_conf_id = conf.id
        WHERE
        TRUE
        AND ctrl.uuid = '$uuid'
        AND ctrl.data_inicio  >= '2023-09-26 00:00:00'
        AND ctrl.data_termino <= '2023-09-29 23:59:59'
        AND ctrl.respondida = 0
        AND conf.active = 'Y'
        AND perg.active = 'Y';";

        $result1 = $connection -> query($sql);


        if($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()){
            $perguntas_array[] = $row['pergDescricao'];
            $id_user[] = $row['userId'];
            $pergId[] = $row['pergId'];
            $confId[] = $row['confId'];
            $dataLimit[] = $row['dataLimite'];
        }
    }

    // query para pegar a informações do user
    $sql2 = "SELECT * FROM nps_cliente WHERE id = $id_user[0]";

    $result2 = $connection -> query($sql2);

    if($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()){
            $name = $row2['descricao'];
            $id = $row2['id'];
        }
    }


    if(isset($_POST['submit']))
        {
            $answer1 = $_POST['first'];
            $answer2 = $_POST['second'];
            $answer3 = $_POST['third'];
            $answer4 = $_POST['fourth'];

            $result = mysqli_query($connection, "INSERT INTO nps_hist (descricao ,resposta, nps_item_id, nps_conf_id, nps_cliente_id) 
            VALUES ('$perguntas_array[0]','$answer1', '$pergId[0]','$confId[0]','$id_user[0]')
            ,('$perguntas_array[1]','$answer2', '$pergId[1]','$confId[0]','$id_user[0]')
            ,('$perguntas_array[2]','$answer3', '$pergId[2]','$confId[0]','$id_user[0]')
            ,('$perguntas_array[3]','$answer4', '$pergId[3]','$confId[0]','$id_user[0]');
            ");
        }

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
        <form action='pesquisa.php?uuid=<?php echo $uuid ?>'   method="POST">
            <fieldset>
                <legend class="title"><b>NPS</b></legend>
                <br>
                <h3>Pesquisa de satisfação: <?php echo $name ?></h3>
                <div class="divSelect">     
                    <label for="first">
                        <?php echo $perguntas_array[0]; ?>
                    </label>   
                    <select name="first" id="answer1" class="choose" multiple required>
                        <option value="Sim" class="opt1">Sim</option>
                        <option value="Não" class="opt2">Não</option>
                    </select>  
                </div>
                <br>
                <div class="divSelect">
                    <label for="second">
                        <?php echo $perguntas_array[1]; ?>
                    </label>
                    <select name="second" id="answer2" class="choose" multiple required>
                        <option value="Sim" class="opt1">Sim</option>
                        <option value="Não" class="opt2">Não</option>
                    </select>  
                </div>
                    <p>
                    <?php echo $perguntas_array[2]; ?>
                    </p>
                    <select name="third" id="answer3" class="choose" multiple required>
                        <option value="1" class="op1">1</option>
                        <option value="2" class="op2">2</option>
                        <option value="3" class="op3">3</option>
                        <option value="4" class="op4">4</option>
                        <option value="5" class="op5">5</option>
                        <option value="6" class="op6">6</option>
                        <option value="7" class="op7">7</option>
                        <option value="8" class="op8">8</option>
                        <option value="9" class="op9">9</option>
                        <option value="10" class="op10">10</option>
                    </select>
                    <br><br>
                <div class="divText">
                    <label for="fourth">
                        <?php echo $perguntas_array[3]; ?>
                    </label>
                    <input type="text" name="fourth" id="answer4" required>
                </div>
                <br>
                <div class="container">   

                <?php
                    $data_limite = $dataLimit;
                    $data_atual = time();

                    if ($data_atual > $data_limite) {
                        echo 'Desculpe, o prazo para enviar o formulário expirou.';
                    } else {
                        echo '<input type="submit" name="submit" id="submit">';
                    }
                ?>
                    
                </div>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>