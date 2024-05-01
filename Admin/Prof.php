<?php 
session_start();
if ($_SESSION['ADMIN']) {
    $flag = 1;
}
$usname = $_SESSION['ADMIN']['login'];
include '../Connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../Home.css">
    <link rel="stylesheet" href="../Text.css">
    <link rel="icon" href="../logo1.png">

</head>
<body>
        <!-- navbar -->

        <div class="navbar">
            <div class="container">
                <div class="navbar-nav">
                <div class="navbar-brand">
                        <a href="Prof.php"><img src="../logo1.png" alt="Логотип"></a><a>
                    </div>
                <nav class="nav">
                    <div class="nav-row">
                    <?php if($flag == 1): ?>
                        <a href="../Logout.php" class="btn">Выход</a>
                    <?php endif; ?>
                    </div>
                    </nav>
                </div>
            </div>
        </div>
        <!-- navbar end -->     

        <!-- jumbotron -->

    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
    <br> <br> <br> <br> <br> 
    <form id="registration-form" method="post" enctype="multipart/form-data">
    <h1 class="features-t">Профиль администратора</h1>
    <!-- Профиль -->
    <table class="user-info" align="center">
            <tr>
                <td>
                    <p>Профиль: <?= $_SESSION['ADMIN']['full_name'] ?></p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <div>Логин: <?= $_SESSION['ADMIN']['login'] ?></div>
                    <div>Должность: <?= $_SESSION['ADMIN']['Dolzh'] ?></div>
                    <div>Номер телефона: <?= $_SESSION['ADMIN']['tel'] ?></div>
                    <div>E-mail: <?= $_SESSION['ADMIN']['email'] ?></div>
                </td>
            </tr>
    </table>
    <h1 class="features-t">Редактирование данных</h1>
    <div align="center">
        <a href="Redcl.php" onclick="document.getElementById('registration-form').submit();" class="edit-button">Редактирование клиентов</a>
    </div>
    <br>
    <div align="center">
        <a href="RedN.php" onclick="document.getElementById('registration-form').submit();" class="edit-button">Редактирование номеров</a>
    </div>
    <br>
    <div align="center">
        <a href="RedU.php" onclick="document.getElementById('registration-form').submit();" class="edit-button">Редактирование услуг</a>
    </div>

    </form>

    <h1>

    </h1>

    </div>
    </div>
    </div>
</body>
</html>