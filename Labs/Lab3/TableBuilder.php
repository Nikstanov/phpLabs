<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>


<?php
class TableBuilder
{
    public $rows = [];
    public $header_fields = [];
    public $length = 0;


    public function __construct(...$headers)
    {
        foreach($headers as $header)
        {
            $this->header_fields[] = $header;
        }
        $this->length = count($this->header_fields);
    }

    public function addRow(...$values)
    {
        if(count($values) > $this->length)
            throw new Exception("Row creation error");
        $this->rows[] = $values;
    }
    private function createHeader($value)
    {
        echo "<th>$value</th>";
    }
    private function addData($values)
    {
        foreach($values as $value)
        {
            echo "<td>$value</td>";
        }
    }
    private function createRow($value)
    {
        echo "<tr>";
        $this->addData($value);
        echo "</tr>";
    }
    public function getTable() : bool
    {
        $cur_row = 0;
        echo "<table>";
        foreach($this->header_fields as $header)
        {
            $this->createHeader($header);
        }
        foreach($this->rows as $row_data)
        {
            $this->createRow($row_data);
        }
        echo "</table>";
        return true;
    }
}

$tableBuilder = new TableBuilder("column","column1");
$tableBuilder->addRow("Row1","Row2");
$tableBuilder->getTable();
?>

</body>
</html>


