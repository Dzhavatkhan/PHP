<?php
require "../../connect.php";
$ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$filename = uniqid().'.'.$ex;

$location = "../../assets/uploads/".$filename;
move_uploaded_file($_FILES['file']['tmp_name'], $location);

$name = $_POST['name'];
print_r($name);

$addB = mysqli_query($connect, "INSERT INTO `barber` (`barber_id`, `name`, `avatar`) VALUES (NULL, '$name', '$filename')");
var_dump($addB);
?>
