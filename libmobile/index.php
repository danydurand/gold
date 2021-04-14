<?php 
require_once('qcubed.inc.php');
//------------------------------------
// Se declaran variables principales
//------------------------------------
$blnTodoOkey = true;
$strMensErro = '';
//-----------------------------------------------
// Se valida si se ha ingresado un LOGIN válido
//-----------------------------------------------
if (isset($_POST['login'])) {
    $strLogiUsua = $_POST['login'];
    $objUsuario = Usuario::LoadByLogiUsua($strLogiUsua);
    //-----------------------------------------------------------------------------
    // Si el login no existe en la base de datos, el Sistema informa que el mismo
    // es desconocido, de lo contrario se procede con la siguiente validación.
    //-----------------------------------------------------------------------------
    if (!$objUsuario) {
        $blnTodoOkey = false;
        $strMensErro = 'Usuario Desconocido';
    } else {
        //----------------------------------------------------
        // Se verifica si se ha ingresado un PASSWORD válido
        //----------------------------------------------------
        if (isset($_POST['clave'])) {
            $strClavAcce = $_POST['clave'];
            //-------------------------------------------------------------------
            // Si el PASSWORD no coincide con el que está registrado en la BdD,
            // el Sistema lo informará, de lo contrario se procede a ingresar.
            //-------------------------------------------------------------------
            if (trim($objUsuario->PassUsua) != trim(md5($strClavAcce))) {
                $strMensErro = 'Clave Invalida';
                $blnTodoOkey = false;
            } else {
                //--------------------------------------------------------------------------
                // En la ficha del Usuario, se guarda la última fecha de Acceso al Sistema
                //--------------------------------------------------------------------------
                $objUsuario->FechAcce = new QDateTime(QDateTime::Now);
                $objUsuario->Save();
                //---------------------------------------------
                // Se guarda en variables de Sesión los datos
                // que vayan a usarse a lo largo del Sistema.
                //---------------------------------------------
                $_SESSION['User'] = serialize($objUsuario);
                //------------------------------------------------
                // El Sistema hace redirección al Menú Principal
                //------------------------------------------------
                QApplication::Redirect('menu.php');
            }
        }
    }
} else {
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
                    <input type="submit" data-role="button" value="<i class='fa fa-sign-in fa-lg pull-left' style='padding-top:.15em;'></i>Entrar" data-theme="b" />
                </div>
            </form>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>