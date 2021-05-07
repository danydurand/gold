<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Lista de Facturas";

//------------------------
// Titulos de las Listas
// y el Sufijo del Monto
//------------------------
$strTituList = 'Facturas ';
$strSufiMone = '';

//------------------------
// Año de la Factura
//------------------------
if (isset($_GET['a'])) {
    $strTituList  .= 'del Año '.$_GET['a'];
    $strAnioFact   = $_GET['a'];
    $objClauWher[] = QQ::Equal(QQN::Proforma()->Anio,$strAnioFact);
}

//------------------------
// Mes de la Factura
//------------------------
if (isset($_GET['m'])) {
    $strTituList  .= ' del Mes '.$_GET['m'];
    $strMesxFact   = $_GET['m'];
    $objClauWher[] = QQ::Equal(QQN::Proforma()->Mes,$strMesxFact);
}

//------------------------
// Moneda de la Factura
//------------------------
if (isset($_GET['d'])) {
    $strTituList  .= ' Moneda '.$_GET['d'];
    $strMoneFact   = $_GET['d'];
    $objClauWher[] = QQ::Equal(QQN::Proforma()->Moneda,$strMoneFact);
}

//------------------------
// Cliente de la Factura
//------------------------
if (isset($_GET['c'])) {
    $strTituList  .= ' del Cliente '.urldecode($_GET['c']);
    $strNombClie   = $_GET['c'];
    $objClauWher[] = QQ::Equal(QQN::Proforma()->Cliente,$strNombClie);
}

//----------------------------
// Vencimiento de la Factura
//----------------------------
if (isset($_GET['v'])) {
    $strTituList  .= ' con Vencimiento de '.$_GET['v'].' días';
    $intAntiFact   = $_GET['v'];
    switch ($intAntiFact) {
        case 7:
            $intValoInic = 1;
            $intValoFina = 8;
            break;
        case 15:
            $intValoInic = 8;
            $intValoFina = 16;
            break;
        case 30:
            $intValoInic = 16;
            $intValoFina = 31;
            break;
        case 45:
            $intValoInic = 31;
            $intValoFina = 46;
            break;
        default :
            $intValoInic = 46;
            $intValoFina = 99999;
            break;
    }
    $strCadeSqlx = "
      select numero
        from v_proforma
       where antiguedad >= $intValoInic
         and antiguedad < $intValoFina
    ";
    $objDataBase   = Proforma::GetDatabase();
    $objDbResult   = $objDataBase->Query($strCadeSqlx);
    while ($mixRegistro = $objDbResult->FetchArray()) {
        $arrFactAnti[]  = $mixRegistro['numero'];
    }
    $objClauWher[] = QQ::In(QQN::Proforma()->Numero,$arrFactAnti);
}

//------------------------
// Definición de Query
//------------------------
$strListFact   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Proforma()->Monto,false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrListFact   = Proforma::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrListFact) {
    $strListFact = '
    <p style="text-align:center;color:crimson;">'.$strTituList.'</p>
    <br>
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a>
    </center>
    <br>
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    ';
    foreach ($arrListFact as $objFactura) {
        if ($_GET['d'] == 'VEB') {
            $strSufiMone = 'Bs';
        } else {
            $strSufiMone = '$';
        }
        $strListFact .= '
            <li>
                <a href="">
                    <img src="images/list.png" width="40px" height="40px" class="extra">
                    <p style="font-size:14px">Nro. Factura: '.$objFactura->Numero.'</p>
                    <p>Fecha: '.$objFactura->Fecha.'</p>
                    <p>Cliente: '.$objFactura->Cliente.'</p>
                    <p>Monto: '.round($objFactura->Monto).' '.$strSufiMone.'</p>
                </a>
            </li>
        ';
    }
    $strListFact .= '</ul>';
} else {
    $strListFact = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Facturas</a>
    </center>
    ';
}
?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListFact; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div> 

<?php include('layout/footer.inc.php'); ?>

