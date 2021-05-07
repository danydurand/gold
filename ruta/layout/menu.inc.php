        <?php 
            if (!isset($_SESSION['menu'])) {
                $_SESSION['menu'] = 'h';
            }
        ?>
        <?php if ($_SESSION['menu'] == 'h') { ?>
            <nav data-role="navbar" name="tool" id="tool">
                <ul>
                    <li><a href="lista_manifiestos.php" data-theme="a"><i class="fa fa-lg fa-list"></i>
                        <div class="sp"></div>Manifiestos</a>
                    </li>
                    <li><a href="buscar_guias.php" data-theme="a"><i class="fa fa-lg fa-binoculars"></i>
                        <div class="sp"></div>Rastreo</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
