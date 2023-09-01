<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styles/main.css" rel="stylesheet" type="text/css">
    <title>hltv2</title>
</head>
<body>
    <header>
        <div class="nav-bar">
            <h1 class="main-tag"><a href="/webpage/index.php">HLTV</a></h1>
            <div class="nav-link"><a>Tournaments</a></div>
            <?php 
                //require "database/boot.php";
                $link=mysqli_connect("localhost", "root", "Nav19121998.", "Users");
                //$link = Data::getInstance()->getUserBase();
                $flag = false;
                if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
                {
                    $query = mysqli_query($link, "SELECT *,INET_NTOA(user_ip) AS user_ip FROM users WHERE user_id = '".intval($_COOKIE['id'])."' LIMIT 1");
                    $userdata = mysqli_fetch_assoc($query);
                
                    $flag = true;
                    if($_COOKIE['id'] == 1){
                        echo "<div class=\"nav-link\"><a href=\"/webpage/database/admin\admin.php\">Админка</a></div>";   
                    }
                    echo "<div class=\"nav-link\"><a href=\"/webpage/database/logout.php\">Выйти</a></div>";

                }
                if(!$flag){
                    echo "<div class=\"nav-link\"><a href=\"/webpage/register/registration.php\">Регистрация</a></div>\n";
                    echo "<div class=\"nav-link\"><a href=\"/webpage/sign_in/sign_in.php\">Войти</a></div>";
                }

            ?>
        </div>
    </header>
    <div class="banner"><img src="/webpage/resourses/banner.jpg"></div>
    <div class="main-body"> 
        <div class="days">
            <?php require "database/teams.php"; getDayMatches();?>
            
        </div>
        <div class="news-bar">
            <h3 style="text-align: center; font-size: 3ch;">SEARCH</h3>
            <form method="post">
                <input type="text" name="search_value" placeholder="smth@gmail.com">
                <button>Search</button>
            </form>
            <?php findGamesByTeamName();?>
            <h3 style="text-align: center; font-size: 3ch;">NEWS</h3>
            <div class="news">
                <a href="https://www.cybersport.ru/tags/dota-2/legkoe-chto-gde-kogda-po-dota-2-s-nim-spravitsia-99-naseleniia-zemli"><img src="/webpage/resourses/news1.webp" class="news-img"></a>
                Легкое «Что? Где? Когда?» по Dota 2 — с ним справится 99% населения Земли
            </div>
            <div class="news">
                <a href="https://www.cybersport.ru/tags/cs-go/raspisanie-i-rezultaty-esl-pro-league-season-17?utm_referrer=https%3A%2F%2Fwww.cybersport.ru%2F"><img src="/webpage/resourses/news2.webp" class="news-img"></a>
                Расписание и результаты ESL Pro League Season 17
            </div>
            <div class="news">
                <a href="https://www.cybersport.ru/tags/cs-go/raspisanie-i-rezultaty-esl-pro-league-season-17?utm_referrer=https%3A%2F%2Fwww.cybersport.ru%2F"><img src="/webpage/resourses/SignInBanner.jpg" class="news-img"></a>
                Расписание и результаты ESL Pro League Season 17
            </div>
        </div>
    </div>
    <footer>
        <div>
            <img src="/webpage/resourses/avatar .webp" class="person-page">
        </div>
        <div class="footer-info">
            <a href="https://github.com/Nikstanov">github: Nikstanov</a>
            <span>telegram: @Nikstanov</span>
        </div>
    </footer>
</body>
</html>
