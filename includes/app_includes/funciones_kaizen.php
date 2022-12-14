<?php
require_once('mimemail.inc.php');


function transformaFecha($strTextFech) {
    $arrPartFech = explode('/',$strTextFech);
    list($dia, $mes, $anio) = [$arrPartFech[0], $arrPartFech[1], $arrPartFech[2]];
    return "$anio-$mes-$dia";
}

function m($strTextMost, $intCantSalt=1) {
    $strSaltLine = '<br>';
    if ($intCantSalt > 1) {
        for ($i=1; $i<=$intCantSalt-1; $i++) {
          $strSaltLine .= '<br>';
        }
    }
    echo $strTextMost.$strSaltLine;
}

function TextoIconoColor($strNombIcon, $strTextAcom, $strPosiText='F', $strTamaIcon='', $strColoIcon='') {
    //--------------------------------------------------------------------------
    // Esta rutina devuelve un string que sirve para asignarlo a texto de los
    // botones u opciones del menu
    //--------------------------------------------------------------------------
    if (strlen($strTamaIcon) > 0) {
        $strTamaIcon = 'fa-'.$strTamaIcon;
    }
    if ($strPosiText == 'F') {
        // El texto se ubica al (F)inal
        return "<i class=\"fa fa-$strNombIcon $strTamaIcon\" style=\"color:$strColoIcon\"></i> $strTextAcom";
    } else {
        // El texto se ubica al (P)rincipio
        return "$strTextAcom <i class=\"fa fa-$strNombIcon $strTamaIcon\"  style=\"color:$strColoIcon\"></i>";
    }
}




function buscarCadenas($strCadeOrig,$strNombTabl) {
    $strCambDeli = BuscarParametro('CambDeli',$strNombTabl,'Txt1',null);
    if (!is_null($strCambDeli)) {
        //-----------------------------------------------------------
        // Este vector contiene la palabras claves que identifican
        // los "cambios delicados" asociados a la tabla
        //-----------------------------------------------------------
        $arrCadeBusc = explode(',',$strCambDeli);
        foreach ($arrCadeBusc as $strCadeBusc) {
            if (strpos($strCadeOrig,trim($strCadeBusc)) !== false) {
                return true;
            }
        }
    }
    return false;
}

/*
 * Esta funcion registra en la base de datos, los cambios realizados
 * sobre un registro de una tabla en particular
 */
function LogDeCambios($arrLogxCamb) {
    $objUsuario  = unserialize($_SESSION['User']);
    $strLogiUsua = 'N/A';
    if ($objUsuario instanceof Usuario) {
        $strLogiUsua = $objUsuario->LogiUsua;
    } else {
        if ($objUsuario instanceof Chofer) {
            $strLogiUsua = $objUsuario->Login;
        }
    }
    //-----------------------------------------------------------------------
    // Si no se especifica nada diferente, se asume que el Sistema
    // que esta llamando a esta rutina es "SisCO".
    //-----------------------------------------------------------------------
    if (!isset($arrLogxCamb['strSistTran'])) {
        $strSistTran = 'SisCO';
    } else {
        $strSistTran = $arrLogxCamb['strSistTran'];
    }
    $objLogxTran = new Log();
    $objLogxTran->Fecha       = new QDateTime(QDateTime::Now);
    $objLogxTran->Hora        = new QDateTime(QDateTime::Now);
    $objLogxTran->Usuario     = $strLogiUsua;
    $objLogxTran->Tabla       = $arrLogxCamb['strNombTabl'];
    $objLogxTran->Ref         = $arrLogxCamb['intRefeRegi'];
    $objLogxTran->Nombre      = $arrLogxCamb['strNombRegi'];
    $objLogxTran->Descripcion = $arrLogxCamb['strDescCamb'];
    $objLogxTran->Sistema     = $strSistTran;
    $objLogxTran->Delicado    = isset($arrLogxCamb['blnCambDeli']) ? true : null;
    $objLogxTran->Ip          = getRealIP();
    $objLogxTran->Save();
}


function BorrarLineasEnBlanco($arrVectEntr) {
    $arrVectSali = array();
    foreach ($arrVectEntr as $strLineEntr) {
        if (strlen($strLineEntr)) {
            $arrVectSali[] = $strLineEntr;
        }
    }
    return $arrVectSali;
}

/**
 * This rutine delete blank lines, delete every non-number character and 
 * delete repeated records.  It returns a cleaned array
 * @return array
 */
function LimpiarArreglo($arrVectEntr,$blnSoloNume=true) {
    //--------------------------------
    // Se eliminan l??neas en blanco
    //--------------------------------
    $arrVectSali = array();
    foreach ($arrVectEntr as $strLineEntr) {
        $strLineEntr = trim($strLineEntr);
        if (strlen($strLineEntr)) {
            $arrVectSali[] = $strLineEntr;
        }
    }
    if ($blnSoloNume) {
        //-------------------------------------------------------------------------------------
        // Con la funcion DejarSoloLosNumeros1 se eliminan los caracteres especiales y letras
        //-------------------------------------------------------------------------------------
        array_walk($arrVectSali,'DejarSoloLosNumeros1');
    }
    //---------------------------------------------------------------------------
    // Con array_unique se eliminan las guias repetidas en caso de que las haya
    //---------------------------------------------------------------------------
    $arrVectSali = array_unique($arrVectSali,SORT_STRING);
    return $arrVectSali;
}

function getRealIP() {
    $arrServKeys = array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR');
    foreach ($arrServKeys as $key) {
        //--------------------------------------------------------------------------------
        // Comprobamos si existe la clave solicitada en el array de la variable $_SERVER
        //--------------------------------------------------------------------------------
        if ( array_key_exists( $key, $_SERVER ) ) {
            //--------------------------------------------------------------------------------------------------------
            // Eliminamos los espacios blancos del inicio y final para cada clave que existe en la variable $_SERVER
            //--------------------------------------------------------------------------------------------------------
            foreach ( array_map( 'trim', explode( ',', $_SERVER[ $key ] ) ) as $ip ) {
                //-----------------------------------------------------------------
                // Filtramos* la variable y retorna el primero que pase el filtro
                //-----------------------------------------------------------------
                if ( filter_var( $ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE ) !== false ) {
                    return $ip;
                }
            }
        }
    }
    return '?'; // Retornamos '?' si no hay ninguna IP o no pase el filtro
}

/*function generarCodigo() {
   //----------------------------------------------------------------------------------------------------------
   // Para generar el c??digo aplicamos la funcion char() al resultado que nos da la funci??n rand().
   // En este ejemplo la clave creada est?? formada por letras min??sculas y numeros.
   // Car??cteres ASCII que podemos utilizar s??n:
   // - desde el 48 hasta el 57 tenemos los n??meros del 0 al 9.
   // - del 65 al 90 las letras en may??sculas.
   // - del 97 al 122 las letras en min??sculas.
   //----------------------------------------------------------------------------------------------------------
   $codigo = "";
   $longitud = 8;
   $mitad = $longitud / 2;
   for ($i=1; $i<=$longitud; $i++){
      if (($i % 2) == 0) {
         $letra = chr(rand(97,122));
      } else {
         // $letra = chr(rand(65,90));
         $letra = chr(rand(48,57));
      }
      $codigo .= $letra;
   }
   return $codigo;
}*/

function LimpiaEspacios($CadenaConMuchosEspacios) {
    // Aqu?? eliminamos todos los espacios que estan antes y despu??s de la cadena
    $CadenaConMuchosEspacios= trim($CadenaConMuchosEspacios);
    // Mediante expresiones regulares sustituimos los bloques
    // de m??s de un espacio por un espacio sencillo.
    $CadenaRegulada = preg_replace('  +',' ',$CadenaConMuchosEspacios);
    return $CadenaRegulada;
}

function quitarEspacios($CadenaConMuchosEspacios) {
    //Aqui eliminamos todos los espacios que estan antes y despues de la cadena
    $CadenaConMuchosEspacios= trim($CadenaConMuchosEspacios);
    //Mediante expresiones regulares sustituimos los bloques de m??s de un espacio por un espacio sencillo
    $CadenaRegulada = preg_replace('  +','',$CadenaConMuchosEspacios);
    return $CadenaRegulada;
}

/**
 * Esta funcion, ordena los elementos de un arreglo bidimensional.
 * Recibe como parametro el arreglo original, la columna por la cual sera ordenado
 * el vector y el tipo de ordenamiento que se desea Ascendente o Descendente
 * Sintaxis: $arrOrdenado = ordenar_array($arrOriginal,'campo1',SORT_ASC/SORT_DESC);
 *
 * @return array ordernado
 */
function ordenar_array() {
    $n_parametros = func_num_args(); // Obtenemos el n??mero de par??metros
    if ($n_parametros < 3 || $n_parametros % 2 != 1) {
        // Si tenemos el n??mero de parametro mal...
        return false;
    } else {
        // Hasta aqu?? todo correcto, veamos si los par??metros tienen lo que debe ser...
        $arg_list = func_get_args();
        if (!(is_array($arg_list[0]) && is_array(current($arg_list[0])))) {
            return false; // Si el primero no es un array... MALO!
        }
        for ($i = 1; $i<$n_parametros; $i++) {
            // Miramos que el resto de par??metros tb est??n bien...
            if ($i % 2 != 0) {
                // Par??metro impar...tiene que ser un campo del array...
                if (!array_key_exists($arg_list[$i], current($arg_list[0]))) {
                    return false;
                }
            } else {
                // Par, no falla... si no es SORT_ASC o SORT_DESC... a la calle!
                if ($arg_list[$i]!=SORT_ASC && $arg_list[$i]!=SORT_DESC) {
                    return false;
                }
            }
        }
        $array_salida = $arg_list[0];

        // Una vez los par??metros se que est??n bien, proceder?? a ordenar...
        $a_evaluar = "foreach (\$array_salida as \$fila){\n";
        for ($i=1; $i<$n_parametros; $i+=2) {
            // Ahora por cada columna...
            $a_evaluar .= "  \$campo{$i}[] = \$fila['$arg_list[$i]'];\n";
        }
        $a_evaluar .= "}\n";
        $a_evaluar .= "array_multisort(\n";
        for ($i=1; $i<$n_parametros; $i+=2) {
            // Ahora por cada elemento...
            $a_evaluar .= "  \$campo{$i}, SORT_REGULAR, \$arg_list[".($i+1)."],\n";
        }
        $a_evaluar .= "  \$array_salida);";
        // La verdad es que es m??s complicado de lo que cre??a en principio... :)
        eval($a_evaluar);
        return $array_salida;
    }
}


function t($strTextTraz) {
    if (isset($_SESSION['User'])) {
        $objUsuario  = unserialize($_SESSION['User']);
        $arrLogiTraz = ['ddurand'];
        if (isset($_SESSION['LogiTraz'])) {
            $arrLogiTraz = $_SESSION['LogiTraz'];
        }
        $blnTodoOkey = false;
        $strLogiUsua = 'N/A';
        if ( ($objUsuario instanceof Usuario) && (in_array($objUsuario->LogiUsua,$arrLogiTraz)) ) {
            $blnTodoOkey = true;
            $strLogiUsua = $objUsuario->LogiUsua;
        } else {
            if ( ($objUsuario instanceof Chofer) && (in_array($objUsuario->Login,$arrLogiTraz)) ) {
                $blnTodoOkey = true;
                $strLogiUsua = $objUsuario->Login;
            }
        }
        // $blnTodoOkey = true;
        if ($blnTodoOkey) {
            $mixManeArch = fopen(__LOG_DIRECTORY__.'/traza.log','a');
            $arrLineAudi = array();
            $arrLineAudi[] = date('Y-m-d');
            $arrLineAudi[] = date('H:i:s');
            $arrLineAudi[] = $strLogiUsua;
            if (isset($_SESSION['NombProg'])) {
                $arrLineAudi[] = str_replace('.php','',basename($_SESSION['NombProg']));
            }
            if (!is_array($strTextTraz)) {
                $arrLineAudi[] = $strTextTraz;
            } else {
                foreach ($strTextTraz as $strElemArra) {
                    $arrLineAudi[] = $strElemArra;
                }
            }
            $strCadeAudi = implode('|',$arrLineAudi);
            fputs($mixManeArch,$strCadeAudi."|\n");
        }
    }
}

/**
 * Traza de actividades de los Choferes
 * @param $strTextTraz
 */
function tc($strTextTraz) {
    if (isset($_SESSION['User'])) {
        $objChofer  = unserialize($_SESSION['User']);
        $blnTodoOkey = false;
        $strLogiUsua = 'N/A';
        if ($objChofer instanceof Chofer) {
            $blnTodoOkey = true;
            $strLogiUsua = $objChofer->Login;
        }
        if ($blnTodoOkey) {
            $mixManeArch   = fopen(__LOG_DIRECTORY__.'/traza_chofer.log','a');
            $arrLineAudi   = array();
            $arrLineAudi[] = date('Y-m-d');
            $arrLineAudi[] = date('H:i:s');
            $arrLineAudi[] = $strLogiUsua;
            if (isset($_SESSION['NombProg'])) {
                $arrLineAudi[] = str_replace('.php','',basename($_SESSION['NombProg']));
            }
            if (!is_array($strTextTraz)) {
                $arrLineAudi[] = $strTextTraz;
            } else {
                foreach ($strTextTraz as $strElemArra) {
                    $arrLineAudi[] = $strElemArra;
                }
            }
            $strCadeAudi = implode('|',$arrLineAudi);
            fputs($mixManeArch,$strCadeAudi."|\n");
        }
    }
}


function ta($strTextTraz,$mixManeArch) {
    if (isset($_SESSION['User'])) {
        $objUsuario  = unserialize($_SESSION['User']);
        $arrLogiTraz = ['ddurand'];
        if (isset($_SESSION['LogiTraz'])) {
            $arrLogiTraz = $_SESSION['LogiTraz'];
        }
        $blnTodoOkey = false;
        if ( ($objUsuario instanceof Usuario) && (in_array($objUsuario->LogiUsua,$arrLogiTraz)) ) {
            $blnTodoOkey = true;
        } else {
            if ( ($objUsuario instanceof Chofer) && ($objUsuario->Login == 'scuevas') ) {
                $blnTodoOkey = true;
            }
        }
        if ($blnTodoOkey) {
            $arrLineAudi = array();
            $arrLineAudi[] = date('Y-m-d');
            $arrLineAudi[] = date('H:i:s');
            $arrLineAudi[] = $objUsuario->LogiUsua;
            if (isset($_SESSION['NombProg'])) {
                $arrLineAudi[] = str_replace('.php','',basename($_SESSION['NombProg']));
            }
            if (!is_array($strTextTraz)) {
                $arrLineAudi[] = $strTextTraz;
            } else {
                foreach ($strTextTraz as $strElemArra) {
                    $arrLineAudi[] = $strElemArra;
                }
            }
            $strCadeAudi = implode('|',$arrLineAudi);
            fputs($mixManeArch,$strCadeAudi."|\n");
        }
    }
}

function RangoDeFechas($intNumeAnio,$intNumeDmes) {
    //-----------------------------------------------------------
    // En funcion del anio y mes especificados, construyo el
    // rango de fechas para la seleccion de registros
    //-----------------------------------------------------------
    $dttFechInic  = $intNumeAnio.'-'.$intNumeDmes.'-01';
    $strCadeSqlx  = 'select date_add("'.$dttFechInic.'", interval 1 month) as ProxMesx';
    $strCadeSqlx .= '  from sistema ';
    $strCadeSqlx .= ' where 1 ';
    $strCadeSqlx .= ' limit 1 ';
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    $dttFechRefe = $mixRegiFech['ProxMesx'];

    //      echo 'Fec Prox Mes: '.$dttFechRefe.'<br>';

    $strCadeSqlx  = 'select date_sub("'.$dttFechRefe.'", interval 1 day) as UltiDiax';
    $strCadeSqlx .= '  from sistema ';
    $strCadeSqlx .= ' where 1 ';
    $strCadeSqlx .= ' limit 1 ';
    $objDatabase = QApplication::$Database[1];
    $objDbResult = $objDatabase->Query($strCadeSqlx);
    $mixRegiFech = $objDbResult->FetchArray();
    $dttFechFina = $mixRegiFech['UltiDiax'];

    //      echo 'Fec Prox Mes: '.$dttFechFina.'<br>';

    return array($dttFechInic,$dttFechFina);
}

function is_date($date) {
    $date = str_replace(array('\'', '-', '.', ','), '/', $date);
    $date = explode('/', $date);
    // Sin divisores, se asume el formato YYYYMMDD
    if(count($date) == 1 and is_numeric($date[0]) and $date[0] < 20991231 and
        (checkdate(substr($date[0], 4, 2), substr($date[0], 6, 2), substr($date[0], 0, 4)))) {
        return true;
    }
    // Con divisores
    if(count($date) == 3 and is_numeric($date[0]) and is_numeric($date[1]) and is_numeric($date[2]) and
        (checkdate($date[0], $date[1], $date[2]) //mmddyyyy
            or checkdate($date[1], $date[0], $date[2]) //ddmmyyyy
            or checkdate($date[1], $date[2], $date[0])) //yyyymmdd
    )
    {
        return true;
    }
    return false;
}

function comprobar_fecha($dia,$mes,$anio) {
    return checkdate ($mes, $dia, $anio);
}

function nl2br2($string) {
    $string = str_replace(array("\r\n", "\r", "\n"), ",", $string);
    return $string;
}

function FechaDeHoy() {
    $dttFechDhoy = SumaRestaDiasAFecha(date('Y-m-d'),0,'+');
    return $dttFechDhoy;
}

function nform($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    $strNumeOrig = number_format($strNumeOrig,2);
    $strNumeOrig = str_replace(',','',$strNumeOrig);
    return $strNumeOrig;
}

function nform3($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    $strNumeOrig = number_format($strNumeOrig,3);
    $strNumeOrig = str_replace(',','',$strNumeOrig);
    return $strNumeOrig;
}

function nf($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    return number_format($strNumeOrig,2,',','.');
}

function nf3($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    return number_format($strNumeOrig,3,',','.');
}

function nfp($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    return number_format($strNumeOrig,2);
}

function nf0($strNumeOrig) {
    //-------------------------------------------------------------
    // Esta funci??n da formato al n??mero que entra como Par??metro
    //-------------------------------------------------------------
    return number_format($strNumeOrig,0,',','.');
}

/**
 * Esta rutina devuelve al punto de su invocacion, el registro de configuracion
 * cuyo codigo entra como parametro a la funcion.  El indice "ConfSist", almacena
 * todos los Parametros de Configuracion del Sistema.
 *
 * @param $strCodiPara Codigo del Parametro deseado
 * @return Parametro   Registro de la tabla parametro correspondiente
 */
function BuscarConfig($strCodiPara) {
    return Parametro::Load('ConfSist',$strCodiPara);
}

/**
 * Esta rutina devuelve al punto de su invocaci??n, el registro de mensaje o notificaci??n
 * para el usuario cliente del Sistema Yamaguchi, cuyo c??digo entra como par??metro a la funci??n.
 * El ??ndice "MensYama", almacena todos los par??metros de mensajes del Sistema Yamaguchi.
 *
 * @param $strCodiPara Codigo del Parametro deseado
 * @return Parametro Registro de la tabla parametro correspondiente
 */
function BuscarMensajeYamaguchi($strCodiPara) {
    return Parametro::Load('MensYama',$strCodiPara);
}

/**
 * Esta rutina devuelve al punto de su invocaci??n, el registro del d??a feriado est??ndar
 * a trav??s de su c??digo. El ??ndice "FeriEsta", almacena todos los par??metros de
 * d??as feriados est??ndar.
 *
 * @param $strCodiPara : c??digo del par??metro deseado.
 * @return Parametro : registro de la tabla parametro correspondiente.
 */
function BuscarDiaFeriadoEstandar($strCodiPara) {
    return Parametro::Load('FeriEsta',$strCodiPara);
}

function DejarNumerosVJGuion($strCadeProc) {
    $strNuevCade = preg_replace("/[^0-9JVG-]/", "", $strCadeProc);
    return $strNuevCade;
}

function DejarSoloLosNumeros($strCadeProc) {
    $strNuevCade = QuitarCaracteresEspeciales($strCadeProc);
    $strSoloNume = '0-9'; // juego de caracteres a conservar
    $strExprRegu = sprintf('~[^%s]++~i', $strSoloNume); // case insensitive
    $strNuevCade = preg_replace($strExprRegu, '', $strNuevCade);
    return $strNuevCade;
}

/**
 * Funci??n que devuelve solamente n??meros y slash ("/") de una cadena.
 * (Para validaci??n de formatos de n??meros de tel??fono - Yamaguchi)
 *
 * @param $strCadeProc
 * @return mixed
 */
function DejarSoloLosNumeros2($strCadeProc) {
    $strNuevCade = QuitarCaracteresEspeciales($strCadeProc);
    $strSoloNume = '0-9/'; // juego de caracteres a conservar
    $strExprRegu = sprintf('~[^%s]++~i', $strSoloNume); // case insensitive
    $strNuevCade = preg_replace($strExprRegu, '', $strNuevCade);
    return $strNuevCade;
}

function DejarSoloLosNumeros1(&$strCadeProc) {
    $strCadeProc = DejarSoloLosNumeros($strCadeProc);
}

function QuitarCaracteresEspeciales($strCadeProc) {
    return preg_replace("[^A-Za-z0-9]", "", $strCadeProc);
}

function quitaCaracter($strQuitCara,$strCadeProc) {
    return str_replace($strQuitCara, "", $strCadeProc);
}

function QuitarCaracteresEspeciales2($strCadeProc) {
    $strCadeProc = str_replace("??","N",$strCadeProc);
    $strCadeProc = str_replace("??","A",$strCadeProc);
    $strCadeProc = str_replace("??","E",$strCadeProc);
    $strCadeProc = str_replace("??","I",$strCadeProc);
    $strCadeProc = str_replace("??","O",$strCadeProc);
    $strCadeProc = str_replace("??","U",$strCadeProc);
    $strCadeProc = str_replace("??","N",$strCadeProc);
    $strCadeProc = str_replace("??","A",$strCadeProc);
    $strCadeProc = str_replace("??","E",$strCadeProc);
    $strCadeProc = str_replace("??","I",$strCadeProc);
    $strCadeProc = str_replace("??","I",$strCadeProc);
    $strCadeProc = str_replace("??","O",$strCadeProc);
    $strCadeProc = str_replace("??","U",$strCadeProc);
    $strCadeProc = str_replace("\"","",$strCadeProc);
    $strCadeProc = str_replace("&","y",$strCadeProc);
    $strCadeProc = str_replace(chr(13),"",$strCadeProc);
    $strNuevLine = array("\r\n", "\n", "\r");
    return str_replace($strNuevLine, "", $strCadeProc);
}

function limpiarCadena($strCadeLimp,$strCadeQuit='') {
    $strCadeLimp = QuitarCaracteresEspeciales2($strCadeLimp);
    $strCadeLimp = preg_replace("/[^a-zA-Z0-9\s]/", "", $strCadeLimp);
    if (strlen($strCadeLimp) > 0) {
        $strCadeLimp = quitaCaracter($strCadeQuit,$strCadeLimp);
    }
    $strCadeLimp = utf8_encode($strCadeLimp);
    return $strCadeLimp;
}

/*
function QuitarCaracteresEspeciales2($strCadeProc) {
    $strCadeProc = preg_replace("[^A-Za-z0-9 ]", "", $strCadeProc);
    $strCadeProc = str_replace('??','N',$strCadeProc);
    $strCadeProc = str_replace('??','A',$strCadeProc);
    $strCadeProc = str_replace('??','E',$strCadeProc);
    $strCadeProc = str_replace('??','I',$strCadeProc);
    $strCadeProc = str_replace('??','O',$strCadeProc);
    $strCadeProc = str_replace('??','U',$strCadeProc);
    $strCadeProc = str_replace('??','N',$strCadeProc);
    $strCadeProc = str_replace('??','A',$strCadeProc);
    $strCadeProc = str_replace('??','E',$strCadeProc);
    $strCadeProc = str_replace('??','I',$strCadeProc);
    $strCadeProc = str_replace('??','I',$strCadeProc);
    $strCadeProc = str_replace('??','O',$strCadeProc);
    $strCadeProc = str_replace('??','U',$strCadeProc);
    $strCadeProc = str_replace('"','',$strCadeProc);
    $strNuevLine = array("\r\n", "\n", "\r");
    return str_replace($strNuevLine, "", $strCadeProc);
}

function limpiarCadena($strCadeLimp,$strCadeQuit='') {
    $strCadeLimp = QuitarCaracteresEspeciales2($strCadeLimp);
    if (strlen($strCadeLimp) > 0) {
        $strCadeLimp = quitaCaracter($strCadeQuit,$strCadeLimp);
    }
    return utf8_decode($strCadeLimp);
}
*/

function QuitarAmpersand($strCadeProc) {
    return str_replace('&','y',$strCadeProc);
}

function Delimitar($strTextDeli) {
    $strCaraAper = "(";
    $strCaraCier = ")";
    return $strCaraAper.$strTextDeli.$strCaraCier;
}

function QuitarEspaciosPuntosYComas($strCadeProc) {
    $strCadeProc = str_replace('.','',$strCadeProc);
    $strCadeProc = str_replace(',','',$strCadeProc);
    $strCadeProc = str_replace(' ','',$strCadeProc);
    return $strCadeProc;
}

function ExtraerEntreDelimitadores($inputstr,$delimeterLeft,$delimeterRight) {
    $posLeft  = stripos($inputstr,$delimeterLeft)+strlen($delimeterLeft);
    $posRight = stripos($inputstr,$delimeterRight,$posLeft+1);
    return  substr($inputstr,$posLeft,$posRight-$posLeft);
}

function Posicion2doDelimitador($strCadeEval,$strCaraDeli) {
    $intPosiPrim = strpos($strCadeEval,$strCaraDeli);
    $intPosiSegu = strpos($strCadeEval,$strCaraDeli,$intPosiPrim+1);
    return $intPosiSegu;
}

function OpcionDropDown($strEnlaOpci, $strTextIcon) {
    $strOpciDrop = "<li><a href=\"$strEnlaOpci\"> $strTextIcon</a></li>";
    return $strOpciDrop;
}

function CrearDropDownButton($strTextBoto, $arrOpciDrop, $strColoBoto = null) {
    switch ($strColoBoto) {
        case 'p':
            $strColoBoto = 'primary';
            break;
        case 's':
            $strColoBoto = 'success';
            break;
        case 'i':
            $strColoBoto = 'info';
            break;
        case 'w':
            $strColoBoto = 'warning';
            break;
        case 'd':
            $strColoBoto = 'danger';
            break;
        case 'f':
            $strColoBoto = 'default';
            break;
        default:
            $strColoBoto = 'primary';
            break;
    }
    $strDropDown = '
       <div class="btn-group dropdown">
           <button class="btn btn-'.$strColoBoto.' btn-sm dropdown-toggle" data-toggle="dropdown">
               '.$strTextBoto.'
               <span class="fa fa-caret-down"></span>
           </button>
           <ul class="dropdown-menu">';
    foreach ($arrOpciDrop as $strOpciDrop) {
        $strDropDown .= $strOpciDrop;
    }
    $strDropDown .= '
           </ul>
       </div>
       ';
    return $strDropDown;
}

function TextoIcono($strNombIcon, $strTextAcom, $strPosiText='F', $strTamaIcon='') {
    //--------------------------------------------------------------------------
    // Esta rutina devuelve un string que sirve para asignarlo a texto de los
    // botones u opciones del menu
    //--------------------------------------------------------------------------
    if (strlen($strTamaIcon) > 0) {
        $strTamaIcon = 'fa-'.$strTamaIcon;
    }
    if ($strPosiText == 'F') {
        // El texto se ubica al (F)inal
        if (strlen($strTextAcom)) {
            $strTextAcom = "&nbsp;&nbsp;$strTextAcom";
        }
        return "<i class=\"fa fa-$strNombIcon $strTamaIcon\"></i>$strTextAcom";
    } else {
        // El texto se ubica al (P)rincipio
        return "$strTextAcom <i class=\"fa fa-$strNombIcon $strTamaIcon\"></i>";
    }
}
?>