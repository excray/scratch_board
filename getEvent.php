<?php
include("lib.php");
//echo "a";
$con = db_connect("localhost","root","root");
//echo "b";
if( !mysql_select_db("mysql", $con))
{
	showerror();
}
//echo "c";
$eventid = $_GET['eventid'];
$query = "select * from Event where eventid = '$eventid'";
$result = mysql_query($query);
//echo "e";
$row = mysql_fetch_array($result);
//echo mysql_num_rows($result);
//echo $row['title'];
echo '<div id="event_poster" background-image:url("images/image1.jpg")>';
echo '<div id="title">';

echo $row['title'];
echo '</div>';
echo '<div id="description">';
echo $row['description'];
echo '</div>';
echo '<div id="eventstartdate">';
echo "Starts on ".$row['eventstartdate'];
echo '</div>';
echo '<div id="eventenddate">';
echo "until ".$row['eventenddate'];
echo '</div>';
echo '<div id="eventstarttime">';
echo "From ".$row['eventstarttime'];
echo '</div>';
echo '<div id="eventendtime">';
echo "To ".$row['eventendtime'];
echo '</div>';
echo '<div id="place">';
echo "At ".$row['place'];
echo '</div>';
echo '<div id="website">';
echo 'Visit <a href = "'.$row['website'].'">'.$row['website'].'</a>';
echo '</div>';
if($row['star'] != 0)
{
	echo '<div id="star">';
	echo "This event is starred";
	echo '</div>';
}
echo '<input type="button" value="Flip" onclick="showMoreEventDetails('.$eventid.')">';
echo '</div>';
?>

