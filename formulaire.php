<?php

session_start();
header('Content-type: text/html; charset=utf-8');
include('../includes/config.php');
?>

<?php
/********Actualisation de la session...**********/

include('../includes/fonctions.php');
connexionbdd();
actualiser_session();

/********Fin actualisation de session...**********/
?>