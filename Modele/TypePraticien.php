<?php

require_once 'Framework/Modele.php';

// Services métier liés aux médicaments 
class TypePraticien extends Modele {

    // Morceau de requête SQL incluant les champs de la table praticien
    private $sqlTypePraticien = 'select id_type_praticien as idTypePraticien, lib_type_praticien as libTypePraticien FROM type_praticien';

    // Renvoie la liste des type de praticien
    public function getTypePraticiens() {
        $sql = $this->sqlTypePraticien . ' order by lib_type_praticien';
        $typePraticiens = $this->executerRequete($sql);
        return $typePraticiens;
    }
}
