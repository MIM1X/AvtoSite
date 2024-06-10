<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
    <link rel="stylesheet" href="reg.css"/>
    <title>Регестрация/Авторизация</title>
</head>
<body>
    <a class="WLMtxt">Для оформления заказа нужно авторизироваться на сайте</a>
<form action="register.php" method="post" class="reg">
<input  type="text" placeholder="Почта" name="Email">
<input  type="text" placeholder="Пароль" name="Passwd">
<input  type="text" placeholder="Повторите пароль" name="PasswdRep">
<button type="submit">Зарегестрироваться</button>
</form>

<form action="login.php" method="post" class="log">
<input type="text" placeholder="Почта" name="Email">
<input type="text" placeholder="Пароль" name="Passwd">
<button type="submit">Войти</button>
</form>

</body>
</html>