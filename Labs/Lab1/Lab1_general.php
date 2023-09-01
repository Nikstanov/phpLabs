<!DOCKTYPE html>
<html>
<head>
	<title>lab1_general</title>
    <link href="/Labs/Lab1/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <ul>
        <li><a href="/Labs/Lab1/Lab1_general.php?ref=company"<?php if($_GET["ref"]=="company"){echo "style=\"background-color:yellow;\"";}?>>О компании</a></li>
        <li><a href="/Labs/Lab1/Lab1_general.php?ref=services"<?php if($_GET["ref"]=="services"){echo "style=\"background-color:yellow;\"";}?>>Услуги</a></li>
        <li><a href="/Labs/Lab1/Lab1_general.php?ref=price"<?php if($_GET["ref"]=="price"){echo "style=\"background-color:yellow;\"";}?>>Прайс</a></li>
        <li><a href="/Labs/Lab1/Lab1_general.php?ref=contacts"<?php if($_GET["ref"]=="contacts"){echo "style=\"background-color:yellow;\"";}?>>Контакты</a></li>
    </ul>
</body>
</html>