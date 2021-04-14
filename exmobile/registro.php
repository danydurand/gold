<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

$strListEsta  = '<select name="esta" id="esta">';
$strListEsta .= '<option value="-1" selected>- Seleccione Uno -</option>';
$arrEstaDispo = Estado::LoadAll();
foreach ($arrEstaDispo as $objEstado) {
    $strListEsta .= '<option value="'.$objEstado->Id.'">'.$objEstado->Nombre.'</option>';
}
$strListEsta .= '</select>';

$strListCiud  = '<select name="ciud" id="ciud">';
$strListCiud .= '<option value="-1" selected>- Seleccione Una -</option>';
$arrCiudDisp = Ciudad::LoadAll();
foreach ($arrCiudDisp as $objCiudad) {
    $strListCiud .= '<option value="'.$objCiudad->Id.'">'.$objCiudad->Nombre.'</option>';
}
$strListCiud .= '</select>';

$strListSucu  = '<select name="sucu" id="sucu">';
$strListSucu .= '<option value="-1" selected>- Seleccione Una -</option>';
$arrSucuDisp = Sucursal::LoadAll();
foreach ($arrSucuDisp as $objSucursal) {
    $strListSucu .= '<option value="'.$objSucursal->Id.'">'.$objSucursal->Nombre.'</option>';
}
$strListSucu .= '</select>';

?>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="registrar_cliente.php" method="post">
                <div class="ui-field-contain">
                    <label for="nomb">Nombre:</label>
                    <input type="text" name="nomb" id="nomb" placeholder="Nombre del Cliente" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="cedu">Cédula/RIF</label>
                    <input type="text" name="cedu" id="cedu" placeholder="Cedula/RIF" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="mail">E-mail</label>
                    <input type="email" name="mail" id="mail" placeholder="Correo Electrónico" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="fnac">Fecha de Nacimiento:</label>
                    <input type="date" name="fnac" id="fnac" placeholder="Fecha de Nacimiento" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="sexo">Sexo:</label>
                    <fieldset data-role="controlgroup">
                        <label for="feme">Femenino</label>
                        <input type="radio" name="sexo" id="feme" value="F">
                        <label for="masc">Masculino</label>
                        <input type="radio" name="sexo" id="masc" value="M">
                    </fieldset>                
                </div>
                <div class="ui-field-contain">
                    <label for="movi">Teléfono Movil:</label>
                    <input type="number" name="movi" id="movi" placeholder="Teléfono Movil" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="fijo">Teléfono Fijo:</label>
                    <input type="number" name="fijo" id="fijo" placeholder="Teléfono Movil" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="esta">Estado:</label><br>
                    <?= $strListEsta ?>
                </div>                
                <div class="ui-field-contain">
                    <label for="ciud">Ciudad:</label><br>
                    <?= $strListCiud ?>
                </div>                
                <div class="ui-field-contain">
                    <label for="sucu">Sucursal:</label><br>
                    <?= $strListSucu ?>
                </div>                
                <div class="ui-field-contain">
                    <label for="dire">Dirección:</label>
                    <textarea name="dire" id="dire" placeholder="Dirección"></textarea>
                </div>                
                <div class="ui-field-contain">
                    <input type="submit" value="Guardar" data-theme="b" data-icon="check" data-iconpos="top">
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
