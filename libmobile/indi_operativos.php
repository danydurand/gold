<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Indi. Operativos";

$objDatabase = Parametro::GetDatabase();
//-------------------------
// PreAlertas registradas
//-------------------------
$intCantPrea = Prealerta::CountAll();
//-------------------------
// Datos Guias Roxanne
//-------------------------
$intGuiaRoxa = DatosGuiaRoxanne::CountAll();
//--------------------------
// Manifiestos Recibidos
//--------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Manifiesto()->Tipo,'I');
$intManiReci   = Manifiesto::QueryCount(QQ::AndCondition($objClauWher));
//--------------------------
// Notificaciones x Enviar
//--------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Notificacion()->Notificado,false);
$intNotiNoen   = Notificacion::QueryCount(QQ::AndCondition($objClauWher));
//--------------------------
// Notificaciones Enviadas
//--------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Notificacion()->Notificado,true);
$intNotiEnvi   = Notificacion::QueryCount(QQ::AndCondition($objClauWher));
//-------------------
// Guias x Entregar
//-------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Guia()->Entregada,false);
$intGuiaNoen   = Guia::QueryCount(QQ::AndCondition($objClauWher));
//------------------
// Guia Entregadas
//------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Guia()->Entregada,true);
$intGuiaEntr   = Guia::QueryCount(QQ::AndCondition($objClauWher));
//----------------------------------------
// Guias Entregadas sin Pago Registrado
//----------------------------------------
$arrEntrNopa = Guia::EntregadasSinPagoRegistrado(15);
$intEntrNopa = count($arrEntrNopa);
//------------------------
// Pagos Registrados
//------------------------
$intPagoRegi   = Pago::CountAll();
//------------------------
// Pagos No confirmados
//------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Pago()->Confirmado,false);
$intPagoNoco   = Pago::QueryCount(QQ::AndCondition($objClauWher));
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <div class="ui-nodisc-icon" data-role="collapsible-set" data-inset="true" data-theme="a" style="font-size:14px">
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Extranet</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#">Pre-Alertas Registradas
                                <span class="ui-li-count"><?= $intCantPrea ?></span></a>
                        </li>
                        <li>
                            <a href="#">Pagos Registrados
                                <span class="ui-li-count"><?= $intPagoRegi ?></span></a>
                        </li>
                        <li>
                            <a href="#">Pagos No Confirmados
                                <span class="ui-li-count"><?= $intPagoNoco ?></span></a>
                        </li>
                        <li>
                            <a href="#">Notificaciones x Enviar
                                <span class="ui-li-count"><?= $intNotiNoen ?></span></a>
                        </li>
                        <li>
                            <a href="#">Notificaciones Enviadas
                                <span class="ui-li-count"><?= $intNotiEnvi ?></span></a>
                        </li>
                    </ul>
                </div>
                <div data-role="collapsible" data-collapsed="true" data-theme="a">
                    <h3>Operativos</h3>
                    <ul data-role="listview" data-inset="true">
                        <li>
                            <a href="#">Datos Guias Roxanne
                            <span class="ui-li-count"><?= $intGuiaRoxa ?></span></a>
                        </li>
                        <li>
                            <a href="#">Manifiestos Recibidos
                            <span class="ui-li-count"><?= $intManiReci ?></span></a>
                        </li>
                        <li>
                            <a href="#">Pendientes x Entregar
                            <span class="ui-li-count"><?= $intGuiaNoen ?></span></a>
                        </li>
                        <li>
                            <a href="#">Guias Entregadas
                            <span class="ui-li-count"><?= $intGuiaEntr ?></span></a>
                        </li>
                        <li>
                            <a href="#">Entregadas sin Pago
                            <span class="ui-li-count"><?= $intEntrNopa ?></span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?> 

