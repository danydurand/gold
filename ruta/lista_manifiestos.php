<?php
require_once('qcubed.inc.php');

$strTituPagi = "Manifiestos";
$strManiChof = '';
/* @var $objUsuario Chofer */
$objUsuario    = unserialize($_SESSION['User']);

$objUsuario->ActualizarManifiestosDelChofer();

$objClauOrde   = QQ::OrderBy(QQN::Containers()->Id,false);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Containers()->Estatus,'ABIERT@');
$objClauWher[] = QQ::Equal(QQN::Containers()->ChoferId,$objUsuario->CodiChof);
$arrManiChof   = Containers::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrManiChof) {
    $strManiChof = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Buscar...">
    ';
    $strNombImag = __RUTA_IMAGE__.'/manifest2.png';
    foreach ($arrManiChof as $objManiChof) {
        $intCantPiez = $objManiChof->Piezas;
        $intCantOkey = $objManiChof->CantidadOk;
        $intCantPend = $intCantPiez - $intCantOkey;
        $decPorcPend = nf0($intCantPend * 100 / $intCantPiez);
        $decPorcOkey = nf0($intCantOkey * 100 / $intCantPiez);

        $strManiChof .= '
            <li>
                <a href="detalle_de_manifiesto.php?id='.$objManiChof->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" style="margin-top: 3em; margin-left: 1em">
                    <p style="font-size:14px; margin-left: -2em"><b>PRECINTO</b>: '.$objManiChof->Numero.'</p>
                    <p style="font-size:14px; margin-left: -2em"><b>PIEZAS</b>: '.$intCantPiez.'</p>
                    <p style="font-size:14px; margin-left: -2em"><b>ENTREGADAS</b>: <span class="valor etiqueta_amarilla">'.$intCantOkey.'</span></p>
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

