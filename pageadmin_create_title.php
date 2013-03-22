<?php
	include 'sess_check.php';
?>
<?php
	session_start();

	$id = $_SESSION['SESS_CONSULTANT_ID'];
	$title = $_POST['title'];

	include 'config.php';

	//mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

	$query = "insert into title (name, consultant_id) values ('$title', '$id')";
	//echo $query;
	if (!mysql_query($query))
	{
		echo Error;
		exit();
	}

	header("location: create_title.php");
?>

