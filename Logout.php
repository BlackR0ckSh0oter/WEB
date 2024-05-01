<?php
session_start();

if ($_SESSION['ADMIN']) {
    unset($_SESSION['ADMIN']); // Удаляем данные администратора из сессии
    header('Location: Admin/Authadmin.php'); // Перенаправляем на страницу аутентификации для администратора
} else {
    unset($_SESSION['user']); // Удаляем данные пользователя из сессии
    header('Location: Authe.php'); // Перенаправляем на страницу аутентификации для пользователя
}
?>