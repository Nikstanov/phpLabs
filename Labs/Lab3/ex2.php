<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
</head>
<body> 
    <?php test(); ?> 
</body>
</html>

<?php

class FormBuilder {

    const METHOD_POST = 'FormBuilder::getPost';
    private $method, $action, $value;

    private $arrayValue = array();

    function __construct($method, $action, $value){
        $this->method = $method;
        $this->action = $action;
        $this->value = $value;
    }

    function addTextField($name, $defValue){
        array_push($this->arrayValue, "<input type=\"text\" name=\"$name\" value=\"$defValue\"/>");
    }

    function addRadioGroup($name, $defValue, $checked = ""){
        foreach($defValue as $value){
            $input = "<input type=\"radio\" name=\"$name\" value=\"$value\"";
            if($value == $checked){
                $input = $input." checked";
            }
            $input = $input."/>";
            array_push($this->arrayValue,$input);
            //array_push($this->arrayValue, "<input type=\"radio\" name=\"$name\" value=\"$value\"/>");
        }
    }

    function getForm(){
        $temp = $this->method;
        $temp($this->action, $this->arrayValue, $this->value);
    }

    static function getPost($action, $array, $value){
        echo "<form method=\"post\" action=\"$action\">\n";
        foreach($array as $str){
            echo " ".$str."\n";
        }
        echo " <input type=\"submit\" value=\"$value\"/>\n";
        echo "</form>\n";
    } 

}

class SafeFormBuilder extends FormBuilder {

    function addTextField($name, $defValue){
        if(isset($_POST[$name])){
            $defValue = $_POST[$name];
        }
        parent::addTextField($name, $defValue);
    }

    function addRadioGroup($name, $defValue, $checked = ""){
        $str = "";
        foreach($defValue as $value){
            if($_POST[$name] == $value){
                $str = $value;
            }
        }
        parent::addRadioGroup($name,$defValue,$str);
    }

}

function test(){
    $formBuilder = new SafeFormBuilder(FormBuilder::METHOD_POST, '/Labs/Lab3/ex2.php', 'Send!');
    $formBuilder->addTextField('someName', 'Default value');
    $formBuilder->addRadioGroup('someRadioName', ['A', 'B']);
    $formBuilder->getForm();
    foreach($_POST as $key => $value){
        echo $key." -> ".$value." ";
    }
}
