<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php'); 
?>
    <div data-role="page" id="calculadora">

        <?php include('layout/header_simple.inc.php'); ?>

        <div data-role="content">
            <?php
                $intCodiClie = $_GET['Id'];
                $objCliente  = Cliente::Load($intCodiClie);
                echo '
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 40px;">Nombre:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 40px;">'.$objCliente->Nombre.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">Cedula/RIF:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">'.$objCliente->CedulaRif.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">Telefono Movil:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">'.$objCliente->TelefonoMovil.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">Telefono Fijo:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">'.$objCliente->TelefonoFijo.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">Fecha Nac.:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 20px;">'.$objCliente->FechaNacimiento.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 30px;">Estado:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 30px;">'.$objCliente->Estado->Nombre.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 40px;">Ciudad:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 40px;">'.$objCliente->Ciudad->Nombre.'</div>
                    </div>
                </div>
                <div class="ui-grid-a">
                    <div class="ui-block-a">
                        <div class="ui-bar ui-bar-b" style="height: 120px;">Dirección:</div>
                    </div>
                    <div class="ui-block-b">
                        <div class="ui-bar ui-bar-b" style="height: 120px;">'.$objCliente->Direccion.'</div>
                    </div>
                </div>
                <center>
                    <!--<a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>Regresar</a>-->
                </center>
                ';

            ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
