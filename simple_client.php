<?php

$echo = $_GET['input'];

print "<h2>Echo Web Service</h2>";
print "<form action='simple_client.php' method='GET'/>";
print "<input name='input' value='$echo'/><br/>";
print "<input type='Submit' name='submit' value='GO'/>";
print "</form>";

if($echo != ''){
    $client = new SoapClient(null, array(
      'location' => "http://localhost/code/test/os-php-webservice.source/simple_server.php",
      'uri'      => "urn://tyler/req"));

    $result = $client->__soapCall("echoo",array($echo));

    print $result;
}
?>

