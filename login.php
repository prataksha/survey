<!Doctype html>

<html lang="en">

	<head>
		<meta charset="utf-8" />
		<title>Preference collector</title>
		
		<style rel="stylesheet">

			body 
			{
				margin-left: auto;
				margin-right: auto;
			}

			h2
			{
				font-family: sans-serif;
				margin-top: 10px;
				text-shadow: 0 0 5px #FFFFA0, 0 0 10px;
			}

			button	
			{
				margin-left: 100px;
				width: 50px;
			}
			div.bottombar
			{ /* bar that runs across the bottom of the menu */
				height: 10px;
				background: #1a1109;
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
			td
			{
				padding: 10px;	
			}
			.container
			{
				padding: 20px;
			}
			#status
			{
				font-size: 20px;
				color: red;
			}
		</style>
	</head>	

	<body>
	
		<ul class="semiopaquemenu">
		<li><h2>Enter the Required Credentials Below</h2></li>
		</ul>
		<div class="bottombar"></div>

		<div class="container" align="center">
			<form method="post" action="pageadmin_login.php">
				<table>
					<tr>
						<td>Login ID:</td>
						<td><input type="text" name="login" /></td>
					</tr>
					<tr>
						<td>Password:</td>
						<td><input type="password" name="password" /></td>
					</tr>
				</table>
				<input type="submit" value="OK" />
			</form>
			</br>	
		</div>
 		<?php
			$status = $_GET['status'];
			echo "<div id='status' align='center'>";
			echo $status;
			echo "</div>";
		?>
		<hr /> 
	</body>
</html>
