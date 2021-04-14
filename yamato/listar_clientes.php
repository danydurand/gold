<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Clientes";

if ( isset($_POST['codigo']) || isset($_POST['nombre']) ) {
    $_SESSION['codigo'] = $_POST['codigo'];
    $_SESSION['nombre'] = $_POST['nombre'];
}
$intCodiClie = $_SESSION['codigo'];
$strNombClie = $_SESSION['nombre'];

$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::GreaterThan(QQN::Cliente()->Id,0);
if (strlen($intCodiClie) > 0) {
    $objClauWher[] = QQ::Equal(QQN::Cliente()->Id,$intCodiClie);
} else {
    if (strlen($strNombClie) > 0) {
        $strNombClie   = '%'.strtoupper($strNombClie).'%';
        $objClauWher[] = QQ::Like(QQN::Cliente()->Nombre,$strNombClie);
    }
}
$arrClieRegi = Cliente::QueryArray(QQ::AndCondition($objClauWher));
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?php
            if ($arrClieRegi) {
                echo '<ul data-role="listview" data-inset="true"  
                          data-filter="true" data-filter-placeholder="Buscar...">';
                foreach ($arrClieRegi as $objCliente) {
                    $strNombImag = $objCliente->__sexoToIcon();
                    echo '
                        <li>
                            <a href="datos_cliente.php?Id='.$objCliente->Id.'" data-rel="dialog">
                                <img src="'.$strNombImag.'" width="40px" height="40px">
                                <h6>'.$objCliente->Nombre.'</h6>
                                <p>Codigo : '.$objCliente->Id.'</p>
                                <p>E-mail : '.$objCliente->Email.'</p>
                                <p>Telefono Movil : '.$objCliente->TelefonoMovil.'</p>
                            </a>
                        </li>
                    ';
                }
                echo '</ul>';
            } else {
                echo '
                <center>
                    <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Clientes</a>
                </center>
                ';
            }
            ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>  

<?php include('layout/footer.inc.php'); ?>

