<?php 
require_once('qcubed.inc.php');

$strTituPagi = 'Buscar';
$blnTodoOkey = true;
$strMensErro = '';
if (isset($_POST['nroguia'])) {
    /* @var $objUsuario Chofer */
    $objUsuario   = unserialize($_SESSION['User']);
    $strNumeGuia  = trim($_POST['nroguia']);
    $strCadeSqlx  = "select guia_id ";
    $strCadeSqlx .= "  from v_guias_del_chofer ";
    $strCadeSqlx .= " where chofer_id = ".$objUsuario->CodiChof;
    $strCadeSqlx .= "   and tracking = '".$strNumeGuia."'";
    $objDatabase  = Guias::GetDatabase();
    $objDbResult  = $objDatabase->Query($strCadeSqlx);
    $mixRegistro  = $objDbResult->FetchArray();
    if (!isset($mixRegistro['guia_id'])) {
        $strMensErro = 'La guia no existe o no le pertenece !!';
        $blnTodoOkey = false;
    }
    $intIdxxGuia = $mixRegistro['guia_id'];
    if ($blnTodoOkey) {
        $objGuiaSele = Guias::Load($intIdxxGuia);
        if (!$objGuiaSele) {
            $blnTodoOkey = false;
            $strMensErro = 'La guia no existe !!';
        } else {
            $_SESSION['GuiaSele'] = serialize($objGuiaSele);
            QApplication::Redirect('detalle_de_guia_rastreo.php');
        }
    }
}
?>

<?php include('layout/header.inc.php'); ?>

    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content" style="min-height: 400px">
            <form action="rastreo.php" method="post">
                <input type="text" name="nroguia" id="nroguia" value="" placeholder='Nro de Guia' autofocus required />
                <p />
                <span class="alert alert-danger">
                    <?= $strMensErro ?>
                </span>
                <div style="margin: 30px 0px 10px;"> 
                    <input type="submit" data-role="button" value="<i class='fa fa-search pull-left'></i>Buscar" data-theme="b" />
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
