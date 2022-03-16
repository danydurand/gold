<?php
require_once('qcubed.inc.php');

include('layout/header.inc.php');

$strTituPagi = "Detalle de Manifiesto";
$strNumeMani = '';

if (isset($_GET['id'])) {
    $intIdxxMani = $_GET['id'];
    $objManiSele = ContainerMobile::Load($intIdxxMani);

    //$objManiSele->ResumeDeEntrega();

    $intCantPiez = $objManiSele->CantPiezas;
    $intCantOkey = $objManiSele->Entregadas;
    $intCantPend = $objManiSele->Pendientes;
    $intCantDevu = $objManiSele->Devueltas;
    $intCantSing = $objManiSele->SinGestionar;

    $decPorcOkey  = nf0($intCantOkey * 100 / $intCantPiez);
    $decPorcPend  = nf0($intCantPend * 100 / $intCantPiez);
    $decPorcDevu  = nf0($intCantDevu * 100 / $intCantPiez);
    $decPorcSing  = nf0($intCantSing * 100 / $intCantPiez);

    $strNumeMani = $objManiSele->Container->Numero;
    $strDetaMani = '
    <div data-role="collapsible-set" data-inset="true" data-theme="e">
        <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
            <h3>Detalles del Manifiesto</h3>
            <table width="100%">
                <tbody>
                    <tr>
                        <td class="etiqueta">Prec. Trasero:</td>
                        <td class="valor">'.$objManiSele->Container->Numero.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Fecha:</td>
                        <td class="valor">'.$objManiSele->Container->Fecha->__toString("DD/MM/YYYY").'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Prec. Lateral:</td>
                        <td class="valor">'.$objManiSele->Container->PrecintoLateral.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Piezas:</td>
                        <td class="valor">'.$objManiSele->CantPiezas.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta_verde">Entregadas:</td>
                        <td class="valor etiqueta_verde">'.$intCantOkey.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta_roja">Sin Gestionar:</td>
                        <td class="valor etiqueta_roja">'.$intCantSing.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Kilos:</td>
                        <td class="valor">'.$objManiSele->Container->Kilos.'</td>
                    </tr>
                    <tr>
                        <td class="etiqueta">Pies Cúbicos:</td>
                        <td class="valor">'.$objManiSele->Container->PiesCub.'</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    ';
} else {
    $strDetaMani = '    
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">Regresar</a>
    </center>';
}
?>

    <div data-role="page" id="resultado">

        <div data-role="header">
            <h4><span style="font-size:14px">Manif: <?= $strNumeMani ?></span></h4>
        </div>

        <div data-role="content" >
            <?= $strDetaMani ?>
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
            .etiqueta_verde {
                color: green;
                font-weight: bold;
                padding: 2px;
                text-align: right;
                vertical-align: top;
                width: 40%;
            }
            .etiqueta_roja {
                color: red;
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
