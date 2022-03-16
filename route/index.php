<?php 
require_once('qcubed.inc.php');

$blnTodoOkey = true;
$strMensErro = '';
tc('====================');
tc('Acceso a Ruta Mobile');
if (isset($_POST['login'])) {
    $strLogiUsua = strtolower(trim($_POST['login']));
    $objChofer = Chofer::LoadByLogin($strLogiUsua);
    tc("El login del Chofer que se esta conectando es: $strLogiUsua");
    if (!$objChofer) {
        $blnTodoOkey = false;
        $strMensErro = 'Chofer Desconocido';
        tc('Chofer desconocido: '.$strLogiUsua);
    } else {
        tc("$strLogiUsua, es un Chofer valido");
        if (isset($_POST['clave'])) {
            $strClavAcce = $_POST['clave'];
            if (trim($objChofer->Password) != trim(md5($strClavAcce))) {
                tc("La clave no coincide");
                $strMensErro = 'Clave Invalida';
                $blnTodoOkey = false;
            } else {
                $_SESSION['User'] = serialize($objChofer);
                $objChofer->AccesoMobile = new QDateTime(QDateTime::Now);
                $objChofer->Save();
                tc('Vamos a desplegar el menu principal');
                QApplication::Redirect('menu.php');
            }
        }
    }
}  else {
    session_destroy();
    session_start();
}
?>

<?php include('layout/header.inc.php'); ?>

    <div data-role="page">
    
        <?php include('layout/header_simple.inc.php'); ?>

        <div data-role="content" style="min-height: 400px">
            <form action="index.php" method="post">
                <input type="text" name="login" id="login" value="" placeholder='Usuario' autofocus required />
                <p />
                <input type="password" name="clave" id="clave" value="" placeholder="Clave" required />
                <p />
                <span class="alert alert-danger">
                    <?= $strMensErro ?>
                </span>
                <div style="margin: 30px 0px 10px;"> 
                    <input type="submit" data-role="button" value="<i class='fa fa-sign-in pull-left'></i>Entrar" data-theme="b" />
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
