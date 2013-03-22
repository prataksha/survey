<?php
	$group_no = $_POST['totalGroup'];
	//echo $group_no;
	$name = $_POST['name'];
	if ($name == null)
	{
		header("location: error_name.php");
		exit();
	}
	$email = $_POST['email'];
	if ($email == null)
	{
                header("location: error_name.php");
       		ecit();
	}


	$title_id = $_POST['title_id'];

	$group = array();
	$exp = array();
	$pref = array();

	for ($i=0;$i<$group_no;$i++)
	{
		$pref[$i]= array();

		$groupTemp = ($i+1) . "group";
		$expTemp = ($i+1) . "explanation";
		$prefTemp = ($i+1) . "preference";

		$group[$i] = $_POST[$groupTemp];
		$exp[$i] = $_POST[$expTemp];
		$pref[$i] = $_POST[$prefTemp];
	}

	//include 'error_check.php';

	for($i=0;$i<$group_no;$i++)
        {
                if (($pref[$i] != null) || ($pref[$i] == null))
                {
                        if ($group[$i] == null || $exp[$i] == null)
                        {
                                header("location: error.php");
				exit();
                        }
                }
        }




//include 'error_NMcheck.php';
	/*for ($i=0;$i<$group_no;$i++)
	{
		for ($z=0;$z<count($pref[$i]);$z++)
		{
			echo "the fisrt one is= ";
			echo $pref[$i][$z]; echo "<br>";
			//echo "<input type='hidden' name=" . "'" . $group . "preference[]" . "'" . " value='" . $pref[$i][$x] . "'" . " />";
		}
	}*/
?>
