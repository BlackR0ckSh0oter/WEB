<?php
session_start();
include 'Connect.php'; 

function convert($text){
    $text = trim($text);
    $text = stripcslashes($text);
    $text = strip_tags($text);
    $text = htmlspecialchars($text);
    return $text;
}

function checklength($text, $min, $max){
    $check = (mb_strlen($text) >= $min && mb_strlen($text) <= $max);
    return $check;
}

// Проверяем, была ли отправлена форма с данными для регистрации
// Если пользователь успешно зарегистрировался
if(isset($_POST['REGISTR'])){
    $full_name = convert($_POST['full_name']);
    $login = convert($_POST['login']);
    $number = convert($_POST['number']);
    $password = convert($_POST['password']);
    $password_confirm = convert($_POST['password_confirm']);

    $CheckUser = mysqli_fetch_array(mysqli_query($dp, "SELECT * FROM клиенты WHERE `Логин` = '$login'"));

    if(empty($CheckUser)){
        if(!checklength($login, 3, 8)) {
            $_SESSION['message'] = "Длина логина должна быть от 3 до 8 символов!";
            header('Location: Regist.php');
            exit();
        } elseif (!checklength($password, 4, 16)) {
            $_SESSION['message'] = "Длина пароля должна быть от 4 до 16 символов!";
            header('Location: Regist.php');
            exit();
        } else {
            if ($password === $password_confirm) {
                // Добавляем текущую дату регистрации
                $date = date('Y-m-d');
                mysqli_query($dp, "INSERT INTO `клиенты` (`Дата регистрации`, `ФИО`, `Номер телефона`, `Логин`, `Пароль`) VALUES ('$date', '$full_name', '$number', '$login', '$password')");
                header('Location: Authe.php');
                exit();
            } else {
                $_SESSION['message'] = 'Пароли не совпадают';
                header('Location: Regist.php');
                exit();
            }
        }
    } else {
        $_SESSION['message'] = 'Аккаунт с данным логином уже существует в системе';
        header('Location: Regist.php');
        exit();
    }
}

// Если пользователь уже авторизован, перенаправляем на страницу профиля
if ($_SESSION['user']) {
    header('Location: Profile.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Регистрация</title>
    <link rel="stylesheet" href="Home.css">
    <link rel="icon" href="logo1.png">
</head>
<body>
    <!-- navbar -->
    <header class="navbar">
    <div class="container">
        <div class="navbar-brand">
            <a href="#"><img src="logo1.png" alt="Логотип"></a>
        </div>
        <nav class="nav">
            <div class="nav-row">
                <a href="gallery.php">Галерея</a>
                <a href="Home.php">Турбазы</a>
                <?php if($flag == 1): ?>
                    <a href="Profile.php" class="btn"><?= $_SESSION['user']['full_name'] ?></a>
                <?php else: ?>
                    <a href="Authe.php" class="btn">Войти</a>
                    <a href="Regist.php" class="btn">Регистрация</a>
                <?php endif; ?>
            </div>
        </nav>
    </div>
    </header>
    <!-- navbar end -->     

    <!-- jumbotron -->
    <div id="registration-form-container">
    <!-- Форма регистрации -->
        <form id="registration-form" action="Regist.php" method="post" enctype="multipart/form-data">
        <h1 class="features-t">Регистрация</h1>
            <fieldset>
                <label>ФИО</label>
                <input type="text" name="full_name" placeholder="Только буквы и пробелы">
                <label>Логин</label>
                <input type="text" name="login" required placeholder="Логин. Длина от 3 до 8">
                <label>Номер телефона</label>
                <input type="text" name="number" required placeholder="Только цифры">
                <label>Пароль</label>
                <input type="text" name="password" required placeholder="Пароль. Длина от 4 до 16.">
                <label>Подтверждение пароля</label>
                <input type="text" name="password_confirm" required placeholder="Подтвердите пароль">
                <button type="submit" name="REGISTR">Зарегистрироваться</button>

                <p>
                    У вас уже есть аккаунт? - <a href="Authe.php">авторизируйтесь</a>!
                </p>
            </fieldset>
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
