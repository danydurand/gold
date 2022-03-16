        <?php 
            if (!isset($_SESSION['menu'])) {
                $_SESSION['menu'] = 'h';
            }
            $strLinkMani = '<i class="fa fa-lg fa-list"></i>Manifiestos';
        ?>
        <?php if ($_SESSION['menu'] == 'h') { ?>
            <nav data-role="navbar" name="tool" id="tool">
                <ul>
                    <li>
                        <form action="lista_manifiestos.php" method="post">
                            <input type="submit" value="<i class='fa fa-lg fa-list'></i><br><br>Manifiestos" data-theme="a">
                        </form>
                    </li>
                    <li>
                        <form action="rastreo.php" method="post">
                            <input type="submit" value="<i class='fa fa-lg fa-search'></i><br><br>Rastreo" data-theme="a">
                        </form>
                    </li>
                    <li>
                        <form action="contacto_gold.php" method="post">
                            <input type="submit" value="<i class='fa fa-lg fa-phone'></i><br><br>Gold Coast" data-theme="a">
                        </form>
                    </li>
                </ul>
            </nav>
        <?php } ?>
