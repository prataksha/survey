<?php
	$title_id = $_POST['title_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8 /"> 
	<title> Page3 </title>	

	<style rel="stylesheet">

		.container
		{
			font-family: sans-serif;
			width: 700px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 50px;
			background-image: url('flowerbg.png');
			background-color: white;
			position: relative;
		}

		input[type="text"] {width:198px}

		body
		{
			//background-image: url('flowerbg.png');
			background-color: #235F23;
		}

		.preferences
		{
			width: 200px;
			height: 200px;
			background-color: white;
			border: 1px solid #AAAAA5;
			overflow-y: scroll;
                	overflow-x: hidden;
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
			//font-family: sans-serif;
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
		#theform
		{
			padding: 10px;
		}
		#title
		{
			color: #003300;
		}
	</style>
	<script type=text/javascript>
		function formSubmit()
		{
			document.getElementById("theform").submit();
		}
		function selectall(x)
		{
			x.select();
		}
		function goback()
		{
			document.getElementById("theform2").submit();
		}
		function checkLength(textboxID)
		{
        		var maxLen; // max number of characters allowed
        		if(textboxID=="name")
        		{
                		maxLen=30;
        		}
        		else if(textboxID=="explanation")
        		{
                		maxLen=100;
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
			<li><b>Issue Title</b></li>
			<li><b>Grouping Preferences</b></li>
			<li><b class="selected">Naming The Groups</b></li>
		</ul>
		<div class="bottombar"></div>
		<h1 id="title" align="center"> Naming The Groups </h1>
		<form id="theform" action="pageadmin_phase3.php" method="post" name="highlight">
			<?php
			include 'test1.php'; include 'test2.php';
			$group = 0; $count = 0;
			for ($i=0;$i<$group_no;$i++)
			{
				if ($pref[$i] != null)
				{
					$group = $group + 1;
					//echo "<h1>" .  "Naming The Groups" . "</h1>";
		        		//echo "<form id='theform' action='pageadmin_phase3.php' method='post'>";
					echo "<div class='group_name'>";
					echo "<input id='name' type='text' name=" . "'" . ($i+1) . "group" . "'" . "placeholder='Group Name Here...' onclick='selectall(this)' onkeydown='checkLength(this.id);' onblur='checkLength(this.id);' />";
    		        		echo "</div>";
					echo "<div class='explanation'>";
					echo "<textarea id='explanation' name=" . "'" . ($i+1) . "explanation" ."'" .  "cols='50' rows='12' style='float: right;' placeholder='Give the explanation for the group...' onclick='selectall(this)' onkeydown='checkLength(this.id);' onblur='checkLength(this.id);' >";
					//echo "Give the explanation for the group!!";
					echo "</textarea>";
					echo "</div>";
					echo "<div class='preferences'>";
					for ($x=0;$x<count($pref[$i]);$x++)
					{
						$count = $count + 1;
						echo "<div id='" . $count . "preferences'>";
						echo $pref[$i][$x];
						echo "</div>";
						echo "<input type='hidden' name=" . "'" . ($i+1) . "preference[]" . "'" . " value='" . $pref[$i][$x] . "'" . " />";
						//echo "</div>";
					}
					echo "</div>";
					echo "<br />";
					echo "<br />";
					echo "<div style='clear: both';>" . "</div>";
				}
			}
			echo "<input type='hidden' name='totalGroup' value='" . $group . "' />";
			echo "<input type='hidden' name='name' value='" . $name . "'" . " />";
                        echo "<input type='hidden' name='email' value='" . $email . "'" . " />";
			echo "<input type ='hidden' name='title_id' value='" . $title_id . "'" . " />";
			?>
				<input type="image" src="submit.png" onclick="formSubmit()" alt="Submit" width="100" height="40" style="float: right;" />
		</form>
		<form id="theform2" action="phase2.php" method="post">
			<?php
				for($i=0;$i<$group_no;$i++)
				{
					for($z=0;$z<count($pref[$i]);$z++)
					{
						echo "<input type='hidden' name=" . "'pref[]" . "'" . " value='" . $pref[$i][$z] . "'" . " />";
					}
				}
				echo "<input type='hidden' name='name' value='" . $name . "'" . " />";
                        	echo "<input type='hidden' name='email' value='" . $email . "'" . " />";
                        	echo "<input type ='hidden' name='title_id' value='" . $title_id . "'" . " />";
			?>
			<input id="backButton" type="image" src="back.png" onclick="goback()" width="48" height="48" style=""/>
		</form>
	</div>
</body>
</html>
