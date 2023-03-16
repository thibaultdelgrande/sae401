<?php
require "ctlPage.class.php";

/*******************************************************
Affichage de la page d'accueil du site
  Entrée : 

  Retour : 
    
*******************************************************/
function accueil()
{
    (new ctlPage())->accueil();
}
/*******************************************************
Affichage d'une page d'erreur
  Entrée :
    message [string] : message d'erreur

  Retour :

*******************************************************/
function erreur($message)
{
    (new ctlPage())->erreur($message);
}   // Balise PHP non fermée pour éviter de retourner des caractères "parasites" en fin de traitement