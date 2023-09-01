<!DOCKTYPE html>
<html>
<head>
	<title>lab1_2</title>
</head>
<body>
<?php
    $cities = [];

	if(isset($_GET["cities"])){
        $str = $_GET["cities"];
	}
    $all_cities = array();
    $temp = array();
    while(strpos($str,',') != false){
        $name = substr($str,0,strpos($str,','));
        if($all_cities[$name] == null){
            $all_cities[$name] = 1;
            array_push($temp,$name);
        }
        $str = substr($str,strpos($str,',') + 1,null);
    }
    $name = $str;
    if($all_cities[$name] == null){
        $all_cities[$name] = 1;
        array_push($temp,$name);
    }
    sort($temp,SORT_STRING);
    foreach($temp as $city){
        echo "$city ";
    }
?>
</body>
</html>