<?php header('Content-Type: text/xml'); ?>
<?php echo('<?xml version="1.0" encoding="utf-8"?>');  ?>
<!DOCTYPE imagelist PUBLIC '-//Netscape Communications//DTD imagelist//EN'
     'http://my.netscape.com/publish/formats/imagelist.dtd'>

<?php
include("lib.php");

$con = db_connect("localhost","root","root");
mysql_select_db("mysql",$con);

$eventid=$_GET['eventid'];
$query="SELECT * FROM Event WHERE eventid='$eventid'";
$record = mysql_query($query);
$row = mysql_fetch_array($record);

$query1="SELECT * FROM SocialNetwork WHERE eventid='$eventid'";
$record1 = mysql_query($query1);
$row1 = mysql_fetch_array($record1);

echo "<imagelist>\n";

 echo "<title>\n";
  echo $row['title'];
 echo "</title>\n";
 echo "<desc>\n";
  echo $row['description'];
 echo "</desc>\n";
 echo "<image>\n";
  echo $row['image'];
 echo "</image>\n";
 echo "<eventstartdate>\n";
  echo $row['eventstartdate'];
 echo "</eventstartdate>\n";
 echo "<eventstarttime>\n";
  echo $row['eventstarttime'];
 echo "</eventstarttime>\n";
 echo "<eventenddate>\n";
  echo $row['eventenddate'];
 echo "</eventenddate>\n";
 echo "<place>\n";
  echo $row['place'];
 echo "</place>\n";
 echo "<facebook>\n";
  echo $row1['facebook'];
 echo "</facebook>\n";
 echo "<twitteruser>\n";
  echo $row1['twitteruser'];
 echo "</twitteruser>\n";
 echo "<twitterhash>\n";
  echo $row1['twitterhash'];
 echo "</twitterhash>\n";
 
 echo "</imagelist>\n";
?>




