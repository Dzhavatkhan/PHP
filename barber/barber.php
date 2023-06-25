<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/barber.css">
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Выберите парикмахера</title>
</head>
<body>
<div class="mb-3 mt-5 ms-5">
  <a href="../index.php"><img width="50" class="back" src="/assets/img/left-white.png" alt=""></a>
  </div>
    <div class="container">
        <div class="row">
            <?php 
                require "../connect.php";
                $query = "SELECT * FROM `barber`";
                $sql = mysqli_query($connect, $query);
                while($barber = mysqli_fetch_assoc($sql)){
            ?>
            <div class="col-3 mt-4 me-4 barber">
                <input type="hidden" name="id" value="<?=$barber['barber_id']?>">
                <img src="/assets/uploads/<?=$barber['avatar']?>" class="avatar img-fliud" alt="">
                <h3 class="name"><?=$barber['name']?></h3>
                
                <a class="btn mt-3" href="/booking/calendar.php?barber_id=<?=$barber['barber_id']?>">Записаться</a>
            </div>
            <?}?>
        </div>
    </div>
</body>
</html>