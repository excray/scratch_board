<!doctype html>
<?php
include("lib.php");
?>
<html>
<head>

<p>User is: <?php echo `whoami`; ?></p>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>

</head>

<body>
<script type="text/javascript" language="javascript">
function createNotice()
{
    document.getElementById('light').style.display='block';
    document.getElementById('fade').style.display='block';

}

function login()
{
    document.getElementById('login_light').style.display='block';
    document.getElementById('fade').style.display='block';

}

 
$( init );
 
function init() {
  $('#makeMeDraggable').draggable();
  
  $('#makeMeDraggable1').draggable();
}

function eventPopup()
{

  document.getElementById('moreDetails_event_light').style.display='none';
  document.getElementById('event_light').style.display='block';
  document.getElementById('fade').style.display='block';

}

function showMoreEventDetails()
{

    document.getElementById('event_light').style.display='none';
    document.getElementById('moreDetails_event_light').style.display='block';
    document.getElementById('fade').style.display='block';
}

</script>
<link rel="stylesheet" type="text/css" href="index.css">

<div id="container">

<?php setHeader(); ?>


<div id="body">

 <div id = "makeMeDraggable">
  
  <input type="button" value="More Details" onclick="eventPopup()">
   <div> 
   </div>
  </input>
 </div>
 <div id = "makeMeDraggable1">
 </div>

 <div id="event_light" class="show_event_popup">
  <input type="button"value="Flip" onclick="showMoreEventDetails()">
 </div>

 <div id="moreDetails_event_light" class="show_more_details_event_popup">
  <input type="button" value="Flip" onclick="eventPopup()">
 </div>
 

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
