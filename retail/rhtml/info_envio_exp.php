<table style="border: solid .5mm;">
    <tr>
        <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
            REMITENTE
        </td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Nombre:</td>
        <td colspan="3"><?= 'Remitente' ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Dirección:</td>
        <td colspan="3"><?= $strDireRemi ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">E-mail:</td>
        <td colspan="3"><?= $strEmaiRemi ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Telefono:</td>
        <td><?= $strTeleRemi ?></td>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>; text-align: right">Origen:</td>
        <td class="destacado" style="text-align: center;"><?= $strSucuOrig ?></td>
    </tr>
    <tr>
        <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
            DESTINATARIO
        </td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Nombre:</td>
        <td><?= 'Destinatario' ?></td>
        <td class="etiqueta" style="text-align: right">Cédula:</td>
        <td><?= $strCeduDest ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Dirección:</td>
        <td colspan="3"><?= $strDireDest ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>;">Telefono:</td>
        <td><?= $strTeleDest ?></td>
        <td class="etiqueta" style="width: <?= $intAnchEtiq ?>; text-align: right">Destino:</td>
        <td class="destacado" style="text-align: center;"><?= $strSucuDest ?></td>
    </tr>
    <tr>
        <td class="titulo" colspan="4" style="width: <?= $intMediPagi ?>; text-align: center;">
            FIRMA
        </td>
    </tr>
    <tr>
        <td>
            <br><br><br>
        </td>
    </tr>
    <tr>
        <td class="etiqueta" style="width: 70px; vertical-align: top;">Declaración:</td>
        <td colspan="3">
            &nbsp;&nbsp;El Remitente declara que no envía, dinero en <br>
            &nbsp;efectivo, objetos de valor ni objetos prohíbidos.
        </td>
    </tr>
</table>