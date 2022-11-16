<?php
$strPageTitle = QApplication::Translate('Buscar Guía');
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-3 col-md-3 col-lg-3 pull-left" style="text-align: left; margin-top: -0.30em; margin-left: -1em;">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-5 col-lg-6" style="text-align: center; margin-top: -0.25em;">
        <?php $this->btnSave->Render(); ?>
        <?php $this->btnExceReta->Render(); ?>
        <?php $this->btnExceFact->Render(); ?>
        <?php $this->btnExceNorm->Render(); ?>
    </div>
    <div class="hidden-sm col-md-3 col-lg-4"></div>
</div>
<!-- Contenido del Body -->
<div class="form-controls">
    <div class="container-fluid" data-aos="fade-in">
        <div class="row">
            <div class="col-sm-12" style="min-height: 2em; text-align: left; margin-top: 0.5em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row" style="margin-top: 2em">
            <div class="col-xs-12 col-md-4">
                <?php $this->txtNumeGuia->RenderWithName(); ?>
                <?php $this->txtGuiaExte->RenderWithName(); ?>
                <?php $this->txtGuiaScan->RenderWithName(); ?>
                <?php $this->txtCodiInte->RenderWithName(); ?>
                <?php $this->txtNombBusc->RenderWithName(); ?>
                <?php $this->lstCodiClie->RenderWithName(); ?>
                <?php $this->lstCodiProd->RenderWithName(); ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <?php $this->txtNotaEntr->RenderWithName(); ?>
                <?php $this->txtNumeMast->RenderWithName(); ?>
                <?php $this->calFechInic->RenderWithName(); ?>
                <?php $this->calFechFina->RenderWithName(); ?>
                <?php $this->txtUbicFisi->RenderWithName(); ?>
                <?php $this->chkEnxxAlma->RenderWithName(); ?>
                <?php $this->lstCodiOrig->RenderWithName(); ?>
            </div>
            <div class="col-xs-12 col-md-4">
                <?php $this->lstCodiDest->RenderWithName(); ?>
                <?php $this->calEntrInic->RenderWithName(); ?>
                <?php $this->calEntrFina->RenderWithName(); ?>
                <?php $this->txtUsuaPodx->RenderWithName(); ?>
                <?php $this->txtRefeFact->RenderWithName(); ?>
                <?php $this->txtGuiaTran->RenderWithName(); ?>
                <?php $this->chkMostQuer->RenderWithName(); ?>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function startIntro(){
        var intro = introJs();
        intro.setOptions({
            nextLabel: "Next",
            prevLabel: "Prev",
            skipLabel: "Skip",
            doneLabel: "Done",
            steps: [
                {
                    intro: "Este formulario permite especificar criterios de búsqueda para las Guías.  " +
                    "Puede combinar varios criterios y se requiere, al menos uno " +
                    "para que la búsqueda sea válida"
                },
                {
                    element: '#c6',
                    intro: "Especifique aquí el Nro de Guía-Interno, cuyos datos desea visualizar"
                },
                {
                    element: '#c7',
                    intro: "Coloque aquí el Nro Guía-Cliente, cuyos datos desea visualizar"
                },
                {
                    element: '#c8',
                    intro: "Coloque aquí el Código del Cliente y presione Tabulador, para que el Cliente correspondiente, aparezca"
                },
                {
                    element: '#c9',
                    intro: "Coloque aquí el Nombre del Cliente y presione Tabulador, para que el Cliente correspondiente, aparezca"
                },
                {
                    element: '#c10',
                    intro: "El Cliente que aparezca aquí, es el que realmente <b>Filtra</b>, las guías"
                },
                {
                    element: '#c11',
                    intro: "Seleccione el Código del Producto, para filtrar las guías correspondientes " +
                    "(IMP=Importacion, EXP=Exportación, NAC=Nacional"
                },
                {
                    element: '#c12',
                    intro: "Especifique la Referencia de un Manifiesto de Recepción, para visualizar las guías contenidas en él"
                },
                {
                    element: '#c13',
                    intro: "Especifique la Referencia de un Manifiesto de Salida a Ruta, para visualizar las guías contenidas en él"
                },
                {
                    element: '#c14',
                    intro: "Especifique una Fecha Inicial de creación de las guías"
                },
                {
                    element: '#c15',
                    intro: "Especifique una Fecha Inicial de creación de las guías"
                }
            ]
        });

        intro.start();
    }
</script>

<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>

