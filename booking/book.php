<?php
require "../connect.php";
session_start();
if(isset($_GET['date'])){
    $date = $_GET['date'];

    $bookings[] = array();
    // $too_not_free = array();
    if (isset($_GET['barber_id'])) {
        $barber_id = $_GET['barber_id'];
    } else {
        $barber_id = "null";
    }
$blocked = "SELECT *,barber.name AS 'barber_name' FROM barber_shop LEFT JOIN clients ON (clients.id = barber_shop.client_id) LEFT JOIN booking_records ON (booking_records.record_id = barber_shop.record_id) LEFT JOIN barber ON (barber.barber_id = barber_shop.barber_id) WHERE barber.barber_id = '$barber_id' AND booking_records.date =?";
$stmt = $connect->prepare($blocked);
$stmt->bind_param("s", $date);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows>0) {
        while ($block = $result->fetch_assoc()) {
            $bookings[]=$block['time'];
        }
    }
}

    
    
}





$brb_name = mysqli_query($connect, "SELECT `name` FROM `barber` WHERE `barber_id` = '$barber_id'");
$client_id = $_SESSION['user']['id'];
$brb_name  = mysqli_fetch_assoc($brb_name);
$phone = mysqli_fetch_assoc(mysqli_query($connect, "SELECT * FROM `clients` WHERE `id` = '$client_id'"));
$phone = $phone['phone_number'];
if(isset($_POST['submit'])){
    $time = $_POST['timeslot'];

    $bookings[] = $time;
    $sql =  mysqli_query($connect, "INSERT INTO booking_records (`record_id`, `date`, `time`) VALUES (NULL,'$date', '$time')");
    $msg = "<div class='alert alert-success'>Booking Successfull</div>";
    $sql2 = mysqli_query($connect, "SELECT * FROM booking_records WHERE `date` = '$date' AND `time` = '$time' ");
    $sql_id = mysqli_fetch_assoc($sql2);
    $id = $sql_id['record_id'];
   
    mysqli_query($connect, "INSERT INTO `barber_shop` (`id`, `barber_id`, `record_id`, `client_id`) VALUES (NULL, '$barber_id', '$id', '$client_id')");
    

}

$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "19:00";
function timeslots($start,$duration,$end,$cleanup){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanUpInterval = new DateInterval("PT" . $cleanup . "M");
    $slots = array();

    for($intStart = $start; $intStart< $end; $intStart->add($interval)->add($cleanUpInterval) ){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if ($endPeriod>$end) {
            break;
        }
        $slots[] = $intStart->format("H:i") . "-" . $endPeriod->format("H:i");
    }
    return $slots;
}
?>
<!doctype html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Запись</title>
    <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="main.css">
  </head>

  <body>
    <div class="container">
        <h1 class="text-center">Запись на: <?php echo date('d.m.Y', strtotime($date)); ?></h1><hr>
        <a href="../booking/calendar.php?barber_id=<?=$barber_id?>"><img width="50" class="img-fluid" src="/assets/img/free-icon-back-arrow-7710485.png" alt=""></a>
        <div class="row">
            <?php
            $timeslots = timeslots($start, $duration, $end, $cleanup);
            foreach ($timeslots as $ts){

            
                
            ?>
            <div class="col-md-2 mt-3">
                <div class="form-group">
                    <?php if(in_array($ts,$bookings)){?>
                        <button class="btn btn-danger text-white" data-bs-toggle="tooltip" title="Забронировано!"><?=$ts?></button>
                    <?}
                    elseif (count($bookings)>1) {?>
                        <button class="btn text-white" style="background-color: #1A2A52 !important;"  data-bs-toggle="tooltip" title="У вас уже есть бронь" ><?=$ts?></button>

                    <?}
                    else{
                    ?>
                        <button class="btn book text-white" style="background-color: #1A2A52 !important;" data-timeslot="<?=$ts?>"><?=$ts?></button>
                    <?}?>
                </div>

            </div>
            <? }?>
            <!-- The Modal -->
            <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Забронировать: <span id="slot"></span></h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                   <div class="row">
                    <div class="col-md-12">
                <form action="" method="post" autocomplete="off">
                    <div class="form-group">
                        <label for="">Время</label>
                        <input type="text" name="timeslot" id="timeslot" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Парикмахер</label>
                        <input class="form-control" type="text" value="<?=$brb_name['name']?>">
                    </div>
                    <div class="form-group">
                        <label for="">Ваше имя</label>
                        <input type="text" class="form-control" value="<?=$_SESSION['user']['client_name']?>">
                    </div>

                    <div class="form-group">
                        <label for="">Номер телефона</label>
                        <input type="text" class="form-control" value="<?=$phone?>">
                    </div>
                    <div class=" mt-3">
                    <button class="btn btn-primary" type="submit" name="submit">Записаться</button>
                    <a data-bs-dismiss="modal" class="btn btn-danger">Закрыть</a>
                    </div>


                </form>
                    </div>
                   </div>
                </div>

                </div>
            </div>
            </div>
            <!-- <div class="col-md-6 col-md-offset-3"> -->
               <?php //echo isset($msg)?$msg:''; ?>

            <!-- </div> -->
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
            })
    </script>
    <script>
        $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
        });
    </script>
</body>

</html>
