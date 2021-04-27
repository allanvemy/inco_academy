<!-- Formulaire mis à jour : -->
			<form action="trait-inscription.php" method="post" name="Inscription">
				<fieldset><legend>Identifiants</legend>
					<label for="pseudo" class="float">Pseudo :</label> <input type="text" name="pseudo" id="pseudo" size="30" /> <em>(compris entre 3 et 32 caractères)</em><br />
					<label for="mdp" class="float">Mot de passe :</label> <input type="password" name="mdp" id="mdp" size="30" /> <em>(compris entre 4 et 50 caractères)</em><br />
					<label for="mdp_verif" class="float">Mot de passe (vérification) :</label> <input type="password" name="mdp_verif" id="mdp_verif" size="30" /><br />
					<label for="mail" class="float">Mail :</label> <input type="text" name="mail" id="mail" size="30" /> <br />
					<label for="mail_verif" class="float">Mail (vérification) :</label> <input type="text" name="mail_verif" id="mail_verif" size="30" /><br />
					<label for="date_naissance" class="float">Date de naissance :</label> <input type="text" name="date_naissance" id="date_naissance" size="30" /> <em>(format JJ/MM/AAAA)</em><br/>
				</fieldset>
				<fieldset><legend>Charte du site et protection anti-robot</legend>
					<?php
					include('../includes/charte.php');
					?>
					
					<h1>Système anti-robot :</h1>
					
					<p>Qu'est-ce que c'est ?<br/>
					Pour lutter contre l'inscription non désirée de robots qui publient du contenu non désiré sur les sites web,
					nous avons décidé de mettre en place un systèle de sécurité.<br/>
					Aucun de ces systèmes n'est parfait, mais nous espérons que celui-ci, sans vous être inacessible sera suffisant
					pour lutter contre ces robots.<br/>
					Il est possible que certaines fois, l'image soit trop dure à lire ; le cas échéant, actualisez la page jusqu'à avoir une image lisible.<br/>
					Si vous êtes dans l'incapacité de lire plusieurs images d'affilée, <a href="../contact.php">contactez-nous</a>, nous nous occuperons de votre inscription.</p>
					<label for="captcha" class="float">Entrez les 8 caractères (majuscules ou chiffres) contenus dans l'image :</label> <input type="text" name="captcha" id="captcha"><br/>
					<img src="captcha.php" />
				</fieldset>
				<div class="center"><input type="submit" value="Inscription" /></div>
			</form>