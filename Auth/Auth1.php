<?php
session_start();
if (!empty($_SESSION['user'])) {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
    <link rel="stylesheet" href="Assets/CSS/main.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>

<body>
    <form action="vendor/signin.php" method="post">
        <label>Почта</label>
        <input type="email" name="email" placeholder="Введите свою почту">
        <label>Пароль</label>
        <input type="password" name="pass" autocomplete="current-password" placeholder="Введите свой пароль">
        <button type="submit">Войти</button>
        <p>
            У вас нет аккаунта? - <a href="Register.php">зарегистрируйтесь</a>!
        </p>
        <?php
        if (!empty($_SESSION['message'])) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </form>
</body>

</html>