<?php

// include_once 'classes/StudentManagement.php';
// $st=new StudentManagement();



// $visitor_ip = $_SERVER['REMOTE_ADDR'];
// $address = $_SERVER['REMOTE_ADDR'];
// echo $visitor_ip;
// $date = date("y-m-d");
// $query = "SELECT * FROM visiterCounter where visitor_ip='$visitor_ip' and date='$date'";
// $result=$st->getAllRecordByQuery($query); 
// $count = 1;
// $query = "SELECT * FROM visiterCounter ORDER BY id desc";
// $res=$st->getAllRecordByQuery($query);
// if($res){
//     $getAll=$res->fetch_assoc();
//     $count = $getAll['count'] +1;
// }

// if(!$result){
    
//     $query1 = "INSERT INTO visiterCounter(visitor_ip,count,date) VALUES('$visitor_ip','$count','$date')";
//     $result1=$st->getAllRecordByQuery($query1);
//     echo "Done";
// }else{
//     echo "Not Done";
// }
 ?>
 
 
 
 <?php
require_once("geo/geoip2.phar");
use GeoIp2\Database\Reader;
// City DB
$reader = new Reader('/path/to/GeoLite2-City.mmdb');
$record = $reader->city($_SERVER['REMOTE_ADDR']);
// or for Country DB
// $reader = new Reader('/path/to/GeoLite2-Country.mmdb');
// $record = $reader->country($_SERVER['REMOTE_ADDR']);
print($record->country->isoCode . "\n");
print($record->country->name . "\n");
print($record->country->names['zh-CN'] . "\n");
print($record->mostSpecificSubdivision->name . "\n");
print($record->mostSpecificSubdivision->isoCode . "\n");
print($record->city->name . "\n");
print($record->postal->code . "\n");
print($record->location->latitude . "\n");
print($record->location->longitude . "\n");
?>