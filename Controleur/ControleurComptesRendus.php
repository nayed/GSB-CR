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
        $comptesRendus = $this->compteRendu->getComptesRendus();
        $msgErreur = "Vous n'avez saisi aucun compte-rendu de visite.";
        
        if ($comptesRendus->rowCount() < 1)
            $this->genererVue(array('msgErreur' => $msgErreur));
        else
            $this->genererVue(array('comptesRendus' => $comptesRendus));
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
    
    public function modifier() {
        $idRapport = $this->requete->getParametre("idCompteRendu");
        $motif = $this->requete->getParametre("motif");
        $bilan = $this->requete->getParametre("bilan");
        $this->compteRendu->modifierCompteRendu($motif, $bilan, $idRapport);  
        $this->genererVue();
    }
    
    public function modification() {
        $idRapport = $this->requete->getParametre("id");
        $compteRendu = $this->compteRendu->getComptesRendus("$idRapport");
        $this->genererVue(array('compteRendu' => $compteRendu));

    }
    
    public function supprimer() {
        $idRapport = $this->requete->getParametre("id");
        $this->compteRendu->supprimerCompteRendu($idRapport); 
        $this->rediriger("comptesRendus");
    }
}
