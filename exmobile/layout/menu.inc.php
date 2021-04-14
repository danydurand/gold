        <?php 
            if (!isset($_SESSION['menu'])) {
                $_SESSION['menu'] = 'h';
            }
        ?>
        <?php if ($_SESSION['menu'] == 'h') { ?>
            <nav data-role="navbar" name="tool" id="tool">
                <ul>
                    <li><a href="calculadora.php" data-theme="a"><i class="fa fa-lg fa-calculator"></i>
                        <div class="sp"></div>Tarifa</a>
                    </li>
                    <li><a href="mis_prealertas.php" data-theme="a"><i class="fa fa-lg fa-bell"></i>
                        <div class="sp"></div>P. Alerta</a>
                    </li>
                    <li><a href="mis_guias.php" data-theme="a"><i class="fa fa-lg fa-file-text-o"></i>
                        <div class="sp"></div>Guias</a>
                    </li>
                    <li><a href="mis_pagos.php" data-theme="a"><i class="fa fa-lg fa-credit-card"></i>
                        <div class="sp"></div>Pagos</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
        <?php if ($_SESSION['menu'] == 'o') { ?>
            <nav data-role="navbar" name="otro" id="otro">
                <ul>
                    <li><a href="nuevo_pago.php" data-theme="b"><i class="fa fa-lg fa-map-signs"></i>
                        <div class="sp"></div>Nuevo Pago</a>
                    </li>
                    <li><a href="en_construccion.php" data-theme="b"><i class="fa fa-lg fa-tv"></i>
                        <div class="sp"></div>Medios</a>
                    </li>
                    <li><a href="lista_de_gastos.php" data-theme="b"><i class="fa fa-lg fa-money"></i>
                        <div class="sp"></div>Gastos</a>
                    </li>
                    <li><a href="buscar_extravio.php" data-theme="b"><i class="fa fa-lg fa-question"></i>
                        <div class="sp"></div>Extravío</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
