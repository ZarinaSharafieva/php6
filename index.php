<?php
    require_once 'database/Database.php';

    $connection = new \database\Database('localhost', 'users', 'root', '');

    $connection = $connection->getConnection();

    session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>sm6</title>
</head>
<body class="">
    <main class="">

        <div class="container">
        <h1 class="">Авторизация</h1>
        <?php
            if(isset($_SESSION['user'])) {?>
                <form class="" action="actions/logout.php" method="post">
                    <button class="" type="submit">Выйти</button>
                </form>
            <?php } else {?>
                <form class="" action="actions/login.php" method="post">
                        <input class="" type="text" name="email" placeholder="Email"><br><br>
                        <input class="" type="password" name="password" placeholder="Пароль"><br><br>
                        <?php
                            if(isset($_SESSION['attempt'])) {?>
                                <div class="error">
                                    <?php
                                        echo $_SESSION['attempt'];
                                        unset($_SESSION['attempt']);
                                    ?>
                                </div>
                        <?php }
                    ?>
                    <button class="" type="submit">Авторизоваться</button>
                </form>
            <?php }
        ?>
        </div>

    </main>
</body>
</html>