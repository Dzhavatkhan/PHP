
<?php


require"../../connect.php";
$sql3 = mysqli_query($connect, "SELECT * FROM `clients`");

?>


<table class="table">
                <thead>
                <tr>
                    <th>Имя клиента</th>
                    <th>Номер телефона</th>
                    <th>Логин</th>

                </tr>
                </thead>
                <tbody>
                    <?php
                    while($table3 = mysqli_fetch_assoc($sql3)){
                        

                        $name = $table3['client_name'];
                        $phone = $table3['phone_number'];
                        $login = $table3['login'];
                        
                        ?>
                        <tr>
                            <td><?=$name?></td>
                            <td><?=$phone?></td>
                            <td><?=$login?></td>
                            <td>
                                <button class="btn btn-danger" onclick="deleteClient(<?=$table3['id']?>)">Удалить</button>
                            </td>

                        </tr>
                    <?}?>
                </tbody>
            </table>