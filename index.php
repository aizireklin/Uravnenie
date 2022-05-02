<?php

$result = "Уравнение не задано";

if (isset($_POST['submit'])) {
    $eq = $_POST['eq'];
    $eq = str_replace(" ", "", $eq);
    $operations = array("+", "-", "/", "*");

    $result = 0;
    $operation = "";
    $numbers = array();
    $str_array = explode("=", $eq);

    $first = "";
    $second = "";

    for ($i = 0; $i < strlen($eq); $i++) {
        if (in_array($eq[$i], $operations)) $operation = $eq[$i];
    }

    if (strpos($str_array[0], "x") !== false) {
        $first = $str_array[0];
        $second = $str_array[1];
    } else {
        $first = $str_array[1];
        $second = $str_array[0];
    }

    if (strlen($first) == 1) {
        $numbers = explode($operation, $second);

        if ($operation == "+") {
            $result = (int)$numbers[0] + (int)$numbers[1];
        } elseif ($operation == "-") {
            $result = (int)$numbers[0] - (int)$numbers[1];
        } elseif ($operation == "*") {
            $result = (int)$numbers[0] * (int)$numbers[1];
        } else {
            $result = (int)$numbers[0] / (int)$numbers[1];
        }
    } else {
        if ($first[0] == "x") {
            $numbers = array(explode($operation, $first)[1], $second);
            

            if ($operation == "+") {
                $result = (int)$numbers[1] - (int)$numbers[0];
            } elseif ($operation == "-") {
                $result = (int)$numbers[1] + (int)$numbers[0];
            } elseif ($operation == "*") {
                $result = (int)$numbers[1] / (int)$numbers[0];
            } else {
                $result = (int)$numbers[1] * (int)$numbers[0];
            }
        } else {
            $numbers = array(explode($operation, $first)[0], $second);
            if ($operation == "+") {
                $result = (int)$numbers[1] - (int)$numbers[0];
            } elseif ($operation == "-") {
                $result = (int)$numbers[0] - (int)$numbers[1];
            } elseif ($operation == "*") {
                $result = (int)$numbers[0] / (int)$numbers[1];
            } else {
                $result = (int)$numbers[0] / (int)$numbers[1];
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Уравнение</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main class="view">
        <h1 class="view__title">Решение уравнения</h1>
        <form action="index.php" method="post" class="form">
            <label for="eq" class="form__label">Уравнение</label>
            <input clss="form__input" type="text" id="eq" name="eq" value="x / 8 = 6">
            <button class="form__button" name="submit">Решить</button>
        </form>
        <div class="view__result">Результат: <?=$result?></div>
    </main>
</body>
</html>