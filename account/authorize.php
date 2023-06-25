<pre>
    <? print_r($_POST); ?>
</pre>

<?php
session_start();

$login = $_POST['login'];
$name_client = $_POST['client_name'];
$password = $_POST['password'];
$password_md = md5($password);

require "connect.php";


$admin = "SELECT * FROM `admin` WHERE login='$login'";
$admin = mysqli_query($con,$admin);
if (mysqli_num_rows($admin) > 0 ) {
    $admin = mysqli_fetch_assoc($admin);
    if (empty($admin)) {
        $_SESSION['error'] = "Неверный логин или пароль";
        header("Location: /account/index.php");
        exit;
    }
    
    if($password != $admin['password']) {
        $_SESSION['error'] = "Неверный логин или пароль";
        header("Location: ../index.php");
        exit;    
    }
    
    $_SESSION['admim'] = [
        "login" => $admin['login'], 
        "id" => $admin['id']];
    header("Location: ../admin_panel/index.php");
    exit;
} else {


    $sql = "SELECT * FROM clients WHERE login=:login";


$statement = $connect->prepare($sql);
$statement->execute(['login' => $login]);


$user = $statement->fetch(PDO::FETCH_ASSOC);


if(empty($user)) {
    $_SESSION['error'] = "Неверный логин или пароль";
    header("Location: /account/index.php");
    exit;
}

if($password_md != $user['password']) {
    $_SESSION['error'] = "Неверный логин или пароль";
    header("Location: /account/index.php");
    exit;    
}

$_SESSION['user'] = [
    "login" => $user['login'], 
    'client_name' =>$user['client_name'],
    "id" => $user['id']];
header("Location: /account/profile.php");
exit;

}



//****************************************************** */
