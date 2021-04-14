<?php
//----------------------------------------------------------------------------------
// Programa      : actualizar_cuentas_y_usuarios_api.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 17/06/2019
// Descripcion   : Actualiza el estatus de las cuentas y los Usuarios API segun
//                 las indicaciones de Yelimar Roth y María Abreu
//----------------------------------------------------------------------------------
require_once('qcubed.inc.php');

$_SESSION['User'] = serialize(Usuario::LoadByLogiUsua('liberty'));
$objDatabase      = Guia::GetDatabase();
//------------------------------------------------------------------
// Todas las acciones realizadas quedan grabadas en un archivo log
//------------------------------------------------------------------
$mixManeArch = fopen('actualizar_cuentas_y_usuarios_api.txt','w');
fputs($mixManeArch,"\nActualizando Cuentas y Usuarios API");
fputs($mixManeArch,"\n===================================\n\n");
$mixErroOrig = error_reporting();
error_reporting(0);

$intContRegi  = 0;
$intCantActi  = 0;
$intCantInac  = 0;
$strCadeSqlx  = " select * ";
$strCadeSqlx .= "   from temp_subcuentas ";
$objResuChec  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objResuChec->FetchArray()) {
    $intContRegi++;
    $strCodiInte = trim($mixRegistro['codigo_interno']);
    $blnStatCuen = trim($mixRegistro['estatus']) == 'ACTIVO' ? StatusType::ACTIVO : StatusType::INACTIVO;
    $strUsuaApix = trim($mixRegistro['usuario_api']);
    $strPassApix = trim($mixRegistro['password_api']);
    if ($blnStatCuen) {
        $intCantActi++;
    } else {
        $intCantInac++;
    }
    //---------------------------------------
    // Se valida la existencia del Cliente
    //---------------------------------------
    $objClieActu = MasterCliente::LoadByCodigoInterno($strCodiInte);
    if (!$objClieActu) {
        $strLineText = sprintf("%s.- El Cliente %s no existe en la BD\n", $intContRegi,$strCodiInte);
        fputs($mixManeArch, $strLineText);
        continue;
    }
    //----------------------------------------------------------------
    // Se valida que no exista otro Cliente con el mismo Usuario API
    //----------------------------------------------------------------
    if (strlen($strUsuaApix) > 0) {
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::Equal(QQN::MasterCliente()->UsuarioApi,$strUsuaApix);
        $objClauWher[] = QQ::NotEqual(QQN::MasterCliente()->CodiClie,$objClieActu->CodiClie);
        $objOtroClie   = MasterCliente::QuerySingle(QQ::AndCondition($objClauWher));
        if ($objOtroClie) {
            $strNombClie = $objClieActu->NombClie;
            $strLineText = sprintf("%s.- El Usuario API (%s) del Cliente %s, esta repetido, lo tiene el Cliente %s\n",
                $intContRegi,$strUsuaApix,$strCodiInte,$objOtroClie->CodigoInterno);
            fputs($mixManeArch,$strLineText);
            continue;
        }
    }
    //-------------------------------------------------------------------
    // Si pasa todas la validaciones, entonces se actualiza el registro
    //-------------------------------------------------------------------
    try {
        $objClieActu->CodiStat    = $blnStatCuen;
        $objClieActu->UsuarioApi  = $strUsuaApix;
        $objClieActu->PasswordApi = $strPassApix;
        $objClieActu->Save();
    } catch(Exception $e) {
        $strLineText = $intContRegi.'.- CR: '.$strCodiInte.' Error: '.$e->getMessage();
        fputs($mixManeArch,$strLineText."\n");
        continue;
    }
    //----------------------------------------------
    // Se deja registro en el log de transacciones
    //----------------------------------------------
    $strLineText = 'Estatus: '.StatusType::ToString($blnStatCuen).', Usuario API: '.$strUsuaApix.', Password API: '.$strPassApix;
    $arrLogxCamb['strNombTabl'] = 'MasterCliente';
    $arrLogxCamb['intRefeRegi'] = $objClieActu->CodiClie;
    $arrLogxCamb['strNombRegi'] = '('.$strCodiInte.') - '. $objClieActu->NombClie;
    $arrLogxCamb['strDescCamb'] = $strLineText;
    LogDeCambios($arrLogxCamb);
    $strLineText = $intContRegi.'.- CR: '.$strCodiInte.' Estatus: '.StatusType::ToString($blnStatCuen).', Usuario API: '.$strUsuaApix.', Password API: '.$strPassApix;
    fputs($mixManeArch,$strLineText."\n");
}
error_reporting($mixErroOrig);
$strLineText = sprintf("\nCant de Activos: %s", $intCantActi);
fputs($mixManeArch,$strLineText);
$strLineText = sprintf("\nCant de Inactivos: %s\n", $intCantInac);
fputs($mixManeArch,$strLineText);
fclose($mixManeArch);
?>
