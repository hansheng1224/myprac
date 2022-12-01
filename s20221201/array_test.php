<?php
function dd($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

$indexArr = [1,2,3];
dd($indexArr);
dd($indexArr[0]);
dd($indexArr[1]);
dd($indexArr[2]);

$assocArr=[
    's1' => 'amy',
    's2' => 'bob',
    's3' => 'cat'
];
dd($assocArr);
dd($assocArr['s1']);
dd($assocArr['s2']);
dd($assocArr['s3']);

//Multidimensional Arrays
$multiArr = [
    [
        'name' => 'amy',
        'num' => '01',
        'tel' => '0911-111-111',
        'love' => ['閱讀','打球']
    ],
    [
        'name' => 'bob',
        'num' => '02',
        'tel' => '0922-222-222',
        'love' => ['睡覺','打球']
    ],
    [
        'name' => 'cat',
        'num' => '03',
        'tel' => '0933-333-333'
    ],
  
];
dd($multiArr);
dd($multiArr[0]);
dd($multiArr[1]);
dd($multiArr[2]);

dd($multiArr[0]['name']);
dd($multiArr[0]['tel']);
dd($multiArr[0]['love']);
dd($multiArr[0]['love'][0]);
dd($multiArr[0]['love'][1]);

// 選五支手機 mobileArr 
// name price 組二維陣列
// 北 中 南 location 三維陣列
// 1. 北 中 南
// 2. 中
// 3. 北 南
// 4. 中 南
// 5. 北 中 南

$mobileArr = [
    [
        'name' => 'Apple iPhone 14 128G',
        'price' => '25800',
        'location' => ['北' , '中' , '南']
    ],
    [
        'name' => 'Apple iPhone 14 256G',
        'price' => '28500',
        'location' => ['中']
    ],
    [
        'name' => 'Apple iPhone 14 512G',
        'price' => '38400',
        'location' => ['北' , '南']
    ],
    [
        'name' => 'Apple iPhone 14 Plus 128G',
        'price' => '29800',
        'location' => ['中' , '南']
    ],
    [
        'name' => 'Apple iPhone 14 Plus 128G 紫',
        'price' => '29990',
        'location' => ['北' , '中' , '南']
    ],
];
dd($mobileArr);


foreach ($mobileArr as $key => $value) {
    echo '<hr>';
   dd($value);
}

?>
