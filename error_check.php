<?php
	for($i=0;$i<$group_no;$i++)
	{
		if (($pref[$i] != null) || ($pref[$i] == null))
		{
			if ($group[$i] == null || $exp[$i] == null)
			{
				header("loaction: error.php");
			}
		}
	}
?>
