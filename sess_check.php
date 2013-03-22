<?php
        //Start session
        session_start();

        if (isset($_SESSION['LAST_ACTIVITY']) && ((time() - $_SESSION['LAST_ACTIVITY']) > 1800))
        {
                //echo "session expired";
                session_destroy(); // destroy session data in storage
                session_unset(); // unset $_SESSION variable for the runtime

                header("location: login.php?status='Your page has expired! Try again to log in'");
                exit();
        }
        else
        {
                $_SESSION['LAST_ACTIVITY'] = time(); // update last activity timestamp
        }

        //Check whether the session variable SESS_CONSULTANT_ID is present or not
        //echo "sess CONSULTANT id " . $_SESSION['SESS_CONSULTANT_ID'];
        if(!isset($_SESSION['SESS_CONSULTANT_ID']) || (trim($_SESSION['SESS_CONSULTANT_ID']) == ''))
        {
                // Session expired redirecting to login  page
		header("location: login.php");
                exit();
        }
?>

