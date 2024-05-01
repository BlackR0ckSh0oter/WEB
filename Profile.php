<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
$usname = $_SESSION['user']['login'];
include 'Connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Text.css">
    <link rel="icon" href="logo1.png">


</head>
<body>
        <!-- navbar -->
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
        <!-- navbar end -->     

    <br> <br> <br> <br> <br> 
    <form id="registration-form" method="post" enctype="multipart/form-data">
    <h1 class="features-t">ЛК: Информация</h1>
    <!-- Профиль -->
    <table class="user-info" align="center">
            <tr>
                <td>
                    <p>Профиль: <?= $_SESSION['user']['full_name'] ?></p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <div>Логин: <?= $_SESSION['user']['login'] ?></div>
                    <div>Телефон: <?= $_SESSION['user']['number'] ?></div>
                    <div>Дата вашей регистрации на сайте: <?= $_SESSION['user']['date'] ?></div>
                </td>
            </tr>

    </table>
    </form>

    <h1>

    </h1>

    <div class="table">
	<div class="txt">
    <h1 class="features-t">ЛК: Корзина</h1>

<!-- Корзина -->
<?php
$SERV = mysqli_query($dp, "SELECT * FROM корзина WHERE корзина.Пользователь = '$usname'");
echo "<table align='center'>
<tr>
    <th>Услуга</th>
    <th>Цена услуги</th>
    <th>Добавление в корзину</th>
    <th>Удаление с корзины</th>
</tr>";

while($outserv = mysqli_fetch_array($SERV))
{
    $service_id = $outserv[1];
    $service_query = mysqli_query($dp, "SELECT `Тип услуги`, Цена FROM услуги WHERE `ID услуги` = $service_id");
    $service_data = mysqli_fetch_array($service_query);

    echo '<tr>
    <td>'. $service_data[0] . '</td>
    <td>'. $service_data[1] . '</td>
    <td>' . $outserv[3] . '</td>
    <td><a href="Profile.php?DELbacket=' . $outserv[2] . '">Удалить</a></td>
    </tr>';
    $userNames = $outserv[1];
}


$DELbacket = isset($_GET['DELbacket']) ? $_GET['DELbacket'] : 0;
if($DELbacket > 0){
    mysqli_query($dp, "DELETE FROM `корзина` WHERE Пользователь = '$userNames' AND `ID услуги` = '$DELbacket'");
    header("location: Profile.php");
}
?>

    </table>
    </div>
    </div>

</body>
</html>