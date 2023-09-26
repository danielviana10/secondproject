<!-- <?php
    
    include_once('connection.php');

    // query para pegar a informações do user
    $sql2 = "SELECT * FROM users WHERE id = 2";

    $result2 = $connection -> query($sql2);

    if($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()){
            $name = $row2['name'];
            $id = $row2['id'];
        }
    }


    $sql3 = "SELECT * FROM npsresponse WHERE id = $id";

    $result3 = $connection -> query($sql3);

    if($result3->num_rows > 0){
        header("Location: http://localhost/npsproject/final.php");
        exit();
    } else {
        if(isset($_POST['submit']))
            {
                $answer1 = $_POST['first'];
                $answer2 = $_POST['second'];
                $answer3 = $_POST['third'];
                $answer4 = $_POST['fourth'];

                $result = mysqli_query($connection, "INSERT INTO npsresponse(response1, response2, response3, response4, userId) VALUES ('$answer1','$answer2','$answer3','$answer4', '$id')");

                header("Location: http://localhost/npsproject/final.php");
                exit();
            }
    }

    $sql = "SELECT * FROM npspesquisa ORDER BY id";

    $result1 = $connection -> query($sql);

    if($result1->num_rows > 0) {
        while ($row = $result1->fetch_assoc()){
            $primeira = $row['quest1'];
            $segunda = $row['quest2'];
            $terceira = $row['quest3'];
            $quarta = $row['quest4'];
        }
    }




?> -->


<!DOCTYPE html>
<html lang="en">
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
        <form action="index.php"  method="POST">
            <fieldset>
                <legend class="title"><b>NPS</b></legend>
                <br>
                <h3>Pesquisa de satisfação: <?php echo $name ?></h3>
                <div class="divSelect">     
                    <label for="first">
                        <?php echo $primeira; ?>
                    </label>   
                    <select name="first" id="answer1" class="choose" multiple required>
                        <option value="Sim" class="opt1">Sim</option>
                        <option value="Não" class="opt2">Não</option>
                    </select>  
                </div>
                <br>
                <div class="divSelect">
                    <label for="second">
                        <?php echo $segunda; ?>
                    </label>
                    <select name="second" id="answer2" class="choose" multiple required>
                        <option value="Sim" class="opt1">Sim</option>
                        <option value="Não" class="opt2">Não</option>
                    </select>  
                </div>
                    <p>
                    <?php echo $terceira; ?>
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
                        <?php echo $quarta; ?>
                    </label>
                    <input type="text" name="fourth" id="answer4" required>
                </div>
                <br>
                <div class="container">   
                    <input type="submit" name="submit" id="submit">
                </div>
                <br><br>
            </fieldset>
        </form>
    </div>
</body>
</html>