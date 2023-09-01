<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FileDir</title>
</head>

<body>

<?php

require "ex2.php";
class FileSystemObject
{
    public $Size;
    public $FileSystemName;
    public $Type;
    public $files = [];
    public $Metrics = ["B","KB","MB","GB","TB"];

    public $count;

    public function __construct($FileName, $Size, $Type)
    {
        $this->FileSystemName = $FileName;
        $this->Size = $Size;
        $this->count = 0;
        $this->Type = $Type;
    }

    public function SearchDir()
    {
        $Size = 0;
        $this->count++;
        if (is_dir($this->FileSystemName) && $this->FileSystemName !== '.' && $this->FileSystemName !== '..') {
            $result = opendir($this->FileSystemName);
//            $this->Size = $this->dir_size();
            while (false !== ($file = readdir($result))) {
                if (!is_dir($this->FileSystemName . "/" . $file)) {
                    $this->files[] = new FileSystemObject($file, filesize($this->FileSystemName . "/" . $file), "File");
                    $Size +=filesize($this->FileSystemName . "/" . $file);
                } else {
                    if ($file !== "." && $file !== "..") {
                        $this->files[] = new FileSystemObject($this->FileSystemName . "/" . $file, 0, "Folder");
                        $NewDir = count($this->files);
                        $this->files[$NewDir - 1]->count = $this->count;
                        $Size +=  $this->files[$NewDir - 1]->SearchDir();
                    }


                }

            }
        }
        $this->Size = $Size;
        return $Size;

    }
    public function Display($Metric)
    {
        $index = array_search($Metric, $this->Metrics);
        $Div = 1;
        for ($i = 0; $i < $index; $i++)
        {
            $Div /= 1024;
        }
        $tab = str_repeat('&nbsp&nbsp;', 4);
        $space = str_repeat('&nbsp&nbsp;', $this->count);
        echo str_repeat('&nbsp&nbsp;', $this->count-1).$this->FileSystemName .$tab.$this->Size*$Div.$tab.$this->Type. "<br>";
        foreach ($this->files as $files) {
            if (is_dir($files->FileSystemName)) {
                $files->Display($Metric);
            }else
                echo $space.$files->FileSystemName .$tab.$files->Size*$Div.$tab.$files->Type."<br>";
        }
    }
}


$form = new SafeFormBuilder(FormBuilder::METHOD_POST, '/Labs/Lab3/FileSystemObject.php', 'Enter');
$form->addTextField("Directory", "dir" );
$form->addTextField("Size","size" );
$form->getForm();

if (isset($_POST['Directory'], $_POST['Size'])) {
    $rootDir = $_POST['Directory'];

    if (is_dir($rootDir))
    {
        $Dir = new FileSystemObject($rootDir, 0, "Folder");
        $Dir->SearchDir();
        $Dir->Display($_POST["Size"]);
    }
    else
        echo "Incorrect input, try again";
}

?>
</body>

</html>

