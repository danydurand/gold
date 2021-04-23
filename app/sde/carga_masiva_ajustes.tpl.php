<div class="col-xs-12">
    <div class="panel panel-primary">
        <div class="panel-heading" style="text-align: left">
            Ajustes y Procesamiento de Guias
        </div>
        <div class="panel-body" style="text-align: left; padding-left: 0px">
            <ul>
                <li class="text-info">
                    Si durante la Importación del archivo se detectan errores, Usted debe realizar los ajustes
                    correspondientes en cada registro.  Para ello, utilice el botón <strong>Corregir</strong>.
                </li>
                <li class="text-info">
                    Un error clásico es incluir Sucursales inválidas. Utilice la botón <strong>Sucu</strong> para
                    visualizar la lista de las Sucursales válidas.
                </li>
                <li class="text-info">
                    Una vez corregidos todos los errores, Usted podrá <strong>Procesar</strong> los registros para
                    convertirlos en Guias en la base de datos de <strong><?= $_SESSION['NombEmpr'] ?></strong>.
                </li>
                <li class="text-info">
                    Mientras no se "Procese" ningún registro, Usted podrá cambiar la Referencia, el Servicio de
                    Importación o incluso borrar la Nota de Entrega.
                </li>
                <li class="text-info">
                    Una vez que se "Procesa" al menos un registro, la Nota de Entrega queda "congelada" y no podrá
                    sufrir cambios de ningun tipo.
                </li>
            </ul>
        </div>
    </div>
</div>
<style>
    .text-info {
        font-size: 15px;
    }
</style>