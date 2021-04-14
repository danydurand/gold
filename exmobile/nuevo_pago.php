<?php 
require_once('qcubed.inc.php');
require_once('protected.inc.php');
include('layout/header.inc.php');

//--------------------------------------------------------------------
// En la session se encuenta un vector que indica en que color debe 
// representarse cada checkpoint
//--------------------------------------------------------------------
$arrColoCkpt = unserialize($_SESSION['ColoCkpt']);
// print_r($arrColoCkpt);
// echo "<br>\n";
$objCliente    = unserialize($_SESSION['User']);
$objClauWher   = QQ::Clause();
$objClauWher[] = QQ::Equal(QQN::Guia()->ClienteId, $objCliente->Id);
$objClauWher[] = QQ::IsNull(QQN::Guia()->Cancelada);

$strListGuia   = '';
$objClauOrde   = QQ::Clause();
$objClauOrde[] = QQ::OrderBy(QQN::Guia()->Id, false);
$objClauOrde[] = QQ::LimitInfo(25);
$arrGuiaSele   = Guia::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
if ($arrGuiaSele) {
    $strListGuia = '
    <div class="content">
        <p style="color:#666; text-align:center">Presione sobre las guías cuyo pago desea registrar!</p>
    </div>
    <ul class="ui-nodisc-icon white" data-role="listview" data-inset="true">
    ';
    foreach ($arrGuiaSele as $objGuiaSele) {
        $strColoCkpt = 'a';
        $objUltiCkpt = $objGuiaSele->GetUltiCkptPub();
        if ($objUltiCkpt) {
            $intUltiCkpt = $objUltiCkpt->CheckpointId;
            $strUltiCkpt = $objUltiCkpt->Observacion;
            if (array_key_exists($intUltiCkpt, $arrColoCkpt)) {
                $strColoCkpt = $arrColoCkpt[$intUltiCkpt];
            }
        } else {
            $strUltiCkpt = '';
        }
        $strListGuia .= '
            <li data-theme=" " id="'.$objGuiaSele->Id.'" monto="'.$objGuiaSele->Total.'">
                    <h6><b>Guía Nro. </b>'.$objGuiaSele->Id.'</h6>
                    <p><b>Tracking: </b><i>'.$objGuiaSele->Tracking.'</i></p>
                    <p><b>Articulo: </b><i>'.$objGuiaSele->Contenido.'</i></p>
                    <p><b>Fecha: </b><i>'.$objGuiaSele->Fecha.'</i></p>';
        if (strlen($strUltiCkpt) > 0) {
            $strListGuia .= '  
                    <p><b>Status: </b><i>'.$strUltiCkpt.'</i></p>';
        }
        $strListGuia .= '  
                    <p class="ui-li-aside" style="font-size:0.8em"><b>Monto: </b><i>'.$objGuiaSele->Total.' Bs</i></p>
            </li>
        ';
    }
    $strListGuia .= '
                <li id="total"><span class="pull-right">Total a Pagar: 0 Bs</span></li>
            </ul>
            <div id="mensaje" class="mens" style="opacity:0"></div>
            <br>
            <a href="" id="boton" data-role="button" data-theme="b"><i class="fa fa-cogs fa-lg pull-left"></i>Procesar</a>';
} else {
    $strListGuia = '
    <center>
        <a data-rel="back" data-role="button" data-theme="b" data-icon="back" data-iconpos="top">No hay Guias</a>
    </center>
    ';
}
?>
    <style>
        .mens {
            color: crimson;
            font-size: 1em;
            text-align: center;
            min-height: 1.2em;
        }
        .white {
            background-color: rgba(255, 255, 255, 0.56);
        }
        #total {
            background-color: rgba(255, 255, 255, 0);
        }
    </style>
    <script type="text/javascript" async="async">
        $(document).ready(function() {
            $("li").bind("tap", tapHandler);
            $("#total").unbind("tap", tapHandler);
            function tapHandler(event) {
                $(this).toggleClass('sele');
                var $arrNumeGuia = [];
                var $decMontTota = 0;
                $("li.sele").each(function() {
                    $arrNumeGuia.push($(this).attr("id"));
                    $decMontTota += Number($(this).attr("monto"));
                });
                if ($arrNumeGuia.length > 0) {
                    $strLinkBoto = 'pagos.php?ids=' + $arrNumeGuia;
                    $('#boton').attr('href',$strLinkBoto);
                }
                var strTotaPaga =  '<span class="pull-right">Total a Pagar: ' + $decMontTota + ' Bs</span>';
                $("#total").html(strTotaPaga);
                $("#mensaje").fadeTo('fast',0); 
            }
            $("#boton").bind("tap", tapHandler2);
            function tapHandler2(event) {
                var $arrNumeGuia = [];
                $("li.sele").each(function() {
                    $arrNumeGuia.push($(this).attr("id"));
                });
                if ($arrNumeGuia.length == 0) {
                    $('#boton').attr('href','');
                    $("#mensaje").fadeTo('fast',1);
                    $("#mensaje").html('Seleccione la(s) Guia(s) a Pagar'); 
                }
            }
        })
    </script>
    <div data-role="page">

        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <?= $strListGuia; ?>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>
<?php include('layout/footer.inc.php'); ?>

