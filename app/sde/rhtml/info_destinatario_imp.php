<table class="tabla">
    <tr>
        <td class="titulo" colspan="2" style="text-align: center;">
            TO
        </td>
    </tr>
    <tr>
        <td class="etiqueta">Name:</td>
        <td class="contenido"><?= $strNombDest ?></td>
    </tr>
    <tr>
        <td class="etiqueta">Address:</td>
        <td class="contenido"><?= $strDireDes1 ?></td>
    </tr>
    <?php if (strlen($strDireDes2) > 0) { ?>
    <tr>
        <td colspan="2" class="contenido"><?= $strDireDes2 ?></td>
    </tr>
    <?php } ?>
    <tr>
        <td class="etiqueta">Phone:</td>
        <td class="contenido"><?= $strTeleDest ?></td>
    </tr>
    <tr>
        <td class="etiqueta" style="text-align: right; vertical-align: middle">Destiny:</td>
        <td class="destacado" style="text-align: center;"><?= $strSucuDest ?></td>
    </tr>
</table>