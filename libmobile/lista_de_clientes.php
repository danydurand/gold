<?php 
    require_once('qcubed.inc.php');
    include('layout/header.inc.php');
    $strTituPagi = "Lista de Clientes";

    if (isset($_GET['o'])) {
        $strOpciRepo = $_GET['o'];
        if ($strOpciRepo == 'ud') {
            if (isset($_GET['cant_dias'])) {
                $intCantDias = $_GET['cant_dias'];
            } else {
                $intCantDias = 7;
            }
        }
        $objClauWher   = QQ::Clause();
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Cliente()->Nombre);
        $objClauOrde[] = QQ::LimitInfo(25);
        switch ($strOpciRepo) {
            case 'ud':
                //-------------------------------------------
                // Clientes Registrados en los Últimos Días
                //-------------------------------------------
                $arrClieRegi = Cliente::RegistradosLosUltimosDias($intCantDias);
                break;
            case 'rc':
                //-------------------------------------
                // Clientes Registrados sin Confirmar
                //-------------------------------------
                $arrClieRegi = Cliente::RegistradosSinConfirmar();
                break;
            case 'sc':
                //----------------------------------
                // Clientes Confirmados sin Código
                //----------------------------------
                $arrClieRegi = Cliente::ConfirmadosSinCodigoRoxanne();
                break;
            case 'bc':
                //-----------------
                // Buscar Cliente
                //-----------------
                if (isset($_POST['codigo']) || isset($_POST['nombre'])) {
                    $_SESSION['codigo'] = $_POST['codigo'];
                    $_SESSION['nombre'] = $_POST['nombre'];
                }
                $intCodiClie = $_SESSION['codigo'];
                $strNombClie = $_SESSION['nombre'];
                if (strlen($intCodiClie) > 0) {
                    $objClauWher[] = QQ::Equal(QQN::Cliente()->Id,$intCodiClie);
                } else {
                    if (strlen($strNombClie) > 0) {
                        $strNombClie   = '%'.strtoupper($strNombClie).'%';
                        $objClauWher[] = QQ::Like(QQN::Cliente()->Nombre,$strNombClie);
                    }
                }
                $arrClieRegi   = Cliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                break;
            case 'cv':
                //------------------------
                // Clientes por Vendedor
                //------------------------
                if (isset($_GET['codi_vend'])) {
                    $_SESSION['codi_vend'] = $_GET['codi_vend'];
                }
                $intCodiVend = $_SESSION['codi_vend'];
                $objClauWher[] = QQ::Equal(QQN::Cliente()->VendedorId,$intCodiVend);
                $arrClieRegi   = Cliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                break;
            case 'cx':
                //--------------------
                // Clientes por Sexo
                //--------------------
                if (isset($_GET['codi_sexo'])) {
                    $_SESSION['codi_sexo'] = $_GET['codi_sexo'];
                }
                $strCodiSexo = $_SESSION['codi_sexo'];
                $objClauWher[] = QQ::Equal(QQN::Cliente()->Sexo,$strCodiSexo);
                $arrClieRegi   = Cliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                break;
            case 'cs':
                //------------------------
                // Clientes por Sucursal
                //------------------------
                if (isset($_GET['codi_sucu'])) {
                    $_SESSION['codi_sucu'] = $_GET['codi_sucu'];
                }
                $intCodiSucu = $_SESSION['codi_sucu'];
                $objClauWher[] = QQ::Equal(QQN::Cliente()->SucursalId,$intCodiSucu);
                $arrClieRegi   = Cliente::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
                break;
            default:
                # code...
                break;
        }
    }

    $strListClie   = '';
    if ($arrClieRegi) {
        $strListClie = '
            <br>
            <center>
                <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-lg fa-mail-reply pull-left"></i>Volver</a>
            </center>
            <br>
            <ul class="ui-nodisc-icon" data-role="listview" data-inset="true" data-split-icon="bullets" data-split-theme="d" data-filter="true" data-filter-placeholder="Filtrar...">
        ';
        foreach ($arrClieRegi as $objCliente) {
            $strNombImag = $objCliente->__sexoToIcon();
            //if ($objCliente->Sexo == 'M') {
            //    $strNombImag = __APP_IMAGE_ASSETS__.'/user1.png';
            //} else {
            //    $strNombImag = __APP_IMAGE_ASSETS__.'/user_female.png';
            //}
            $strListClie .= '
                <li>
                    <a href="detalle_del_cliente.php?id='.$objCliente->Id.'" data-rel="dialog">
                        <img src="'.$strNombImag.'" width="40px" height="40px" class="user">
                        <p style="font-size:16px">'.ucwords(strtolower($objCliente->Nombre)).'</p>
            ';
            if (strlen($objCliente->Codigo) > 0) {
                $strListClie .= '
                        <p>Código : '.$objCliente->Codigo.'</p>
                ';
            } else {
                $strListClie .= '
                        <p>Código : Sin Asignar</p>
                ';
            }
            $strListClie .= '
                        <p><i class="fa fa-envelope-o"></i> : '.$objCliente->Email.'</p>
            ';
            if (strlen($objCliente->TelefonoMovil) > 0) {
                $strListClie .= '
                        <p><i class="fa fa-2x fa-mobile"></i> : '.$objCliente->TelefonoMovil.'</p>
                ';
            } elseif (strlen($objCliente->TelefonoFijo) > 0) {
                $strListClie .= '
                        <p><i class="fa fa-phone fa-lg"></i> : '.$objCliente->TelefonoFijo.'</p>
                ';
            } else {
                $strListClie .= '
                        <p>No Posee Telefono</p>
                ';
            }
            $strListClie .= '
                    </a>
                    <a href="lista_de_guias.php?o=gc&cid='.$objCliente->Id.'">Guías</a>
                </li>
            ';
        }
        $strListClie .= '</ul>';
    } else {
        $strListClie = '
        <center>
            <a data-rel="back" data-role="button" data-theme="b"><i class="fa fa-mail-reply fa-lg pull-left"></i>No hay Clientes</a>
        </center>
        ';
    }
?>
    <div data-role="page">
        <?php include('layout/page_header.inc.php'); ?>
        <div data-role="content">
            <?= $strListClie; ?>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
<?php include('layout/footer.inc.php'); ?>