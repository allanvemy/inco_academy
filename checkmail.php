<?php
function checkmail($email)
{
	if($email == '') return 'empty';
	else if(!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $email)) return 'isnt';
	
	else
	{
		$result = sqlquery("SELECT COUNT(*) AS nbr FROM membres WHERE membre_mail = '".mysql_real_escape_string($email)."'", 1);
		global $queries;
		$queries++;
		
		if($result['nbr'] > 0) return 'exists';
		else return 'ok';
	}
}
?>