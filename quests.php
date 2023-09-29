<?php
    function getTypeSelect($row){
        echo '<div class="divSelect">';
            echo '<label for="first">';
                echo $row["pergDescricao"];
            echo '</label>';
                echo '<select name="resposta_'.$row["pergId"].'" id="id_'.$row["pergId"].'"  class="'.$row["pergType"].'" multiple required>';
                echo '<option value="Sim" class="opt1">Sim</option>';
                echo '<option value="Não" class="opt2">Não</option>';
                echo '</select>';
        echo '</div>';
        echo '<br>';
    }

    function getTypeInput($row){
        echo '<p>' . $row["pergDescricao"] . '</p>';
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
        echo '<br>'.'<br>';
    }


    function getTypeText($row){
        echo '<div class="divText">';
            echo '<label for="fourth">';
                echo  $row["pergDescricao"];
            echo '</label>';
            echo '<input type="text" name="resposta_'.$row["pergId"].'" id="id_'.$row["pergId"].'"  class="'.$row["pergType"].'" required>';
        echo '</div>';
        echo '<br>';
    }

    function buttonSubmit($row,$dataLimit){
        $data_atual = time();
        if ($data_atual > $dataLimit[0]) {
            echo 'Desculpe, o prazo para enviar o formulário expirou.';
        } else {
            echo '<input type="submit" name="submit" id="submit">';
        }
    }

    function getUserName($clientName){
        echo $clientName[0];
    }

    function redirectResponse($respondido){
        echo $respondido;
        if($respondido){
                echo "Você já respondeu o nosso NPS, muito obrigado!";
            } else {
                echo "Obrigado por responder nossa pesquisa de satisfação!";
            }
        }
?>