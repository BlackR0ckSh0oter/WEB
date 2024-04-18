<?php
session_start();
include 'Connect.php'; // Убедитесь, что Connect.php содержит код для подключения к базе данных
$flag = 0; // Инициализируем $flag

if (isset($_SESSION['user'])) {
    $flag = 1;
}

// Обработка отправленной формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверка, было ли отправлено письмо
    if (isset($_POST['send_email'])) {
        // Получение данных из формы
        $to = $_POST['to'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        // Отправка письма
        if (mail($to, $subject, $message)) {
            echo "<p>Письмо успешно отправлено!</p>";
        } else {
            echo "<p>Ошибка при отправке письма.</p>";
        }
    }
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
            <a href="#"><img src="logo1.png" alt="Логотип"></a>
        </div>
        <nav class="nav">
            <div class="nav-row">
                <a href="gallery.php">Галерея</a>
                <a href="Home.php">Турбазы</a>
                <?php if($flag == 1): ?>
                    <a href="Profile.php" class="btn">Личный кабинет</a>
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

<!-- Форма для отправки письма -->
<div class="table">
    <div class="txt">
        <h1 class="features-t">Написать на почту</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="from">От кого:</label><br>
            <input type="email" id="from" name="from" required><br>
            <label for="subject">Тема:</label><br>
            <input type="text" id="subject" name="subject" required><br>
            <label for="message">Сообщение:</label><br>
            <textarea id="message" name="message" rows="4" required></textarea><br>
            <input type="hidden" id="to" name="to" value="turbaza@mail.ru">
            <input type="submit" name="send_email" value="Отправить">
        </form>
    </div>
</div>

</body>
</html>