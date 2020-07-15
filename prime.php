<?php 
    $primeList = array();
    function IsPrime($n)
    {
        for($x=2; $x<$n; $x++)
        {
            if($n %$x ==0){
                return 0;
            }
        }
        return 1;
    }
    if(isset($_POST['sub'])){
        $n1 = $_POST['number1'];
        $n2 = $_POST['number2'];
        for ($i = $n1; $i <= $n2; $i++){
            $flag = IsPrime($i);
            if($flag == 1){
                array_push($primeList, $i);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prime</title>
</head>
<body>
    <form action="prime.php" method="POST">
        <label for="number1">Enter N1:</label>
        <input type="number" name="number1"><br><br>

        <label for="number2">Enter N2:</label>
        <input type="number" name="number2"><br><br>

        <input type="submit" name="sub" value="Prime No.s between N1 and N2">
    </form>   
    <?php
        if(isset($_POST['sub'])){
            echo '<h3>Prime numbers between '. $n1. ' and '. $n2. ' are:</h3>';
            echo '<ul>';
            for($i = 0; $i < sizeof($primeList); $i++){
                echo '<li>'.$primeList[$i].'</li>';
            }
            echo '</ul>'; 
        }
    ?>
</body>
</html>