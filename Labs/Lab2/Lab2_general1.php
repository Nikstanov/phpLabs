<?php

$array = array(123,55,55,array(55,123,1,123),array(array(55,55,22)));
$values = array();
arrayClear($array, $values);
print_r($array);
print_r($values);

function arrayClear(&$array, &$values){
    foreach($array as &$value){
        if(is_array($value)){
            arrayClear($value,$values);
        }
        else{
            if($values[$value] == null){
                $values[$value] = 1;
            }
            else{
                unset($array[array_search($value,$array)]);
            }
        }
    }
}