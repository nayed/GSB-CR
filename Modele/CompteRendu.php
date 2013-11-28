<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class CompteRendu extends Modele {

    // Ajoute un compte rendu
    public function AjouterCompteRemdu($idVisiteur, $idPraticien, $bilan, $motif) {
        $sql = 'INSERT INTO rapport_visite(id_praticien, id_visiteur, date_rapport, bilan, motif)'
                . ' values(?, ?, ?, ?, ?)';
        $date = date(DATE_W3C);
        $this->executerRequete($sql, array($idPraticien, $idVisiteur, $date, $bilan, $motif));
    }
}
