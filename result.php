<?php
	include 'sess_check.php';
?>
<!DOCTYPE html>
<html lang="en">
	
<head>
	<meta charset="utf-8 /"> 
	<title> result </title>	

	<style rel="stylesheet">
		div.bottombar
                { /* bar that runs across the bottom of the menu */
                        height: 10px;
                        background: #1a1109;
                }

                ul.semiopaquemenu
                { /* main menu UL */
                        font: bold 14px Georgia ;
                        width: 100%;
			height: 30px;
                        background: #b1e958;
                        padding: 11px 0 8px 0; /* padding of the 4 sides of the menu */
                        margin: 0;
                        text-align: center; /* set value to "left", "center", or "right" to align menu accordingly */
                }

		h2
                {
                	font-family: sans-serif;
                        margin-top: 10px;
                        text-shadow: 0 0 5px #FFFFA0, 0 0 10px;
            	}


		.container
		{
			margin: auto;
			background color: green;
			position: relative;
			border-left: 1px solid #FFFFFF;
			border-right: 1px solid #FFFFFF;
			width: 700px;
			padding: 5px;
			color: green;
		}

		body
		{
			background-image: url('bgtext.png');
		}

		h1
		{
			text-align: center;
		}

		table
		{
			background-color: #FBF5E6;
		}

		td
		{
			padding: 10px;
		}

	</style>
</head>
<body>
	<ul class="semiopaquemenu">
        	<li><h2>The Result Page</h2></li>
        </ul>
        <div class="bottombar"></div>

	<div class="container">
		<h1>PREFERENCES RESULT</h1>
			<?php
				include 'pageadmin_result.php';
			?>
		<Br /> <Br /> <Br/>	<Br/></Br/><Br/><Br/><Br/>
		<form method="post" action="download.php" align="center">
			<INPUT TYPE="image" SRC="download.png" HEIGHT="50" WIDTH="180" BORDER="0" align="center" />
		</form>
</div>
</body>
</html>
