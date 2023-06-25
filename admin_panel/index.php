<?php
require "../connect.php";
$sql = "SELECT *,barber.name AS 'barber_name' FROM barber_shop LEFT JOIN clients ON (clients.id = barber_shop.client_id) LEFT JOIN booking_records ON (booking_records.record_id = barber_shop.record_id) LEFT JOIN barber ON (barber.barber_id = barber_shop.barber_id)";
$sql = mysqli_query($connect, $sql);
$sql2 = mysqli_query($connect, "SELECT * FROM `barber`");
$sql3 = mysqli_query($connect, "SELECT * FROM `clients`");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Админ-панель</title>
  <meta charset="utf-8">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>
  <div class="mb-3 mt-3 ms-5">
    <a href="logout.php">
      <img src="../assets/img/left-black.png" width="45" class="img-fliud" alt="">
    </a>
  </div>

<div class="container mt-3">
  <h2>Админ-панель</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-bs-toggle="tab" href="#home">Записи</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#menu1">Барберы</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="tab" href="#menu2">Клиенты</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <div id="home" class="container tab-pane active"><br>
           
    </div>


    <div id="menu1" class="container tab-pane fade" ><br>
    
    
    
    </div>
    <div class="modal" id="myModalB">
                    
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form class="form" method="post" enctype="multipart/form-data">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Modal Heading</h4>
                            <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <div class="mb-3">
                                <input name="file" type="file" class="form-control">
                            </div>
                            <div class="mb-3 form-floating">
                                <input name="name" type="text" placeholder="Имя парикмахера" id="name" class="form-control">
                                <label for="name">Имя парикмахера</label>
                            </div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">
                            Отправить
                        </button>
                        </div>
                        </form>
                        </div>
                    </div>
   
                </div>
                   


    <div id="menu2" class="container tab-pane fade"><br>
       
    </div>



  </div>
</div>



<script src="/assets/admin.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
