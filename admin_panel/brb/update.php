<?php

$id = $_GET['id'];

if ($id == 0) {
    $id = $_GET['barber_id'];
}

require "../../connect.php";
$query = "SELECT * FROM `barber` WHERE `barber_id` = '$id'";
$query = mysqli_fetch_assoc(mysqli_query($connect, $query));

$id_brb = $query['barber_id'];

$name_brb =  $query['name'];

$avatar = $query['avatar'];


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
    <h2>Редактировать парикмахера</h2>
        <input type="hidden" name="id" value="<?=$id?>">
        <div class="mb-3">
            <input type="file" class="form-control"   name="file"  >
        </div>
        <div class="mb-3 mt-3">
            <input type="text" class="form-control"   name="name" value="<?=$name_brb?>">
        </div>
                <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</div>
</body>
</html>