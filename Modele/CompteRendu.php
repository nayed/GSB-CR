<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class CompteRendu extends Modele {

    private $sqlCompteRendu = 'select pr.id_praticien, id_rapport, date_rapport, motif, bilan from rapport_visite rv join praticien pr on
        rv.id_praticien = pr.id_praticien';
    
    public function ajouterCompteRendu($idPraticien, $idVisiteur, $dateRapport, $motif, $bilan) {
        $sql = 'insert into RAPPORT_VISITE(id_praticien, id_visiteur, date_rapport, motif, bilan)'
            . ' values(?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $dateRapport, $motif, $bilan));
    }
    
    // Affiche la liste des comptes rendus
    public function getComptesRendus() {
        $sql = $this->sqlCompteRendu . ' order by id_praticien';
        $compteRendu = $this->executerRequete($sql);
        return $compteRendu;
    }
}