<?php 

require "../../connect.php";
$sql = "SELECT *,barber_shop.id AS 'shop_id', barber.name AS 'barber_name' FROM barber_shop LEFT JOIN clients ON (clients.id = barber_shop.client_id) LEFT JOIN booking_records ON (booking_records.record_id = barber_shop.record_id) LEFT JOIN barber ON (barber.barber_id = barber_shop.barber_id)";
$sql = mysqli_query($connect, $sql);
?>

<table class="table">
            <thead>
            <tr>
                <th>Имя клиента</th>
                <th>Имя парикмахера</th>
                <th>Дата</th>
                <th>Время</th>
            </tr>
            </thead>
            <tbody>
                <?php
                while($table = mysqli_fetch_assoc($sql)){
                    
                    $client_name = $table['client_name'];

                    $barber_name = $table['barber_name'];

                    $date = $table['date'];

                    $time = $table['time'];
                    
                    ?>
                    <tr>
                        <td><?=$client_name?></td>
                        <td><?=$barber_name?></td>
                        <td><?=$date?></td>
                        <td><?=$time?></td>
                        <td><a class="btn btn-danger" onclick="deleteBook(<?=$table['shop_id']?>)"> Удалить</a></td>
                        
                    </tr>

                <?}?>
            </tbody>
        </table>