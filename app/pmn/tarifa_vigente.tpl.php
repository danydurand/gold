<?php
// This is the HTML template include file (.tpl.php) for the tarifa_vigente.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Tarifa Vigente';
require(__APP_INCLUDES__ . '/header.inc.php');
require(__APP_INCLUDES__ . '/botonera_list.inc.php');
?>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: -1.5em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" style="text-align: center">
                    <?php $this->lblDescTari->Render(); ?>
                </div>
            </div>
            <div class="row" style="margin-top: 1em">
                <div class="col-md-6">
                    <div class="titulo">Tarifa Urbana</div>
                </div>
                <div class="col-md-6">
                    <div class="titulo">Tarifa Nacional</div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="table-responsive">
                        <?php $this->dtgTarifaPesos->Render(); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="table-responsive">
                        <?php $this->dtgTariNaci->Render(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .titulo, .titulo_label, .titulo_label_1, .titulo_label_2 {
            font-weight: bold;
        }
        .titulo_label, .titulo_label_1, .titulo_label_2 {
            padding: 0.35em;
        }
        .titulo, .titulo_label {
            text-align: center;
        }
        .titulo_label_1, .titulo_label_2 {
            text-align: right;
        }
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            padding: 0.4em;
        }
        .form-label {
            padding: 5px;
        }
    </style>

<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>