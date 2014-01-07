<?php

require_once 'Controleur/ControleurSecurise.php';
require_once 'Modele/Praticien.php';
require_once 'Modele/TypePraticien.php';

// Contrôleur des actions liées aux praticiens
class ControleurPraticiens extends ControleurSecurise {

    // Objet modèle Médicament
    private $praticien;
    private $typePraticien;

    public function __construct() {
        $this->praticien = new Praticien();
        $this->typePraticien = new TypePraticien();
    }

    // Affiche la liste des praticiens
    public function index() {
        $praticiens = $this->praticien->getPraticiens();
        $this->genererVue(array('praticiens' => $praticiens));
    }

    // Affiche les informations détaillées sur un praticiens
    public function details() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }

    // Affiche l'interface de recherche de praticien
    public function recherche() {
        $praticiens = $this->praticien->getPraticiens();
        $typePraticiens = $this->typePraticien->getTypePraticiens();
        $this->genererVue(array('praticiens' => $praticiens, 'typePraticiens' => $typePraticiens));
    }

    // Affiche le résultat de la recherche de praticien
    public function resultat() {
        if ($this->requete->existeParametre("id")) {
            $idPraticien = $this->requete->getParametre("id");
            $this->afficher($idPraticien);
        }
        else
            throw new Exception("Action impossible : aucun praticien défini");
    }
    
    // Affiche les détails sur un praticien
    private function afficher($idPraticien) {
        $praticien = $this->praticien->getPraticien($idPraticien);
        $this->genererVue(array('praticien' => $praticien), "details");
    }
    
    // Affiche le résultat de la recherche de type praticien
    public function resultats() {
        $nom = $ville = null;
        if ($this->requete->existeParametre("idTypePraticien"))
            {
            if($this->requete->existeParametre("nom"))
                $nom = $this->requete->getParametre("nom");
            if($this->requete->existeParametre("ville"))
                $ville = $this->requete->getParametre("ville");
            $idTypePraticien = $this->requete->getParametre("idTypePraticien");
            $praticiens = $this->praticien->getTypesPraticiens($idTypePraticien, $nom, $ville);
            $this->genererVue(array('praticiens' => $praticiens), "index");
        }
        else
            throw new Exception("Action impossible : aucun type praticien défini");
    }

}