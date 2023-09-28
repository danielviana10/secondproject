<?php

    $result4 = $connection -> query($sql);

    if ($result4->num_rows > 0) {
        while ($row4 = $result4->fetch_assoc()) {

            
            echo '<div class="divSelect">';
                echo '<label for="first">';
                    echo '<p>' . $row4["pergDescricao"] . '</p>';
                echo '</label>';
                    if ($row4["pergType"] === "select") {
                        echo '<select name="resposta_'.$row4["pergId"].'" id="id_'.$row4["pergId"].'"  class="'.$row4["pergType"].'" multiple required>';
                        echo '<option value="Sim" class="opt1">Sim</option>';
                        echo '<option value="Não" class="opt2">Não</option>';
                        echo '</select>';
                    } else if ($row4["pergType"] === "input"){
                        echo '<select name="resposta_'.$row4["pergId"].'" id="id_'.$row4["pergId"].'"  class="'.$row4["pergType"].'" multiple required>';
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
                    } else if($row4["pergType"] === "text"){
                        echo '<input type="text" name="resposta_'.$row4["pergId"].'" id="id_'.$row4["pergId"].'"  class="'.$row4["pergType"].'" required>';
                    }
            echo '</div>';
        }
    } else {
        echo "Nenhuma pergunta encontrada.";
    }

?>