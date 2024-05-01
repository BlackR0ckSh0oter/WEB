<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
include 'Connect.php'; 

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Text.css">
    <link rel="stylesheet" href="Shadow.css">
    <link rel="icon" href="logo1.png">
 
</head>
<body>

    <!-- Navbar -->
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
    <!-- Navbar end -->
    <!-- Jumbotron -->
    <section class="jumbotron">
        <div class="container">
            <div class="jumbotron-items">
                <div class="jumbotron-item">
                    <h1>Вдохните свежий воздух приключений!</h1>
                    <p>Планирование отдыха – это как создание картины, где каждый момент – крошечная красочная кисточка, придающая жизнь мечтам. Это время, когда сердце плещется волной ожидания, когда каждая деталь внимательно прорабатывается, чтобы создать полотно идеального удовольствия.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Jumbotron end -->

    <!-- Блог -->
    <section class="blog">
        <div class="container">
            <?php $NEWS = mysqli_query($dp, "SELECT * FROM Новости ORDER BY RAND() LIMIT 2"); 
            $outblog = mysqli_fetch_array($NEWS);
            ?>
            <h2>Новости</h2>
            <div class="blog-posts">
                <div class="blog-post">
                    <iframe src="<?php echo $outblog[3]?>" frameborder="0" allowfullscreen></iframe>
                    <div class="blog-post-info">
                        <h3><?php echo $outblog[2]?></h3>
                        <p><?php echo $outblog[1]?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Блог end -->
</body>
</html>