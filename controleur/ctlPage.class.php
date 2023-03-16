<?php
require_once "vue/vue.class.php";

/*************************************
Classe chargée de la gestion des articles
 *************************************/
class ctlPage
{
    public function accueil()
    {
        (new vue('Accueil'))->afficher();
    }

    public function erreur($message)
    {
        (new vue('Erreur'))->afficher(array("message" => $message));
    }
}
