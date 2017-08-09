<?php

$response1 = file_get_contents('https://mightysignal.com/challenge/payment_seed');
$response2 = file_get_contents('seedData.txt');

if($response2!="") {
    $response = json_encode(array_merge(json_decode($response1), json_decode($response2)));
}else{
    $response = $response1;
}

echo $response;

//$resArray = json_decode($response);
//foreach ($resArray as $key => $value) {
//    $resultArray [$key]['x'] = $value->date;
//    $resultArray [$key]['y'] = $value->amount;
//}
//
//$resultJSON = json_encode($resultArray);
//
//return $resultJSON;