<?php

$id = $_GET['id'];


session_start();


require "../../connect.php";
$query = "SELECT * FROM `clients` WHERE `id` = '$id'";
$query = mysqli_fetch_assoc(mysqli_query($connect, $query));

$id = $query['id'];

$name =  $query['client_name'];
$login = $query['login'];
$phone = $query['phone_number'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Редактировать</title>
</head>
<body>
    <div class="mb-3 mt-3 ms-3">
        <a href="../index.php">
            <img class="img-fluid" src="../../assets/img/left-black.png" width="50" alt="">
        </a>
       
    </div>
<div class="container mt-3">
<form action="upd.php" method="post" enctype="multipart/form-data">
    <h2>Редактировать клиента</h2>
    <?php if(isset($_SESSION['error'])):?>
        <div class="alert alert-danger" > <?=$_SESSION['error'];?></div>
        <?php unset($_SESSION['error']);?>
        <?php endif;?>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="mb-3 mt-3">
            <input type="text" class="form-control"   name="name" value="<?=$name?>">
        </div>
        <div class="mb-3 mt-3">
            <input type="text" class="form-control"   name="login" value="<?=$login?>">
        </div>
        <div class="mb-3 mt-3">
            <input type="text" class="form-control"   name="phone" value="<?=$phone?>">
        </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
</body>
</html>