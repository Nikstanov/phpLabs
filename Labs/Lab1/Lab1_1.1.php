<?php

foreach($_GET as $key => $value){
    $tmp = $value;
    if(is_numeric($tmp)){
        if(str_contains($tmp,'.')){
            echo "float $value \n";   
        }
        else{
            echo "int $value \n";   
        }
    }
    else{
        $tmp = strtoupper($tmp);
        if($tmp == 'TRUE' || $tmp == 'FALSE'){
            echo "boolean $value \n";
        }
        else{
            echo "string $value \n"; 
        }    
    }
}