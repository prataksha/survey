<?php
	$pref = array();
	$group_no = $_POST['totalGroup'];
	//echo $group_no;
	for ($i=0;$i<$group_no;$i++)
	{
		//$pref[$i] = array();
		$temp = 1 + $i;
		$pass = $temp . "preference";
		$pref[$i] = $_POST[$pass];
	}
	//echo $pref[0][0];
	//echo count($pref[0]);
?>
