<?php

function setHeader()
{
?>

<div id = "header">
<a href="index.php">
Smart Board
</a>
<input value="add notice()" type="button" id="create_notice" onclick="createNotice()">
<input value="login.." type="button" id="create_notice" onclick="login()">
</div>

<?php
}


function showerror()
{
    die("Error ".mysql_errno() . ":" . mysql_error());
}

//Authenticate users
function authenticateUser($connection,
                          $username,
                          $password)
{

    if( !isset($username) || !isset($password))
        return false;

    $query = "SELECT password FROM User
                WHERE username='$username' AND password = '$password'";

    $result = @ mysql_query( $query, $connection)

        or showerror();

    if ( mysql_num_rows( $result ) != 1)
    {   
        return false;
    }   
    else
    {   
        return true;
    }   
}

function authenticateUserName($connection,$username)
{

    if( !isset($username))
        return false;

    $query = "SELECT * FROM User
                WHERE username='$username'";

    $result = mysql_query($query);

    if ( mysql_num_rows( $result ) == 0)
    {
        return false;
    }
    else
    {
        return true;
    }
}
function clean($input, $maxlength)
{
    $input = substr($input, 0, $maxlength);
    $input = EscapeShellCmd($input);
    return ($input);
}

function fieldError($fieldName, $errors)
{
    if ( isset($errors[$fieldName]))
    {
        echo
            "<font color=RED>$errors[$fieldName]</font><br>";
    }
}

function CheckForLogin()
{
    if(isset($_SESSION['username']))
    {
      return true;
    }
    else
    {
        return false;
    }
}


function checkForTimeout()
{

    $inactive = 3000;

    // check to see if $_SESSION['timeout'] is set

    if(isset($_SESSION['timeout']) ) {

        $session_life = time() - $_SESSION['timeout'];

        if($session_life > $inactive)

        {
            session_destroy();
        session_start();
        if(!session_is_registered("errors"))
        {
            session_register("errors");
        }

        $error = array();
            $error["timeout"]="Session has timed out. Please login again";
            $_SESSION['errors'] = $error;
            header("Location: index.php");
            exit;
        }
        else
        {

            $_SESSION['timeout'] = time();
        }
    }
    else
    {
        $_SESSION['timeout'] = time();
    }
}

function getCurrentUrl()
{
    $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    return $url;
}

function db_connect($host,$user,$pwd)
{
        $con = mysql_connect($host,$user,$pwd);
            if (!$con)
                    {
                                die('Could not connect: ' . mysql_error());
                                    }
                return $con;
}

?>
