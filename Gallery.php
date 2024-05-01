<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
include 'Connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Турбаза</title>


	<!-- CSS -->
	<link rel="stylesheet" href="Home.css">
    <link rel="stylesheet" href="Text.css">
    <link rel="stylesheet" href="Shadow.css">
	<!-- Лого сайта -->
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

		<!-- jumbotron -->
	<div class="container">
	<div class="jumbotron">
	<div class="features-box">
		<h1>Фото базы отдыха</h1>


			<?php $GAL = mysqli_query($dp, "SELECT * FROM галерея"); 
			while($outgal = mysqli_fetch_array($GAL))
			{
				echo '<img src="'.$outgal[1]. '" width="240" height="160">	';
			}
			?>

	</div>
	</div>
	</div>

</body>
</html>