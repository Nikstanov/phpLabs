<?php
require 'TableBuilder.php';

$tableBuilder = new TableBuilder("style='width: 500px;height: 300px;text-align: center;'");
?>
<html>
<head>
    <meta charset="UTF-8">

    <title>Lab #4_ext</title>

</head>
<body>

<div class="block">
    <?php
    $tableBuilder->addHeader(array("FirstName", "LastName", "Age"));
    $tableBuilder->addRow(array("John", "Sins", 35));
    $tableBuilder->addRow(array("Larry", "Crossbow", 25));
    $tableBuilder->getTable();
    ?>
</div>
</body>
</html>