<?php
$this->titre = "Comptes-Rendus";

require 'Vue/_Commun/navigation.php';
?>

<div class="container">
    <h2 class="text-center">Liste de vos comptes-rendus de visite</h2>
    <div class="table-responsive">
        <table class="table table-hover table-condensed">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Praticien</th>
                    <th>Ville</th>
                    <th>Motif</th>
                    <th></th>  <!-- Colonne des boutons d'action -->
                </tr>
            </thead>
            <tbody><tr>
                    <td class="vert-align">2013-12-05</td>
                    <td class="vert-align">Ain Jean-Pierre</td>
                    <td class="vert-align">LAON</td>
                    <td class="vert-align">OOOOHOHOHOHO ACCIOOOOOOOOOOOOOOO</td>
                    <td>
                        <a href="comptesrendus/modification/97" class="btn btn-info" title="Modifier">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <button type="button" class="btn btn-danger" title="Supprimer" data-toggle="modal" data-target="#dlgConfirmation97">
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                        <!-- Dialogue modal de confirmation de suppression -->
                        <!-- Doit être numéroté pour être associé à chaque CR -->
                        <div class="modal fade" id="dlgConfirmation97" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        <h4 class="modal-title" id="myModalLabel">Demande de confirmation</h4>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous vraiment supprimer ce compte-rendu ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                        <a href="comptesrendus/supprimer/" class="btn btn-danger">Supprimer</a>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </td>
                </tr>
            </tbody></table>
    </div>
</div>