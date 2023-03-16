<?php
require "config/config.class.php";
$Conf = new stdClass();
$Conf->DBHOST = Config::$DBHOST ?? "localhost";
$Conf->DBNAME = Config::$DBNAME ?? "magasin";
$Conf->DBUSER = Config::$DBUSER ?? "root";
$Conf->DBPWD = Config::$DBPWD ?? "";
$Conf->TITREONGLET = Config::TITREONGLET;
$Conf->NOMSITE = Config::NOMSITE;
$Conf->MENU = Config::$MENU;?>