<?php
 if ($_GET['barber_id']) {
  $barber_id = $_GET['barber_id'];
  if ($barber_id == null) {
    $barber_id = "empty";
  }
}

require "../connect.php";
//prev & next month
if (isset($_GET['ym'])) {
  $ym = $_GET['ym'];


  ?>
  <script>console.log("<?=$ym?>")</script>
  <?php
}
else{
  $ym = date("m.Y"); 
}
// format
$timestamp = strtotime($ym . "-01"); 
$test = $timestamp;
if ($timestamp == false) {
  $ym = date("m.Y"); 
  $timestamp = time();

}


//now month

//today
$today = date('j.m.Y', time());
//title
$title = date('F', $timestamp);
if($title == "January"){$title="Январь";}
if($title == "February"){$title="Февраль";}
if($title == "March"){$title="Март";}
if($title == "April"){$title="Апрель";}
if($title == "May"){$title="Май";}
if($title == "June"){$title="Июнь";}
if($title == "July"){$title="Июль";}
if($title == "August"){$title="Август";}
if($title == "September"){$title="Сентябрь";}
if($title == "October"){$title="Октябрь";}
if($title == "November"){$title="Ноябрь";}
if($title == "December"){$title="Декабрь";}
//prev
$prev = date("Y-m", mktime(0,0,0, date('m', $timestamp)-1,1, date("Y")));
$next =  date("Y-m", mktime(0,0,0, date('m', $timestamp)+1,1, date("Y")));

//arr
$str = date("w", mktime(0,0,0, date('m', $timestamp),1, date("Y")));


//days

$day_count = date('t', $timestamp);

//weeks
$weeks = [];
$dw = date('l');
$week = '';

$week .= str_repeat('<td><a></a></td>', $str -1);

for ($day=1; $day <= $day_count; $day++, $str++) { 
  ?>
  <script>

console.log('<?=$date, "   ", $today?> ', "<?=$date<$today;?>");
console.log("LOOK: <?=date('d.m.Y')?>");

</script>

            <?php
            $ym = date("m.Y", mktime(0,0,0, date('m', $timestamp),1, date("Y")));
            $day_front = $day;
            if ($day<10) {
              $day = '0'.$day;
            }

    $date = $day.".".$ym;

    $date_code = strtotime($date);
    $today_code = strtotime($today);


  $booking = mysqli_query($connect, "SELECT * FROM `booking_records` WHERE `date` = '$date'");
  $booking = mysqli_num_rows($booking);

    if ($today_code == $date_code) {

        if ($day_front <10) {
            $week .= "<td ><div class='today lil' > <a class='text-center' href='book.php?date=".$date."&barber_id=".$barber_id."'>";
        }
        else{
          $week .= "<td ><div class='today big' > <a class='text-center' href='book.php?date=".$date."&barber_id=".$barber_id."'>";
        }



    } 
    else if($date_code < $today_code){
      if ($day_front <10) {
             $week .= "<td ><div class='lock lil' > <a class='text-center'>";
      }
      else{
             $week .= "<td ><div class='lock big' > <a class='text-center'>";
      }
 
    }
    elseif ($date_code > $today_code) {
      if ($day_front <10) {
        $week .= "<td> <div class='date_bord lil' > <a class='text-center' href='book.php?date=".$date."&barber_id=".$barber_id."'>";
    }
    else {
          $week .= "<td> <div class='date_bord big' > <a class='text-center' href='book.php?date=".$date."&barber_id=".$barber_id."'>";

    }
    }
    else{
      $week .= "<td> <div class='date_bord' > <a class='text-center' href='book.php?date=".$date."&barber_id=".$barber_id."'>";
    }

    $week .= $day_front.'</a> </td>';

    if ($str % 7 == 0 || $day == $day_count) {
        if ($day == $day_count && $str % 7 !=0) {
          $week .= str_repeat('<td></td>', 7 - $str % 7);
        }

        $weeks[] ="<tr>".$week. "</tr>";

        $week = '';
    }

    
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="/assets/calendar.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/assets/img/barber.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <title>Booking</title>
</head>
<body>
  <div class="mb-3 mt-5 ms-5">
  <a href="../index.php"><img width="50" class="img-fluid" src="/assets/img/left-white.png" alt=""></a>
  </div>
  <h3 class="text-white">
    <a class="back" href="?ym=<?=$prev?>&barber_id=<?=$barber_id?>"><</a>
    <?=$title?>
    <a class="next" href="?ym=<?=$next?>&barber_id=<?=$barber_id?>">></a> 
    
  </h3>

  <div class="container mt-3">
  <table class="table">
    <thead>
      <tr>
      <th>Пн</th>
      <th>Вт</th>
      <th>Ср</th>
      <th>Чт</th>
      <th>Пт</th>
      <th>Сб</th>
      <th>Вс</th>
      </tr>
    </thead>
    <tbody>
        <?
          foreach ($weeks as $week) {
            echo $week;

          }
        ?>
    </tbody>
  </table>
  </div>

</body>
</html>



