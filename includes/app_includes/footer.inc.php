            <div class="form-messages">
                <div class="col-sm-12">
                    <?php $this->lblNotiUsua->Render(); ?>
                </div>
            </div>

            <style>
                input[type="radio"], input[type="checkbox"] {
                    margin: 4px 0 0;
                    margin-top: 5px;
                    line-height: normal;
                }
            </style>

            </div>
        </div>
        <!-- jQuery -->
        <script src=<?= __APP_JS_ASSETS__ ."/bower_components/jquery/dist/jquery.min.js" ?>></script>
        <!-- Bootstrap Core JavaScript -->
        <script src=<?= __APP_JS_ASSETS__ ."/bower_components/bootstrap/dist/js/bootstrap.min.js" ?>></script>
        <!-- Metis Menu Plugin JavaScript -->
        <script src=<?= __APP_JS_ASSETS__ ."/bower_components/metisMenu/dist/metisMenu.min.js" ?>></script>
        <!-- Custom Theme JavaScript -->
        <script src=<?= __APP_JS_ASSETS__ ."/dist/js/sb-admin-2.js" ?>></script>

        <?php $this->RenderEnd() ?>
    </body>
</html>
