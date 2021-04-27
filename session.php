<?php$_SESSION['erreurs'] = 0;

//Pseudo
if(isset($_POST['pseudo']))
{
	$pseudo = trim($_POST['pseudo']);
	$pseudo_result = checkpseudo($pseudo);
	if($pseudo_result == 'tooshort')
	{
		$_SESSION['pseudo_info'] = '<span class="erreur">Le pseudo '.htmlspecialchars($pseudo, ENT_QUOTES).' est trop court, vous devez en choisir un plus long (minimum 3 caractères).</span><br/>';
		$_SESSION['form_pseudo'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($pseudo_result == 'toolong')
	{
		$_SESSION['pseudo_info'] = '<span class="erreur">Le pseudo '.htmlspecialchars($pseudo, ENT_QUOTES).' est trop long, vous devez en choisir un plus court (maximum 32 caractères).</span><br/>';
		$_SESSION['form_pseudo'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($pseudo_result == 'exists')
	{
		$_SESSION['pseudo_info'] = '<span class="erreur">Le pseudo '.htmlspecialchars($pseudo, ENT_QUOTES).' est déjà pris, choisissez-en un autre.</span><br/>';
		$_SESSION['form_pseudo'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($pseudo_result == 'ok')
	{
		$_SESSION['pseudo_info'] = '';
		$_SESSION['form_pseudo'] = $pseudo;
	}
	
	else if($pseudo_result == 'empty')
	{
		$_SESSION['pseudo_info'] = '<span class="erreur">Vous n\'avez pas entré de pseudo.</span><br/>';
		$_SESSION['form_pseudo'] = '';
		$_SESSION['erreurs']++;	
	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//Mot de passe
if(isset($_POST['mdp']))
{
	$mdp = trim($_POST['mdp']);
	$mdp_result = checkmdp($mdp, '');
	if($mdp_result == 'tooshort')
	{
		$_SESSION['mdp_info'] = '<span class="erreur">Le mot de passe entré est trop court, changez-en pour un plus long (minimum 4 caractères).</span><br/>';
		$_SESSION['form_mdp'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($mdp_result == 'toolong')
	{
		$_SESSION['mdp_info'] = '<span class="erreur">Le mot de passe entré est trop long, changez-en pour un plus court. (maximum 50 caractères)</span><br/>';
		$_SESSION['form_mdp'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($mdp_result == 'nofigure')
	{
		$_SESSION['mdp_info'] = '<span class="erreur">Votre mot de passe doit contenir au moins un chiffre.</span><br/>';
		$_SESSION['form_mdp'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($mdp_result == 'noupcap')
	{
		$_SESSION['mdp_info'] = '<span class="erreur">Votre mot de passe doit contenir au moins une majuscule.</span><br/>';
		$_SESSION['form_mdp'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($mdp_result == 'ok')
	{
		$_SESSION['mdp_info'] = '';
		$_SESSION['form_mdp'] = $mdp;
	}
	
	else if($mdp_result == 'empty')
	{
		$_SESSION['mdp_info'] = '<span class="erreur">Vous n\'avez pas entré de mot de passe.</span><br/>';
		$_SESSION['form_mdp'] = '';
		$_SESSION['erreurs']++;

	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//Mot de passe suite
if(isset($_POST['mdp_verif']))
{
	$mdp_verif = trim($_POST['mdp_verif']);
	$mdp_verif_result = checkmdpS($mdp_verif, $mdp);
	if($mdp_verif_result == 'different')
	{
		$_SESSION['mdp_verif_info'] = '<span class="erreur">Le mot de passe de vérification diffère du mot de passe.</span><br/>';
		$_SESSION['form_mdp_verif'] = '';
		$_SESSION['erreurs']++;
		if(isset($_SESSION['form_mdp'])) unset($_SESSION['form_mdp']);
	}
	
	else
	{
		if($mdp_verif_result == 'ok')
		{
			$_SESSION['form_mdp_verif'] = $mdp_verif;
			$_SESSION['mdp_verif_info'] = '';
		}
		
		else
		{
			$_SESSION['mdp_verif_info'] = str_replace('passe', 'passe de vérification', $_SESSION['mdp_info']);
			$_SESSION['form_mdp_verif'] = '';
			$_SESSION['erreurs']++;
		}
	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//mail
if(isset($_POST['mail']))
{
	$mail = trim($_POST['mail']);
	$mail_result = checkmail($mail);
	if($mail_result == 'isnt')
	{
		$_SESSION['mail_info'] = '<span class="erreur">Le mail '.htmlspecialchars($mail, ENT_QUOTES).' n\'est pas valide.</span><br/>';
		$_SESSION['form_mail'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($mail_result == 'exists')
	{
		$_SESSION['mail_info'] = '<span class="erreur">Le mail '.htmlspecialchars($mail, ENT_QUOTES).' est déjà pris, <a href="../contact.php">contactez-nous</a> si vous pensez à une erreur.</span><br/>';
		$_SESSION['form_mail'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($mail_result == 'ok')
	{
		$_SESSION['mail_info'] = '';
		$_SESSION['form_mail'] = $mail;
	}
	
	else if($mail_result == 'empty')
	{
		$_SESSION['mail_info'] = '<span class="erreur">Vous n\'avez pas entré de mail.</span><br/>';
		$_SESSION['form_mail'] = '';
		$_SESSION['erreurs']++;	
	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//mail suite
if(isset($_POST['mail_verif']))
{
	$mail_verif = trim($_POST['mail_verif']);
	$mail_verif_result = checkmailS($mail_verif, $mail);
	if($mail_verif_result == 'different')
	{
		$_SESSION['mail_verif_info'] = '<span class="erreur">Le mail de vérification diffère du mail.</span><br/>';
		$_SESSION['form_mail_verif'] = '';
		$_SESSION['erreurs']++;
	}
	
	else
	{
		if($mail_result == 'ok')
		{
			$_SESSION['mail_verif_info'] = '';
			$_SESSION['form_mail_verif'] = $mail_verif;
		}
		
		else
		{
			$_SESSION['mail_verif_info'] = str_replace(' mail', ' mail de vérification', $_SESSION['mail_info']);
			$_SESSION['form_mail_verif'] = '';
			$_SESSION['erreurs']++;
		}
	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//date de naissance
if(isset($_POST['date_naissance']))
{
	$date_naissance = trim($_POST['date_naissance']);
	$date_naissance_result = birthdate($date_naissance);
	if($date_naissance_result == 'format')
	{
		$_SESSION['date_naissance_info'] = '<span class="erreur">Date de naissance au mauvais format ou invalide.</span><br/>';
		$_SESSION['form_date_naissance'] = '';
		$_SESSION['erreurs']++;
	}
	
	else if($date_naissance_result == 'tooyoung')
	{
		$_SESSION['date_naissance_info'] = '<span class="erreur">Agagagougougou areuh ? (Vous êtes trop jeune pour vous inscrire ici.)</span><br/>';
		$_SESSION['form_date_naissance'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($date_naissance_result == 'tooold')
	{
		$_SESSION['date_naissance_info'] = '<span class="erreur">Plus de 135 ans ? Mouais...</span><br/>';
		$_SESSION['form_date_naissance'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($date_naissance_result == 'invalid')
	{
		$_SESSION['date_naissance_info'] = '<span class="erreur">Le '.htmlspecialchars($date_naissance, ENT_QUOTES).' n\'existe pas.</span><br/>';
		$_SESSION['form_date_naissance'] = '';
		$_SESSION['erreurs']++;
	}
		
	else if($date_naissance_result == 'ok')
	{
		$_SESSION['date_naissance_info'] = '';
		$_SESSION['form_date_naissance'] = $date_naissance;
	}
	
	else if($date_naissance_result == 'empty')
	{
		$_SESSION['date_naissance_info'] = '<span class="erreur">Vous n\'avez pas entré de date de naissance.</span><br/>';
		$_SESSION['form_date_naissance'] = '';
		$_SESSION['erreurs']++;
	}
}

else
{
	header('Location: ../index.php');
	exit();
}

//qcm
if($_SESSION['reponse1'] == $_POST['reponse1'] && $_SESSION['reponse2'] == $_POST['reponse2'] && $_SESSION['reponse3'] == $_POST['reponse3'] && isset($_POST['reponse1']) && isset($_POST['reponse2']) && isset($_POST['reponse3']))
{
	$_SESSION['qcm_info'] = '';
}

else
{
	$_SESSION['qcm_info'] = '<span class="erreur">Au moins une des réponses au QCM charte est fausse.</span><br/>';
	$_SESSION['erreurs']++;
}


//captcha
if($_POST['captcha'] == $_SESSION['captcha'] && isset($_POST['captcha']) && isset($_SESSION['captcha']))
{
	$_SESSION['captcha_info'] = '';
}

else
{
	$_SESSION['captcha_info'] = '<span class="erreur">Vous n\'avez pas recopié correctement le contenu de l\'image.</span><br/>';
	$_SESSION['erreurs']++;
}

unset($_SESSION['reponse1'], $_SESSION['reponse2'], $_SESSION['reponse3']);
unset($_SESSION['captcha']);

/*************Fin étude******************/
?>