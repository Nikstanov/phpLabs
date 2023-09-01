<?php

require "../database/boot.php";

$link=Data::getInstance()->getUserBase();
// $login = $_POST['login'];
// mysqli_query($link,"INSERT INTO users (user_id, user_login, user_password, user_hash, user_ip) VALUES ('0', '$login', '121313131', 'fdsfafsdfgdsgfsdg', '0')");

    $err = [];

    if(strlen($_POST['login']) < 3 or strlen($_POST['login']) > 30)
    {
        $err[] = "Логин должен быть не меньше 3-х символов и не больше 30";
    }

    //проверяем, не сущестует ли пользователя с таким именем
    $query = mysqli_query($link, "SELECT user_id FROM users WHERE user_login='".mysqli_real_escape_string($link, $_POST['login'])."'");
    if(mysqli_num_rows($query) > 0)
    {
        $err[] = "Пользователь с таким логином уже существует в базе данных";
    }

    // Если нет ошибок, то добавляем в БД нового пользователя
    if(count($err) == 0)
    {
         $login = $_POST['login'];

         // Убераем лишние пробелы и делаем двойное хеширование
         $password = md5(md5(trim($_POST['password'])));

         mysqli_query($link,"INSERT INTO users (user_id, user_login, user_password, user_hash, user_ip) VALUES ('0', '$login', '$password', 'fdsfafsdfgdsgfsdg', '0')");

         header("Location: ../sign_in/sign_in.php"); exit();
    }
    else{
    
    }


header("Location: registration.php"); exit();
?>
