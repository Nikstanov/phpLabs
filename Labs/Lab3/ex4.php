<!DOCKTYPE html>
<html>
<head>
	<title>lab4</title>
</head>
<body>
<form method="POST">
	<p><input type="text" name="day"> date</p>
	<input type="submit" value="send">
</form>
    <?php someFunc() ?>
</body>
</html>
<?php



class SmartDay {

    private int $month, $day, $year, $timestamp0;

    function __construct($str){
        $this->day = substr($str,0,strpos($str,'.'));
        $str = substr($str,strpos($str,'.') + 1,null);
        $this->month = substr($str,0,strpos($str,'.'));
        $str = substr($str,strpos($str,'.') + 1,null);
        $this->year = $str;
        $this->timestamp0 = strtotime($this->day.".".$this->month.".".$this->year);
    }

    function isSunday() : bool {
        if(date("l",mktime(0,0,0,$this->month, $this->day, $this->year)) == "Sunday"){
            return true;
        }
        return false;
    }

    function isSaturday() : bool {
        if(date("l",mktime(0,0,0,$this->month, $this->day, $this->year)) == "Saturday"){
            return true;
        }
        return false;
    }

    function distance($type): string{
        $diff = abs(time() - $this->timestamp0);
        if($type == "years"){
            return date('Y',$diff)-1970;
        }
        if($type == "months"){
            return (((int)date('Y',$diff)-1970)*12 + (int)date('m',$diff)) - 1;
        }
        if($type == "days"){
            return (int)($diff/(24*3600))+1;
        }
        return "incorrect type";
    }

    function isLeap() : int{
        if($this->year%100==0){
            if($this->year%400==0){
                return 1;
            }
        }
        else{
            if($this->year%4==0){
                return 1;
            }
        }
        return 0;
    }
}

function someFunc(){
    if(isset($_POST["day"])){
        $test = new SmartDay($_POST["day"]);
        echo "<p>leap: ".$test->isLeap()."</p>\n";
        if($test->isSaturday()){
            echo "<p>saturday: true</p>\n";
        }
        else{
            echo "<p>saturday: false</p>\n";
        }
        if($test->isSunday()){
            echo "<p>sunday: true</p>\n";
        }
        else{
            echo "<p>sunday: false</p>\n";
        }
        
        echo "<p>diff in years: ".$test->distance("years")."</p>\n";
        echo "<p>diff in months: ".$test->distance("months")."</p>\n";
        echo "<p>diff in days: ".$test->distance("days")."</p>\n";
    }
    else{
        //$test = new SmartDay();  
    }
}


