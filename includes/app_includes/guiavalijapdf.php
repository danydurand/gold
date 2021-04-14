<?php
require_once('/appl/lib/fpdf153/fpdf.php');

define('FPDF_FONTPATH','font/');
class PDF extends FPDF
{
	protected $widths;
	protected $aligns;
	protected $enca;
	protected $just;
	protected $anch;
	protected $vert;
	protected $imag;
	protected $titulo;
	protected $fecha;
	protected $empresa;
	protected $direccion;
	protected $ruta;
	protected $codiruta;


	function setVariables($enca,$just,$anch,$vert,$imag='',$ruta='',$codiruta)
	{
		$this->enca = $enca;
		$this->just = $just;
		$this->anch = $anch;
		$this->vert = $vert;
		$this->imag = $imag;
		$this->SetWidths($anch);
		$this->SetAligns($just);
		$this->fecha = date('Y-m-d');
		$this->ruta = $ruta;
		$this->codiruta = $codiruta;
	}

	function SetEmpresa($emp='',$dir='',$titu='')
	{
		//Set datos de la empresa
		$this->empresa=$emp;
		$this->direccion=$dir;
		$this->titulo=$titu;
	}

	function SetWidths($w)
	{
		//Set the array of column widths
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Set the array of column alignments
		$this->aligns=$a;
	}
	function Header()
	{
		if ($this->DefOrientation == 'P')
		{
			$posi_imag = 165;
			$long_oriz = 210;
		}
		else
		{
			$posi_imag = 225;
			$long_oriz = 275;
		}
		//Logo
		if (strlen($this->imag) > 0)
		{
			$this->Image($this->imag,$posi_imag,4,40,15);
			$this->Cell(1);
			// $this->Ln(10);
		}
		$this->titulo = strtoupper($this->titulo);
		$this->SetFont('Arial','B',12);
		$this->Cell(3,1,$this->empresa,0,1);
		$this->Cell(1);
		$this->Cell(6,9,$this->direccion);
		$this->SetX($posi_imag+16);
		$this->Cell(6,20,$this->fecha,0,0);
		$this->ln(10);
		$longi=$this->GetStringWidth($this->titulo);
		$this->SetX(($long_oriz-$longi)/2);
		$this->Cell($longi,4,$this->titulo,'B',1,'C');

		$this->ln(10);
		$this->ruta = 'RUTA : '.$this->codiruta.' - '.$this->ruta;
		$longi=$this->GetStringWidth($this->ruta);

		$this->SetX(20);
		$this->Cell($longi,4,$this->ruta,'B',1,'C');
		//	$this->Code39($longi+30,30,$this->codiruta);
		//        $this->Cell(1);
		$this->ln(5);
		//Colores, ancho de línea y fuente en negrita
		$this->SetFillColor(0,0,255);
		$this->SetTextColor(255);
		$this->SetDrawColor(0,0,255);
		$this->SetLineWidth(.3);
		//$this->SetFont('','B');
		$this->SetFont('Times','',9);
		$this->Cell($this->vert);

		$w=$this->anch;
		for($i=0;$i<count($this->enca);$i++)
		{
			$this->Cell($w[$i],7,$this->enca[$i],1,0,$this->just[$i],1);
		}
		//Salto de línea
		$this->Ln(7);
	}

	//Pie de página
	function Footer()
	{
		//Posición: a 1,5 cm del final
		$this->SetY(-15);
		//Arial italic 8
		$this->SetFont('Arial','I',8);
		//Número de página
		$this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
	}

	function Row($data)
	{
		$this->SetFont('Arial','B',16);
		// Calculo el alto de la Fila
		$nb=0;
		for($i=0;$i<count($data);$i++)
		{
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		}
		$h=6*$nb*5;
		// Primer salto de pagina si es necesario
		$this->CheckPageBreak($h);
		// Dibujo la celda de la fila
		$this->Cell($this->vert);

		for($i=0;$i<count($data);$i++)
		{
			$w=$this->widths[$i];
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
			// Salvo la posicion actual
			$x=$this->GetX();
			$y=$this->GetY();
			// Dibujo del borde
			$this->Rect($x,$y,$w,$h);
			if ($i == 2) {
				$this->MultiCell($w,6,$this->codabar($x+4,$y+3,$data[$i]),0,$a);
				//				$this->MultiCell($w,6,$this->Code39($x+4,$y+3,$data[$i],1.2,10),0,$a);
			} else {
				$this->MultiCell($w,20,$data[$i],0,$a);
			}
			// Imprimo el texto de la celda
			//			$this->MultiCell($w,6,$data[$i],0,$a);
			// Me posiciono a la derecha de la celda
			$this->SetXY($x+$w,$y);
		}
		// Voy a la siguiente linea
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//If the height h would cause an overflow, add a new page immediately
		if($this->GetY()+$h>$this->PageBreakTrigger)
		$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Computes the number of lines a MultiCell of width w will take
		$cw=&$this->CurrentFont['cw'];
		if($w==0)
		$w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n")
		$nb--;
		$sep=-1;
		$i=0;
		$j=0;
		$l=0;
		$nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n")
			{
				$i++;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
				continue;
			}
			if($c==' ')
			$sep=$i;
			$l+=$cw[$c];
			if($l>$wmax)
			{
				if($sep==-1)
				{
					if($i==$j)
					$i++;
				}
				else
				$i=$sep+1;
				$sep=-1;
				$j=$i;
				$l=0;
				$nl++;
			}
			else
			$i++;
		}
		return $nl;
	}

	//Tabla coloreada
	function FancyTable($header,$data,$ancho,$just)
	{
		//Colores, ancho de línea y fuente en negrita
		$this->SetDrawColor(0,0,255);
		//Cabecera
		$w=$ancho;
		//Restauración de colores y fuentes
		$this->SetFillColor(224,235,255);
		$this->SetTextColor(0);
		$this->SetFont('Times','',9);
		//Datos
		$fill=0;

		foreach($data as $row)
		{
			$this->Row($row);
		}
		$intNumerodeItems = count($data);
		$strTotal = 'Total Items : '.$intNumerodeItems;
		$this->ln(3);
		$x=$this->GetX();
		$y=$this->GetY();
		$this->Cell(10,10,$strTotal);

	}
	//}


	// Funciones para la generacion de codigos de barra
	function Code39($xpos, $ypos, $code, $baseline=0.5, $height=5)
	{

		$wide = $baseline;
		$narrow = $baseline / 3 ;
		$gap = $narrow;

		$barChar['0'] = 'nnnwwnwnn';
		$barChar['1'] = 'wnnwnnnnw';
		$barChar['2'] = 'nnwwnnnnw';
		$barChar['3'] = 'wnwwnnnnn';
		$barChar['4'] = 'nnnwwnnnw';
		$barChar['5'] = 'wnnwwnnnn';
		$barChar['6'] = 'nnwwwnnnn';
		$barChar['7'] = 'nnnwnnwnw';
		$barChar['8'] = 'wnnwnnwnn';
		$barChar['9'] = 'nnwwnnwnn';
		$barChar['A'] = 'wnnnnwnnw';
		$barChar['B'] = 'nnwnnwnnw';
		$barChar['C'] = 'wnwnnwnnn';
		$barChar['D'] = 'nnnnwwnnw';
		$barChar['E'] = 'wnnnwwnnn';
		$barChar['F'] = 'nnwnwwnnn';
		$barChar['G'] = 'nnnnnwwnw';
		$barChar['H'] = 'wnnnnwwnn';
		$barChar['I'] = 'nnwnnwwnn';
		$barChar['J'] = 'nnnnwwwnn';
		$barChar['K'] = 'wnnnnnnww';
		$barChar['L'] = 'nnwnnnnww';
		$barChar['M'] = 'wnwnnnnwn';
		$barChar['N'] = 'nnnnwnnww';
		$barChar['O'] = 'wnnnwnnwn';
		$barChar['P'] = 'nnwnwnnwn';
		$barChar['Q'] = 'nnnnnnwww';
		$barChar['R'] = 'wnnnnnwwn';
		$barChar['S'] = 'nnwnnnwwn';
		$barChar['T'] = 'nnnnwnwwn';
		$barChar['U'] = 'wwnnnnnnw';
		$barChar['V'] = 'nwwnnnnnw';
		$barChar['W'] = 'wwwnnnnnn';
		$barChar['X'] = 'nwnnwnnnw';
		$barChar['Y'] = 'wwnnwnnnn';
		$barChar['Z'] = 'nwwnwnnnn';
		$barChar['-'] = 'nwnnnnwnw';
		$barChar['.'] = 'wwnnnnwnn';
		$barChar[' '] = 'nwwnnnwnn';
		$barChar['*'] = 'nwnnwnwnn';
		$barChar['$'] = 'nwnwnwnnn';
		$barChar['/'] = 'nwnwnnnwn';
		$barChar['+'] = 'nwnnnwnwn';
		$barChar['%'] = 'nnnwnwnwn';

		$this->SetFont('Arial','',10);
		$this->Text($xpos, $ypos + $height + 4, $code);
		$this->SetFillColor(0);

		$code = '*'.strtoupper($code).'*';
		for($i=0; $i<strlen($code); $i++){
			$char = $code{$i};
			if(!isset($barChar[$char])){
				$this->Error('Invalid character in barcode: '.$char);
			}
			$seq = $barChar[$char];
			for($bar=0; $bar<9; $bar++){
				if($seq{$bar} == 'n'){
					$lineWidth = $narrow;
				}else{
					$lineWidth = $wide;
				}
				if($bar % 2 == 0){
					$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
				}
				$xpos += $lineWidth;
			}
			$xpos += $gap;
		}
	}
	// Fin de la definicion de codigos de barra

	// Clase code_39 para probar
	//class PDF_Code39 extends FPDF {

	function Code_39($x, $y, $code, $ext = true, $cks = false, $w = 0.4, $h = 20, $wide = true) {

		//Display code
		$this->SetFont('Arial', '', 10);
		$this->Text($x, $y+$h+4, $code);

		if($ext)
		{
			//Extended encoding
			$code = $this->encode_code39_ext($code);
		}
		else
		{
			//Convert to upper case
			$code = strtoupper($code);
			//Check validity
			if(!preg_match('|^[0-9A-Z. $/+%-]*$|', $code))
			$this->Error('Invalid barcode value: '.$code);
		}

		//Compute checksum
		if ($cks)
		$code .= $this->checksum_code39($code);

		//Add start and stop characters
		$code = '*'.$code.'*';

		//Conversion tables
		$narrow_encoding = array (
		'0' => '101001101101', '1' => '110100101011', '2' => '101100101011',
		'3' => '110110010101', '4' => '101001101011', '5' => '110100110101',
		'6' => '101100110101', '7' => '101001011011', '8' => '110100101101',
		'9' => '101100101101', 'A' => '110101001011', 'B' => '101101001011',
		'C' => '110110100101', 'D' => '101011001011', 'E' => '110101100101',
		'F' => '101101100101', 'G' => '101010011011', 'H' => '110101001101',
		'I' => '101101001101', 'J' => '101011001101', 'K' => '110101010011',
		'L' => '101101010011', 'M' => '110110101001', 'N' => '101011010011',
		'O' => '110101101001', 'P' => '101101101001', 'Q' => '101010110011',
		'R' => '110101011001', 'S' => '101101011001', 'T' => '101011011001',
		'U' => '110010101011', 'V' => '100110101011', 'W' => '110011010101',
		'X' => '100101101011', 'Y' => '110010110101', 'Z' => '100110110101',
		'-' => '100101011011', '.' => '110010101101', ' ' => '100110101101',
		'*' => '100101101101', '$' => '100100100101', '/' => '100100101001',
		'+' => '100101001001', '%' => '101001001001' );

		$wide_encoding = array (
		'0' => '101000111011101', '1' => '111010001010111', '2' => '101110001010111',
		'3' => '111011100010101', '4' => '101000111010111', '5' => '111010001110101',
		'6' => '101110001110101', '7' => '101000101110111', '8' => '111010001011101',
		'9' => '101110001011101', 'A' => '111010100010111', 'B' => '101110100010111',
		'C' => '111011101000101', 'D' => '101011100010111', 'E' => '111010111000101',
		'F' => '101110111000101', 'G' => '101010001110111', 'H' => '111010100011101',
		'I' => '101110100011101', 'J' => '101011100011101', 'K' => '111010101000111',
		'L' => '101110101000111', 'M' => '111011101010001', 'N' => '101011101000111',
		'O' => '111010111010001', 'P' => '101110111010001', 'Q' => '101010111000111',
		'R' => '111010101110001', 'S' => '101110101110001', 'T' => '101011101110001',
		'U' => '111000101010111', 'V' => '100011101010111', 'W' => '111000111010101',
		'X' => '100010111010111', 'Y' => '111000101110101', 'Z' => '100011101110101',
		'-' => '100010101110111', '.' => '111000101011101', ' ' => '100011101011101',
		'*' => '100010111011101', '$' => '100010001000101', '/' => '100010001010001',
		'+' => '100010100010001', '%' => '101000100010001');

		$encoding = $wide ? $wide_encoding : $narrow_encoding;

		//Inter-character spacing
		$gap = ($w > 0.29) ? '00' : '0';

		//Convert to bars
		$encode = '';
		for ($i = 0; $i< strlen($code); $i++)
		$encode .= $encoding[$code{$i}].$gap;

		//Draw bars
		$this->draw_code39($encode, $x, $y, $w, $h);
	}

	function checksum_code39($code) {

		//Compute the modulo 43 checksum

		$chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
		'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
		'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
		'W', 'X', 'Y', 'Z', '-', '.', ' ', '$', '/', '+', '%');
		$sum = 0;
		for ($i=0 ; $i<strlen($code); $i++) {
			$a = array_keys($chars, $code{$i});
			$sum += $a[0];
		}
		$r = $sum % 43;
		return $chars[$r];
	}

	function encode_code39_ext($code) {

		//Encode characters in extended mode

		$encode = array(
		chr(0) => '%U', chr(1) => '$A', chr(2) => '$B', chr(3) => '$C',
		chr(4) => '$D', chr(5) => '$E', chr(6) => '$F', chr(7) => '$G',
		chr(8) => '$H', chr(9) => '$I', chr(10) => '$J', chr(11) => '£K',
		chr(12) => '$L', chr(13) => '$M', chr(14) => '$N', chr(15) => '$O',
		chr(16) => '$P', chr(17) => '$Q', chr(18) => '$R', chr(19) => '$S',
		chr(20) => '$T', chr(21) => '$U', chr(22) => '$V', chr(23) => '$W',
		chr(24) => '$X', chr(25) => '$Y', chr(26) => '$Z', chr(27) => '%A',
		chr(28) => '%B', chr(29) => '%C', chr(30) => '%D', chr(31) => '%E',
		chr(32) => ' ', chr(33) => '/A', chr(34) => '/B', chr(35) => '/C',
		chr(36) => '/D', chr(37) => '/E', chr(38) => '/F', chr(39) => '/G',
		chr(40) => '/H', chr(41) => '/I', chr(42) => '/J', chr(43) => '/K',
		chr(44) => '/L', chr(45) => '-', chr(46) => '.', chr(47) => '/O',
		chr(48) => '0', chr(49) => '1', chr(50) => '2', chr(51) => '3',
		chr(52) => '4', chr(53) => '5', chr(54) => '6', chr(55) => '7',
		chr(56) => '8', chr(57) => '9', chr(58) => '/Z', chr(59) => '%F',
		chr(60) => '%G', chr(61) => '%H', chr(62) => '%I', chr(63) => '%J',
		chr(64) => '%V', chr(65) => 'A', chr(66) => 'B', chr(67) => 'C',
		chr(68) => 'D', chr(69) => 'E', chr(70) => 'F', chr(71) => 'G',
		chr(72) => 'H', chr(73) => 'I', chr(74) => 'J', chr(75) => 'K',
		chr(76) => 'L', chr(77) => 'M', chr(78) => 'N', chr(79) => 'O',
		chr(80) => 'P', chr(81) => 'Q', chr(82) => 'R', chr(83) => 'S',
		chr(84) => 'T', chr(85) => 'U', chr(86) => 'V', chr(87) => 'W',
		chr(88) => 'X', chr(89) => 'Y', chr(90) => 'Z', chr(91) => '%K',
		chr(92) => '%L', chr(93) => '%M', chr(94) => '%N', chr(95) => '%O',
		chr(96) => '%W', chr(97) => '+A', chr(98) => '+B', chr(99) => '+C',
		chr(100) => '+D', chr(101) => '+E', chr(102) => '+F', chr(103) => '+G',
		chr(104) => '+H', chr(105) => '+I', chr(106) => '+J', chr(107) => '+K',
		chr(108) => '+L', chr(109) => '+M', chr(110) => '+N', chr(111) => '+O',
		chr(112) => '+P', chr(113) => '+Q', chr(114) => '+R', chr(115) => '+S',
		chr(116) => '+T', chr(117) => '+U', chr(118) => '+V', chr(119) => '+W',
		chr(120) => '+X', chr(121) => '+Y', chr(122) => '+Z', chr(123) => '%P',
		chr(124) => '%Q', chr(125) => '%R', chr(126) => '%S', chr(127) => '%T');

		$code_ext = '';
		for ($i = 0 ; $i<strlen($code); $i++) {
			if (ord($code{$i}) > 127)
			$this->Error('Invalid character: '.$code{$i});
			$code_ext .= $encode[$code{$i}];
		}
		return $code_ext;
	}

	function draw_code39($code, $x, $y, $w, $h){

		//Draw bars
		$this->SetFillColor(0);
		for($i=0; $i<strlen($code); $i++)
		{
			if($code{$i} == '1')
			$this->Rect($x+$i*$w, $y, $w, $h, 'F');
		}
	}
	//}

	//function Codabar ($xpos, $ypos, $code, $start='A',$end='A', $basewidth=0.35, $height=16) {
	function Codabar ($xpos, $ypos, $code, $start='A',$end='A', $basewidth=0.35, $height=5) {
		$barChar = array (
		'0' => array (6.5, 10.4, 6.5, 10.4, 6.5, 24.3, 17.9),
		'1' => array (6.5, 10.4, 6.5, 10.4, 17.9, 24.3, 6.5),
		'2' => array (6.5, 10.0, 6.5, 24.4, 6.5, 10.0, 18.6),
		'3' => array (17.9, 24.3, 6.5, 10.4, 6.5, 10.4, 6.5),
		'4' => array (6.5, 10.4, 17.9, 10.4, 6.5, 24.3, 6.5),
		'5' => array (17.9,    10.4, 6.5, 10.4, 6.5, 24.3, 6.5),
		'6' => array (6.5, 24.3, 6.5, 10.4, 6.5, 10.4, 17.9),
		'7' => array (6.5, 24.3, 6.5, 10.4, 17.9, 10.4, 6.5),
		'8' => array (6.5, 24.3, 17.9, 10.4, 6.5, 10.4, 6.5),
		'9' => array (18.6, 10.0, 6.5, 24.4, 6.5, 10.0, 6.5),
		'$' => array (6.5, 10.0, 18.6, 24.4, 6.5, 10.0, 6.5),
		'-' => array (6.5, 10.0, 6.5, 24.4, 18.6, 10.0, 6.5),
		':' => array (16.7, 9.3, 6.5, 9.3, 16.7, 9.3, 14.7),
		'/' => array (14.7, 9.3, 16.7, 9.3, 6.5, 9.3, 16.7),
		'.' => array (13.6, 10.1, 14.9, 10.1, 17.2, 10.1, 6.5),
		'+' => array (6.5, 10.1, 17.2, 10.1, 14.9, 10.1, 13.6),
		'A' => array (6.5, 8.0, 19.6, 19.4, 6.5, 16.1, 6.5),
		'T' => array (6.5, 8.0, 19.6, 19.4, 6.5, 16.1, 6.5),
		'B' => array (6.5, 16.1, 6.5, 19.4, 6.5, 8.0, 19.6),
		'N' => array (6.5, 16.1, 6.5, 19.4, 6.5, 8.0, 19.6),
		'C' => array (6.5, 8.0, 6.5, 19.4, 6.5, 16.1, 19.6),
		'*' => array (6.5, 8.0, 6.5, 19.4, 6.5, 16.1, 19.6),
		'D' => array (6.5, 8.0, 6.5, 19.4, 19.6, 16.1, 6.5),
		'E' => array (6.5, 8.0, 6.5, 19.4, 19.6, 16.1, 6.5),
		);
		$this->SetFont('Arial','B',8);
		$this->Text($xpos, $ypos + $height + 4, $code);
		$this->SetFillColor(0);
		$code = strtoupper($start.$code.$end);
		for($i=0; $i<strlen($code); $i++){
			$char = $code[$i];
			if(!isset($barChar[$char])){
				$this->Error('Invalid character in barcode: '.$char);
			}
			$seq = $barChar[$char];
			for($bar=0; $bar<7; $bar++){
				//            $lineWidth = $basewidth*$seq[$bar]/6.5;
				$lineWidth = $basewidth*$seq[$bar]/10.5;
				if($bar % 2 == 0){
					$this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
				}
				$xpos += $lineWidth;
			}
			$xpos += $basewidth*10.4/6.5;
		}
	}
	// fin codabar
}
?>
