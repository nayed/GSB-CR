<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Praticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlPraticien = 'select id_praticien as idPraticien, lib_type_praticien as libTypePraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
        adresse_praticien as adressePraticien, cp_praticien as cpPraticien, ville_praticien as villePraticien, coef_notoriete as coefNotoriete
        FROM praticien PR JOIN TYPE_PRATICIEN TP on PR.id_type_praticien=TP.id_type_praticien';

    private $sqlTypePraticien = 'select id_praticien as idPraticien, lib_type_praticien as libTypePraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
        ville_praticien as villePraticien, TP.id_type_praticien as idTypePraticien FROM praticien PR JOIN TYPE_PRATICIEN TP on PR.id_type_praticien=TP.id_type_praticien';
    
    // Renvoie la liste des médicaments
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $praticiens = $this->executerRequete($sql);
        return $praticiens;
    }

    // Renvoie un médicament à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }
    
    public function getPraticienAvance($idTypePraticien) {
        $sql = $this->sqlTypePraticien . ' where TP.id_type_praticien = ?';
        $typePraticien = $this->executerRequete($sql, array($idTypePraticien));
        if ($typePraticien->rowCount() == 1)
            return $typePraticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun type praticien ne correspond à l'identifiant '$idTypePraticien'");
    }
}
