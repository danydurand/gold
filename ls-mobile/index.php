<?php 
require_once('qcubed.inc.php');

$blnTodoOkey = true;
$strMensErro = '';
$objUsuario  = null;
if (isset($_POST['login'])) {
    $strLogiUsua = $_POST['login'];
    if (!in_array($strLogiUsua,['ddurand','mperez'])) {
        $blnTodoOkey = false;
        $strMensErro = 'Usuario NO AUTORIZADO !!';
    }
    if ($blnTodoOkey) {
        $objUsuario  = Usuario::LoadByLogiUsua($strLogiUsua);
        t("el login es $strLogiUsua");
        if (!$objUsuario) {
            $blnTodoOkey = false;
            $strMensErro = 'Usuario Desconocido';
        }
    }
    if ($blnTodoOkey) {
        t("Es un usuario valido");
        if (!isset($_POST['clave'])) {
            $blnTodoOkey = false;
            $strMensErro = 'Usuario Desconocido';
        }
    }
    if ($blnTodoOkey) {
        $strClavAcce = $_POST['clave'];
        if (trim($objUsuario->PassUsua) != trim(md5($strClavAcce))) {
            t("la clave no coincide");
            $strMensErro = 'Clave Invalida';
            $blnTodoOkey = false;
        }
    }
    if ($blnTodoOkey) {
        $_SESSION['User'] = serialize($objUsuario);
        QApplication::Redirect('menu.php');
    }
}  else {
    session_destroy();
    session_start();
}
?>

<?php include('layout/header.inc.php'); ?>

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
