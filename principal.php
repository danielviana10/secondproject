<?php

session_start();

include_once('connection.php');

require 'quests.php';

require 'insert.php';
       

 
        $sql = "SELECT 
        conf.id               AS confId,
        conf.descricao        AS confDescricao, 
        perg.id               AS pergId,  
        perg.descricao        AS pergDescricao,
        ctrl.nps_cliente_id   AS userId,
        ctrl.data_termino     AS dataLimite,
        perg.input_type       AS pergType,
		client.descricao      AS clientName
            FROM
        nps_ctrl ctrl
            JOIN nps_conf conf
        ON ctrl.nps_conf_id = conf.id
            JOIN nps_item perg
        ON perg.nps_conf_id = conf.id
            JOIN nps_cliente client
        ON ctrl.nps_cliente_id = client.id
        WHERE
        TRUE
        AND ctrl.uuid = 'ead4a0b6-5d2b-11ee-a089-1c39475623d1'
        AND ctrl.data_inicio  >= '2023-09-26 00:00:00'
        AND ctrl.data_termino <= '2023-09-29 23:59:59'
        AND ctrl.respondida = 0
        AND conf.active = 'Y'
        AND perg.active = 'Y';";

        $sql3 = "SELECT nps_cliente_id  FROM nps_hist nh;";

        function validate($connection,$sql3){
            $result3 = $connection -> query($sql3);

            if($result3 -> num_rows > 0){
                while($row3 = $result3 -> fetch_assoc()){
                    $respondido[] = $row3["nps_cliente_id"];
                }
                redirectResponse($respondido);
            }
        }


        function getName($connection,$sql){
            $result2 = $connection -> query($sql);
        
            if($result2-> num_rows > 0) {
                while($row2 = $result2->fetch_assoc()){
                    $clientName[] = $row2["clientName"];
                }
                getUserName($clientName);
            }
        }
        function query($connection,$sql){

        $result1 = $connection -> query($sql);
        
        if($result1-> num_rows > 0) {
  
            

            while($row = $result1->fetch_assoc()){    
                
                $dataLimit[] = $row["dataLimite"];
                $quests = $row["pergDescricao"];
                $questsId = $row["pergId"];
                $confId = $row["confId"];
                $id_user = $row["userId"];
                if($row["pergType"] === "select") {
                    getTypeSelect($row);
                }

                else if($row["pergType"] === "input") {
                    getTypeInput($row);
                }

                else if(($row["pergType"] === "text")){
                    getTypeText($row);
                }
                queryInsert($row,$connection,$quests,$questsId,$confId,$id_user);
            }


            buttonSubmit($row,$dataLimit);
            
        }
        else {
            echo "Nenhuma pergunta encontrada.";
        }
    }
?>

