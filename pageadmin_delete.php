<?php
        include 'sess_check.php';//checking the session id validation
?>
<?php
        include 'config.php';

        //mysql connection
        mysql_connect(localhost,$dbUsername,$dbPassword);
        @mysql_select_db($database) or die( "Unable to select database");

        $deleteTitle = $_POST['delete'];
        $deleteCount = count($deleteTitle); echo $deleteCount;
        for($i = 0; $i < $deleteCount; $i++)//loop deleting the titles
        {
                $deletequery="delete from title where title_id = $deleteTitle[$i]"; echo $deletequery;
                $deleteresult = mysql_query($deletequery);
		if (!mysql_query($deletequery))
		{
			echo error;
			exit();
		}
        }
        mysql_close();
	// redirection to the CMS page
	header ("location: cms.php");
?>

