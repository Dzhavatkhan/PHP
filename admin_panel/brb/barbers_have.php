<?php 
    require "../../connect.php";
    $sql2 = mysqli_query($connect, "SELECT * FROM `barber`");?>


    <table class="table">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Имя парикмахера</th>
                <th></th>

            </tr>
            </thead>
            <tbody>
                <?php
                while($table2 = mysqli_fetch_assoc($sql2)){
                    

                    $barber_name = $table2['name'];
                    $barber_avatar = $table2['avatar'];
                    
                    ?>
                    <tr>
                        <td><img width="75" class="img-fluid" src="/assets/uploads/<?=$barber_avatar?>"></td>
                        <td ><?=$barber_name?></td>
                        <td><a class="btn btn-primary " href="brb/update.php?id=<?=$table2['barber_id']?>" > Редактировать</a></td>
                        <td> <button class="btn btn-danger" onclick="deleteBarber(<?=$table2['barber_id']?>)">Удалить</button></td>
                    </tr> 
                  
                <?}?>
                <tr><td><button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#myModalB"> Добавить барбера</button></td></tr>
                

                   


            </tbody>
        </table>

        