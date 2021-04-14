<?php
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

// echo 'Print por Echo: ';
// echo 1;
$objCliente = unserialize($_SESSION['User']);

// echo 2;
if (isset($_POST['nume'])) {
    $_SESSION['nume'] = $_POST['nume'];
    $_SESSION['desc'] = $_POST['desc'];
    $_SESSION['valo'] = $_POST['valo'];
    $_SESSION['coin'] = $_POST['coin'];
    $_SESSION['flip'] = $_POST['flip'];
    // echo 3;
}

// echo '<br>Print por Kint: ';
// d($_SESSION);
// echo '<br>Print por Print_R: ';
// print_r($_POST);
// echo '<br><br>Print por Var_Dump: ';
// var_dump($_POST);

$strNumeTrac = $_SESSION['nume'];
$strDescArti = $_SESSION['desc'];
$decValoMerc = $_SESSION['valo'];
$intCodiCour = $_SESSION['coin'];
$blnGuiaRete = $_SESSION['flip'];

// echo "<br><br>\n";
// echo "clie: ".$objCliente->Nombre."<br>\n";
// echo "nume: ".$strNumeTrac."<br>\n";
// echo "desc: ".$strDescArti."<br>\n";
// echo "valo: ".$decValoMerc."<br>\n";
// echo "coin: ".$intCodiCour."<br>\n";
// echo "flip: ".$blnGuiaRete."<br>\n";

// Se Verifica la previa existencia del Tracking en la tabla Pre-Alerta
$objPreaRegi = Prealerta::LoadByTracking($strNumeTrac);
// dd($objPreaRegi);

// Si el Tracking no existe, se crea un registro nuevo
if (!$objPreaRegi) {

    $objPreAlerta = new Prealerta();
    $objPreAlerta->Tracking     = trim($strNumeTrac);
    $objPreAlerta->ClienteId    = $objCliente->Id;
    $objPreAlerta->Fecha        = new QDateTime(QDateTime::Now);
    $objPreAlerta->Descripcion  = strtoupper(trim($strDescArti));
    $objPreAlerta->Precio       = $decValoMerc;
    $objPreAlerta->CourierId    = $intCodiCour;
    $objPreAlerta->Retener      = $blnGuiaRete;
    $objPreAlerta->ApiRegiId    = -1;
    $objPreAlerta->Save();

    $arrLogxCamb['strNombTabl'] = 'Prealerta';
    $arrLogxCamb['intRefeRegi'] = $objPreAlerta->Id;
    $arrLogxCamb['strNombRegi'] = $objPreAlerta->Tracking;
    $arrLogxCamb['strDescCamb'] = "Creado";
    $arrLogxCamb['strSistTran'] = "exmobile";
    LogDeCambios($arrLogxCamb);
            
    $strResuPrea = '
    <center>
        <a href="mis_prealertas.php" data-role="button" data-theme="b">
            <i class="fa fa-lg fa-mail-reply pull-left"></i>Transacción Existosa !!!
        </a>
    </center>
    ';
} else {
    $strResuPrea = '
        <center class="mensaje">
            <span>Disculpe, este número de Tracking (<span style="color:crimson">'.$strNumeTrac.'</span>) ya ha sido registrado en el sistema.</span><br><br>
            <a href="mis_prealertas.php" data-role="button" data-theme="b">
                <i class="fa fa-lg fa-mail-reply pull-left"></i>Volver !!!
            </a>
        </center>';
}

?>

<?php include('layout/header.inc.php') ?> 

    <div data-role="page" id="resultado">
        <?php include('layout/page_header.inc.php') ?>

        <div data-role="content">
            <?= $strResuPrea ?>
        </div>

        <?php include('layout/page_footer.inc.php') ?>
    </div>
<?php include('layout/footer.inc.php') ?>
