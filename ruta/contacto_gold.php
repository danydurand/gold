<?php
require_once('qcubed.inc.php');

/* @var $objOtraPiez GuiaPiezas */
//t('Entrando a Contacto Gold...');

$strTituPagi  = "Contacto Gold";
$strHtmlTele = '
        <tr>
            <td class="etiqueta">Cargo:</td>
            <td class="valor">Sin Cargo</td>
        </tr>
        <tr>
            <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
            <td class="valor">No hay teléfonos disponibles</td>
        </tr>
';
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Parametros()->Indice,'PERSCONT');
$arrPersCont   = Parametros::QueryArray(QQ::AndCondition($objClauWher));
//print_r($arrPersCont);
if (count($arrPersCont) > 0) {
    $strHtmlTele = '';
}
foreach ($arrPersCont as $objPersCont) {
    $strNombPers = $objPersCont->Texto1;
    $strCargPers = $objPersCont->Texto2;
    $strNumeTele = $objPersCont->Texto3;
    $strHtmlTele .= '
        <tr>
            <td class="etiqueta">Cargo:</td>
            <td class="valor">'.$strCargPers.'</td>
        </tr>
        <tr>
            <td class="etiqueta"><i class="fa fa-phone fa-lg"></i></td>
            <td class="valor"><a href="tel:'.$strNumeTele.'">'.$strNumeTele.'</a></td>
        </tr>
    ';
}

$strDetaCont = '
<div data-role="collapsible-set" data-inset="true" data-theme="a">
    <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="false" style="font-size:14px;">
        <h3>Contacto Gold Coast</h3>
        <table width="100%">
            <tbody>
                '.$strHtmlTele.' 
            </tbody>
        </table>
    </div>
</div>
';
?>
<?php include('layout/header.inc.php'); ?>

    <div data-role="page" id="resultado">

        <div data-role="header">
            <h5><span style="font-size:14px">Contacto Gold Coast</span></h5>
        </div>

        <div data-role="content" >
            <a data-rel="back" data-role="button" data-theme="b">
                <i class="fa fa-mail-reply fa-lg pull-left"></i>Volver
            </a>
            <?= $strDetaCont ?>
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
