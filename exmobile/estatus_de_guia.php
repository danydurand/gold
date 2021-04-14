<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$strEstaGuia = '    
    <center>
        La guía no tiene información de estatus.
    </center>';

if (isset($_GET['id'])) {
    $intNumeGuia = $_GET['id'];
    $objGuiaSele = Guia::Load($intNumeGuia);

    $objClauOrde   = QQ::Clause();
    $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->Fecha,false);
    $objClauOrde[] = QQ::OrderBy(QQN::GuiaCkpt()->Hora,false);

    $arrGuiaCkpt = $objGuiaSele->GetGuiaCkptArray($objClauOrde);
// echo count($arrGuiaCkpt);
// exit;
    $strEstaGuia = '
        <ul data-role="listview" data-inset="true">
            <li data-role="list-divider" data-theme="a">Checkpoints de la Guia</li>';
    foreach ($arrGuiaCkpt as $objGuiaCkpt) {
        $strEstaGuia .= '
            <li><b>'.$objGuiaCkpt->Observacion.'</b>
                <p>Sucursal: '.$objGuiaCkpt->Sucursal->Nombre.'</p>
                <p>Fecha: '.$objGuiaCkpt->Fecha.' <i>'.$objGuiaCkpt->Hora.'</i></p>
            </li>';
    }
    $strEstaGuia .= '
        </ul>';
}
?>

    <div data-role="page" id="resultado">

        <?php include('layout/header_deta_guia.inc.php') ?>

        <div data-role="content" >
            <?= $strEstaGuia ?>
        </div>

        <style>
            a {
                text-decoration: none;
            }
            .etiqueta {
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
        <?php include('layout/page_footer.inc.php') ?>

    </div>

<?php include('layout/footer.inc.php') ?> 
