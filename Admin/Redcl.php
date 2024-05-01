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
    <link rel="stylesheet" href="../Shadow.css">
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

        <div class="table">
    <div class="txt">
        <h1 class="features-t">Информация о клиентах</h1>
        <table align="center">
            <tr>
                <td>
                    <div align="center"><a href="Prof.php"><button>Вернуться назад</button></a></div>
                </td>
                <td>
                    <div align="center"><a href="../#" target="_blank"><button>Перейти на страницу клиента</button></a></div>
                </td>
            </tr>
        </table>

        <?php
        $IDclient  =  $_GET ['IDclient'];
        $ZAKclient  =  $_GET ['ZAKclient'];
        $CLIENTI = mysqli_query($dp, "SELECT * FROM клиенты");

        if($IDclient > 0) {
            $CLIENTIS = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM клиенты WHERE клиенты.`ID клиента` = $IDclient")));
        ?>
        <table align="center" class="serv-tables">
            <tr>
                <th align="center" colspan="2"><b>Обновление данных клиента</b></th>
            </tr>
            <form method="POST">
                <tr>
                    <td>ФИО: <b><?php echo $CLIENTIS['ФИО']; ?></b></td>
                    <td><input type="text" name="newFIO"></td>
                </tr>
                <tr>
                    <td>Логин: <b><?php echo $CLIENTIS['Логин']; ?></b></td>
                    <td><input type="text" name="newLOGIN"></td>
                </tr>
                <tr>
                    <td>Номер телефона: <b><?php echo $CLIENTIS['Номер телефона']; ?></b></td>
                    <td><input type="text" name="newEMAIL"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="update" value="Обновить">
                        <a href="Redcl.php">Отмена</a>
                    </td>
                </tr>
            </form>
        <?php 
        } else if($ZAKclient > 0) {
        ?>
        <table align="center" class="serv-tables" >
            <tr>
                <th>Услуга</th>
                <th>Цена услуги</th>
                <th>Добавление в корзину</th>
            </tr>
            <?php
            $SEL = mysqli_fetch_array(mysqli_query($dp,"SELECT * FROM клиенты where клиенты.`ID клиента` = '$ZAKclient'"));
            $SERV = mysqli_query($dp, "SELECT * FROM cart where cart.user = '$SEL[2]'"); 
            while($outserv = mysqli_fetch_array($SERV)) {
                echo '<tr>
                    <td>'. mysqli_fetch_array(mysqli_query($dp, "SELECT name FROM product where product.id = $outserv[2]"))[0] . '</td>
                    <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT summa FROM product where product.id = $outserv[2]"))[0].'</td>
                    <td>' .$outserv[3].'</td>
                    </tr>';
            }
            echo "</table>";
            ?>
            </table>
            </br></br>
            <div class="navs-item" align="center"><a href="redC.php"><button class="btn txt-uppercase shadow-sm blue">Назад</button></a></div>
        <?php
        } else {
        ?>
        <table align="center" class="serv-tables" >
            <tr>
                <th>Клиент</th>
                <th>Логин</th>
                <th>Номер телефона</th>
                <th>Дата регистрации</th>
                <th colspan="4">Действие</th>
            </tr>
            <?php
            while($OutCL = mysqli_fetch_array($CLIENTI)) {
                echo '<tr>
                    <td>' . $OutCL['ID клиента'] . '</td>
                    <td>' . $OutCL['ФИО'] . '</td>
                    <td>' . $OutCL['Логин'] . '</td>  
                    <td>' . $OutCL['Номер телефона'] . '</td>  
                    <td><div class="navs-item notbtn"><a href="redcl.php?IDclient=' . $OutCL['ID клиента'] . '"class="txt-uppercase">Редактировать</a></div></td>
                    <td><div class="navs-item notbtn"><a href="redcl.php?DELclient=' . $OutCL['ID клиента'] . '"class="txt-uppercase">Удалить</a></div></td>
                    <td><div class="navs-item notbtn"><a href="redcl.php?ZAKclient=' . $OutCL['ID клиента'] . '"class="txt-uppercase">Заказы</a></div></td>
                    <td><div class="navs-item notbtn"><a href="prevCl.php?prevCID=' . $OutCL['ID клиента'] . '"class="txt-uppercase">Предварительный просмотр ЛК</a></div></td>
                </tr>';
            } 
            echo '</table>';
        }

        $DELclient  =  $_GET ['DELclient'];
        if($DELclient > 0){
            mysqli_query($dp , "DELETE FROM  `клиенты` WHERE  `клиенты`.`ID клиента` = '$DELclient'");
        }

        if (isset($_POST["update"])){
            $newFIO = $_POST["newFIO"];
            $newLOGIN = $_POST["newLOGIN"];
            $newEMAIL = $_POST["newEMAIL"];

            if(!empty($newFIO)){
                mysqli_query($dp, "UPDATE `клиенты` SET `ФИО` = '$newFIO'WHERE `клиенты`.`ID клиента` = '$IDclient'" );
            }
            if(!empty($newLOGIN)){
                mysqli_query($dp, "UPDATE `клиенты` SET `Логин` = '$newLOGIN' WHERE `клиенты`.`ID клиента` = '$IDclient'" );
            }
            if(!empty($newEMAIL)){
                mysqli_query($dp, "UPDATE `клиенты` SET `Номер телефона` = '$newEMAIL' WHERE `клиенты`.`ID клиента` = '$IDclient'" );
            }       
        }
        ?>

    </div>
</div>


</body>
</html>