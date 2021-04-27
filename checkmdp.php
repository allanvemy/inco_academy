<?php
function checkmdp($mdp)
{
	if($mdp == '') return 'empty';
	else if(strlen($mdp) < 4) return 'tooshort';
	else if(strlen($mdp) > 50) return 'toolong';
	
	else
	{
		if(!preg_match('#[0-9]{1,}#', $mdp)) return 'nofigure';
		else if(!preg_match('#[A-Z]{1,}#', $mdp)) return 'noupcap';
		else return 'ok';
	}
}
?>