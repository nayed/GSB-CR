<?php

require_once 'Framework/Modele.php';

// Services métier liés aux praticiens 
class CompteRendu extends Modele {

    private $sqlCompteRendu = 'select pr.id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
        ville_praticien as villePraticien, id_rapport as idCompteRendu, date_rapport as dateRapport, motif,
        bilan from rapport_visite rv join praticien pr on rv.id_praticien = pr.id_praticien';
    private $sqlModifCR = 'update rapport_visite set motif=?, bilan=? where id_rapport=?';
    private $sqlSuppCR = 'delete from rapport_visite where id_rapport=?';

    public function ajouterCompteRendu($idPraticien, $idVisiteur, $dateRapport, $motif, $bilan) {
        $sql = 'insert into RAPPORT_VISITE(id_praticien, id_visiteur, date_rapport, motif, bilan)'
                . ' values(?, ?, ?, ?, ?)';
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $dateRapport, $motif, $bilan));
    }

    // Affiche la liste des comptes rendus
    public function getComptesRendus() {
        $sql = $this->sqlCompteRendu . ' order by pr.id_praticien';
        $comptesRendus = $this->executerRequete($sql);
        return $comptesRendus;
    }

    public function getCompteRendu($idCompteRendu) {
        $sql = $this->sqlCompteRendu . ' where id_rapport=?';
        $compteRendu = $this->executerRequete($sql, array($idCompteRendu));
        if ($compteRendu->rowCount() == 1)
            return $compteRendu->fetch(); // Accès à la premiere ligne de résultat
        else
            throw new Exception("Aucun compte rendu ne correspond à l'identifiant '$idCompteRendu'");
    }

    public function modifCompteRendu($motif, $bilan, $idCompteRendu) {
        $sql = $this->sqlModifCR;
        $this->executerRequete($sql, array($motif, $bilan, $idCompteRendu));
    }

    public function suppCompteRendu($idCompteRendu) {
        $sql = $this->sqlSuppCR;
        $this->executerRequete($sql, array($idCompteRendu));
    }

}