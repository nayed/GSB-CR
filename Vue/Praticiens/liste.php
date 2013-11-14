<h2 class="text-center">Liste des praticiens</h2>
<div class="table-responsive">
    <table class="table table-hover table-condensed">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>Type de praticien</th>
            </tr>
        </thead>
        <?php foreach ($praticiens as $praticien): ?>
            <tr>
                <td><a href="praticiens/details/<?= $this->nettoyer($praticien['idPraticien']) ?>"><?= $this->nettoyer($praticien['nomPraticien']) ?></a></td>
                <td><?= $this->nettoyer($praticien['prenomPraticien']) ?></td><td><?= $this->nettoyer($praticien['villePraticien']) ?></td>
                <td><?= $this->nettoyer($praticien['libTypePraticien']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>