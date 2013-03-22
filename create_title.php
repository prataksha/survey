<!Doctype html>

<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>Preferences collector</title>

	<style rel="stylesheet">
		.content
		{
			margin: auto;
			position: relative;
			width: 700px;
			padding: 10px;
			color: green;
			border-left: 1px solid #ECF1EF;
			border-right: 1px solid #ECF1EF;
			background-color: #FBF5E6;
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
		
		h1
		{
			font-family: Arial;
			text-align: center;	
		}
		
		h2	
		{
			font-family: Arial;
			text-align: center;	
		}
		
		textarea
		{
			height: 50px;
			width: 550px;
		}

		#okbutton
		{
			color: green;
		}
	</style>
</head>	

<body>
	<ul class="semiopaquemenu">
			<li><h2>Create Title</h2></li>
	</ul>
	<div class="bottombar"></div>
	<div class="content">
		<h1>Give a new preference title</h1></br></br>
		<form method="post" action="pageadmin_create_title.php">
			<div id="title" align="center">
				<textarea name="title" cols="60" rows="6" ></textarea> </br></br>
			</div>
			<div id="okbutton" align="center">
   				<input type="submit" value="OK"  width="60" height="60"/>
			</div>	
		</form>
		<br /> <br />
	</div>
</body>
</html>
