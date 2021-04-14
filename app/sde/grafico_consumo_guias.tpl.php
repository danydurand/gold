<?php
$strPageTitle = 'Consumo de Guias';
require(__APP_INCLUDES__ . '/header.inc.php');
?>
<div class="titulo-formulario">
    <div class="col-xs-4 col-md-5" style="text-align: left; margin-left: -0.8em; margin-top: -0.30em">
        <?php $this->lblTituForm->Render(); ?>
    </div>
    <div class="hidden-xs hidden-sm col-md-7" style="text-align: left; margin-top: -0.25em;">
        <?php $this->btnCancel->Render(); ?>
        <?php //$this->btnSave->Render(); ?>
    </div>
</div>
<div class="form-controls">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="min-height: 1.3em; text-align: left; margin-top: 0.8em; margin-left: -1em;">
                <?php $this->lblMensUsua->Render(); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-top: 1em;">
                <?php
                $arrData = array(
                    "chart" => array(
                        "caption"   => "Cant Guías (Exp Nac)",
                        "xAxisName" => "Meses",
                        "yAxisName" => "Cantidad de Guías",
                        "theme"     => "fusion"
                    )
                );
                $arrData['categories'][] = array(
                    'category' => [
                        ['label' => 'Ene'],
                        ['label' => 'Feb'],
                        ['label' => 'Mar'],
                        ['label' => 'Abr'],
                        ['label' => 'May'],
                        ['label' => 'Jun'],
                        ['label' => 'Jul'],
                        ['label' => 'Ago'],
                        ['label' => 'Sep'],
                        ['label' => 'Oct'],
                        ['label' => 'Nov'],
                        ['label' => 'Dic']
                    ]
                );
                $arrData['dataset'] = $this->arrDataExpr;

                // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
                $jsonEncodedData = json_encode($arrData);
                //echo $jsonEncodedData;

                // chart object
                $Chart = new FusionCharts("msline", "ChartExpr" , "550", "370", "chart-expr", "json", $jsonEncodedData);

                // Render the chart
                $Chart->render();
                ?>
                <center>
                    <div id="chart-expr">Chart will render here!</div>
                </center>

            </div>
            <div class="col-md-6" style="margin-top: 1em">
                <?php
                $arrData = array(
                    "chart" => array(
                        "caption"   => "Cant Guías (Corporativo)",
                        "xAxisName" => "Meses",
                        "yAxisName" => "Cantidad de Guías",
                        "theme"     => "fusion"
                    )
                );
                $arrData['categories'][] = array(
                    'category' => [
                        ['label' => 'Ene'],
                        ['label' => 'Feb'],
                        ['label' => 'Mar'],
                        ['label' => 'Abr'],
                        ['label' => 'May'],
                        ['label' => 'Jun'],
                        ['label' => 'Jul'],
                        ['label' => 'Ago'],
                        ['label' => 'Sep'],
                        ['label' => 'Oct'],
                        ['label' => 'Nov'],
                        ['label' => 'Dic']
                    ]
                );
                $arrData['dataset'] = $this->arrDataCorp;

                // JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
                $jsonEncodedData = json_encode($arrData);
                //echo $jsonEncodedData;

                // chart object
                $Chart = new FusionCharts("msline", "ChartCorp" , "550", "370", "chart-corp", "json", $jsonEncodedData);

                // Render the chart
                $Chart->render();
                ?>
                <center>
                    <div id="chart-corp">Chart will render here!</div>
                </center>
            </div>
        </div>
    </div>
</div>
<?php require(__APP_INCLUDES__ .'/footer.inc.php'); ?>
