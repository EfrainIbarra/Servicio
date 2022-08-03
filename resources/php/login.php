<?php

include 'conexion.php';

$user = $_POST["user_name"];
$pass = $_POST["user_pass"];

$Query = " SELECT * FROM usuarios WHERE usuario = '" . $user . "' AND clave = '" . $pass . "' ";
$res = mysqli_query($conexion, $Query);

$num = mysqli_num_rows($res);

if($num == 1){
    header("Location: ./home.html");
} else {
    header("Location: ./index.html");
}