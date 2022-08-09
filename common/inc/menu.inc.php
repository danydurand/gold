<?php
/* @var $objUsuario Usuario */
$objUsuario = unserialize($_SESSION['User']);
//---------------------------------------------------
// Se identifica el Menu Principal de la Aplicacion
//---------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Programa,'principal');
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->EsMenu,true);
$objMenuPpal   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//----------------------------------
// Se identifica la Opción de Admin
//----------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::NewOpcion()->Dependencia,$objMenuPpal->Id);
$objClauWher[] = QQ::Like(QQN::NewOpcion()->Programa,"%admin%");
$objOpciAdmi   = NewOpcion::QuerySingle(QQ::AndCondition($objClauWher));
//---------------------------------------------------------------------------------
// Si el Usuario no corresponde a los administradores del Sistema, la opción Admin
// se agrega en el vector de opciones bloqueadas o invisibles.
//---------------------------------------------------------------------------------
if (!is_null($objOpciAdmi)) {
    $arrUsuaAdmi = array('ddurand');
    if (!in_array($objUsuario->LogiUsua,$arrUsuaAdmi)) {
        $arrOpciExcl[] = $objOpciAdmi->Id;
    }
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
t('El vector de opciones tiene: '.count($arrOpciMenu).' elementos');
$strHtmlMenu = "<ul class='nav' id='side-menu'>\n";
foreach ($arrOpciMenu as $objOpcion) {
    $strHtmlMenu .= $objOpcion->HtmlMenuBootstrap($_SESSION['Sistema']);
}
$strHtmlMenu .= "</ul>\n";
?>