<?php
	//$title_id = 1;
	if($_GET['title_id'] != null)
	{
		$title_id = $_GET['title_id'];
	}
	if ($_POST['title_id'] != null)
	{
		$title_id = mysql_real_escape_string($_POST['title_id']);
		//header ("location: phase1.php?title_id=1");
		//exit;
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8 /"> 
<title> Page1 </title>	

<style rel="stylesheet">

	.container
	{
		margin: auto;
		margin-top: 50px;
		background-image: url('flowerbg.png');
		position: relative;
		font-family: sans-serif;
		background-color: white;
		width: 700px;
		//overflow: hidden;
	}

	body
	{
		background-color: #235F23;
	}

	table
	{
		margin-left: 10px;
	}

	h1
	{
		text-align: center;
		color: #003300;
	}
	#display
	{
		margin-top:50px;
		width: auto;
		height: auto;
	}


	div.bottombar
	{ /* bar that runs across the bottom of the menu */

		height: 10px;
		background: #1a1109;
	}

	ul.semiopaquemenu
	{ /* main menu UL */
		font: bold 14px sans-serif;
		width: 100%;
		background: #b1e958;
		padding: 11px 0 8px 0; /* padding of the 4 sides of the menu */
		margin: 0;
		text-align: center; /* set value to "left", "center", or "right" to align menu accordingly */
	}

	ul.semiopaquemenu li
	{
		display: inline;
	}

	ul.semiopaquemenu li b
	{
		color:black;
		padding: 6px 8px 6px 8px; /* padding of the 4 sides of each menu link */
		margin-right: 15px; /* spacing between each menu link */
		text-decoration: none;
	}

	ul.semiopaquemenu li b.selected
	{
		color: black;
		background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgd2lkdGg9IjEwMCUiIGhlaWdodD0iMTAwJSIgdmlld0JveD0iMCAwIDEgMSIgcHJlc2VydmVBc3BlY3RSYXRpbz0ibm9uZSI+CiAgPGxpbmVhckdyYWRpZW50IGlkPSJncmFkLXVjZ2ctZ2VuZXJhdGVkIiBncmFkaWVudFVuaXRzPSJ1c2VyU3BhY2VPblVzZSIgeDE9IjAlIiB5MT0iMCUiIHgyPSIwJSIgeTI9IjEwMCUiPgogICAgPHN0b3Agb2Zmc2V0PSIwJSIgc3RvcC1jb2xvcj0iI2ZmZmZmZiIgc3RvcC1vcGFjaXR5PSIwLjgyIi8+CiAgICA8c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZmZmZmYiIHN0b3Atb3BhY2l0eT0iMC4xNiIvPgogIDwvbGluZWFyR3JhZGllbnQ+CiAgPHJlY3QgeD0iMCIgeT0iMCIgd2lkdGg9IjEiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+); /* IE9+ SVG equivalent  of linear gradients */
		background: -moz-linear-gradient(top,  rgba(255,255,255,0.82) 0%, rgba(255,255,255,0.16) 100%); /* fade from white (0.82 opacty) to 0.16 opacity */
		background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(255,255,255,0.82)), color-stop(100%,rgba(255,255,255,0.16)));
		background: -webkit-linear-gradient(top,  rgba(255,255,255,0.82) 0%,rgba(255,255,255,0.16) 100%);
		background: -o-linear-gradient(top,  rgba(255,255,255,0.82) 0%,rgba(255,255,255,0.16) 100%);
		background: -ms-linear-gradient(top,  rgba(255,255,255,0.82) 0%,rgba(255,255,255,0.16) 100%);
		background: linear-gradient(top,  rgba(255,255,255,0.82) 0%,rgba(255,255,255,0.16) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#d1ffffff', endColorstr='#29ffffff',GradientType=0 );
		-moz-box-shadow: 0 0 5px #595959; /* CSS3 box shadows */
		-webkit-box-shadow: 0 0 5px #595959;
		box-shadow: 0 0 5px #595959;
		padding-top: 12px; /* large padding to get menu item to protrude upwards */
		padding-bottom: 20px; /* large padding to get menu item to protrude downwards */
	}
	#textinput
	{
		width: 500px;
		margin-left: 10px;
	}
	p
	{
		margin-left: 10px;
	}
	#okButton
	{
		margin-left: 10px;
		font-weight: bold;
		font-size: 13px;
		padding: 3px 5px 3px 5px;
		color: white;
		background: #52CC29;
		text-decoration: none;
	}

</style>
<script>
	var count = 0;
	function redisplay() // for displaying the preferneces again
	{
		count ++;
		var textElement = document.getElementById("textinput");
		var textData = "<textarea name='pref[]' " + /*"value='" + textElement.value +*/ ">" + textElement.value + "</textarea>";

		/*var divTag = document.createElement("div"); 
 		divTag.id = "preference" + count;
 		divTag.value = textElement.value; 
		document.getElementById("display").appendChild(divTag);*/

		document.getElementById("display").innerHTML += textData;
		textElement.value = "";

		document.highlight.preference.focus();
	}
	function formSubmit() // for submitting the name, email and preferences to next page
	{
		var x = document.highlight.name.value;
		var y = document.highlight.email.value;
		//var l = document.highlight.pref.length;

		//now checking the name and email validation
		if(x == "")
		{
			alert("Please give your name!");
			document.highlight.name.focus();
			return false;
		}
		else if(y == "")
		{
			alert("Please give your email address!");
			document.highlight.email.focus();
			return false;
		}
		/*else if(l == "")
		{
			alert("Please give some preferences!");
			document.highlight.preference.focus();
			return false;
		}*/
		else if(x != "" && y != "")
		{
			document.getElementById("theform").submit();
		}
	}
	function emailCheck()
	{
		var x = document.highlight.email.value;
		if (x.indexOf("@") == -1 || x.lastIndexOf(".") == -1 || x.length < 6)
		{
			alert("Please give valid email address!");
			document.highlight.email.focus();
		}
	}

	function checkEnter()
	{
		var getEvent = event.keyCode;
		if (getEvent == "13")
		{
			redisplay();
			return false;
		}
		else
		{
			return true;
		}
	}

function checkLength(textboxID)
{
	var maxLen; // max number of characters allowed
	if(textboxID=="name")
	{
		maxLen=45;
	}
	else if(textboxID=="textinput")
	{
		maxLen=45;
	}

	var getValue;

	getValue = document.getElementById(textboxID).value; 
	if (getValue.length > maxLen)
	{
		document.getElementById(textboxID).value = document.getElementById(textboxID).value.substring(0, maxLen);
	}
}

</script>
</head>


<body>
	<div class="container">
		<ul class="semiopaquemenu">
			<li><b class="selected">Issue Title</b></li>
			<li><b>Grouping Preferences</b></li>
			<li><b>Naming The Groups</b></li>
		</ul>

		<div class="bottombar"></div>


		<?php
			include 'config.php';

			$name = htmlentities($_POST['name']);
			$email = htmlentities($_POST['email']);

			//mysql connection
        		mysql_connect(localhost,$dbUsername,$dbPassword);
        		@mysql_select_db($database) or die( "Unable to select database");

			$query = "select * from title where title_id = $title_id";
			$queryResult = mysql_query($query);
			$title_name = mysql_result($queryResult, 0, "name");
			mysql_close();

			echo "<h1>";
			echo $title_name;
			echo "</h1>";
		?>
 		<form id="theform" name="highlight" action="phase2.php" method="post" onsubmit="return formSubmit()">
    		<table>
    			<tr>
    				<td>Name: </td>
				<?php
    					echo "<td> <input id='name' type='text' name='name' value='" . $name . "' onkeydown='checkLength(this.id);' onblur='checkLength(this.id);' /> </td>";
				?>
    			</tr>
    			<tr>
    				<td>Email: </td>
				<?php
    					echo "<td> <input id='email' type='text' name='email' value='" . $email . "' onblur='emailCheck()' /> </td>";
				?>
    			</tr>
    		</table>
		<p>Preferences:</p>
    		<textarea id="textinput" name="preference" cols="46" rows="6" onkeypress="return checkEnter()" onkeydown="checkLength(this.id);" onblur="checkLength(this.id);" placeholder="one preference at a time..." ></textarea> <br />
     			<br />
			<input id="okButton" type="button" onclick="redisplay()" value="ok" />
			<input type="image" src="next.png" onclick="formSubmit()" alt="submit" width="48" height="48" style="float: right;"/>
			<br /><br /><hr />

			<div id="display">
				<?php
					$preferences = $_POST['preferences'];
					for ($i=0;$i<count($preferences);$i++)
					{
						if ($preferences[$i] != null)
						{
							$preferences[$i] = htmlentities($preferences[$i]);
							echo "<textarea id='preference' name='pref[]'>" . $preferences[$i] . "</textarea>";
						}
					}
				?>
			</div> <br /> <br />

			<?php
				echo "<input type='hidden' name='title_id' value='" . $title_id . "'" . " />";
			?>
			<div style="clear: both";></div>
		</form>
	</div>
</body>

</html>
