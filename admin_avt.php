<?php
//  session_start();
//  echo $_SESSION['admin'];
 require'db.php'; 
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/reset.css">
    <link rel="stylesheet" href="styles/main.css">
    <title>Document</title>
</head>
<body>
    <section class="main">
        <div class="modal show">
            <div class="modal__dialog" style = "display:flex; justify-content:center; align-items:center;">
                <div class="modal__content"  style="max-width: 20vw">
                <p>Авторизация:</p>
                <form action="getaccess.php" method="post">
                    <input name="login" placeholder="Логин">
                    <input type="password" name="password" placeholder="Пароль">
                    <input type="submit" value="Войти">
                </form>
                </div>
            </div>
        </div>
    </section>
</body>
</html>