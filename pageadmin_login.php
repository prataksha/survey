<?php
	session_start();

	include 'config.php';
	$login = $_POST['login'];
	$password = $_POST['password'];

	//mysql connection
	mysql_connect(localhost,$dbUsername,$dbPassword);
	@mysql_select_db($database) or die( "Unable to select database");
	$query="SELECT * FROM consultant WHERE login_id='$login' AND password='" .md5($password)."'"; echo $query; echo "<br>";
	$result=mysql_query($query);
	echo mysql_num_rows($result);
	if(mysql_num_rows($result) == 1)
	{   //Login Successful
		//new session provided
		session_regenerate_id(true);
        	$consultant = mysql_fetch_assoc($result);

		$_SESSION['SESS_CONSULTANT_ID'] = $consultant['consultant_id'];
        	$_SESSION['SESS_NAME'] = $consultant['name'];
        	$_SESSION['LAST_ACTIVITY'] = time();
        	session_write_close();

		mysql_close();

		//access to the CMS page
        	header("location: cms.php");

		exit();

	}
	else
	{   //Login failed
        //echo "login failed";
        mysql_close();
		//return to the login page
		header("location: login.php?status='Login failed try again'");
	}

?>
