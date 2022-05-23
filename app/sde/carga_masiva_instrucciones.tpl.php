<div class="col-xs-10">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: left">
            Estructura del Archivo y sus Datos
        </div>
        <div class="panel-body" style="text-align: left; padding-left: 0px">
            <ul>
                <li class="text-info">
                    La <b>Referencia</b> es el Nro del Manifiesto o Container.  La forma en que se identifica la carga.
                    Si lo deja en blanco, el Sistema le asignara una referencia automáticamente.
                </li>
                <li class="text-info">
                    Utilice la <b>1era columna</b> para especificar el <b>Nro de Guía</b>, en caso contrario deje
                    dicha columna en blanco y el sistema le asignará un número.
                </li>
                <li class="text-info">
                    Si no desea agregar datos en las columnas marcadas como <strong>(Opcional)</strong>,
                    incluya la columna pero déjela en blanco.
                </li>
                <li class="text-info">
                    <u>Se espera un archivo MS-Excel con extensión ".xls" ó ".xlsx", con 7 columnas y
                        con la siguiente estructura:</u>
                </li>
            </ul>
            <ol>
                <div class="col-xs-12 col-md-offset-1 col-md-5">
                    <li class="text-info">Número de Guía <strong>(Opcional)</strong></li>
                    <li class="text-info">Cantidad de Piezas (Ej: 1, 2) <span class="req">(R)</span></li>
                    <li class="text-info">Nombre y Apellido del Destinatario <span class="req">(R)</span></li>
                    <li class="text-info">Teléfono Destinatario (separe con '/' si hay más de uno) <span class="req">(R)</span></li>
                </div>
                <div class="col-xs-12 col-md-6">
                    <li class="text-info">Direccion de Entrega <span class="req">(R)</span></li>
                    <li class="text-info">Iata Sucursal Destino (presione "Sucu" p/más información) <span class="req">(R) </span></li>
                    <li class="text-info">Peso (Aereo=Libras, Maritimo=PiesCub)  <span class="req">(R)</span></li>
                </div>
            </ol>
        </div>
    </div>
</div>
<style>
    .text-info {
        font-size: 15px;
    }
</style>