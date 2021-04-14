<?php
// This is the HTML template include file (.tpl.php) for the master_cliente_list.php
// form DRAFT page.  Remember that this is a DRAFT.  It is MEANT to be altered/modified.

// Be sure to move this out of this directory before modifying to ensure that subsequent
// code re-generations do not overwrite your changes.

$strPageTitle = 'Lista de Clientes';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
    <div class="titulo-formulario">
        <div class="col-sm-3 col-md-3 col-lg-4 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
            <?php $this->lblTituForm->Render(); ?>
        </div>
        <div class="col-sm-9 col-md-9 col-lg-8" style="text-align: left; margin-top: -0.25em;">
            <?php $this->btnNuevRegi->Render() ?>
            <?php $this->btnFiltAvan->Render() ?>
            <?php $this->btnExpoExce->Render() ?>
            <?php $this->btnDesaClie->Render() ?>
            <?php $this->btnElimMasi->Render() ?>
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
                <div class="col-md-1"></div>
                <div class="col-md-4">
                    <?php $this->txtCodiInte->RenderWithName(); ?>
                    <?php $this->txtNombClie->RenderWithName(); ?>
                    <?php $this->lstSucuClie->RenderWithName(); ?>
                    <?php $this->txtNumeRifx->RenderWithName(); ?>
                    <?php $this->chkClieElim->RenderWithName(); ?>
                </div>
                <div class="col-md-4">
                    <?php $this->lstCodiVend->RenderWithName(); ?>
                    <?php $this->lstCodiTari->RenderWithName(); ?>
                    <?php $this->lstCodiStat->RenderWithName(); ?>
                    <?php $this->lstTipoClie->RenderWithName(); ?>
                    <?php $this->lstMotiElim->RenderWithName(); ?>
                </div>
                <div class="col-md-3" style="margin-top: 3em">
                    <?php $this->btnBuscRegi->Render(); ?>
                </div>
            </div>
            <div class="row">
                <div class="table-responsive">
                    <?php $this->dtgMasterClientes->Render(); ?>
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