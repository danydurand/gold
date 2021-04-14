<?php
//----------------------------------------------------------------------------------------------------
// Programa      : repo_clientes_confirmados.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 15/02/2016
// Descripcion   : Este programa genera y envia por correo un listado de los Clientes Confirmados
//                 que necesitan ser registrados en Roxanne para obtener su código y luego enviarles
//                 el correo de Bienvenida.
//----------------------------------------------------------------------------------------------------
require_once('qcubed.inc.php');
error_reporting(E_ALL);
//-------------------------
// Encabezado del reporte
//-------------------------
$dttFechDhoy = date('Y-m-d');
$strNombArch = 'repo_clientes_confirmados.txt';
$mixManeArch = fopen($strNombArch,'w');
fputs($mixManeArch,"Clientes Confirmados sin Código ni Bienvenida\n");
fputs($mixManeArch,"=============================================\n");
fputs($mixManeArch,"Fecha: ".date("Y-m-d")."  Hora: ".date("H:i")."\n\n");
//-------------------------
// Seleccion de Registros
//-------------------------
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Cliente()->Confirmado,true);
$objClauWher[] = QQ::IsNull(QQN::Cliente()->Codigo);
$arrClieConf   = Cliente::QueryArray(QQ::AndCondition($objClauWher));
$intCantRegi   = 0;
//---------------------------
// Encabezado del Reporte
//---------------------------
//fputs($mixManeArch,"Id\tNombre\t\tCedula\t\tEmail\t\tVendedor\t\tF.Registro\n");
fputs($mixManeArch,"Id\tNombre\t\t\tCedula\t\tVendedor\t\tF.Registro\n");
fputs($mixManeArch,str_repeat('-',120)."\n");
foreach ($arrClieConf as $objClieConf) {
    $strClieIdxx = $objClieConf->Id;
    $strNombClie = $objClieConf->Nombre;
    $strNumeCedu = $objClieConf->CedulaRif;
//    $strEmaiClie = $objClieConf->Email;
    $strNombVend = $objClieConf->Vendedor->Login;
    $strFechRegi = $objClieConf->RegistradoEl->__toString("YYYY-MM-DD");
    //-------------------------------
    // Linea de detalle del reporte
    //-------------------------------
    $strLineText = sprintf("%s\t%s\t\t%s\t%s\t\t%s",
        $strClieIdxx,
        $strNombClie,
        $strNumeCedu,
//        $strEmaiClie,
        $strNombVend,
        $strFechRegi);
    fputs($mixManeArch,$strLineText."\n");
    $intCantRegi ++;
}
fclose($mixManeArch);
if ($intCantRegi) {
    //-------------------------------------------------------------------
    // Se envia el correo a los Usuarios correspondientes
    //-------------------------------------------------------------------
    $objCorrConf = BuscarConfig('ClieConf');
    $strDireMail = $objCorrConf->Texto2;
    $arrDireMail = explode(',',$objCorrConf->Texto2);
    $strTituRepo = utf8_decode("Clientes Confirmados sin Codigo");

//    $objMessage = new QEmailMessage();
//    $objMessage->From    = 'ServiExpress <locahost@serviexpress.com>';
//    $objMessage->To      = $strDireMail;
//    $objMessage->Subject = $strTituRepo;
//    $objMessage->Attach($strNombArch);
//    $objMessage->HtmlBody = 'Clientes Confirmados sin Codigo ni Bienvenida';
//    $objMessage->SetHeader('x-application', 'Sistema Okinawa');
//    QEmailServer::Send($objMessage);


    $mimemail = new MIMEMAIL('HTML');
    $mimemail->senderName = 'Sistema Okinawa';
    $mimemail->senderMail = 'localhost@serviexpress.com';
    $mimemail->subject = $strTituRepo;
    $mimemail->attachments[] = $strNombArch;
    $mimemail->body = 'Estimado Usuario, sirvase revisar los Clientes de esta lista';
    $mimemail->create();
    $mimemail->send($arrDireMail);
}
?>