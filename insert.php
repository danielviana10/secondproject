<?php
    function queryInsert($row,$connection,$quests,$questsId,$confId,$id_user){

        if(isset($_POST['submit']))
        {
            $answer9 = $_POST['resposta_'. $row["pergId"]];

            $result9 = mysqli_query($connection, "INSERT INTO nps_hist (descricao ,resposta, nps_item_id, nps_conf_id, nps_cliente_id)
            VALUES ('$quests','$answer9', '$questsId','$confId','$id_user');");

            if($result9 == true){
                echo "<script>alert('Este é um alerta PHP!');</script>";
                header("Location: redirect.php");
            }
        }
    }
?>