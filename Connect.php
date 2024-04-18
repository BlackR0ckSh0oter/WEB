<?php 
$server= "localhost"  ;
$user="root" ;
$password="";
$DB="турбаза";
$dp = mysqli_connect($server, $user, $password, $DB)
OR die ("Невозможно соединиться с mysql-сервером. Выполнение программы остановлено");
	mysqli_query($dp, "SET NAMES utf8");
?>