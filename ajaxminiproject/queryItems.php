<?php

$username = "root";
$password = "";
$database = "test";

mysql_connect(localhost, $username, $password);
@mysql_select_db($database) or die( "Unable to select database");
$query = "SELECT * FROM ITEMS";
$result = mysql_query($query);

$num = mysql_numrows($result);

mysql_close();

echo "<h3>List of all items</h3>\n\n";

$i=0;
while ($i < $num) {
  $Itemid = mysql_result($result, $i, "Itemid");
  $ItemName = mysql_result($result, $i, "ItemName");
  $Price = mysql_result($result, $i, "Price");

  echo "<p>Item ID: $Itemid<br/>\nItem Name: $ItemName<br/>\nPrice: $Price</p>\n\n";

  $i++;
}


?>
