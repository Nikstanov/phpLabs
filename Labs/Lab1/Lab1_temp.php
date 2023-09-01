<?php

for($i = 1; $i < count($argv); $i++){
    $tmp = $argv[$i];
    if(is_numeric($tmp)){
        if(str_contains($tmp,'.')){
            echo "float $argv[$i] \n";   
        }
        else{
            echo "int $argv[$i] \n";   
        }
    }
    else{
        $tmp = strtoupper($tmp);
        if($tmp == 'TRUE' || $tmp == 'FALSE'){
            echo "boolean $argv[$i] \n";
        }
        else{
            echo "string $argv[$i] \n"; 
        }    
    }

    $tmp = $argv[$i];
    settype($tmp,"integer");
    settype($tmp,"string");
    if($tmp == $argv[$i]){
        echo "int $argv[$i] \n";
        continue;
    }
    $tmp = $argv[$i];
    $tmp = strtoupper($tmp);
    if($tmp == 'TRUE' || $tmp == 'FALSE'){
        echo "boolean $argv[$i] \n";
        continue;
    }
    $tmp = $argv[$i];
    settype($tmp,"float");
    settype($tmp,"string");
    if($tmp == $argv[$i]){
        echo "float $argv[$i] \n";
        continue;
    }
    echo "string $argv[$i] \n";
}