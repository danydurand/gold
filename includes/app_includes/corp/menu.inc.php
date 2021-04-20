<?php
/* @var $objUsuario UsuarioConnect */
$objUsuario = unserialize($_SESSION['User']);
/* @var $objCliente MasterCliente */
$objCliente = unserialize($_SESSION['ClieMast']);
//---------------------------------------------------
// Se identifica el Menu Principal de la Aplicacion
//---------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Programa,'principal');
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
$objMenuPpal   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//----------------------------------------
// Se identifica la Opción de Cargar Guía
//----------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%cargar_guia%");
$objOpciGuia   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//----------------------------------------
// Se identifica la Opción de SubClientes
//----------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%subcuentas%");
$objOpciSubc   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//--------------------------------------
// Se identifica la Opción de Mi Tarifa
//--------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%tarifa_peso_list%");
$objOpciMita   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//----------------------------------
// Se identifica la Opción de Admin
//----------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%admin%");
$objOpciAdmi   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//------------------------------------------------------------------------------
// Si el Cliente está inactivo, la opción de Cargar Guía se agrega en el vector
// de opciones bloqueadas o invisibles.
//------------------------------------------------------------------------------
if (!$objCliente->CodiStat) {
    $arrOpciExcl[] = $objOpciGuia->Id;
}
//---------------------------------------------------------------------------------------
// Si el Cliente no tiene SubCuentas, la opción de SubClientes se agrega en el vector de
// opciones bloqueadas o invisibles.
//---------------------------------------------------------------------------------------
if (!$objCliente->tieneSubCuentas()) {
    if ($objOpciSubc) {
        $arrOpciExcl[] = $objOpciSubc->Id;
    }
}
//------------------------------------------------------------------------------
// Si el Cliente posee una Tarifa que no sea "Por Peso", se agrega en el vector
// de opciones bloqueadas o invisibles.
//------------------------------------------------------------------------------
//if ($objCliente->Tarifa->TipoTarifa != FacTipoTarifaType::PORPESO) {
//    $arrOpciExcl[] = $objOpciMita->Id;
//}
//---------------------------------------------------------------------------------
// Si el Usuario no corresponde a los administradores del Sistema, la opción Admin
// se agrega en el vector de opciones bloqueadas o invisibles.
//---------------------------------------------------------------------------------
$arrUsuaAdmi = array('ddurand');
if (!in_array($objUsuario->LogiUsua,$arrUsuaAdmi)) {
    $arrOpciExcl[] = $objOpciAdmi->Id;
}
//-------------------------------
// Opciones del Menu Principal 
//-------------------------------
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::NewOpcion()->Posicion);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Activo,true);
if (!empty($arrOpciExcl)) {
    //---------------------------------------------------------------------------
    // Si existen opciones bloqueadas, éstos no se muestran en el Menú Principal
    //---------------------------------------------------------------------------
    $objClauWher[] = QQ::NotIn(QQN::NewOpcion()->Id,$arrOpciExcl);
}
$arrOpciMenu = NewOpcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
$strHtmlMenu = "<ul class='nav' id='side-menu'>\n";
foreach ($arrOpciMenu as $objOpcion) {
    $strHtmlMenu .= $objOpcion->HtmlMenuConnectBootstrap(__CORP__);
}
$strHtmlMenu .= "</ul>\n";
?>