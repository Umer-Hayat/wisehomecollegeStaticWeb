<?php

include_once 'classes/StudentManagement.php';
$st=new StudentManagement();



$visitor_ip = $_SERVER['REMOTE_ADDR'];

// echo $visitor_ip;
$date = date("y-m-d");
$query = "SELECT * FROM visiterCounter where visitor_ip='$visitor_ip' and date='$date'";
$result=$st->getAllRecordByQuery($query); 
$count = 1;
$query = "SELECT * FROM visiterCounter ORDER BY id desc";
$res=$st->getAllRecordByQuery($query);
if($res){
    $getAll=$res->fetch_assoc();
    $count = $getAll['count'] +1;
}

if(!$result){
    
    $query1 = "INSERT INTO visiterCounter(visitor_ip,count,date) VALUES('$visitor_ip','$count','$date')";
    $result1=$st->getAllRecordByQuery($query1);
    echo "Done";
}else{
    echo "Not Done";
}
 ?>