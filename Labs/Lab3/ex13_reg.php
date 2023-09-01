<!DOCKTYPE html>
<html>
<head>
	<title>lab1_2</title>
</head>
<body>
<form method="POST">
	<p><input type="text" name="string"></p>
	<input type="submit" value="send">
</form>

<?php

$reg = '/(\w{7,})/u';

if(isset($_POST["string"])){
    $str = $_POST["string"];
    echo preg_replace_callback($reg, function ($matches){ return mb_substr($matches[1],0,7).'*';}, $str);
}