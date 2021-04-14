<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

if (isset($_SESSION['User'])) {
    $objUsuaMobi = unserialize($_SESSION['User']);
    $strLogiUsua = $objUsuaMobi->Nombre.'(VE#'.$objUsuaMobi->Id.')';
    //$strLogiUsua = $objUsuaMobi->__nombreYCodigo();
    $strAcceMobi = $objUsuaMobi->FechaAccesoMobile;
    $strUsuaMail = $objUsuaMobi->Email;
    $strUsuaSucu = $objUsuaMobi->Sucursal->Nombre;
    $strUsuaMovi = $objUsuaMobi->TelefonoMovil;
    $strUsuaFijo = $objUsuaMobi->TelefonoFijo;
    $strUsuaFnac = $objUsuaMobi->FechaNacimiento;
    $strUsuaSexo = $objUsuaMobi->Sexo == 'M' ? 'Masculino' : 'Femenino';
    $strUsuaDire = $objUsuaMobi->Direccion;
} else {
    QApplication::Redirect('index.php');
}

?>

    <div data-role="page" id="configuración">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <table width="100%">
                <tbody>
                <tr>
                    <th colspan="2">
                        <h3 style="color:#4682B4">Datos del Usuario &nbsp;<i class="fa fa-user fa-lg"></i></h3>
                        <hr>
                    </th>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Nombre:</b></td>
                    <td class="valor" ><?= $strLogiUsua ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Ultimo Acceso:</b></td>
                    <td class="valor" ><?= $strAcceMobi ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Sucursal: </b></td>
                    <td class="valor" ><?= $strUsuaSucu ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Correo: </b></td>
                    <td class="valor" ><?= $strUsuaMail ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Teléfono Móvil: </b></td>
                    <td class="valor" ><?= $strUsuaMovi ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Teléfono Fijo: </b></td>
                    <td class="valor" ><?= $strUsuaFijo ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>F.Nacimiento:</b></td>
                    <td class="valor" ><?= $strUsuaFnac ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4"><b>Sexo: </b></td>
                    <td class="valor" ><?= $strUsuaSexo ?></td>
                </tr>
                <tr>
                    <td class="etiqueta" style="color:#4682B4;vertical-align:top;"><b>Dirección:</b></td>
                    <td class="valor" ><?= $strUsuaDire ?></td>
                </tr>
                </tbody>
            </table>
        </div>

        <style>
            .etiqueta {
                font-weight: bold;
                padding: 3px;
                text-align: right;
                width: 45%;
            }
            .valor {
                padding: 2px;
                text-align: left;
            }
        </style>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>
