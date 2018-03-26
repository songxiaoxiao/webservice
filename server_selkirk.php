<?php

define('TABLE', 'vehicles_selkirk');

function db_connect($dbname='DEALER',
                    $username='dealer',
                    $password='dealer'){
    $pdo = new PDO("odbc:$dbname", $username, $password);
    return $pdo;
}

function vehicleLookup($make, $model, $year){
    $pdo = db_connect();
    $queryMake = '';
    $queryModel = '';
    $queryYear = '';
    $query = '';

    if($make != '')
        $queryMake = "make='$make'";
    $query = $queryMake;

    if($model != '')
        $queryModel = "model = '$model'";
    if($query != '' && $queryModel != '')
        $query .= " and $queryModel";
    else if($queryModel != '')
        $query = $queryModel;

    if($year != '')
        $queryYear = " yyear = '$year' ";
    if($query != '' && $queryYear != '')
        $query .= " and $queryYear";
    else if($queryYear != '')
        $query = $queryYear;

    $sql = "select * from ".TABLE." where $query";

    $ret = '';
    foreach($pdo->query($sql) as $row){
        $make = $row['MAKE'];
        $model = $row['MODEL'];
        $year = $row['YYEAR'];
        $price = $row['PRICE'];
        $desc = $row['FEATURE_DESC'];
        $ret .= "<tr><td>$make</td>";
        $ret .= "<td>$model</td>";
        $ret .= "<td>$year</td>";
        $ret .= "<td>$price</td>";
        $ret .= "<td>$desc</td></tr>";
    }
    return $ret;
}

$server = new SoapServer(null,
                         array('uri' => "urn://tyler/res"));
$server->addFunction('vehicleLookup');
$server->handle();

?>



