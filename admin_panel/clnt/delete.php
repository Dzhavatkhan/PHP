<?php


require "../../connect.php";

$id = $_POST['id'];

$delete_id = "DELETE FROM `barber_shop` WHERE `barber_shop`.`client_id` = '$id'";
mysqli_query($connect, $delete_id);

$delete_id = "DELETE FROM `clients` WHERE `clients`.`id` = '$id'";
mysqli_query($connect, $delete_id);