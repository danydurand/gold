<?php
//---------------------------------------------------
// Se identifica el Menu Principal de la Aplicacion
//---------------------------------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Opcion()->SistemaId,$_SESSION['Sistema']);
$objClauWher[] = QQ::Equal(QQN::Opcion()->Programa,'main');
$objClauWher[] = QQ::Equal(QQN::Opcion()->TipoId,TipoOpciType::MENU);
$objMenuPpal   = Opcion::QuerySingle(QQ::AndCondition($objClauWher));
//-------------------------------
// Opciones del Menu Principal 
//-------------------------------
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Opcion()->Posicion);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Opcion()->SistemaId,$_SESSION['Sistema']); 
$objClauWher[] = QQ::Equal(QQN::Opcion()->Dependencia,$objMenuPpal->Id); 
$objClauWher[] = QQ::Equal(QQN::Opcion()->Activo,true); 
$arrOpciMenu = Opcion::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
// echo "Son ".count($arrOpciMenu)." opciones<br>\n";
$strHtmlMenu = "<ul class='nav' id='side-menu'>\n";
foreach ($arrOpciMenu as $objOpcion) {
    $strHtmlMenu .= $objOpcion->HtmlMenuExtranetBootstrap();
}
$strHtmlMenu .= "</ul>\n";
?>