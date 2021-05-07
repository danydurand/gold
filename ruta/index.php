<?php 
require_once('qcubed.inc.php');

$blnTodoOkey = true;
$strMensErro = '';
if (isset($_POST['login'])) {
    $strLogiUsua = $_POST['login'];
    $objChofer = Chofer::LoadByLogin($strLogiUsua);
    //t("el login es $strLogiUsua");
    if (!$objChofer) {
        $blnTodoOkey = false;
        $strMensErro = 'Chofer Desconocido';
    } else {
        //t("Es un usuario valido");
        if (isset($_POST['clave'])) {
            $strClavAcce = $_POST['clave'];
            //t("Ya ubique al Chofer");
            if (trim($objChofer->Password) != trim(md5($strClavAcce))) {
                //t("la clave no coincide");
                $strMensErro = 'Clave Invalida';
                $blnTodoOkey = false;
            } else {
                $_SESSION['User'] = serialize($objChofer);
                $objChofer->AccesoMobile = new QDateTime(QDateTime::Now);
                $objChofer->Save();
                QApplication::Redirect('menu.php');
            }
        }
    }
}  else {
    session_destroy();
    session_start();
}
include('layout/header.inc.php');
?>

    <div data-role="page"> 
    
        <?php include('layout/header_simple.inc.php'); ?>

        <div data-role="content">  
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
