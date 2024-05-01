<?php
session_start();
include 'Connect.php'; 
$flag = 0; // Инициализируем $flag

if (isset($_SESSION['user'])) {
    $flag = 1;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Home.css">
	<link rel="stylesheet" href="Text.css">
</head>
<body>
<header class="navbar">
    <div class="container">
        <div class="navbar-brand">
        <a href="Main.php"><img src="logo1.png" alt="Логотип"></a>
        </div>
        <nav class="nav">
            <div class="nav-row">
                <a href="Gallery.php" class="btn">Галерея</a>
                <a href="Home.php" class="btn">Контакты</a>
                <?php if($flag == 1): ?>
                    <a href="Profile.php" class="btn">Личный кабинет</a>
                    <a href="Letter.php" class="btn">Задать вопрос</a>
                <?php else: ?>
                    <a href="Authe.php" class="btn">Войти</a>
                    <a href="Regist.php" class="btn">Регистрация</a>
                <?php endif; ?>
            </div>
            <div class="nav-row">
                <?php if($flag == 1): ?>
                    <a href="Logout.php" class="btn">Выход</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
</header>   

<!-- jumbotron -->
<div class="table">
	<div class="txt">
            <h1 class="features-t">Выбор доступных сервисных услуг</h1>

            <table align="center">
                <tr>
                    <th>Описание услуги</th>
                    <th>Цена</th>
                    <?php if($flag == 1): ?>
                        <th>Действие</th>
                    <?php endif; ?>
                </tr>
                <form method="POST">
                <?php 
                $prod1 = mysqli_query($dp, "SELECT * FROM сервисные_услуги"); 
                while($prod = mysqli_fetch_array($prod1)) {
                    echo '<tr>';
                    echo '<td>'.$prod[2].'</td><td>'.$prod[3].'</td>';
                    if($flag == 1) { 
                ?>
                    <td>
                        <input value="<?= $prod['Код_услуги'] ?>" name="ArrCart[]" type="checkbox">
                    </td>
                <?php
                    }
                    echo '</tr>';
                }
                ?>
            </table>
            <?php if($flag == 1): ?>
                <div align="center"><input type="submit" name="addcart" value="Добавить"></div>
            <?php endif; ?>

            </form>

            <?php 
            if(isset($_POST["addcart"])) {
                $user = $_SESSION['user']['login'];
                $date_added = date('Y-m-d H:i:s'); // Используем корректный формат даты

                foreach($_POST["ArrCart"] as $prod) {
                    mysqli_query($dp, "INSERT INTO `покупка` (`ID корзины`, `ID услуги`, `Пользователь`, `Дата добавления в корзину услуги`) 
                                      VALUES (NULL, '$prod', '$user', '$date_added')");
                }
                echo "Работы добавлены в корзину!";
            }
            ?>  
        </div>
    </div>
 </div>
</div>
</div>
</body>
</html>