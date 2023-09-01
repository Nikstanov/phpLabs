<!DOCKTYPE html>
<html>
<head>
	<title>lab1_2</title>
    <link href="/Labs/Lab2/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<p>Search</p>
<form method="POST">
	<p><input type="text" name="search_name"> name</p>
	<input type="submit" value="search">
</form>
<p>Add new</p>
<form method="POST">
	<p><input type="text" name="name"> name</p>
    <p><input type="text" name="address"> address</p>
    <p><input type="text" name="phone"> phone</p>
    <p><input type="text" name="email"> email</p>
	<input type="submit" value="send">
</form>
    <?php someFunc() ?>
</body>
</html>

<?php 
function someFunc(){
    
    $count = 0;
    $file = fopen("/var/www/Labs/Lab2/companies.csv",'a+');
    $companies = array();
    while(!feof($file)){
        $str = fgets($file);
        $name = substr($str,0,strpos($str,','));
        $str = substr($str,strpos($str,',') + 1,null);
        $address = substr($str,0,strpos($str,','));
        $str = substr($str,strpos($str,',') + 1,null);
        $phone = substr($str,0,strpos($str,','));
        $str = substr($str,strpos($str,',') + 1,null);
        $companies[$name] = array($address,$phone,$str);
        $count++;
    }
    $isSearched = null;
    if(isset($_POST["search_name"]) & $_POST["search_name"] != ""){
        $name = $_POST["search_name"];
        if($companies[$name] != null){
            $isSearched = $name;
            $company = $companies[$name];
            echo "<p>$name, $company[0], $company[1], $company[2]</p>";
        }
        else{
            echo "not found";
        }
    }
	if(isset($_POST["name"]) && $_POST["name"] != "" && $_POST["address"] != "" && $_POST["phone"] != "" && $_POST["email"] != ""){
		$name = $_POST["name"];
        $address = $_POST["address"];
        if(is_numeric($_POST["phone"])){
            $phone = $_POST["phone"];
            $email = $_POST["email"];
            if($name != "" && $companies[$name] == null){
                $companies[$name] = array(0 => $address, 1 => $phone, 2 => $email); 
                fwrite($file,"\n$name,$address,$phone,$email");
            }
            else{
                echo "already exists or incorrect input";
            }
        }
        else{
            echo "incorrect phone input";    
        }
	}
    fclose($file);
    echo "<table><caption>Companies</caption><tr><th>Name</th><th>Address</th><th>Phone</th><th>Email</th></tr>";
    foreach($companies as $name => $info){
        if($isSearched != null & $isSearched == $name){
            echo "<tr style=\"background-color:LightGrey\"><td>$name</td><td>$info[0]</td><td>$info[1]</td><td>$info[2]</td></tr>";
        }
        else{
            echo "<tr><td>$name</td><td>$info[0]</td><td>$info[1]</td><td>$info[2]</td></tr>";
        }
    }
    echo "</table>";
}