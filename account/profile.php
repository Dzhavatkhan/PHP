<?php
    session_start();

    require "../connect.php";
    $id = $_SESSION['user']['id'];
    $sql = "SELECT *,barber.name AS 'barber_name' FROM barber_shop LEFT JOIN clients ON (clients.id = barber_shop.client_id) LEFT JOIN booking_records ON (booking_records.record_id = barber_shop.record_id) LEFT JOIN barber ON (barber.barber_id = barber_shop.barber_id) WHERE client_id = '$id'";
    $sql_query = mysqli_query($connect, $sql);

 

    $count = mysqli_num_rows($sql_query);

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/profile.css">
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Профиль</title>
</head>
<body>
    <div class="container pro mt-3">
        <img src="../assets/img/user.png" alt="" width="200">
        <h2><?= $_SESSION['user']['client_name']?></h2>

        <a href="../index.php" class="btn home">Главная</a>
        <a href="../barber/barber.php" class="btn book">Записаться</a>
        <a href="logout.php" class="btn logout btn-danger">Выйти</a>
    </div>
    <a href="update.php" class="redaction">Изменить</a>




         
         <?php 

            if($count == 0){?>

                <h2 class="message">У вас нет записей</h2>
            <?

            }
            else{

            

?>
        <div class="hose" id="table">

                


        </div>

<?}?>
<script src="../assets/profile.js" ></script>
</body>
</html>