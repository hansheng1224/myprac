<?php
function dd($data)
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

// $data = $_GET;
$data=[
    'name'=>'amy',
    'mobile'=>'0911-111-111',
];

$num1 = $data['num1'];
$num2 = $data['num2'];
$option = $data['option'];
$result = 0;
switch ($option) {
    case "+":
        $result = $num1 + $num2;
        break;
    case "-":
        $result = $num1 - $num2;
        break;
    case "*":
        $result = $num1 * $num2;
        break;
    case "/":
        $result = $num1 / $num2;
        break;


    default:
        $result = 'option 請輸入+ - * /';
}

// dd($data);
$myArr = [
    'num1' => $num1,
    'num2' => $num2,
    'result' => $result,
];
echo json_encode($myArr);
