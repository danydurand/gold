<?php
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Aplazo de Recolecta";
$strResuCalc = '';
if (isset($_POST['moti'])) {
    //-----------------------------------
    // Se obtiene el motivo seleccionado
    //-----------------------------------
    $strMotiNoco = $_POST['moti'];
    //----------------------
    // Se obtiene el chofer
    //----------------------
    //$objChofer = unserialize($_SESSION['User']);
    //---------------------------------------
    // Se obtiene la recolecta a no realizar
    //---------------------------------------
    $objRecoSele = unserialize($_SESSION['objRecoSele']);
    //--------------------------------------------------------------------------------------------------------
    // En la ficha o data de la recolecta se actualiza como no realizada, agregando el motivo. Se guarda y se
    // confirma al chofer el resultado de la operación.
    //--------------------------------------------------------------------------------------------------------
    $objRecoSele->CodiCkpt = 'RN';
    $objRecoSele->FechModi = new QDateTime(QDateTime::Now);
    //$objRecoSele->UsuaModi = $objUsuaMobi->CodiChof;
    $objRecoSele->MotiNoco = $strMotiNoco;
    $objRecoSele->NotiNoco = true;
    $objRecoSele->save();
    //-----------------------------------------
    // Se muestra el resultado de la operación
    //-----------------------------------------
    $strResuCalc = '
                    <p style="text-align:center;color:crimson;">Operación exitosa</p><br>
                    <center>
                        <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply pull-left"></i>Regresar</a>
                    </center>';
}
?>
    <div data-role="page" id="resultado_aplazo_recolecta">
        <?php include('layout/page_header.inc.php') ?>
        <div data-role="content" >
            <?= $strResuCalc ?>
        </div>
        <style>
            .etiqueta {
                font-weight: bold;
                padding: 3px;
                text-align: right;
            }
            .valor {
                text-align: right;
                padding: 3px;
            }
            #uno, #dos, #tres {
                display: inline-block;
            }
            #dos, #tres {
                margin-left: 2em;
            }
        </style>
        <?php include('layout/page_footer.inc.php') ?>;
    </div>
<?php include('layout/footer.inc.php') ?>