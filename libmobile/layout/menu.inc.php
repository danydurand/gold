        <?php 
            if (!isset($_SESSION['menu'])) {
                $_SESSION['menu'] = 'h';
            }
        ?>
        <?php if ($_SESSION['menu'] == 'h') { ?>
            <nav data-role="navbar" name="tool" id="tool">
                <ul>
                    <li><a href="calculadora.php" data-theme="a"><i class="fa fa-lg fa-calculator"></i>
                        <div class="sp"></div>Calcular</a>
                    </li>
                    <li><a href="pre_registro.php" data-theme="a"><i class="fa fa-lg fa-user-plus"></i>
                        <div class="sp"></div>Registro</a>
                    </li>
                    <li><a href="buscar_guias.php" data-theme="a"><i class="fa fa-lg fa-binoculars"></i>
                        <div class="sp"></div>Rastreo</a>
                    </li>
                    <li><a href="buscar_cliente.php" data-theme="a"><i class="fa fa-lg fa-search"></i>
                        <div class="sp"></div>Clientes</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <?php if ($_SESSION['menu'] == 'a') { ?>
            <nav data-role="navbar" name="apix" id="apix">
                <ul>
                    <li><a href="indi_clientes.php" data-theme="d"><i class="fa fa-lg fa-users"></i>
                        <div class="sp"></div>Clientes</a>
                    </li>
                    <li><a href="indi_operativos.php" data-theme="d"><i class="fa fa-lg fa-flag-o"></i>
                        <div class="sp"></div>Estatus</a>
                    </li>
                    <li><a href="indi_cobranza.php" data-theme="d" data-ajax="false"><i class="fa fa-lg fa-eye"></i>
                        <div class="sp"></div>Errores</a>
                    </li>
                    <!-- <li><a href="en_construccion.php" data-theme="d"><i class="fa fa-lg fa-line-chart"></i>
                        <div class="sp"></div>Gráficos</a> -->
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <?php if ($_SESSION['menu'] == 'o') { ?>
            <nav data-role="navbar" name="otro" id="otro">
                <ul>
                    <li><a href="en_construccion.php" data-theme="d"><i class="fa fa-lg fa-ticket"></i>
                        <div class="sp"></div>Cupones</a>
                    </li>
                    <li><a href="en_construccion.php" data-theme="d"><i class="fa fa-lg fa-tv"></i>
                        <div class="sp"></div>Medios</a>
                    </li>
                    <li><a href="lista_de_gastos.php" data-theme="d"><i class="fa fa-lg fa-money"></i>
                        <div class="sp"></div>Gastos</a>
                    </li>
                    <li><a href="buscar_extravio.php" data-theme="d"><i class="fa fa-lg fa-question"></i>
                        <div class="sp"></div>Extravío</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
