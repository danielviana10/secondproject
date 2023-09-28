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
    ctrl.data_termino     AS dataLimite,
    perg.input_type       AS pergType
        FROM
    nps_ctrl ctrl
        JOIN nps_conf conf
    ON ctrl.nps_conf_id = conf.id
        JOIN nps_item perg
    ON perg.nps_conf_id = conf.id
    WHERE
    TRUE
    AND ctrl.uuid = 'ead4a0b6-5d2b-11ee-a089-1c39475623d1'
    AND ctrl.data_inicio  >= '2023-09-26 00:00:00'
    AND ctrl.data_termino <= '2023-09-29 23:59:59'
    AND ctrl.respondida = 0
    AND conf.active = 'Y'
    AND perg.active = 'Y';";

    $result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="divSelect">';
            echo '<label for="first">';
                echo '<p>' . $row["pergDescricao"] . '</p>';
            echo '</label>';
                if ($row["pergType"] === "select") {
                    echo '<select name="resposta_'.$row["pergId"].'" id="id_'.$row["pergId"].'"  class="'.$row["pergType"].'" multiple required>';
                    echo '<option value="Sim" class="opt1">Sim</option>';
                    echo '<option value="Não" class="opt2">Não</option>';
                    echo '</select>';
                } else if ($row["pergType"] === "input"){
                    echo '<select name="resposta_'.$row["pergId"].'" id="id_'.$row["pergId"].'"  class="'.$row["pergType"].'" multiple required>';
                    echo '<option value="1" class="op1">1</option>';
                    echo '<option value="2" class="op2">2</option>';
                    echo '<option value="3" class="op3">3</option>';
                    echo '<option value="4" class="op4">4</option>';
                    echo '<option value="5" class="op5">5</option>';
                    echo '<option value="6" class="op6">6</option>';
                    echo '<option value="7" class="op7">7</option>';
                    echo '<option value="8" class="op8">8</option>';
                    echo '<option value="9" class="op9">9</option>';
                    echo '<option value="10" class="op10">10</option>';
                    echo '</select>';
                } else if($row["pergType"] === "text"){
                    echo '<input type="text" name="resposta_'.$row["pergId"].'" id="id_'.$row["pergId"].'"  class="'.$row["pergType"].'" required>';
                }
        echo '</div>';
    }
} else {
    echo "Nenhuma pergunta encontrada.";
}

$connection->close();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Formulário com Perguntas Dinâmicas</title>
</head>
<body>
    <form action="processa_formulario.php" method="post">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
