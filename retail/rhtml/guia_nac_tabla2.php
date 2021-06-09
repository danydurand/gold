<table style="border: solid .5mm;">
    <tr>
        <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
            DATOS DEL ENVIO
        </td>
    </tr>
    <tr style="vertical-align: middle;">
        <td class="etiqueta" style="width: 70px;">Nro Guía:</td>
        <td class="destacado" style="text-align: right"><?= $strNumeGuia ?>-001</td>
    </tr>
    <tr style="vertical-align: middle;">
        <td class="etiqueta" style="width: 70px;">Fecha:</td>
        <td><?= $strFechGuia ?></td>
        <td class="etiqueta" style="width: 70px; text-align: right">F. Pago:</td>
        <td><?= $strFormPago ?></td>
    </tr>
    <tr style="vertical-align: middle;">
        <td class="etiqueta" style="width: 70px;">Serv. Entr:</td>
        <td><?= $strServEntr ?></td>
        <td class="etiqueta" style="width: 70px; text-align: right">Producto:</td>
        <td><?= $strCodiProd ?></td>
    </tr>
    <tr style="vertical-align: middle;">
        <td class="etiqueta" style="width: 70px;">Peso:</td>
        <td><?= $strKiloGuia ?> kgs</td>
        <td class="etiqueta" style="width: 70px; text-align: right">Piezas:</td>
        <td><?= $intCantPiez ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: 70px;">Contenido:</td>
        <td colspan="3"><?= $strDescCont ?></td>
    </tr>
    <tr>
        <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
            IMPORTES
        </td>
    </tr>
    <?php foreach ($arrImpoGuia as $objImpoGuia) { ?>
        <tr>
            <td class="etiqueta" style="width: 180px;" colspan="2"><?= $objImpoGuia->MostrarComo ?></td>
            <td style="text-align: right;" colspan="2"><?= $objImpoGuia->Monto ?></td>
        </tr>
    <?php } ?>
    <tr>
        <td class="etiqueta" style="width: 180px;" colspan="2">TOTAL</td>
        <td style="text-align: right;" colspan="2"><?= $strTotaGuia ?></td>
    </tr>
</table>