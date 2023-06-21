<?php

$id = $_POST['id'];
require "../../connect.php";

$delete_id = "DELETE FROM `barber_shop` WHERE `barber_shop`.`barber_id` = '$id'";
mysqli_query($connect, $delete_id);
$query = mysqli_query($connect, "SELECT * FROM `barber` WHERE `barber_id` = '$id' ");
$fetch = mysqli_fetch_assoc($query);
$delete_file = $fetch['avatar'];
$delete_id = "DELETE FROM `barber` WHERE `barber`.`barber_id` = '$id'";
mysqli_query($connect, $delete_id);

