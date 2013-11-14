<?php $this->titre = "Praticiens"; ?>

<?php
$menuPraticiens = true;
require 'Vue/_Commun/navigation.php';
?>

<div class="well">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
            <ul class="nav nav-tabs nav-justified">
                <li class=""><a href="#simple" data-toggle="tab">Simple</a></li>
                <li class="active"><a href="#avancee" data-toggle="tab">Avancée</a></li>
            </ul>
        </div>
    </div><br />
    <div class="tab-content">
        <div class="tab-pane fade" id="simple">
            <form class="form-horizontal" role="form" action="praticiens/resultat" method="post">
                <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-2 control-label">Nom et prénom</label>
                    <div class="col-sm-5 col-md-4">
                        <select class="form-control" name="id">
                            <?php foreach ($praticiens as $praticien) : ?>
                                <option value="<?= $this->nettoyer($praticien['idPraticien']) ?>">
                                    <?= $this->nettoyer($praticien['nomPraticien']) ?>
                                    <?= $this->nettoyer($praticien['prenomPraticien']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade active in" id="avancee">
            <form class="form-horizontal" role="form" action="praticiens/resultats" method="post">
                <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-2 control-label">Nom</label>
                    <div class="col-sm-5 col-md-4">
                        <input name="nom" type="text" class="form-control" autofocus="">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-2 control-label">Ville</label>
                    <div class="col-sm-5 col-md-4">
                        <input name="ville" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 col-sm-offset-2 control-label">Type</label>
                    <div class="col-sm-5 col-md-4">
                        <select class="form-control" name="id">
                            <?php foreach ($typePraticiens as $typePraticien) : ?>
                                <option value="<?= $this->nettoyer($typePraticien['idTypePraticien']) ?>">
                                    <?= $this->nettoyer($typePraticien['libTypePraticien']) ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-5">
                        <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-search"></span> Rechercher</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>