


<!Doctype html>

<html lang="en">

<head>

<meta charset="utf-8" />

	<title>Error message</title>



<style rel="stylesheet">



	body

	{

		background-color: #235F23;

	}

	.box

	{

		margin:auto;

		margin-top: 200px;

		background-color: white;

		font-family: sans-serif;

			

		position: relative;

		width: 500px;

		border: 2px solid green;

	}

	.start

	{

		font-size: xx-large;

		color: green;

		text-align: center;

	}

	

	a

	{

		text-decoration: none;

	}

	

	h1

	{

		background-color: #B1E958;

		color: black;

		font-size: 50px;

		text-align: center;

	}

	

	#image

	{

		margin-left: 100px;	

	}









</style>

<script type="text/javascript">

function formSubmit()
	{
        	document.getElementById("theform").submit();
        }


</script>



</head>	



<body>

	<div class="box">

		<h1 >Thank you</h1>

		<div id="image">

			<img src="smiley.png" width="70%" height="70%">

		</div>
		<form id="theform" action="pageadmin_thanx.php" method="post">
			 <?php
                                $title_id = $_GET['title_id'];
                                echo "<input type='hidden' name='title_id' value='" . $title_id . "' />";
			?>
			<p class="start">Start the survey again! <input type="image" src="go.png" onclick="formSubmit()" width="48" height="48" /></p>
		</form>
	</div>

	<br />

</body>

</html>


