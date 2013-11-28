<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/Visiteur.php';
require_once 'Modele/CompteRendu.php';

// Contrôleur des actions liées aux ComptesRendus
class ControleurComptesRendus extends ControleurSecurise {

    // Objet modèle Médicament
    private $compteRendu;
    private $praticien;
    private $visiteur;

    public function __construct() {
        $this->compteRendu = new CompteRendu();
        $this->praticien = new Praticien();
        $this->visiteur = new Visiteur();
    }
    
    // Affiche 
    public function index() {
        
    }
}