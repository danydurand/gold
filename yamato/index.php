<?php
require_once('qcubed.inc.php');

//-----------------------------------
// Se declaran variables principales
//-----------------------------------
$blnTodoOkey = true;
$strMensErro = '';

//------------------------------------------------------------------
// Se valida si se ha posteado en el formulario el login del chofer
//------------------------------------------------------------------
if (isset($_POST['login'])) {
    $strLogiUsua = $_POST['login'];
    $objChofer = Chofer::LoadByLogin($strLogiUsua);
    //---------------------------------------------------------------------------------------------------------------
    // Si el login no existe en la base de datos, el Sistema informa que el mismo es desconocido, de lo contrario se
    // procede con la siguiente validación.
    //---------------------------------------------------------------------------------------------------------------
    if (!$objChofer) {
        $blnTodoOkey = false;
        $strMensErro = 'Usuario Desconocido';
    } else {
        //--------------------------------------------------------------
        // Se verifica si se ha posteado la clave o password del chofer
        //--------------------------------------------------------------
        if (isset($_POST['clave'])) {
            $strClavAcce = $_POST['clave'];
            //----------------------------------------------------------------------------------------------------------
            // Si la clave o password del chofer no coincide con el que está registrado en la base de datos, el Sistema
            // informa que la misma es inválida, de lo contrario se procede con los pasos siguientes para ingresar al
            // programa principal.
            //----------------------------------------------------------------------------------------------------------
            if (trim($objChofer->Password) != trim(md5($strClavAcce))) {
                $strMensErro = 'Clave Invalida';
                $blnTodoOkey = false;
            } else {
                //-------------------------------------------------------------------------
                // En la ficha o data del chofer, se guarda la fecha de acceso al Sistema.
                //-------------------------------------------------------------------------
                $objChofer->AccesoMobile = new QDateTime(QDateTime::Now);
                $objChofer->Save();
                //----------------------------------------------------------------------------------------------
                // Se guarda en variable de Sesión las fichas o datas que vayan a usarse a lo largo del sistema
                //----------------------------------------------------------------------------------------------
                $objUsuaGene = Usuario::LoadByLogiUsua('gchofer');
                $objCkptOkey = SdeCheckpoint::Load('OK');
                $_SESSION['User'] = serialize($objChofer);
                $_SESSION['UsuaGene'] = serialize($objUsuaGene);
                $_SESSION['CkptOkey'] = serialize($objCkptOkey);
                //----------------------------------------------------------------
                // El Sistema Redirecciona hace redirección al Programa Principal
                //----------------------------------------------------------------
                QApplication::Redirect('seleccionar_ruta.php');
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