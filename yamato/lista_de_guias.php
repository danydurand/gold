<?php 
    require_once('qcubed.inc.php');
    include('layout/header.inc.php');
    $strTituPagi = "Lista de Guías";

    $objClauWher   = QQ::Clause();
    //$objClauWher[] = QQ::GreaterThan(QQN::Guia()->Id,0);
    if (isset($_GET['o'])) {
        $strOpciRepo = $_GET['o'];
        switch ($strOpciRepo) {
            case 'bg':
                //--------------
                // Buscar Guía
                //--------------
                /*if (isset($_POST['tracking'])) {
                    $_SESSION['tracking'] = $_POST['tracking'];
                }*/
                if (isset($_POST['guia'])) {
                    $_SESSION['guia'] = $_POST['guia'];
                }
                if (isset($_POST['codigo'])) {
                    $_SESSION['codigo'] = $_POST['codigo'];
                }
                //$strNumeTrac   = $_SESSION['tracking'];
                $strNumeGuia   = $_SESSION['guia'];
                $strCodiClie   = $_SESSION['codigo'];

                /*if (strlen($strNumeTrac) > 0) {
                    $objClauWher[] = QQ::Like(QQN::Guia()->Tracking,"%".$strNumeTrac."%");
                }*/
                if (strlen($strNumeGuia) > 0) {
                    $objClauWher[] = QQ::Equal(QQN::Guia()->NumeGuia,$strNumeGuia);
                }
                if (strlen($strCodiClie) > 0) {
                    $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie,$strCodiClie);
                }
                break;
            case 'gc':
                //----------------------
                // Guías de un Cliente
                //----------------------
                if (isset($_GET['cid'])) {
                    $_SESSION['cid'] = $_GET['cid'];
                }
                $strClieGuia = $_SESSION['cid'];
                if (strlen($strClieGuia) > 0) {
                    $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie,$strClieGuia);
                }
                break;
            case 'grp':
                //---------------------------------------------------------
                // Guías NR o RP de un Cliente creadas antes, o a las 2 PM
                //---------------------------------------------------------
                if (isset($_GET['cid'])) {
                    $_SESSION['cid'] = $_GET['cid'];
                }
                $strClieGuia = $_SESSION['cid'];
                if (strlen($strClieGuia) > 0) {
                    $objClauWher[] = QQ::Equal(QQN::Guia()->CodiClie,$strClieGuia);
                    $objClauWher[] = QQ::Equal(QQN::Guia()->SistemaId,'con');
                    $objClauWher[] = QQ::LessOrEqual(QQN::Guia()->HoraCreacion,'14:00');
                }

                break;
            default:
                # code...
                break;
        }
    }
    $strListGuia   = '';
    $objClauOrde   = QQ::Clause();
    $objClauOrde[] = QQ::OrderBy(QQN::Guia()->FechGuia, false);
    $objClauOrde[] = QQ::LimitInfo(20);
    $arrGuiaSele   = Guia::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
    if ($arrGuiaSele) {
        $strListGuia = '
        <br>
        <center>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a>
        </center>
        <br>
        <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="info" data-split-theme="d" data-filter="true" data-filter-placeholder="Razón del Aplazo">
        <!--<ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="info-white" data-split-theme="d" data-filter="true" data-filter-placeholder="Razón del Aplazo">-->
        ';
        foreach ($arrGuiaSele as $objGuiaSele) {
            $strListGuia .= '
                <li>
                    <a href="confirmacion_recolecta.php?id='.$objGuiaSele->NumeGuia.'&ac=crp" data-rel="dialog">
                        <img src="images/list.png" class="extra">
                        <h6>Guía #'.$objGuiaSele->NumeGuia.'</h6>
                        <p>'.$objGuiaSele->DescCont.'</p>
                        <p>Piezas : '.$objGuiaSele->CantPiez.'</p>
                    </a>
                    <a href="aplazo_recolecta.php?id='.$objGuiaSele->NumeGuia.'">Razón de Aplazo</a>
                </li>
            ';
//            $strListGuia .= '
//                <li>
//                    <a href="detalle_de_guia.php?id='.$objGuiaSele->NumeGuia.'" data-rel="dialog">
//                        <img src="images/list.png" class="extra">
//                        <h6>Guía '.$objGuiaSele->NumeGuia.'</h6>
//                        <p>Contenido : '.$objGuiaSele->DescCont.'</p>
//                        <p>Cant. Piezas : '.$objGuiaSele->CantPiez.'</p>
//                    </a>
//                </li>
//            ';
        }
        $strListGuia .= '</ul>';
    } else {
        $strListGuia = '
        <center>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>No hay Guías</a>
        </center>
        ';
    }
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
        <div data-role="content">
            <?= $strListGuia; ?>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>