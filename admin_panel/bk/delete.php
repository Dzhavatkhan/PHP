<?php

require "../../connect.php";

$id = $_POST['id'];

$delete = "DELETE FROM `barber_shop` WHERE `barber_shop`.`id` = $id";

$delete = mysqli_query($connect, $delete);
var_dump($delete);