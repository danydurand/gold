<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_GET['o'])) {
    $strOpciRepo = $_GET['o'];
    $objClauWher = QQ::Clause();
    switch ($strOpciRepo) {
        case 'bc':
            //-------------------
            // Buscar Cliente
            //-------------------
            if (isset($_POST['codigo']) || isset($_POST['nombre'])) {
                $_SESSION['codigo'] = $_POST['codigo'];
                $_SESSION['nombre'] = $_POST['nombre'];
            }
            $intCodiClie = $_SESSION['codigo'];
            $strNombClie = $_SESSION['nombre'];
            if (strlen($intCodiClie) > 0) {
                $objClauWher[] = QQ::Equal(QQN::Cliente()->Id,$intCodiClie);
            } else {
                if (strlen($strNombClie) > 0) {
                    $strNombClie   = '%'.strtoupper($strNombClie).'%';
                    $objClauWher[] = QQ::Like(QQN::Cliente()->Nombre,$strNombClie);
                }
            }
            break;
        case 'cv':
            //----------------------
            // Clientes x Vendedor
            //----------------------
            if (isset($_GET['codi_vend'])) {
                $_SESSION['codi_vend'] = $_GET['codi_vend'];
            }
            $intCodiVend = $_SESSION['codi_vend'];
            $objClauWher[] = QQ::Equal(QQN::Cliente()->VendedorId,$intCodiVend);
            break;
        case 'cx':
            //----------------------
            // Clientes x Sexo
            //----------------------
            if (isset($_GET['codi_sexo'])) {
                $_SESSION['codi_sexo'] = $_GET['codi_sexo'];
            }
            $strCodiSexo = $_SESSION['codi_sexo'];
            $objClauWher[] = QQ::Equal(QQN::Cliente()->Sexo,$strCodiSexo);
            break;
        case 'cs':
            //----------------------
            // Clientes x Sucursal
            //----------------------
            if (isset($_GET['codi_sucu'])) {
                $_SESSION['codi_sucu'] = $_GET['codi_sucu'];
            }
            $intCodiSucu = $_SESSION['codi_sucu'];
            $objClauWher[] = QQ::Equal(QQN::Cliente()->SucursalId,$intCodiSucu);
            break;
        default:
            # code...
            break;
    }
}
$strListClie   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Cliente()->Nombre);
$objClauOrde[] = QQ::LimitInfo(25);
$arrClieRegi   = Cliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrClieRegi) {
    $strListClie = '
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    ';
    foreach ($arrClieRegi as $objCliente) {
        if ($objCliente->Sexo == 'M') {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user1.png';
        } else {
            $strNombImag = __APP_IMAGE_ASSETS__.'/user_female.png';
        }
        $strListClie .= '
            <li>
                <a href="detalle_del_cliente.php?id='.$objCliente->Id.'" data-rel="dialog">
                    <img src="'.$strNombImag.'" width="40px" height="40px" class="user">
                    <p style="font-size:14px">'.$objCliente->Nombre.'</p>
                    <p>Codigo : VE#'.$objCliente->Id.'</p>
                    <p><i class="fa fa-envelope-o"></i> : '.$objCliente->Email.'</p>
                    <p><i class="fa fa-2x fa-mobile"></i> : '.$objCliente->TelefonoMovil.'</p>
                </a>
                <a href="lista_de_guias.php?o=gc&cid='.$objCliente->Id.'">Guías</a>
            </li>
        ';
    }
    $strListClie .= '</ul>';
} else {
    $strListClie = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Clientes</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListClie; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

