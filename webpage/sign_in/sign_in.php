<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/webpage/sign_in/signIn.css" rel="stylesheet" type="text/css">
    <title>SignIn</title>
</head>
<body>
    <header> 
        <div class="nav-bar">
            <h1 class="main-tag"><a href="/webpage/index.php">HLTV</a></h1>
            <div class="nav-link"><a>Tournaments</a></div>
            <div class="nav-link"><a href="/webpage/register/registration.php">Регистрация</a></div>
        </div>
    </header>  
    
    <div class="signInBody">
        <img src="/webpage/resourses/SignInBanner.jpg"> 
        <h1>Sign in</h1>
        <form class="formPart" method="post" action="signIn.php">
            <input type="text" name="login" placeholder="smth@gmail.com">
            <input type="text" name="password" placeholder="12345678">
            
            <button>Let's go</button>

            <div style="display: flex; flex-direction: row; height: 40pt;">
                <input type= "checkbox" name="dontSave">
                <p style=" font-size: small;">Чужой компьтер</p>
            </div>
        </form>
    </div> 
</body>
</html>