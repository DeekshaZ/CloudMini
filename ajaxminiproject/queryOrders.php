<?php

$username = "root";
$password = "";
$database = "test";

$name = $_GET['name'];
$custid = $_GET['custid'];
mysql_connect(localhost, $username, $password);

@mysql_select_db($database) or die( "Unable to select database");
$query1 = "SELECT S.SHIPMENTID,S.SHIPMENTDATE,C.CUSTID,S.ITEMID,S.QUANTITY,C.NAME FROM SHIPMENT S, CUSTOMER C WHERE S.CUSTOMERID=C.CUSTID AND C.NAME = '$name'";
$result = mysql_query($query1);

$num = mysql_numrows($result);

mysql_close();

echo "<h3>Results of Query</h3>\n\n";

if ( $num == 0 ) {
  echo "Customer not found in the database.";
  return;
}

$i=0;
while ($i < $num) {
  $shipmentid = mysql_result($result,$i,"shipmentid");
  $shipmentdate = mysql_result($result,$i,"shipmentdate");
  $customerid = mysql_result($result,$i,"custid");
  $itemid = mysql_result($result,$i,"itemid");
  $quantity = mysql_result($result,$i,"quantity");
  $name = mysql_result($result,$i,"name");

  echo "<p><b>Name: $name</b><br/>\nCustomer ID: $customerid<br/>\nShipment ID: $shipmentid<br/>\nShipment Date: $shipmentdate<br/>\nItem ID: $itemid<br/>\nQuantity: $quantity</p>\n\n";

  $i++;
}


?>
                                                            

