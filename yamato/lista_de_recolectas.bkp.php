<?php
/**
 * Created by PhpStorm.
 * User: ianzola
 * Date: 15/09/16
 * Time: 02:47 PM
 */
require_once('qcubed.inc.php');
include('layout/header.inc.php');

$strTituPagi = "Lista de Recolectas";

//---------------------
// Titulo de la Listas
//---------------------
$strTituList = 'Recolectas ';

//------------------
// Se arma el Query
//------------------
$strCadeSqlx = "
      select *
        from v_recolecta_yamato
       limit 5;
    ";
$objDataBase   = Guia::GetDatabase();
$objDbResult   = $objDataBase->Query($strCadeSqlx);

if ($objDbResult->FetchArray()) {
    $strListReco = '
    <p style="text-align:center;color:crimson;">'.$strTituList.'</p>
    <br>
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a>
    </center>
    <br>
    <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" 
        data-filter="true" data-filter-placeholder="Filtrar...">
    ';

    while ($mixRegistro = $objDbResult->FetchArray()) {
        $strListReco .= '
            <li>
                <a href="">
                    <img src="images/list.png" width="40px" height="40px" class="extra">
                    <p style="font-size:14px">Nro. Guía: '.$mixRegistro['nume_guia'].'</p>
                    <p>Remitente: '.$mixRegistro['nomb_remi'].'</p>
                    <p>Dirección: '.$mixRegistro['dire_remi'].'</p>
                    <p>Teléfono: '.$mixRegistro['tele_remi'].'</p>
                </a>
            </li>
        ';
    }

    $strListReco .= '</ul>';
} else {
    $strListReco = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Recolectas</a>
    </center>
    ';
}
?>

<div data-role="page">

    <?php include('layout/page_header.inc.php'); ?>

    <div data-role="content">
        <?= $strListReco; ?>
    </div>

    <?php include('layout/page_footer.inc.php'); ?>

</div>

<?php include('layout/footer.inc.php'); ?>
