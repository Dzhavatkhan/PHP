<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/auth.css">
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Авторизация</title>
</head>
<body>
    <a href="../index.php">
        <img class="back" src="../assets/img/left-white.png" alt="">
    </a>
    <div class=" container mt-3">
        <h2>Авторизация</h2>
        <?php if(isset($_SESSION['error'])):?>
        <div class="alert text-center" style=" position: relative; left: 378px !important; top: 125px !important; width: 564px !important; background-color: white !important; color: #032785 !important;"> <b><?=$_SESSION['error'];?> </b></div>
        <?php unset($_SESSION['error']);?>
        <?php endif;?>
        <br>
        <form action="authorize.php" method="post" class="form">
            <div class="mb-3">
                <input type="text" name="login" class="form-control" placeholder="Введите логин">
            </div>
            <div class="mb-3">
                <input type="password" name="password" class="form-control" placeholder="Введите пароль">
            </div>
            <button type="submit" class="btn btn-primary">Войти</button>
        </form>

        <p>У Вас нет аккаунта? <a href="/account/registration.php">Зарегистрироваться</a></p>
    </div>

    <img src="/assets/img/account/image 2.png" alt="">
</body>
</html>