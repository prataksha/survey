<?php
	//$title_id misssing!!!!
	//print_r($_POST);

	include 'test3.php';
	include 'config.php';

        //mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);

	/*$query = "select user_id from user where name = '$name' and email = '$email'";
        $qresult = mysql_query($query);
        $result = mysql_result($qresult, 0, "user_id");
        if($result != null)
        {
                header("location: error_user.php");
                exit();
        }*/


	$dataUser = "insert into user (name, email) values ('$name', '$email')";
	if (!mysql_query($dataUser))
	{
		echo "Give your Name and Email address";
		exit();
	}

	$query = "select * from user where name = '$name' and email = '$email'";
	$queryResult = mysql_query($query);
	$user_id = mysql_result($queryResult, 0, "user_id");
	//echo $group_no;
	for ($i=0;$i<$group_no;$i++)
	{
		//$dataGroup = "insert into group (name, user_id, explanation) values ('$group[$i]', '$user_id', '$exp[$i]')";
		$group[$i] = mysql_real_escape_string($group[$i]);


		$dataGroup = "INSERT INTO `project`.`group` (`group_id`, `name`, `user_id`, `explanation`) VALUES (NULL, '$group[$i]', '$user_id', '$exp[$i]')";
		//echo $dataGroup;
		//echo $group[$i]; echo $user_id; echo $ex$i];
		if (!mysql_query($dataGroup))
		{
			echo "Error";
			exit();
		}
		$query = "select * from `project`.`group` where name = '$group[$i]' and user_id = '$user_id' and explanation = '$exp[$i]'";
		$queryResult = mysql_query($query);
		/*if (!mysql_query($query))
		{
			echo "error";
		}
		else
		{
			echo "ok";
		}*/
		$group_id = mysql_result($queryResult, 0, "group_id");
 
		for ($z=0;$z<count($pref[$i]);$z++)
		{
			$test = mysql_real_escape_string($pref[$i][$z]);
			//echo $test; 
			$dataPref = "insert into `project`.`preference` (content, group_id) values ('$test', '$group_id')"; //echo $dataPref;
			if (!mysql_query($dataPref))
			{
				echo "Error";
				exit();
			}
			$query = "select * from `project`.`preference` where group_id = '$group_id'"; //echo $query; echo "<br>";
			$queryResult = mysql_query($query);
			$preference_id = mysql_result($queryResult, 0, "preference_id");
			//echo $preference_id; echo "<br>";
			//$dataRel = "insert into `project`.`relation` (title_id, preference_id) vlaues ('$title_id', '$preference_id')"; echo $dataRel;
			$dataRel = "INSERT INTO `project`.`relation` (`id`, `title_id`, `preference_id`) VALUES (NULL, '$title_id', '$preference_id')"; // $dataRel;
			if (!mysql_query($dataRel))
			{
				echo "Error";
				exit();
			}
		}
	}
	mysql_close();
	header("location: thanx.php?title_id=$title_id");
?>
