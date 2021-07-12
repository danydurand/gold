chmod 777 includes/tmp/plugin.tmp/
chmod 777 includes/qcubed/plugins/plugin_config.xml
chmod 777 includes/qcubed/plugins/plugin_examples.php
chmod 777 includes/qcubed/plugins/plugin_includes.php
chmod 777 includes/qcubed/plugins
chmod 777 assets/plugins
chmod 777 includes/tmp/cache
chmod 777 drafts
chmod 777 drafts/panels
chmod 777 includes/formbase_classes_generated
chmod 777 includes/model
chmod 777 includes/model/generated
chmod 777 includes/meta_controls
chmod 777 includes/meta_controls/generated
find . -name "*.hash" -exec chmod 666 {} \;
find . -name "*.php" -exec chmod 666 {} \;
find . -name "*.csv" -exec chmod 666 {} \;
find . -name "*.log" -exec chmod 666 {} \;
find . -name "*.txt" -exec chmod 666 {} \;
find . -name "tmp??????" -exec chmod 666 {} \;
find . -type d -exec chmod 777 {} \;
