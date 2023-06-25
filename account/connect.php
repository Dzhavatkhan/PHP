<?php
$connect = new PDO("mysql:host=localhost;dbname=booking","root", "");
$con = mysqli_connect("localhost", "root", "", "booking");
if(!$connect){
    die("Error connect");
}