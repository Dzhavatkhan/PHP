<?php

session_start();
require "../connect.php";
$id = $_GET['id'];
if ($id == NULL) {
    $id = $_POST['id'];
}

$name = $_POST['name'];

$login = $_POST['login'];

$phone = $_POST['phone'];

if (empty($name)) {
    $query = "UPDATE `clients` SET `login` = '$login', `phone_number` = '$phone' WHERE `clients`.`id` = '$id'";
}

elseif (empty($login)) {
    $query = "UPDATE `clients` SET `client_name` = '$name', `phone_number` = '$phone' WHERE `clients`.`id` = $id";
}

elseif (empty($phone)) {
    $query = "UPDATE `clients` SET `login` = '$login', `client_name` = '$name' WHERE `clients`.`id` = $id";
}


else {
    $query = "UPDATE `clients` SET `login` = '$login', `client_name` = '$name', `phone_number` = '$phone' WHERE `clients`.`id` = $id";
}
$phone_pattern = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
$name_pattern = '/^.*[^А-яЁё].*$/';
$login_pattern_1 = '/^[A-Za-z0-9_\.]+$/';
$login_pattern_2 = 4;
if (!preg_match($name_pattern, $name)) {
    $_SESSION['error'] = 'Имя заполнено некорректно';
    header("Location: update.php?id=$id");
}
elseif (!preg_match($phone_pattern, $phone)) {
    $_SESSION['error'] = 'Номер телефона заполнен некорректно';
    header("Location: update.php?id=$id");
}
elseif (!preg_match($login_pattern_1, $login)) {
    $_SESSION['error'] = 'Логин должен содержать только латинские буквы';
    header("Location: update.php?id=$id");
}elseif(strlen($login) < $login_pattern_2){
    $_SESSION['error'] = 'Логин должен содержать не менее 4 символов';
    header("Location: update.php?id=$id");
}

else {
    mysqli_query($connect, $query);
    header("Location: ./profile.php");
}



