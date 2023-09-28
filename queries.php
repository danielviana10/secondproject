<?php

session_start();

include_once('connection.php');

    function getQuests($connection){
 
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

        $result1 = $connection -> query($sql);

        if($result1-> num_rows > 0) {

            while ($row = $result1->fetch_assoc()){
                echo '<div class="divSelect">';
                echo '<label for="first">';
                    echo '<p>' . $row["pergDescricao"] .'</p>';
                echo '</label>';
                echo '</div>';

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

                $dataLimit[] = $row["dataLimite"];
                $quests = $row["pergDescricao"];
                $questsId = $row["pergId"];
                $confId = $row["confId"];
                $id_user = $row["userId"];


                if(isset($_POST['submit']))
                {
                    $answer9 = $_POST['resposta_'. $row["pergId"]];
        
                    $result9 = mysqli_query($connection, "INSERT INTO nps_hist (descricao ,resposta, nps_item_id, nps_conf_id, nps_cliente_id)
                    VALUES ('$quests','$answer9', '$questsId','$confId','$id_user');");
                }
            }

            $data_atual = time();
            if ($data_atual < $dataLimit[0]) {
                echo 'Desculpe, o prazo para enviar o formulário expirou.';
            } else {
                echo '<input type="submit" name="submit" id="submit">';
            }
        } else {
            echo "Nenhuma pergunta encontrada.";
        }
    }

    // function sendResponse($connection){

    //     if(isset($_POST['submit']))
    //         {
    //             $answer1 = $_POST['resposta_'.$pergId[0]];
    //             $answer2 = $_POST['resposta_'.$pergId[1]];
    //             $answer3 = $_POST['resposta_'.$pergId[2]];
    //             $answer4 = $_POST['resposta_'.$pergId[3]];
    
    //             $result = mysqli_query($connection, "INSERT INTO nps_hist (descricao ,resposta, nps_item_id, nps_conf_id, nps_cliente_id) 
    //             VALUES ('$perguntas_array[0]','$answer1', '$pergId[0]','$confId[0]','$id_user[0]')
    //             ,('$perguntas_array[1]','$answer2', '$pergId[1]','$confId[0]','$id_user[0]')
    //             ,('$perguntas_array[2]','$answer3', '$pergId[2]','$confId[0]','$id_user[0]')
    //             ,('$perguntas_array[3]','$answer4', '$pergId[3]','$confId[0]','$id_user[0]');
    //             ");
    //         }

    // }
    

        

        
        
    
 
    
    



?>