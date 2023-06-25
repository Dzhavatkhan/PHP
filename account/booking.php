<?php


session_start();

require "../connect.php";
$id = $_SESSION['user']['id'];
$sql = "SELECT *,barber.name AS 'barber_name' FROM barber_shop LEFT JOIN clients ON (clients.id = barber_shop.client_id) LEFT JOIN booking_records ON (booking_records.record_id = barber_shop.record_id) LEFT JOIN barber ON (barber.barber_id = barber_shop.barber_id) WHERE client_id = '$id'";
$sql_query = mysqli_query($connect, $sql);

$count = mysqli_num_rows($sql_query);


?>



<h2 class="message_book">Ваши текущие записи(<?=$count?>)</h2>
            <table class="table" >

<thead>
                <tr>
                    <th>Ваше имя</th>
                    <th>Имя парикмахера</th>
                    <th>Дата записи</th>
                    <th>Время записи</th>
                    <th> </th>
                </tr>
                </thead>
                <tbody>
                    <?php 

                while($sql = mysqli_fetch_assoc($sql_query)){

                    $name = $sql['client_name'];
                    $barber_name = $sql['barber_name'];
                    $date = $sql['date'];
                    $time = $sql['time'];?>


                <tr>
                    <td><?=$name?></td>
                    <td><?=$barber_name?></td>
                    <td><?=$date?></td>
                    <td><?=$time?></td>
                    <td><button  onclick="deleteBook(<?=$sql['id']?>)">Отменить</button></td>
                </tr>

<?

                }

?>


                </tbody>

                </table>