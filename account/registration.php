<?php

session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/reg.css">
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <title>Регистрация</title>
</head>
<body>
    <a href="../index.php">
        <img class="back" src="/assets/img/left-white.png" alt="">        
    </a>

<div class="container mt-3">
    <h2>Регистрация</h2>

    <?php if(isset($_SESSION['error'])):?>
        <div class="alert text-center" style="width: 564px !important; background-color: white !important; color: #032785 !important; position: relative; left: 378px !important; top:25px;" > <?=$_SESSION['error'];?></div>
        <?php unset($_SESSION['error']);?>
        <?php endif;?>

    <form action="/account/register.php" method="post" class="form">
        <div class="mb-3">
            <input type="text" data-bs-toggle="tooltip" title="Должно быть заполенено на кириллице" name="client_name" class="form-control" placeholder="Введите Ваше имя">
        </div>
        <div class="mb-3">
            <input type="text" data-bs-toggle="tooltip" title="Номер телефона должен начинаться с '+' или '8'и быть не более 12 символов " name="phone" class="form-control" placeholder="Введите Ваш номер телефона">
        </div>
        <div class="mb-3">
            <input type="text" data-bs-toggle="tooltip" title="Логин должен содержать латинские буквы и быть более 4 символов" name="login" class="form-control"  placeholder="Введите логин">
        </div>
        <div class="mb-3">
            <input type="password" data-bs-toggle="tooltip" title="Пароль должен быть больше 7 символов!" name="password" class="form-control"  placeholder="Введите пароль">
        </div>
        <div class="mb-3">
            <input type="password" name="password_conf" class="form-control"  placeholder="Подтвредите пароль">
        </div>


        <input type="submit" value="Отправить" name="submit" class="btn btn-primary">
        <p>У вас уже есть аккаунт? <a href="index.php">Войти</a></p>


    </form>
</div>

</body>
<script src="../assets/reg.js"></script>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
</html>

