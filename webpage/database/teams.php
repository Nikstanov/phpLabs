<?php

require "boot.php";
function getDayMatches(){

    $link=mysqli_connect("localhost", "root", "Nav19121998.", "Games");
    $link = Data::getInstance()->getGamesBase();


    for($j = 0; $j < 7; $j++){
        $date = time() + 60*60*24*$j;
        $query = mysqli_query($link,"SELECT * FROM `Games` WHERE `date`='".date("Y-m-j",$date)."' ORDER BY `time` ASC");

    echo "<div class=\"day-matches\">
    <div class=\"day\">".date("l Y-m-j",$date)."</div>
    ";
    for($i = 0;$i < $query->num_rows;$i++){
        $data = mysqli_fetch_assoc($query);
        echo "    <div class=\"match\">
        <div>".$data['time']."</div>
        <div>
            <h4>".$data['team1']."</h4>
            <h4>".$data['team2']."</h4>
        </div>
        <div class=\"chemp\">".$data['tournament']."</div>
        <img src=\"/webpage/resourses/esl.webp\">
    </div>
";
    }
    if($query->num_rows == 0){
        echo "<h3 style=\"text-align:center;\">Матчей нет</h3>";
    }
    echo "</div>";
    }

    
}


function findGamesByTeamName(){
    
    if(isset($_POST['search_value'])){
        $link=Data::getInstance()->getUserBase();
        //mysqli_query($link,"INSERT INTO `search` (`user_id`, `search_value`, `date`) VALUES ('11','some','".date("Y-m-j h:i:s")."')");    
        
        $gamesLink = Data::getInstance()->getGamesBase();
        $value = $_POST['search_value'];
        $query = mysqli_query($gamesLink,"SELECT * FROM Games WHERE team1='".mysqli_real_escape_string($link,$_POST['search_value'])."' || team2 ='".mysqli_real_escape_string($link,$_POST['search_value'])."'");
        for($i = 0;$i < $query->num_rows;$i++){
            $data = mysqli_fetch_assoc($query);
            echo "<p>".$data['team1']." vs ".$data['team2']." ".$data['date']." ".$data['time']."</p>\n";
        }
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
        {
            mysqli_query($link,"INSERT INTO `search` (`user_id`, `search_value`, `date`) VALUES ('".$_COOKIE['id']."','$value','".date("Y-m-j h:i:s")."')");    
        }
    }

}
