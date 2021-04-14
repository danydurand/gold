<div class="col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: left">
            Estructura del Archivo y sus Datos
        </div>
        <div class="panel-body" style="text-align: left; padding-left: 0px">
            <ul>
                <li class="text-info">
                    La <b>Referencia</b> se refiere al Nro de Nota de Entrega, Container o Manifiesto.
                    Si lo deja en blanco, el Sistema le asignara una referencia automatica.
                </li>
                <li class="text-info">
                    Utilice la 1era columna para especificar el Nro de Tracking,en caso contrario deje
                    dicha columna en blanco y se le asignará un número automáticamente.
                </li>
                <li class="text-info">
                    Si no desea agregar datos en las columnas marcadas como <strong>(Opcional)</strong>,
                    deje la columna en blanco
                </li>
                <li class="text-info">
                    Se espera un archivo plano con extensión ".csv", ".txt" o ".dat", con 14 columnas
                    separadas por punto y coma (";"), con cabecera y con la siguiente estructura:
                </li>
            </ul>
            <ol>
                <div class="col-xs-12 col-md-offset-1 col-md-5">
                    <li class="text-info">Numero de Guía/Tracking <strong>(Opcional)</strong></li>
                    <li class="text-info">Id de la Pieza (Ej: 001, 002) <span class="req">(R)</span></li>
                    <li class="text-info">Cédula del Destinatario <span class="req">(R)</span></li>
                    <li class="text-info">Nombre y Apellido del Destinatario <span class="req">(R)</span></li>
                    <li class="text-info">Teléfono del Destinatario <span class="req">(R)</span></li>
                    <li class="text-info">Direccion de Entrega <span class="req">(R)</span></li>
                    <li class="text-info">Sucursal Destino <span class="req">(R) ("Sucu" p/más información)</span></li>
                </div>
                <div class="col-xs-12 col-md-6">
                    <li class="text-info">Ciudad Destino <strong>(Opcional)</strong></li>
                    <li class="text-info">Descripción del Contenido <span class="req">(R)</span></li>
                    <li class="text-info">Peso (Aereo=Libras, Maritimo=PiesCub)  <span class="req">(R)</span></li>
                    <li class="text-info">Alto <span class="req">(R) </span></li>
                    <li class="text-info">Ancho <span class="req">(R) </span></li>
                    <li class="text-info">Largo <span class="req">(R) </span></li>
                    <li class="text-info">Valor Declarado <strong>(Opcional)</strong></li>
                </div>
            </ol>
        </div>
    </div>
</div>
