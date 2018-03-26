<?php
require('header.php');

$make = $_GET['make'];
$model = $_GET['model'];
$year = $_GET['year'];
print "<h3>Search for vehicles based on year, make or model:</h3>";
print "<table>";
print "<form action='index.php' method='GET'>";
print "<tr><td>Make:</td><td><input name='make' value='$make'/></td></tr>";
print "<tr><td>Model:</td><td><input name='model' value='$model'/></td></tr>";
print "<tr><td>Year:</td><td><input name='year' value='$year'/></td></tr>";
print "<tr><td><input type='submit' name='submit' value='GO'/></td></tr>";
print "</form>";
print "</table>";

if($_GET['submit'] === 'GO' && ($make != '' || $model != '' || $year != '')){
    print "<h3>Search Results:</h3>";
    require('simple_client.php');
}

require('footer.php');
?>

