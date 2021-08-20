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
                    <li><a href="rastreo.php" data-theme="a"><i class="fa fa-lg fa-search"></i>
                        <div class="sp"></div>Rastreo</a>
                    </li>
                    <li><a href="contacto_gold.php" data-theme="a"><i class="fa fa-lg fa-phone"></i>
                        <div class="sp"></div>Gold Coast</a>
                    </li>
                </ul>
            </nav>
        <?php } ?>
