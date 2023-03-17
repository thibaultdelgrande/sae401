<?php
/*************************************
Classe chargée de l'affichage des vues
*************************************/
class vue {

  private $fichierVue;    // Nom du fichier permettant de générer le contenu pour la vue en fonction de l'action demandée
                          // Exemple : "vue/vueAccueil.php", "vue/vueErreur.php", ...

  /*******************************************************
  Initialise le nom du fichier requis pour générer le contenu à afficher dans la vue correspondant à l'action
    Entrée : 
      action [string] : action demandée

    Sortie :
      $fichierVue [string] : nom du fichier requis pour générer le contenu à afficher dans la vue

    Retour : 
      
  *******************************************************/
  public function __construct($action) {
    $this->fichierVue = "vue/vue".$action.".php";
  }

  /*******************************************************
  Affiche dans le gabarit la vue correspondant à l'action demandée
    Entrée : 
      data [array] : tableau associatif contenant les données à afficher dans la vue
  
    Retour : 
      
  *******************************************************/
  public function afficher($data =[]) {
      global $Conf;

    $title = $Conf->TITREONGLET;
    $header = "<a href='index.php'><img src='../img/kaiserstuhl_escape_logo.png'></a>
<div class='header-right'>
<a class='lien' href='index.php?action=our_adventure'>OUR ADVENTURE</a>
                <a class='lien' href='index.php?action=offers'>OFFERS</a>
                <a class='lien' href='index.php?action=faq'>FAQ</a>
                <a class='lien' href='index.php?action=contact'>CONTACT</a>
                </div>";
//    $titre = "";      // Le titre de la page est généré dans le fichierVue

    extract($data);   // Extrait les valeurs du tableau associatif $data dans des variables

    require $this->fichierVue;   // Génère le contenu de la page en fonction de l'action

    $footer = "&copy; MMI Mulhouse";
  
    require "gabarit.php";
  }
}