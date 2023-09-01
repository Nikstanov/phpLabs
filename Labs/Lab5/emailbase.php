<?php

$name = "Tom";

header("Location: ../Lab3/ex1.php");

setcookie("name",$name,0,"/");
setcookie("name1",$name, time() + 3600,"/");

