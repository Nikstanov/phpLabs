<?php
// Страница авторизации

require "../database/boot.php";
// Соединямся с БД
$link=Data::getInstance()->getUserBase();
//Вытаскиваем из БД запись, у которой логин равняеться введенному
$query = mysqli_query($link,"SELECT user_id, user_password FROM users WHERE user_login='".mysqli_real_escape_string($link,$_POST['login'])."' LIMIT 1");
$data = mysqli_fetch_assoc($query);


    // Сравниваем пароли
    if($data['user_password'] === md5(md5(trim($_POST['password']))))
    {

        // Генерируем случайное число и шифруем его
        $hash = md5(generateCode(10));

        // Записываем в БД новый хеш авторизации и IP
        mysqli_query($link, "UPDATE users SET user_hash='".$hash."' WHERE user_id='".$data['user_id']."'");

        // Ставим куки
        if($_POST['dontSave']){
            setcookie("id", $data['user_id'], 0, "/");
            setcookie("hash", $hash, 0, "/", null, null, true);
        }
        else{
            setcookie("id", $data['user_id'], time()+60*60*24*30, "/");
            setcookie("hash", $hash, time()+60*60*24*30, "/", null, null, true);
        }
        

        header("Location: ../index.php"); exit();
    }
    else{}

header("Location: sign_in.php"); exit();

// Функция для генерации случайной строки
function generateCode($length=6) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHI JKLMNOPRQSTUVWXYZ0123456789";
    $code = "";
    $clen = strlen($chars) - 1;
    while (strlen($code) < $length) {
            $code .= $chars[mt_rand(0,$clen)];
    }
    return $code;
}

