<table style="border: solid .5mm; width: 100%">
    <tr>
        <td style="width: 100%; text-align: center">
            <qrcode value="<?= $strPiezGuia; ?>" style="width: 30mm;"></qrcode>
        </td>
    </tr>
    <tr>
        <td style="width: 100%; text-align: center; vertical-align: middle">
            <barcode type="C39" value="<?= $strPiezGuia ?>" style="width: 60mm; height: 16mm; font-size: 8mm"></barcode>
        </td>
    </tr>
</table>