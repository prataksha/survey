<?php
	include 'sess_check.php';
?>

<?php
	session_start();
	$cons_id = $_SESSION['SESS_CONSULTANT_ID'];

	include 'config.php';

	//mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

	$query = "select * from title where consultant_id = $cons_id";
	$queryResult = mysql_query($query);

	$title_id = array();
//	$group_id = array();

	for ($i=0;$i<mysql_num_rows($queryResult);$i++)
	{
		$title_id[$i] = mysql_result($queryResult, $i, "title_id");
	}

	for ($i=0;$i<count($title_id);$i++)
	{
		$query = "select distinct group_id from preference where preference_id in (select preference_id from relation where title_id = $title_id[$i])";
		$queryGroupResult = mysql_query($query);

		$query = "select * from title where title_id = $title_id[$i]";
                $queryTitleResult = mysql_query($query);

		echo "<table border=1>";
		echo "<tr>";

		echo "<th colspan=4>";
		echo mysql_result($queryTitleResult, 0, "name");
		echo "</th>";

		echo "</tr>";

		echo "<tr> <td><b>USER</b></td>";
		echo "<td><b>GROUP</b></td>";
		echo "<td><b>GROUP EXPLANATION</b></td>";
		echo "<td><b>PREFERENCE</b></td></tr>"; 

//		for ($q=0;$q<mysql_num_rows($queryGroupResult);$q++)
		for ($x=0;$x<mysql_num_rows($queryGroupResult);$x++)
		{
			$query = "select * from title where title_id = $title_id[$i]";
			$queryTitleResult = mysql_query($query);

			$group_id =  mysql_result($queryGroupResult, $x, "group_id");

			$query = "select * from project.group where group_id = '$group_id'";
			$queryGroup = mysql_query($query);

			$user_id = mysql_result($queryGroup, 0, "user_id");

			$query = "select * from user where user_id = '$user_id'";
			$queryUser = mysql_query($query);

			echo "<tr>";

			echo "<td>";
			echo mysql_result($queryUser, 0, "name");
			echo "</td>";
			echo "<td>";
			echo mysql_result($queryGroup, 0, "name");
			echo "</td>";
			echo "<td>";
			echo mysql_result($queryGroup, 0, "explanation");
			echo "</td>";
			echo "<td>";
			$query = "select * from preference where group_id = '$group_id'";
			$queryPref = mysql_query($query);

			for ($q=0;$q<mysql_num_rows($queryPref);$q++)
			{
				echo mysql_result($queryPref, $q, "content");
				if ($q < (mysql_num_rows($queryPref) - 1))
				{
					echo ", ";
				}
			}
			echo "</td>";

			echo "</tr>";
		}
		echo "</table> <br /><br />"; 
	}
//header("Content-Disposition: attachment; filename=my_excel_file.xls");
?>
