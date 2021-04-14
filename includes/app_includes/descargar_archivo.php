<?php
//$archivos = array("/home/profitftp/incoming/fiscal.txt");
$f = $_GET["f"];
//if(strpos($f,"/")!==false){
//	die("No puedes navegar por otros directorios");
//}
//if(!in_array($f,$archivos)){
//	die("<b>ERROR!</b> no es posible descargar $f");
//}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=\"$f\"\n");
$fp=fopen("$f", "r");
fpassthru($fp);
?>