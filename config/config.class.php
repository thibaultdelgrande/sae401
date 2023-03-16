<?php
// Definition des paramètres de la BDD
abstract class Config{
    public static $DBHOST = "localhost";
    public static $DBNAME = "magasin";
    public static $DBUSER = "root";
    public static $DBPWD = "";

// Définition des paramètres du site
    public const TITREONGLET= "Kaiserstuhl Escape";   // Titre de l'onglet
    public const NOMSITE= "Web Shop";      // Titre affiché dans le header

// Menu par défaut
    public static $MENU= "<a class='lien' href='index.php?action=our_adventure'>OUR ADVENTURE</a>
                <a class='lien' href='index.php?action=articles'>Articles</a>
                <a class='lien' href='index.php?action=commandes'>Commandes</a>";}?>
