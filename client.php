<?php

$client_steinbach = new SoapClient(null, array(
      'location' => "http://localhost/soap/server_steinbach.php",
      'uri'      => "urn://tyler/req",
      'trace'    => 1 ));

$client_pinefalls = new SoapClient(null, array(
      'location' => "http://localhost/soap/server_pinefalls.php",
      'uri'      => "urn://tyler/req",
      'trace'    => 1 ));

$client_selkirk = new SoapClient(null, array(
      'location' => "http://localhost/soap/server_selkirk.php",
      'uri'      => "urn://tyler/req",
      'trace'    => 1 ));

$result_steinbach = $client_steinbach->
    __soapCall("vehicleLookup",array($make,$model,$year));

$result_pinefalls = $client_pinefalls->
    __soapCall("vehicleLookup",array($make,$model,$year));

$result_selkirk = $client_selkirk->
    __soapCall("vehicleLookup",array($make,$model,$year));

if($result_steinbach != '' || $result_pinefalls != '' || $result_selkirk != ''){
    print "<table>";
    print "<tr><td><b>Make</b></td><td><b>Model</b></td>";
    print "<td><b>Year</b></td>";
    print "<td><b>Price</b></td><td><b>Description</b></td></tr>";
    print $result_steinbach;
    print $result_pinefalls;
    print $result_selkirk;
    print "</table>";
}

?>

