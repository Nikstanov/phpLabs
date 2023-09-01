<?php

require "boot.php";
function findGamesByTeamName(){
    if(isset($_POST['search_value'])){
        $link=Data::getInstance()->getUserBase();
        $gamesLink = Data::getInstance()->getGamesBase();
        $value = $_POST['search_value'];
        $query = mysqli_query($gamesLink,"SELECT * FROM Games WHERE team1='".mysqli_real_escape_string($link,$_POST['search_value'])."' || team2 ='".mysqli_real_escape_string($link,$_POST['search_value'])."'");
        for($i = 0;$i < $query->num_rows;$i++){
            $data = mysqli_fetch_assoc($query);
            echo "<p>".$data['team1']." vs ".$data['team1']." ".$data['date']." ".$data['time']."</p>\n";
        }
        if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
        {
            mysqli_query($link,"INSERT INTO `search` (user_id, search_value, `date`) VALUES (".$_COOKIE['id'].",'$value',".date("Y-m-j h:i:s").")");    
        }
    }

}