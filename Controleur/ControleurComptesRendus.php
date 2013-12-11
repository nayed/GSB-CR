<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Framework/Controleur.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/Visiteur.php';
require_once 'Modele/CompteRendu.php';

// Contrôleur des actions liées aux ComptesRendus
class ControleurComptesRendus extends ControleurSecurise {

    // Objet modèle 
    private $praticien;
    private $compteRendu;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->compteRendu = new CompteRendu();
    }

    // Affiche la liste des comptes rendus
    public function index() {
        $compteRendus = $this->compteRendu->getComptesRendus();
        $this->genererVue(array('compteRendus' => $compteRendus));
    }

    // Affiche un compte rendu
    public function ajout() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Ajoute un compte rendu
    public function ajouter() {
        $idPraticien = $this->requete->getParametre("id");
        $idVisiteur = $this->requete->getSession()->getAttribut("idVisiteur");
        $dateRapport = $this->requete->getParametre("date");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        $this->compteRendu->ajouterCompteRendu($idPraticien, $idVisiteur, $dateRapport, $motif, $bilan);

        $this->genererVue();
    }
    
    
}