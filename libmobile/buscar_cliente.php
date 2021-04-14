<?php 
    require_once('qcubed.inc.php');
    include('layout/header.inc.php');
    $strTituPagi = "Buscar Cliente";

    $blnTodoOkey = true;
    $strMensErro = '';
?>
    <div data-role="page" id="buscar_cliente">
        <?php include('layout/page_header.inc.php'); ?>
        <div data-role="content">
            <form action="lista_de_clientes.php?o=bc" method="post">
                <div class="ui-field-contain">
                    <label for="codigo">Buscar por Código:</label>
                    <input type="text" name="codigo" id="codigo" placeholder="Código del Cliente">
                </div>
                <div class="ui-field-contain">
                    <label for="nombre">Buscar por Nombre:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del Cliente">
                </div>
                <span class="alert alert-danger">
                    <?= $strMensErro ?>
                </span>               
                <div class="ui-field-contain">
                    <input type="submit" value="<i class='fa fa-search fa-lg pull-left'></i>Buscar" data-theme="b">
                    <input type="reset" value="<i class='fa fa-lg fa-refresh pull-left'></i>Limpiar" data-theme="b">
                </div>                
            </form>
        </div>
        <?php include('layout/page_footer.inc.php'); ?>
    </div>
    <script type="text/javascript">
        function ValidarFormulario() {
            //----------------------------
            // Se valida el campo Código
            //----------------------------
            if (document.form.codigo.value.length==0){
                alert("Tiene que escribir su codigo");
                document.form.codigo.focus();
                return 0;
            }
            //----------------------------
            // Se valida el campo Nombre
            //----------------------------
            if (document.form.nombre.value.length==0){
                alert("Tiene que escribir su nombre");
                document.form.nombre.focus();
                return 0;
            }
            //-------------------------
            // Se envía el formulario
            //-------------------------
            document.form.submit();
        }
    </script>
<?php include('layout/footer.inc.php'); ?>