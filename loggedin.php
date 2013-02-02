<!doctype html>
<?php
include("lib.php");
?>
<html>
<head>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>
<script type="text/javascript" src="login.js"></script>
</head>

<body>
<link rel="stylesheet" type="text/css" href="index.css">

<div id="container">

<?php setHeader(); ?>


<div id="body">

<?php

 $con = db_connect("localhost","root","root");
 if( !mysql_select_db("mysql", $con))
    showerror();

 $username = "abc";//$_SESSION['username'];
 
 $query = "SELECT * FROM Contains WHERE username='$username'";

 $result = mysql_query($query);

 while( $row1 = mysql_fetch_array( $result ) )
 {

  $eventid = $row1['eventid'];
  $q1 = "SELECT * FROM Event WHERE eventid='$eventid'";

  $result1 = mysql_query($q1);
  $row = mysql_fetch_array( $result1 );
    
     $title = $row['title'];
     $eventstartdate = $row['eventstartdate'];
     $eventstarttime = $row['eventstarttime'];
     $eventplace = $row['place'];
     $event_website = $row['website'];
     $eventenddate = $row['eventenddate'];
     $eventendtime = $row['eventendtime'];

     $eventboxid = "eventbox_".$eventid;
     $event_lightid = "event_light_".$eventid;
    $moredetailsid = "moreDetails_event_light_".$eventid;
?>
 <div class = "makeMeDraggable">
  
 <div id="<?php echo $eventboxid; ?>">
 <input type="button" value="More Details" onclick="eventPopup(<?php echo $eventid;?>)">
   <div class="event_title">
    <?php echo $title;
    ?>
   </div>

   <div class="dateandtime">
   <div class="event_start_date">
    <?php echo $eventstartdate; ?>
   </div>
   
   <div class="event_start_time">
    <?php echo $eventstarttime; ?>
   </div>
  
   <div class="event_end_date">
    <?php echo $eventenddate; ?>
   </div>
   <div class="event_end_time">
    <?php echo $eventendtime; ?>
   </div>
   </div> <!-- DateTime Div -->
  </div> <!-- for event box --> 
 </div>
 
 <div id="<?php echo $event_lightid;?>" class="show_event_popup">
 <input type="button"value="Flip" onclick="showMoreEventDetails(<?php echo $eventid; ?>)">
 </div>

 <div id="<?php echo $moredetailsid;?>" class="show_more_details_event_popup">
 <input type="button" id="moredetails_flip" value="Flip" onclick="eventPopup(<?php echo $eventid;?>)">
 </div>

<?php
  }
?>

<!-- Login Box -->

<div id="login_light" class="create_notice_popup">

<div>
 <div id="loginbox"> 
  <H3>Login</H3>
  <br>

  <form method="POST" name="loginform" action="login.php">
   <div class="insidelogin">
        <label> User ID: </label>
    <input type="text" name="userid_login">
   </div>
   <div class="insidelogin">
    <label> Password: </label>
    <input type="password" name="password_login">
   </div>
   <div class="insidelogin_button">
    <input type="submit" value="Login" >
   </div>
  </form>
</div>

<div id="signupbox">
 <H3>Signup</H3>
 <br>

 <form method="POST" name="signupform" action="signup.php">
  <div class="insidelogin">
   <label> User Id: </label>
   <input type="text" name="userid_signup">
  </div>
  <div class="insidelogin">
   <label> Password: </label>
   <input type="password" name="password_signup">
  </div>
  <div class="insidelogin">
   <label> Email ID: </label>
   <input type="text" name="email_signup">
  </div>
  <div class="insidelogin_button">
   <input type="submit" value="Sign me up..">
  </div>
 </form>
 </div>

</div> <!-- div after login_light -->

</div>


<div id="light" class="create_notice_popup">


<div id="notice_box">
<form method="POST" name="AddNoticeForm">
 <div>
  <label> Whats the event? </label>
  <input type="text" name="eventTitle">
 </div>

 <div>
  <label> Tell us what the event is about. </label>
  <input type="text" name="eventDesc">
 </div>
 
 <div>
  <label> And when is this event? </label>
  <input type="text" name="startDate" id="date_start">
  <input type="text" name="startTime" id="time_start">
  to
  <input type="text" name="endDate" id="date_end">
  <input type="text" name="endTime" id="time_end">
 </div> 
 <div>
  <label> And where is this awesome event? </label>
  <input type="text" name="eventPlace">
 </div>
 <div>
  <label> Upload a image poster </label>
  <input type="text" name="imagePath">
 </div>
 <div>
  <label> Is there a event website </label>
  <input type="text" name="eventSite">
 </div>
 <div>
  <label> You got a facebook page for the event? </label>
  <input type="text" name="eventFB">
 </div>
 <div>
  <label> Type in twitter handles or twitter hashtags. </label>
  <input type="text" name="eventTwitter">
 </div>
 <div>
  <label>Tag this event. (eg. Free food, Goodies..)</label>
  <input type="text" name="eventTags">
 </div>
 <div>
  <input type="button" value="Done" name="eventAdd" onclick="ajaxAdd()">
 </div>
 </form>
</div>
</div>

<div id="fade" class="black_overlay"/>



</div>

</div>

</body>

</html>
