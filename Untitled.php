<?php
			if($_SESSION['erreurs'] > 0)
			{
				if($_SESSION['erreurs'] == 1) $_SESSION['nb_erreurs'] = '<span class="erreur">Il y a eu 1 erreur.</span><br/>';
				else $_SESSION['nb_erreurs'] = '<span class="erreur">Il y a eu '.$_SESSION['erreurs'].' erreurs.</span><br/>';
			?>
			<h1>Inscription non validée.</h1>
			<p>Vous avez rempli le formulaire d'inscription du site et nous vous en remercions, cependant, nous n'avons
			pas pu valider votre inscription, en voici les raisons :<br/>
			<?php
				echo $_SESSION['nb_erreurs'];
				echo $_SESSION['pseudo_info'];
				echo $_SESSION['mdp_info'];
				echo $_SESSION['mdp_verif_info'];
				echo $_SESSION['mail_info'];
				echo $_SESSION['mail_verif_info'];
				echo $_SESSION['date_naissance_info'];
				echo $_SESSION['qcm_info'];
				echo $_SESSION['captcha_info'];
				
				if($sqlbug !== true)
				{
			?>
			Nous vous proposons donc de revenir à la page précédente pour corriger les erreurs. (Attention, que vous
			l'ayez correctement remplie ou non, la partie sur la charte et l'image est à refaire intégralement.)</p>
			<div class="center"><a href="inscription.php">Retour</a></div>
			<?php
				}
				
				else
				{
			?>
			Une erreur est survenue dans la base de données, votre formulaire semble ne pas contenir d'erreurs, donc
			il est possible que le problème vienne de notre côté, réessayez de vous inscrire ou contactez-nous.</p>
			
			<div class="center"><a href="inscription.php">Retenter une inscription</a> - <a href="../contact.php">Contactez-nous</a></div>
			<?php
				}
			}
			?>
		</div>

		<?php
		include('../includes/bas.php');
		?>
<!--fin-->