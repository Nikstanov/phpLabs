<?php
if (file_exists($argv[1])) {
    $file = fopen($argv[1], 'a+');

    $buf = array();

    $ind = 0;
    while (!feof($file)) {
        $str = fgets($file);
        $buf[$ind] = $str;
        $ind++;
    }

    sort($buf, SORT_STRING);
    foreach ($buf as $value) {
        echo $value . "\n";
    }
}
else{
    echo "File not exist \n";
}

//print_r($buf);