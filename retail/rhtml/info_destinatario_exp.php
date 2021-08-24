<table style="border: solid .5mm; width: 100%">
    <tr>
        <td class="titulo" colspan="4" style="text-align: center;">
            TO
        </td>
    </tr>
    <tr>
        <td class="etiqueta">Name:</td>
        <td><?= $strNombDest ?></td>
    </tr>
    <tr>
        <td class="etiqueta">Address:</td>
        <td colspan="3"><?= $strDireDes1 ?></td>
    </tr>
    <?php if (strlen($strDireDes2) > 0) { ?>
    <tr>
        <td class="etiqueta"></td>
        <td colspan="3"><?= $strDireDes2 ?></td>
    </tr>
    <?php } ?>
    <tr>
        <td class="etiqueta">Id Num:</td>
        <td colspan="3"><?= trim($strCeduDest) ?></td>
    </tr>
    <tr>
        <td class="etiqueta">Phone:</td>
        <td><?= $strTeleDest ?></td>
        <td class="etiqueta" style="text-align: right; vertical-align: middle">Destiny:</td>
        <td class="destacado" style="text-align: center;"><?= $strSucuDest ?></td>
    </tr>
</table>