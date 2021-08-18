<?php
require_once('qcubed.inc.php');

/* @var $objUsuario Chofer */

$strTituPagi = "Manifiestos";
$strManiChof = '';
$objUsuario  = unserialize($_SESSION['User']);
//t('Entrando a Manifiestos del Chofer: '.$objUsuario->NombChof.' ('.$objUsuario->CodiChof.')');

$objUsuario->ActualizarManifiestosDelChofer();
//t('Manifiestos actualizados');

$objClauOrde = QQ::OrderBy(QQN::Containers()->Id,false);
$objClauWher = QQ::Clause();
$arrManiChof = Containers::LoadArrayByChoferIdEstatus($objUsuario->CodiChof,'ABIERT@',$objClauOrde);
//t('Hay '.count($arrManiChof).' manifiestos abiertos...');
if ($arrManiChof) {
    $strManiChof = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    $strNombImag = __RUTA_IMAGE__.'/manifest2.png';
    foreach ($arrManiChof as $objManiChof) {
        //t('Procesando: '.$objManiChof->Numero);
        //$objResuMani = $objManiChof->ResumeDeEntrega();

        $intTotaPiez = $objManiChof->Piezas;
        //$this->CantidadOk   = $objResuEntr->CantOkey;
        //$this->SinGestionar = $objResuEntr->CantSing;
        //$this->Devueltas    = $objResuEntr->CantDevu;

        $intCantOkey = $objManiChof->CantidadOk;
        $intCantPend = $objManiChof->Pendientes;
        $intCantDevu = $objManiChof->Devueltas;
        $intCantSing = $objManiChof->SinGestionar;

        $decPorcOkey  = nf0($intCantOkey * 100 / $intTotaPiez);
        $decPorcPend  = nf0($intCantPend * 100 / $intTotaPiez);
        $decPorcDevu  = nf0($intCantDevu * 100 / $intTotaPiez);
        $decPorcSing  = nf0($intCantSing * 100 / $intTotaPiez);

        //$decPorcOkey = $objResuMani->PorcOkey;
        //$decPorcPend = $objResuMani->PorcPend;
        //$decPorcDevu = $objResuMani->PorcDevu;
        //$decPorcSing = $objResuMani->PorcSing;

        $strManiChof .= '
            <li>
                <a href="detalle_de_manifiesto.php?id='.$objManiChof->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" style="margin-top: 3em; margin-left: 1em">
                    <p style="font-size:14px; margin-left: -2em"><b>PRECINTO</b>: '.$objManiChof->Numero.'</p>
                    <p style="font-size:14px; margin-left: -2em"><b>PIEZAS</b>: '.$intCantPiez.'</p>
                    <p style="font-size:14px; margin-left: -2em"><b>ENTREGADAS</b>: <span class="valor etiqueta_amarilla">'.$intCantOkey.'</span></p>
                    <p style="font-size:14px; margin-left: -2em"><b>DEVUELTAS</b>: <span class="valor etiqueta_amarilla">'.$intCantDevu.'</span></p>
                    <p style="font-size:14px; margin-left: -2em"><b>SIN GESTIONAR</b>: <span class="valor etiqueta_amarilla">'.$intCantSing.'</span></p>
                    <p style="font-size:14px; margin-left: -2em"><b>EFECTIVIDAD</b>: <span class="valor etiqueta_amarilla">'.$decPorcOkey.'%</span></p>
                </a>
                <a href="guias_agrupadas.php?id='.$objManiChof->Id.'">Guías</a>
            </li>
        ';
    }
    $strManiChof .= '</ul>';
} else {
    $strManiChof = '
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No tiene Manifiestos</a>
    ';
}
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

    <?php include('layout/page_header.inc.php'); ?>

    <div data-role="content" style="min-height: 400px">
        <?= $strManiChof; ?>
    </div>

    <style>
        .etiqueta_amarilla {
            color: yellow;
            font-weight: bold;
            padding: 2px;
            text-align: right;
            vertical-align: top;
            width: 40%;
        }
        .valor {
            text-align: left;
            padding: 3px;
        }
    </style>

    <?php include('layout/page_footer.inc.php'); ?>

</div>

<?php include('layout/footer.inc.php'); ?>

