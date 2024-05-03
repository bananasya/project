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
        <div class="navigation-container"> 
            <div class="navigation-row"> 
                <div class="logo"> 
                    <a href="#">BUDKEVICH</a> 
                </div> 
                <div> 
                    <ul class="navigation"> 
                        <li><a href="https://instagram.com/nastushk_a_b">INSTAGRAM</a></li> 
                        <li><a href="https://wa.me/79585681470">WHATS APP</a></li> 
                        <li><a href="https://t.me/banannasya">TELEGRAM</a></li> 
                    </ul> 
                </div> 
            </div> 
        </div> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-4"> 
                    <img alt="logo" class="style_logo" src="image/barbie_97382.jpg"> 
                </div> 
                <div class="col-8 about"> 
                    <h1>ABOUT ME</h1> 
                    <p>Всем привет!<br>Меня зовут Анастасия Александровна. Я студент 2 курса Российского Технологического Университета МИРЭА.<br> 
                    В университе я обучаюсь по профилю "Безопасность инормационных технологий в правохранительной  
                    сфере" на специальность компьтерная экспертиза. <br> 
                    В данный момент я одной из моих главных задач является успешное прохождение обучения для последующего 
                    прохождения на стажировку в Positive Technology, так как считаю эту компанию самой крутой на рынке  
                    кибербезопасности, что подтверждает статистика. 
                    </p> 
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="button_js">
                    <button id="myButton"><span>Click me</span></button> 
                    <p id="demo"></p>
                </div>
            </div> 
        </div> 
        <div class="container"> 
            <div class="row"> 
                <div class="col-12"> 
                    <h3 class="autorization">Привет, <?php echo $_COOKIE['User']?></h3> 
                </div> 
                <div class="col-12"> 
                    <form method='POST' action='profile.php' enctype="multipart/form-data" name="upload">
                        <div class="form-group">
                            <label>Введите заголовок поста</label>
                            <input type="text" class="form-control" name="title" placeholder="Заголовок поста">
                        </div>
                        <div class="form-group">
                            <label>Введите сообщение</label>
                            <textarea class="form-control" name="text" placeholder="Сообщение" rows="5"></textarea>
                        </div>
                        <input type="file" name="file" /><br>
                        <button type="submit" class="singin_button btn btn-primary" name="submit">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="js/button.js"></script>
    </body> 
</html>

<?php
require_once('/var/www/html/db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];

    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");

    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 102400))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }

}
