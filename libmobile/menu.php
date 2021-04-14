<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
//----------------------
// Título de la Página.
//----------------------
$strTituPagi = "Liberty Express";
//-------------------------------------------------------------------
// Manejo de Parámetros y/o criterios obtenidos desde el formulario
//-------------------------------------------------------------------
if (isset($_GET['m'])) {
    $_SESSION['menu'] = $_GET['m'];
} else {
    $_SESSION['menu'] = 'a';
}
//-----------------------------------------------------
// Sistema, Fecha actual y Procentaje vigente del IVA
//-----------------------------------------------------
$strSistChar = 'api';
$strObsePend = 'Pendiente por Procesar';
$dteFechDhoy = date("Y-m-d");
$decIvaxDhoy = FacImpuesto::LoadImpuestoVigente('IVA', $dteFechDhoy);
//---------------------------------------------
// Cantidad de Guías Registradas por Clientes
//---------------------------------------------
$objClauWher       = QQ::Clause();
$objClauWher[]     = QQ::Equal(QQN::Guia()->FechaCreacion, $dteFechDhoy);
$objClauWher[]     = QQ::Equal(QQN::Guia()->SistemaId,$strSistChar);
$arrGuiaApix = Guia::QuerySingle(QQ::AndCondition($objClauWher));
$intGuiaDhoy = Count($arrGuiaApix);
//-------------------------------
// Cantidad de Guías Procesadas
//-------------------------------
$objClauWher       = QQ::Clause();
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->FechCarg, $dteFechDhoy);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Cliente->ManejaApi,true);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Ajustar,false);
$objClauWher[]     = QQ::NotEqual(QQN::GuiaCacesa()->Observacion, $strObsePend);
$arrGuiaApix = GuiaCacesa::QuerySingle(QQ::AndCondition($objClauWher));
$intGuiaProc = Count($arrGuiaApix);
//--------------------------------------------
// Cantidad de Guías Pendientes por Procesar
//--------------------------------------------
$objClauWher       = QQ::Clause();
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->FechCarg, $dteFechDhoy);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Cliente->ManejaApi,true);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Observacion, $strObsePend);
$arrGuiaApix = GuiaCacesa::QuerySingle(QQ::AndCondition($objClauWher));
$intGuiaPend = Count($arrGuiaApix);
//--------------------------------
// Cantidad de Guías con Errores
//--------------------------------
$objClauWher       = QQ::Clause();
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->FechCarg, $dteFechDhoy);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Cliente->ManejaApi,true);
$objClauWher[]     = QQ::Equal(QQN::GuiaCacesa()->Ajustar,true);
$arrGuiaApix = GuiaCacesa::QuerySingle(QQ::AndCondition($objClauWher));
$intGuiaErro = Count($arrGuiaApix);
?>
    <div data-role="page" id="inicio">
        <?php include('layout/page_header.inc.php'); ?>
        <div data-role="content" style="text-align: center; min-height: 200px; padding-top: 10%">
            <img src="images/logo_liberty_transp.png" alt="" style="opacity:0.5;">
            <hr>
        </div>
        <div data-role="content" style="margin-top:-4em;">
            <div data-role="collapsible-set" data-inset="true" data-theme="a">
                <div class="ui-nodisc-icon" data-role="collapsible" data-theme="a">
                    <h3>Registros por Clientes</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="">Hoy<span class="ui-li-count"><?= $intGuiaDhoy; ?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Registros por Estatus</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#">Guías Procesadas<span class="ui-li-count"><?= $intGuiaProc; ?></span></a>
                        </li>
                        <li>
                            <a href="#">Pendientes por Procesar<span class="ui-li-count"><?= $intGuiaPend; ?></span></a>
                        </li>
                        <li>
                            <a href="#">Guías con Errores<span class="ui-li-count"><?= $intGuiaErro; ?></span></a>
                        </li>
                    </ul>
                </div>
                <div class="ui-nodisc-icon" data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Registros con Errores</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="">Hoy<span class="ui-li-count"><?= $intGuiaErro; ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>