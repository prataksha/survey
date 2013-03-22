<?php
	include 'sess_check.php';
?>
<?php
	session_start();
	$id = $_SESSION['SESS_CONSULTANT_ID'];

	include 'config.php';

	//mysql connection
	mysql_connect(localhost,$dbUsername,$dbPassword);
	@mysql_select_db($database) or die( "Unable to select database");
	$query ="select * from title where consultant_id = '$id' order by title_id desc";
	$queryResult = mysql_query($query);

	$title_id = mysql_result($queryResult, 0, "title_id");

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8 /"> 
		<title> Admin Page </title>	

	<style rel="stylesheet">
	.content
	{
		margin: auto;
		position: relative;
		width: 700px;
		padding: 5px;
		color: green;
		background-color: #FBF5E6;
		//background-image: url('bg.png');
	}

	#remove
	{
		width: 300px;
		color: green;
	}

	#result
	{
		width: 300px;
		color: green;
	}
	
	ul.semiopaquemenu
	{ /* main menu UL */
		height: 30px;
		font: bold 14px Georgia ;
		width: 100%;
		background: #b1e958;
		padding: 11px 0 8px 0; /* padding of the 4 sides of the menu */
		margin: 0;
		text-align: center; /* set value to "left", "center", or "right" to align menu accordingly */
	}
	
	div.bottombar
	{ /* bar that runs across the bottom of the menu */
		height: 10px;
		background: #1a1109;
	}
	
	h2
	{
		font-family: sans-serif;
		margin-top: 10px;
		text-shadow: 0 0 5px #FFFFA0, 0 0 10px;
	}
	.content
	{
		border-left: 1px solid #ECF1EF;
		border-right: 1px solid #ECF1EF;
	}
	table
	{
		padding: 10px;
	}
	</style>
	<script type="text/javascript">

		function checkAll()
		{
			for (var i=0;i<document.forms[1].elements.length;i++)
				{
					var e=document.forms[1].elements[i];
					if ((e.name != 'allbox') && (e.type=='checkbox'))
						{
							e.checked=document.forms[1].allbox.checked;
						}
				}
		}
	</script>

</script>

	</head>
	<body>
		<ul class="semiopaquemenu">
			<li><h2>Content Management</h2></li>
		</ul>
		<div class="bottombar"></div>
		<div class="content">
			<Br/> <Br/>
			<form method="post" action="create_title.php">
				<div id="create_title" align="center">
					<INPUT TYPE="submit"  HEIGHT="50" WIDTH="180" Value="Create a new Survey" style="color:green;" />
				</div>
			</form>
			</br></br></br>
			<form method="post" action="pageadmin_delete.php">
				<fieldset>
					<legend>List Of Survey Titles</legend>
					<div align="center" style="height:200px; width:auto; overflow:scroll;" class="title_list">
						<table>
							<tr>
								<td><input type="checkbox" value="on" name="allbox" onclick="checkAll();"/> </td>
								<td>Select all</td>
							</tr>
							<?php
								for ($i=0; $i<mysql_num_rows($queryResult); $i++)
								{
									$title_id = mysql_result($queryResult, $i, "title_id");
									$name = mysql_result($queryResult, $i, "name");
									echo "<tr> <td>";
									echo "<input type='checkbox' value='" . $title_id . "' name='delete[]' />" . "</td>" . "<td>" . $name . " </td>" . "</tr>";
								}
								mysql_close();
							?>
						</table>
					</div>
				</fieldset>
				</br></br>
				<div class="rembutton" align="center">
					<input align="center" id="remove" width="150px" type="submit" value="Remove selected Survey" alt="Delete selected" /></br></br>
				</div>
			</form>
			<form method="post" action="result.php">
				<div class="resultbutton" align="center">
					<input align="center" id="result" width="150px" type="submit" value="Click to see the result for Surveys" /></br></br>
				</div>
			</form>
		</div>
	</body>
</html>
