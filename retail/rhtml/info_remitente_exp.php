<table style="border: solid .5mm; width: 100%">
    <tr>
        <td class="titulo" colspan="4" style="text-align: center;">
            FROM
        </td>
    </tr>
    <tr>
        <td class="etiqueta">Name:</td>
        <td class="contenido" colspan="3"><?= 'Remitente mucho mas amplio de lo estimado inicialmente ' ?></td>
    </tr>
    <tr>
        <td class="etiqueta">Address:</td>
        <td colspan="3"><?= $strDireRemi ?></td>
    </tr>
    <tr>
        <td class="etiqueta">E-mail:</td>
        <td colspan="3"><?= $strEmaiRemi ?></td>
    </tr>
    <tr>
        <td class="etiqueta">Phone:</td>
        <td><?= $strTeleRemi ?></td>
        <td class="etiqueta" style="text-align: right; vertical-align: middle">Origin:</td>
        <td class="destacado" style="text-align: center;"><?= $strSucuOrig ?></td>
    </tr>
</table>