<?php

if(! isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest'){
  die(json_encode(array('status'=>"不正な呼び出しです。")));
}

$value = array(
  1=> array('item'=>"ラーメン", 'price' => 580, 'orders'=> 113),
  2=> array('item'=>"うどん", 'price' => 190, 'orders'=> 13),
  3=> array('item'=>"蕎麦", 'price' => 400, 'orders'=> 72),
);

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($value);

?>