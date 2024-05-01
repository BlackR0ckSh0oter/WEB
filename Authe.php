<?php
session_start();
include 'Connect.php'; 

if(isset($_POST['login'])){
    $login = mysqli_real_escape_string($dp, $_POST['login']);
    $_POST['password'] = mysqli_real_escape_string($dp, $_POST['password']);
    
    $password = $_POST['password']; 

    $check_user = mysqli_query($dp, "SELECT * FROM `клиенты` WHERE `Логин` = '$login' AND `Пароль` = '$password'");
    
    if (mysqli_num_rows($check_user) > 0) {
        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['ID клиента'],
            "full_name" => $user['ФИО'],
            "login" => $user['Логин'],
            "number" => $user['Номер телефона'],
            "date" => $user['Дата регистрации']
        ];

        header('Location: Profile.php'); 
        exit(); 
    } else {
        $_SESSION['message'] = 'Неверный логин или пароль';
        header('Location: Authe.php');
        exit();
    }
}

// Check if the user is already logged in and redirect to Profile.php
if (isset($_SESSION['user'])) {
    header('Location: Profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="icon" href="logo1.png">
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
    <!-- navbar end -->     

    <!-- jumbotron -->
    <div id="registration-form-container">
                
                <!-- Форма авторизации -->
                <form id="registration-form" action="Authe.php" method="post" enctype="multipart/form-data">
                <h1 class="features-t" id="Блог">Авторизация</h1>
                    <label>Логин</label>
                    <input type="text" name="login" placeholder="Введите свой логин">
                    <label>Пароль</label>
                    <input type="password" name="password" placeholder="Введите пароль">
                    <button type="submit">Войти</button>
                    <p>
                        У вас нет аккаунта? - <a href="Regist.php" >Зарегистрируйтесь</a><a href="Regist.php">!</a>
                    </p>
                    <?php
                        if ($_SESSION['message']) {
                            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                        }
                        unset($_SESSION['message']);
                    ?>
                </form>
    </div>

    <!-- jumbotron end -->
    <?php
    if ($_SESSION['message']) {
        echo '<p class="error-message"> ' . $_SESSION['message'] . ' </p>';
    }
    unset($_SESSION['message']);
    ?>
    
</body>
</html>
