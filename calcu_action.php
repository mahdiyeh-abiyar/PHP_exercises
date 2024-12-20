<?php
$number1 = isset($_POST["number1"]) && !empty($_POST["number1"]) ? (float)$_POST["number1"] : null;
$number2 = isset($_POST["number2"]) && !empty($_POST["number2"]) ? (float)$_POST["number2"] : null;
$operator = isset($_POST["operator"]) && !empty($_POST["operator"]) ? $_POST["operator"] : null;


if ($number1 === null || $number2 === null || $operator === null || $operator === "") {
    echo "Error: Invalid input.";
    exit;
}

$result = null;


switch ($operator) {
    case '+':
        $result = $number1 + $number2;
        break;
    case '-':
        $result = $number1 - $number2;
        break;
    case '*':
        $result = $number1 * $number2;
        break;
    case '/':
        if ($number2 == 0) {
            echo "Error: Division by zero.";
            exit;
        }
        $result = $number1 / $number2;
        break;
    default:
        echo "Error: Invalid operator.";
        exit;
}


echo $result;
?>