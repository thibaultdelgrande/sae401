<?php
require_once "vue/vue.class.php";
require "ctlPage.class.php";

class Routeur{

    private $ctlPage;

    /**
     * @param $ctlPage
     */
    public function __construct()
    {
        $this->ctlPage = new CtlPage();
    }


    public function routerRequete(){
        try {
            if(isset($_GET["action"])) {
                switch ($_GET["action"]) {
                    case "clients":
                        $this->ctlClient->clients();                                                            // Affichage de la liste des clients
                        break;
                }
            }
            else                                                                      // Page d'accueil
                $this->ctlPage->accueil();
        }
        catch (Exception $e) {                                                      // Page d'erreur
            $this->ctlPage->erreur($e->getMessage());
        }
    }
}