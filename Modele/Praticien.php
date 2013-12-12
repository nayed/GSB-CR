<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class Praticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlPraticien = 'select id_praticien as idPraticien, nom_praticien as nomPraticien, prenom_praticien as prenomPraticien,
            adresse_praticien as adressePraticien, cp_praticien as cpPraticien, ville_praticien as villePraticien,
            pr.id_type_praticien as idTypePraticien, coef_notoriete as coefNotoriete, lib_type_praticien as libTypePraticien,
            lieu_type_praticien as lieuTypePraticien from praticien pr join type_praticien tp on pr.id_type_praticien = tp.id_type_praticien';

    // Renvoie la liste des praticiens
    public function getPraticiens() {
        $sql = $this->sqlPraticien . ' order by nom_praticien';
        $typePraticiens = $this->executerRequete($sql);
        return $typePraticiens;
    }

    // Renvoie un praticien à partir de son identifiant
    public function getPraticien($idPraticien) {
        $sql = $this->sqlPraticien . ' where id_praticien=?';
        $praticien = $this->executerRequete($sql, array($idPraticien));
        if ($praticien->rowCount() == 1)
            return $praticien->fetch();  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun praticien ne correspond à l'identifiant '$idPraticien'");
    }

    public function getTypesPraticiens($idTypePraticien, $nom, $ville) {
        $nom = '%' . $nom . '%';
        $ville = '%' . $ville . '%';
        $sql = $this->sqlPraticien . ' where TP.id_type_praticien = ? and nom_praticien like ? and ville_praticien like ? order by nomPraticien';
        $typePraticien = $this->executerRequete($sql, array($idTypePraticien, $nom, $ville));
        if ($typePraticien->rowCount() > 0)
            return $typePraticien;  // Accès à la première ligne de résultat
        else
            throw new Exception("Aucun type praticien ne correspond à l'identifiant '$idTypePraticien'");
    }

}
