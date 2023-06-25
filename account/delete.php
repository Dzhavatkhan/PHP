<?php


require "../connect.php";

$id = $_POST['id'];
$query = "SELECT * FROM `barber_shop` WHERE `barber_shop`.`client_id` = '$id'";
$query_q = mysqli_query($connect, $query);
$record = mysqli_fetch_assoc($query_q);
$record = $record['record_id'];
$query = "DELETE FROM `barber_shop` WHERE `barber_shop`.`record_id` = '$record'";
$query = mysqli_query($connect, $query);

if($query){
    $query = mysqli_query($connect, "DELETE FROM `booking_records` WHERE `booking_records`.`record_id` = '$record'");
    var_dump($query);
}
echo $id, "is id";