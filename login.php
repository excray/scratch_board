<?php

include("lib.php");

session_start();
if(!session_is_registered("errors"))
{
    session_register("errors");
}
$errors = array();

$connection = db_connect("localhost", "root", "root");

if( !mysql_select_db("mysql", $connection))
    showerror();

$username = trim(clean($_POST["myusername"], 50));
$password = trim(clean($_POST["mypassword"], 50));

if( !authenticateUser( $connection,
                       $username,
                       $password))
{

    if(!authenticateUserName($connection,$username))
        $errors["username"] = "No such user exists. Go ahead and create a new account";
   else
   {
        $errors['username'] = $username;
            $errors["password"] = "Wrong password. Try again.";
   }

    $_SESSION['errors'] = $errors;
    //echo $errors["username"];
    header("Location: index.php");
    //header("HTTP/1.0 401 Unauthorized");
    exit;
}

if( !session_is_registered("username"))
    session_register("username");

if( !session_is_registered("timeout"))
    session_register("timeout");
// set timeout period in seconds

$inactive = 300;

// check to see if $_SESSION['timeout'] is set

if(isset($_SESSION['timeout']) ) {

    $session_life = time() - $_SESSION['timeout'];

    if($session_life > $inactive)

    {
        session_destroy();
        $error["timeout"]="Session has timed out. Please login again";
        $_SESSION['errors'] = $errors;
        header("Location: index.php");
        exit;
    }
}

$_SESSION['username'] = $username;
$_SESSION['timeout'] = time();

//safe from timeout or login failure

header("Location: loggedin.php")//?redirecturl=".urlencode($_POST['redirecturl']));

?>

