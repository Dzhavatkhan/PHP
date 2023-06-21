<?php

require("connect.php");
session_start();
$client_name = $_POST['client_name'];
$phone_number = $_POST['phone'];
$login = $_POST['login'];
$password = $_POST['password'];
$password_config = $_POST['password_conf'];
// need open link for php https://intelephense.com/

if($password_config == $password){

    $phone_pattern = '/^(\+7|7|8)?[\s\-]?\(?[489][0-9]{2}\)?[\s\-]?[0-9]{3}[\s\-]?[0-9]{2}[\s\-]?[0-9]{2}$/';
    $password_pattern = 8;
    $name_pattern = '/^.*[^А-яЁё].*$/';
    $login_pattern_1 = '/^[A-Za-z0-9_\.]+$/';
    $login_pattern_2 = 4;
    
    if (!preg_match($name_pattern, $client_name)) {
        $_SESSION['error'] = 'Имя заполнено некорректно';
        header("Location: /account/registration.php");
    }
    elseif (!preg_match($phone_pattern, $phone_number)) {
        $_SESSION['error'] = 'Номер телефона заполнен некорректно';
        header("Location: /account/registration.php");
    }
    elseif (!preg_match($login_pattern_1, $login)) {
        $_SESSION['error'] = 'Логин должен содержать латинские буквы';
        header("Location: /account/registration.php");
    }
    elseif (strlen($login) < $login_pattern_2) {
        $_SESSION['error'] = 'Логин должен содержать не менее 4 символов';
        header("Location: /account/registration.php");
    }
    elseif (strlen($password) < $password_pattern) {
        $_SESSION['error'] = 'Пароль должен быть не менее 8 символов';
        header("Location: /account/registration.php");
    }
    else {
        # code...
    


    $select = mysqli_query($con, "SELECT * FROM `clients` WHERE `login` = '$login' OR `phone_number`='$phone_number'");
    if(mysqli_num_rows($select) > 0){
        $_SESSION['error'] = "Такой аккаунт уже существует";
        header("Location: /account/registration.php");
    }
    elseif (empty($client_name) && empty($login)  && empty($phone_number)  && empty($password)) {
        $_SESSION['error'] = "Поля пусты";
        header("Location: /account/registration.php");
    }
    elseif (empty($login)) {
        $_SESSION['error'] = "Вы не заполнили логин ";
        header("Location: /account/registration.php");
    }
    elseif (empty($password)) {
        $_SESSION['error'] = "Вы не заполнили пароль ";
        header("Location: /account/registration.php");
    }
    elseif (empty($client_name)) {
        $_SESSION['error'] = "Вы не заполнили имя";
        header("Location: /account/registration.php");
    }
    elseif (empty($phone_number)) {
        $_SESSION['error'] = "Вы не заполнили номер телефона";
        header("Location: /account/registration.php");
    }

    elseif (empty($client_name) && empty($login)  || empty($phone_number) &&  empty($password)) {
        $_SESSION['error'] = "Вы не заполнили несколько полей";
        header("Location: /account/registration.php");
    }
    elseif (empty($client_name) && empty($password)  || empty($phone_number) &&  empty($login)) {
        $_SESSION['error'] = "Вы не заполнили несколько полей";
        header("Location: /account/registration.php");
    }
    else {
        $insert = "INSERT INTO `clients` (`id`, `login`, `client_name`, `password`,  `phone_number`) VALUES (NULL, :login, :client_name,  :password, :phone_number)";
        $sql = $connect->prepare($insert);
        $sql->bindParam(":login", $login);
        $sql->bindParam(":client_name", $client_name);
        $sql->bindParam(":password", md5($password));
        $sql->bindParam(":phone_number", $phone_number);
        $send = $sql->execute();
        header("Location: /account/index.php");
    }

    }
}
else{
    $_SESSION['error'] = "Пароли не совпадают";
    header("Location: /account/registration.php");
}


