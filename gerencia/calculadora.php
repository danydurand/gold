<?php 
require_once('qcubed.inc.php');
include('layout/header.inc.php');
$strTituPagi = "Calculadora";
?>

    <div data-role="page" id="calculadora">
        <?php include('layout/page_header.inc.php'); ?>

        <div data-role="content">
            <form action="resultado.php" method="post">
                <div class="ui-field-contain">
                    <label for="fobx">Valor de la Mercancía:</label>
                    <input type="number" name="fobx" id="fobx" placeholder="(en USD)" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="peso">Peso en Libras:</label>
                    <input type="number" name="peso" id="peso" placeholder="(en Libras)" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="alto">Alto:</label>
                    <input type="number" name="alto" id="alto" value="" placeholder="(en Pulgadas)" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="anch">Ancho:</label>
                    <input type="number" name="anch" id="anch" value="" placeholder="(en Pulgadas)" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="larg">Largo:</label>
                    <input type="number" name="larg" id="larg" value="" placeholder="(en Pulgadas)" required>
                </div>                
                <div class="ui-field-contain">
                    <label for="aran">% Arancel:</label>
                    <input type="number" name="aran" id="aran" placeholder="(por defecto 20%, solo p/mayores a USD 100)">
                </div>                
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-calculator pull-left'></i>Calcular" data-theme="b">
                </div>
            </form>
        </div>

        <?php include('layout/page_footer.inc.php'); ?>

    </div>

<?php include('layout/footer.inc.php'); ?>
