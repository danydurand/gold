<?php
// This is the HTML template include file (.tpl.php) for the master_cliente_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'PreFacturas sin DF';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-5 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-7" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnCancel->Render(); ?>
        </div>
    </div>
    <div class="form-controls">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" style="min-height: 1.4em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                    <?php $this->lblMensUsua->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgPrefSind->Render(); ?>
                </div>
            </div>
        </div>
    </div>
    <style>
        .titulo {
            background-color: #CCCCCC;
            border-radius: 3px;
            font-weight: bold;
            padding: 0.4em;
            text-align: center;
        }
        .form-controls {
            line-height: 0.9;
        }
        .renderWithName {
            padding: 3px 0;
        }
        .form-name {
            width: 28%;
            font-size: 90%;
        }
        .form-field {
            width: 72%;
            /*font-size: 88%;*/
        }
    </style>
<?php require(__APP_INCLUDES__ . '/footer.inc.php'); ?>