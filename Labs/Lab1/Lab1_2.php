<!DOCKTYPE html>
<html>
<head>
	<title>lab1_2</title>
</head>
<body>
<form method="POST">
	<p><input type="text" name="count"></p>
	<input type="submit" value="send">
</form>
<?php
	$count;
	if(isset($_POST["count"])){
		$count = $_POST["count"];
		if($count < 1000){
			$green = ($count - ($count % 5)) / 5;
			$chng = 255 / ($count - $green); 
			$color = 0;
			echo "<table style=\"width:20%\">";
    			for($i = 1; $i <= $count;$i++){
        		echo "<tr><td style=\"height: 10px; background-color:";
        		if($i % 5 == 0){
            			echo "#00FF00";
        		}
        		else{
            			echo "rgb($color,$color,$color)";
            			$color += $chng;
						if($color >= 255){
							$color = 0;
						}
        		}

        		echo "\"></td></tr>";
    		}
    		echo "</table>";	
		}
	}
?>
</body>
</html>
