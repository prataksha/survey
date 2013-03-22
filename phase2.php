<?php
	$preferences = $_POST['pref'];
	$name = htmlentities($_POST['name']);
	//$name = mysql_real_escape_string($name);

	$email = htmlentities($_POST['email']);
	//$email = mysql_real_escape_string($email);

//	include 'error_NMcheck.php';

	$title_id = htmlentities($_POST['title_id']);

	include 'config.php';
        //mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

	$name = mysql_real_escape_string($name);
	$email = mysql_real_escape_string($email);

	//$query = "select distinct group_id from preference where preference_id in (select preference_id from relation where title_id = $title_id[$i])";
	//$queryGroupResult = mysql_query($query);


        $query = "select user_id from user where name = '$name' and email = '$email'";
	$qresult = mysql_query($query);
	$count = count($qresult);

	if($count > 0)
	{
		$u_id = array();
		for ($i=0;$i<$count;$i++)
		{
			$u_id[$i] = mysql_result($qresult, $i, "user_id");
		}

		for ($i=0;$i<$count;$i++)
		{
			$query = "select distinct title_id from relation where preference_id in (select preference_id from preference where group_id in( select group_id from project.group where user_id = '$u_id[$i]'))";
			$qresult = mysql_query($query);
			$temp_title_id = array();
			for ($x=0;$x<count($qresult);$x++)
			{
				$temp_title_id[$x] = mysql_result($qresult, $x, "title_id");
				if($title_id == $temp_title_id[$x])
        			{
	      				header("location: error_user.php");
                			exit();
        			}
			}
		}
	}
	mysql_close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8 /">
<title> Page2 </title>

<style rel="stylesheet" type="text/css">
	body
	{
		//background-image: url('bgcontainer.png');
		background-color: #235F23;
	}

	.container
	{
		font-family: sans-serif;
		width: 60%;
		margin-left: auto;
		margin-right: auto;
		margin-top: 50px;
		background-image: url('flowerbg.png');
		background-color: white;
		//border-left: 1px solid #a1a1a1;
		//border-right: 1px solid #a1a1a1;
		//border-bottom: 1px solid #a1a1a1;
		//border-bottom-left-radius: 10px;
		//border-bottom-right-radius: 10px;		
	}

	.bottombar
	{ /* bar that runs across the bottom of the menu */
		height: 10px;
		background: #1a1109;
	}

	ul.semiopaquemenu
	{ /* main menu UL */
		font: bold 14px sans-serif;
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

	#theform
	{
		margin-left: 150px;
	}
	#div1
	{
		border: 1px solid #A8A88B;
	}
	#addButton
	{
		font-weight: bold;
		font-size: 13px;
		padding: 3px 5px 3px 5px;
		color: white;
		background: #52CC29;
		text-decoration: none;
	}
	#addPreferences
	{
		font-weight: bold;
                font-size: 13px;
                padding: 3px 5px 3px 5px;
                color: white;
                background: #52CC29;
                text-decoration: none;

	}

	#box
	{
		background-color: white;
		border: 1px solid #A8A88B;
		width: 150px;
		overflow-x: hidden;
		padding: 10px;
	}
	.box
	{
		background-color: white;
		width: 150px;
		height: 70px;
		padding: 10px;
		overflow-y: scroll;
		overflow-x: hidden;
	}
	#box_container
	{
		margin-left: 10%;
		padding: 10px;
	}

	h1
	{
		color: sans-serif;
	}
	h4
	{
		padding: 10px;
		padding-bottom: 0px;
		width: 150px;
	}
	p
	{
		color: #81817D;
		font-size: 15px;
	}
</style>
<script type="text/javascript">
	var divCount = 1;

	function allowDrop(ev)
	{
		ev.preventDefault();
	}

	function drag(ev)
	{
		ev.dataTransfer.setData("Text",ev.target.id);
	}

	function drop(ev)
	{
		var data=ev.dataTransfer.getData("Text");
		if (ev.target.className == "box" || ev.target.id == "box")
		{
			 ev.target.appendChild(document.getElementById(data));
		}
		else
		{
			ev.target.parentNode.appendChild(document.getElementById(data));
		}
		ev.preventDefault();
	}

	function revoke(element)
	{
		var parent = element.parentNode;
		element.appendchild(document.getELementById(parent));
		element.preventDefault();
	}

	function createDiv() 
	{ 
		divCount++;
		var divTag = document.createElement("div"); 
 		divTag.id = "div" + divCount; 
 		divTag.style.border = "1px solid #A8A88B";
 		divTag.style.float = "right";
 		divTag.setAttribute("class", "box");
 		divTag.setAttribute("ondrop","drop(event)");
 		divTag.setAttribute("ondragstart","drag(event)");
 		divTag.setAttribute("ondragover","allowDrop(event)");
 		//divTag.setAttribute("name","gurung[]");  
    		document.getElementById('box_container').appendChild(divTag); 
	}
	var pass = 0;
	function passValue()
	{
		var boxes = document.getElementsByClassName("box");
		//alert(boxes);
		for (var i=0; i<boxes.length; i++)
		{
			if (boxes[i] != null)
			{
				pass ++;
				for (var z=0; z<boxes[i].childNodes.length; z++)
				{
					var textElement = boxes[i].childNodes[z];
					var textData = "<input type='text' name='"+ pass + "preference[]' " + "value='" + textElement.innerHTML + "' />";
					textElement = null;
					boxes[i].childNodes[z].outerHTML = textData;
				}
			}
		}
		/*var inputTag = new Array();
		for (var i=0;i<send.length;i++)
		{
			inputTag[i] = document.createElement("input");
			inputTag[i].setAttribute("type", "hidden");
                	inputTag[i].setAttribute("name","groupNpref[]");
                	inputTag[i].setAttribute("value", send[i]);
			document.getElementById('div1').appendChild(inputTag[i]);
		}*/
		var inputTag = document.createElement("input");
		inputTag.setAttribute("type", "hidden");
		inputTag.setAttribute("name", "totalGroup");
		inputTag.setAttribute("value", pass);
		document.getElementById('div1').appendChild(inputTag);

		formSubmit();
	}

	function formSubmit()
	{
		document.getElementById("theform").submit();
	}

	function formSubmit2()
	{
		document.getElementById("theform2").submit();
	}

	function checkEnter()
        {
                var getEvent = event.keyCode;
                if (getEvent == "13")
                {
                        add();
                        return false;
                }
                else
                {
                        return true;
                }
        }
	var id = 1000;
	function addPref()
	{
		id ++;
		var userinput;
		userinput= prompt("Enter preference:","");
		userinput = userinput.substring(0, 45);
		//var textData = "<div id='" + id + 1 + "' draggable='true' ondragstart='drag(event)'>" + userinput + "</div>";
		var divTag = document.createElement("div");
		divTag.id = id;
		divTag.setAttribute("draggable","true");
		divTag.setAttribute("ondragstart","drag(event)");
		divTag.innerHTML = userinput;
		document.getElementById('box').appendChild(divTag);

		var inputTag = document.createElement("input");
		inputTag.setAttribute("name","preferences[]");
		inputTag.setAttribute("type","hidden");
		inputTag.setAttribute("value",userinput);
		document.getElementById('theform2').appendChild(inputTag);
	}
</script>
</head>
	<body>
		<div class="container" align="left">
			<ul class="semiopaquemenu">
				<li><b>Issue Title</b></li>
		 		<li><b class="selected">Grouping Preferences</b></li>
				<li><b>Naming The Groups</b></li>
			</ul>
			<div class="bottombar"></div>
			<h1 align="center"> Grouping Preferences </h1>
			<h4>List of preferences</h4>
			<p align="center">Drag and drop these preferences to groups/boxes at right handside</p>
			<div id="box" ondrop="drop(event)" ondragstart="drag(event)" ondragover="allowDrop(event)" style="float: left;">
				<?php
					$count = count($preferences);
					for ($i=0;$i<$count;$i++)
					{
						$id = $i + 1;
						$preferences[$i] = htmlentities($preferences[$i]);
						echo "<div id='$id' draggable='true' ondragstart='drag(event)'>" . $preferences[$i] . "</div>";
					}
				?>
			</div>
			<input class="btn1" id="addPreferences" type="button" value="add preference" onclick="addPref()" />
			<input class="btn1" id="addButton" type="button" value="add group" onclick="createDiv()" />
			<form id="theform" method="post" action="phase3.php">
				<div id="box_container">
					<div id="div1" class="box" ondrop="drop(event)" ondragstart="drag(event)" ondragover="allowDrop(event)" style="float: right;"></div>
				</div>
				<?php
					echo "<input type='hidden' name='name' value='" . $name . "'" . " />";
					echo "<input type='hidden' name='email' value='" . $email . "'" . " />";
					echo "<input type='hidden' name='title_id' value='" . $title_id . "'" . " />";
				?>

				<div style="clear: both;"></div>
					<input style="float: right;" type="image" src="next.png" onclick="passValue()" alt="Submit" width="48" height="48" />
			</form>
			<form id="theform2" action="phase1.php" method="post" style="float: left;">
				<?php
					for ($i=0;$i<count($preferences);$i++)
					{
						echo "<input type='hidden' name='preferences[]' value='" . $preferences[$i] . "' />";
					}
					echo "<input type='hidden' name='name' value='" . $name . "'" . " />";
                                        echo "<input type='hidden' name='email' value='" . $email . "'" . " />";
                                        echo "<input type='hidden' name='title_id' value='" . $title_id . "'" . " />";

				?>
				<input type="image" src="back.png" onclick="formSubmit2()" alt="submit" width="48" height="48" />
			</form>
			<div style="clear: both;"></div>
		</div>
	</body>
</html>
