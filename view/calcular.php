<?php
$content = file_get_contents("php://input");
$json = json_decode($content);
if ($json) {
    $num1 = $json->num1;
    $num2 = $json->num2;
    $operator = $json->operator;
    $result = 0;

    switch($operator) {
        case 'soma':
            $result = $num1 + $num2;
            break;
        case 'subtrair':
            $result = $num1 - $num2;
            break;
        case 'multiplicar':
            $result = $num1 * $num2;
            break;
        case 'dividir':
            if ($num2 != 0) {
                $result = $num1 / $num2;
            } else {
                $result = "Divisão por zero não é possível";
            }
            break;
        default:
            $result = "Operação inválida";
    }

    echo $result;
}
?>