<?php

require "../../connect.php";
$id = $_GET['id'];
if ($id == NULL) {
    $id = $_POST['id'];
}
print_r("id: ",$id);
$ex = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$name  = $_POST['name'];

    if (!empty($ex)) {

        $query = mysqli_query($connect, "SELECT * FROM `barber` WHERE `barber_id` = '$id' ");
        $fetch = mysqli_fetch_assoc($query);
        $delete_file = $fetch['avatar'];
        unlink("../../assets/uploads/$delete_file");
        $filename = uniqid().'.'.$ex;
        
        $location = "../../assets/uploads/".$filename;
        move_uploaded_file($_FILES['file']['tmp_name'], $location);
        $upd_query = "UPDATE `barber` SET `name` = '$name', `avatar` = '$filename' WHERE `barber`.`barber_id` = '$id'";
        $upd = mysqli_query($connect, $upd_query);
    }
    else if(empty($name)){
        $filename = uniqid().'.'.$ex;
        
        $location = "uploads/".$filename;
        move_uploaded_file($_FILES['file']['tmp_name'], $location);
        $upd_query = "UPDATE `barber` SET  `avatar` = '$filename' WHERE `barber`.`barber_id` = '$id'";
        $upd = mysqli_query($connect, $upd_query);
    }
     else {
       $upd_query = "UPDATE `barber` SET `name` = '$name' WHERE `barber`.`barber_id` = '$id'";
       $upd = mysqli_query($connect, $upd_query);
    }






    header("Location: /admin_panel/index.php");

?>
