<?php
	include 'sess_check.php';
?>
<table>
<?php
	session_start();
	$consultant_id = $_SESSION['SESS_CONSULTANT_ID'];

	include 'config.php';

	 //mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

	$query = "select * from title where consultant_id = '$consultant_id'";
	$queryResult = mysql_query($query);

	if(!$queryResult)
	{
		echo Error;
	}
	$title_id = array();
	$group_id = array();
	$temp_id = array();
	$real_group_id = array();
	//$group_id = array();
	//echo mysql_num_rows($queryResult);
	for ($i=0;$i<mysql_num_rows($queryResult);$i++)
	{
		$title_id[$i] = mysql_result($queryResult, $i, "title_id");
	}
	//echo $title_id[0] . $title_id[1];
	//$queryTitle = "select * from title where title_id = '$title_id'";
	//$queryTitleResult = mysql_query($queryTitle);
	//echo "<table>";

/*	for ($i=0;$i<count($title_id);$i++)
	{
		$queryTitle = "select * from title where title_id = $title_id[$i]"; //echo $queryTitle;
        	$queryTitleResult = mysql_query($queryTitle);

		if (!$queryTitleResult)
		{echo Error;}

		$queryTempPref = "select * from relation where title_id = $title_id[$i]";
		$queryTempPrefResult = mysql_query($queryTempPref);

		if (!$queryTempPrefResult)
		{echo Error;}

		for ($c=0;$c<mysql_num_rows($queryTempPrefResult);$c++)
		{
			$temp_id[$c] = mysql_result($queryTempPrefResult, $c, "preference_id");
		}

		for ($c=0;$c<count($temp_id);$c++)
		{
			$querytemp = "select * from preference where preference_id = $temp_id[$c]";
			$querytempResult = mysql_query($querytemp);
			$group_id[$c] = mysql_result($querytempResult, 0, "group_id");
		}

		$real_group_id[0] = $group_id[0];
		$add = 0;
		for ($c=1;$c<count($group_id);$c++)
		{
			if($group_id[$c-1] != $group_id[$c])
			{
				$add = $add + 1;
				$real_group_id[$add] = $group_id[$c]; echo $real_group_id[$add];
			}
		}*/
		echo count($real_group_id);
		//$queryGroup = "select * from project.group where group_id in (select group_id from preference where preference_id = (select preference_id from relation where title_id = $title_id[$i]))"; 
		//echo $queryGroup;
		//$queryGroupResult = mysql_query($queryGroup);
/*
		for ($x=0;$x<count($real_group_id);$x++)
		{
			$qeuryGroup = "select * from project.group where group_id = $real_group_id[$x]";
			//echo $queryGroup;
                	$queryGroupResult = mysql_query($queryGroup);

			echo "<tr> <td>";
                	echo mysql_result($queryTitleResult, 0, "name");
                	echo "</td>";

			echo "<td>" . mysql_result($queryGroupResult, 0, "name") . "</td>";
			echo "<td>" . mysql_result($queryGroupResult, 0, "explanation") . "</td>";

			$group_id = mysql_result($queryGroupResult, 0, "group_id");

			$queryPref = "select * from preference where group_id in (select group_id from project.group where group_id = '$group_id'))";
			$queryPrefResult = mysql_query($queryPref);

			echo "<td>";

			for ($z=0;$z<mysql_num_rows($queryPrefResult);$z++)
			{
				echo mysql_result($queryPrefResult, $z, "content") . ",";
				echo "<br />";
			}

			echo "</td> . </tr>";
		}
*/	}
?>
</table>
