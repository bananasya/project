<!DOCTYPE html> 
<html lang="ru"> 
    <head> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <title>Будкевич А.А.</title> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
        <link href="css/style.css" rel="stylesheet"> 
    </head> 
    <body> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-12"> 
                    <h1 class="autorization">Регистрация</h1> 
                </div> 
                <div class="col-12"> 
                    <form method='POST' action='registration.php'>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Login</label>
                            <input type="text" class="form-control" name="login" placeholder="Login">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                        </div>
                        <button type="submit" class="singin_button btn btn-primary" name="submit">Продолжить</button>
                    </form>
                </div>
            </div>
        </div>
    </body> 
</html>

<?php
require_once('/var/www/html/db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_COOKIE['User'])) {
    header("Location: profile.php");
}

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $username = $_POST['login'];
    $password = $_POST['password'];

    if (!$email || !$username || !$password) die ('Пожалуйста введите все значения!');

    $sql = "INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$password')";

    if(!mysqli_query($link, $sql)) {
        echo "Не удалось добавить пользователя";
    }
}
?>
