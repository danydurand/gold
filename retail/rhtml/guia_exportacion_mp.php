<style type="text/css">
    .titulo {
        background-color: #CCC;
        font-weight: bold;
        width: 100%;
        text-align: center;
    }
    .destacado {
        background-color: #CCC;
        font-weight: bold;
        font-size: 28px;
    }
    .etiqueta {
        font-weight: bold;
        width: 12%;
    }
    .contenido {
        font-size: 12px;
        width: 70%;
    }
    .parrafo {
        width: 660px;
        text-align: justify;
        font-size: 10px;
        line-height: 20px;
    }
</style>

<?php
require_once('qcubed.inc.php');

$intAnchPagi = "660px";
$intMediPagi = "320px";
$intAnchEtiq = "50px";
$strTextMens = "Guia Aerea";
$strFechDhoy = date('d/m/Y');

$intIdxxGuia  = $_SESSION['IdxxGuia'];

$strCadeSqlx  = "select g.numero, ";
$strCadeSqlx .= "       g.fecha, ";
$strCadeSqlx .= "       g.nombre_remitente, ";
$strCadeSqlx .= "       c.cedula_rif, ";
$strCadeSqlx .= "       g.direccion_remitente, ";
$strCadeSqlx .= "       g.telefono_movil_remitente, ";
$strCadeSqlx .= "       g.telefono_remitente, ";
$strCadeSqlx .= "       c.email, ";
$strCadeSqlx .= "       g.piezas, ";
$strCadeSqlx .= "       o.iata origen, ";
$strCadeSqlx .= "       g.nombre_destinatario, ";
$strCadeSqlx .= "       g.direccion_destinatario, ";
$strCadeSqlx .= "       g.telefono_movil_destinatario, ";
$strCadeSqlx .= "       g.telefono_destinatario, ";
$strCadeSqlx .= "       g.cedula_destinatario, ";
$strCadeSqlx .= "       d.iata destino, ";
$strCadeSqlx .= "       g.servicio_entrega, ";
$strCadeSqlx .= "       p.codigo, ";
$strCadeSqlx .= "       g.contenido, ";
$strCadeSqlx .= "       g.contenido, ";
$strCadeSqlx .= "       g.forma_pago, ";
$strCadeSqlx .= "       g.estado, ";
$strCadeSqlx .= "       g.ciudad, ";
$strCadeSqlx .= "       g.codigo_postal, ";
$strCadeSqlx .= "       g.total, ";
$strCadeSqlx .= "       gp.id_pieza, ";
$strCadeSqlx .= "       gp.alto, ";
$strCadeSqlx .= "       gp.ancho, ";
$strCadeSqlx .= "       gp.largo, ";
$strCadeSqlx .= "       gp.kilos, ";
$strCadeSqlx .= "       gp.volumen ";
$strCadeSqlx .= "  from guias g ";
$strCadeSqlx .= "       inner join guia_piezas gp ";
$strCadeSqlx .= "    on g.id = gp.guia_id ";
$strCadeSqlx .= "       left join productos p ";
$strCadeSqlx .= "    on g.producto_id = p.id ";
$strCadeSqlx .= "       left join clientes_retail c ";
$strCadeSqlx .= "    on g.cliente_retail_id = c.id ";
$strCadeSqlx .= "       inner join sucursales o ";
$strCadeSqlx .= "    on g.origen_id = o.id ";
$strCadeSqlx .= "       inner join sucursales d ";
$strCadeSqlx .= "    on g.destino_id = d.id ";
$strCadeSqlx .= " where g.id  = $intIdxxGuia";

$strTamaLetr  = '6px';
$intMaxiTama  = 46;
$objDatabase  = Guias::GetDatabase();
$objDbResult  = $objDatabase->Query($strCadeSqlx);
while ($mixRegistro = $objDbResult->FetchArray()) {
    $strNumeGuia = $mixRegistro['numero'];
    $strFechGuia = $mixRegistro['fecha'];
    $strNombRemi = $mixRegistro['nombre_remitente'];
    $strCeduRifx = $mixRegistro['cedula_rif'];

    $strDireRemi = $mixRegistro['direccion_remitente'];
    $strDireRem1 = $mixRegistro['direccion_remitente'];
    $strDireRem2 = '';
    $intTamaRemi = strlen($strDireRemi);
    if ($intTamaRemi > $intMaxiTama) {
        $strDireRem1 = substr($strDireRemi,0,$intMaxiTama);
        $strDireRem2 = substr($strDireRemi,$intMaxiTama,$intMaxiTama);
    }

    $strTeleRemi = $mixRegistro['telefono_movil_remitente'];
    if (strlen($mixRegistro['telefono_remitente'])) {
        $strTeleRemi .= ' | '.$mixRegistro['telefono_remitente'];
    }
    $strEmaiRemi = $mixRegistro['email'];
    $intCantPiez = $mixRegistro['piezas'];
    $strSucuOrig = $mixRegistro['origen'];
    $strNombDest = $mixRegistro['nombre_destinatario'];

    $intMaxiTama = 46;
    $strDireDest = $mixRegistro['direccion_destinatario'];
    $strDireDes1 = $mixRegistro['direccion_destinatario'];
    $strDireDes2 = '';
    $strTamaDest = strlen($strDireDest);
    if ($strTamaDest > $intMaxiTama) {
        $strDireDes1 = substr($strDireDest,0,$intMaxiTama);
        $strDireDes2 = substr($strDireDest,$intMaxiTama,$intMaxiTama);
    }
    $strTeleDest = $mixRegistro['telefono_movil_destinatario'];
    if (strlen($mixRegistro['telefono_destinatario'])) {
        $strTeleDest .= ' | '.$mixRegistro['telefono_destinatario'];
    }
    $strCeduDest = $mixRegistro['cedula_rif'];
    $strSucuDest = $mixRegistro['destino'];
    $strServEntr = $mixRegistro['servicio_entrega'];
    $strCodiProd = $mixRegistro['codigo'];
    $strDescCont = $mixRegistro['contenido'];
    $strTotaGuia = $mixRegistro['total'];
    $strFormPago = $mixRegistro['forma_pago'];
    $strNombEsta = $mixRegistro['estado'];
    $strNombCiud = $mixRegistro['ciudad'];
    $strCodiPost = $mixRegistro['codigo_postal'];
    
    $decKiloGuia = $mixRegistro['kilos'];
    $decAltoGuia = $mixRegistro['alto'];
    $decAnchGuia = $mixRegistro['ancho'];
    $decLargGuia = $mixRegistro['largo'];
    $decVoluGuia = $mixRegistro['volumen'];

    $strPiezGuia = $mixRegistro['id_pieza'];
    $intNumePiez = (int)explode('-',$strPiezGuia)[1];
    $strCantPiez = $intNumePiez.' / '.$mixRegistro['piezas'];
    ?>
    <page backtop="10mm" backbottom="10mm" backleft="8mm" backright="8mm">
    <page_header>
        <table style="margin-top: 12px; width: 100%" border="0">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <?php include('logo_gold_exp.php') ?>
                    <?php include('info_remitente_exp.php') ?>
                    <?php include('info_destinatario_exp.php') ?>
                    <?php include('info_destino_exp.php') ?>
                    <?php include('dimensiones_y_peso_exp.php') ?>
                    <?php include('barra_y_qr_exp.php') ?>
                </td>
                <td style="width: 50%; vertical-align: top;">
                    <?php include('terminos_y_condiciones_exp.php') ?>
                </td>
            </tr>
        </table>
    </page_header>
    </page>
<?php } ?>