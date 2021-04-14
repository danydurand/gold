<?php 
require_once('qcubed.inc.php');

$blnTodoOkey = true;
$strMensErro = '';
if (isset($_POST['email'])) {
    $strEmailClie = $_POST['email'];
    $objCliente = Cliente::LoadByEmail($strEmailClie);
    // Traza("el email es $strEmailClie");
    if (!$objCliente) {
        $blnTodoOkey = false;
        $strMensErro = 'Cliente Desconocido';
    } else {
        // Traza("Es un Cliente valido");
        if (isset($_POST['clave'])) {
            $strClavAcce = $_POST['clave'];
            // Traza("Ya ubique al Socio");
            if (trim($objCliente->ClaveAcceso) != trim($strClavAcce)) {
                // Traza("la clave no coincide");
                $strMensErro = 'Clave Invalida';
                $blnTodoOkey = false;
            } else {
                $_SESSION['User'] = serialize($objCliente);
                $objCliente->FechaAccesoMobile = new QDateTime(QDateTime::Now);
                $objCliente->HoraAccesoMobile = new QDateTime(QDateTime::Now);
                $objCliente->Save();
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
                <input type="text" name="email" id="email" value="" placeholder='Email' autofocus required />
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
