        <?php 
            if (!isset($_SESSION['menu'])) {
                $_SESSION['menu'] = 'h';
            }
        ?>
        <?php if ($_SESSION['menu'] == 'h') { ?>
            <nav data-role="navbar" name="tool" id="tool">
                <ul>
                    <li><a href="prelista_recolectas.php" data-theme="a"><i class="fa fa-lg fa-cubes"></i>
                        <div class="sp"></div>Recolectas</a>
                    </li>
                    <li><a href="prelista_entregas.php" data-theme="a"><i class="fa fa-lg fa-truck fa-flip-horizontal"></i>
                        <div class="sp"></div>Entregas</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <?php if ($_SESSION['menu'] == 'i') { ?>
            <nav data-role="navbar" name="indi" id="indi">
                <ul>
                    <li><a href="indi_clientes.php" data-theme="b"><i class="fa fa-lg fa-users"></i>
                        <div class="sp"></div>Clientes</a>
                    </li>
                    <li><a href="indi_operativos.php" data-theme="b"><i class="fa fa-lg fa-black-tie"></i>
                        <div class="sp"></div>Oper.</a>
                    </li>
                    <li><a href="indi_cobranza.php" data-theme="b" data-ajax="false"><i class="fa fa-lg fa-bar-chart"></i>
                        <div class="sp"></div>Cobranza</a>
                    </li>
                    <li><a href="en_construccion.php" data-theme="b"><i class="fa fa-lg fa-line-chart"></i>
                        <div class="sp"></div>Gráficos</a>
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
