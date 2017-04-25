<?php

	function VerifyQuery($temp)
	{
		if ($temp>=0)
		{
			return true;
		}
		else
		{
			$GLOBALS['errorMessage'] = $GLOBALS['errorMessage']."Cannot query for negative On-Hand inventory.<br/>";
			return false;
		}
	}
?>