<?php
//------------------------------------------------------------------------------------
// Programa      : ExportarDatos.class.php
// Realizado por : Daniel Durand
// Fecha Elab.   : 28/10/2016
// Descripcion   : Este programa se encarga de exportar datos en distintos formatos
//--------------------------------------------------------------------------------------

class ExportarDatos {
    protected $arrEncaDato;  // Encabezados
    protected $arrDatoExpo;  // Datos a Exportar
    protected $strFormExpo;  // Formato de Exportacion de los datos [HTML|XLS]
    protected $strTituRepo;  // Titulo del Reporte
    protected $blnConxBord;  // Indica si la tabla lleva bordes o no
    protected $strHtmlExpo;  // String de Exportacion de Datos

    public function __construct($objValoRepo) {
        $this->arrEncaDato = $objValoRepo->arrEncaDato;
        $this->arrDatoExpo = $objValoRepo->arrDatoExpo;
        $this->strTituRepo = $objValoRepo->strTituRepo;
        $this->strFormExpo = isset($objValoRepo->strFormExpo) ? $objValoRepo->strFormExpo : 'XLS';
        $this->intConxBord = $objValoRepo->blnConxBord ? 1 : 0;
    }

    protected function Header() {
        switch ($this->strFormExpo) {
            case 'XLS':
                header("Content-type: application/vnd.ms-excel; name='excel' ");
                header("Content-Disposition: filename=".QuitarEspaciosPuntosYComas($this->strTituRepo).".xls");
                header("Pragma: no-cache");
                header("Expires: 0");
                $this->strHtmlExpo = '';
                break;
            case 'HTML':
                $this->strHtmlExpo  = '<!DOCTYPE html>';
                $this->strHtmlExpo .= '<html>';
                $this->strHtmlExpo .= '<head>';
                $this->strHtmlExpo .= '    <meta charset="UTF-8">';
                $this->strHtmlExpo .= '    <title>'.$this->strTituRepo.'</title>';
                $this->strHtmlExpo .= '</head>';
                $this->strHtmlExpo .= '</body>';
                break;
            default:
                $this->strHtmlExpo = '';
        }
    }

    public function Exportar() {
        $this->Header();
        $this->strHtmlExpo .= '<table border="'.$this->intConxBord.'">';
        $this->strHtmlExpo .= '    <thead>';
        foreach ($this->arrEncaDato as $strEncaDato) {
            $this->strHtmlExpo .= '        <th>'.$strEncaDato.'</th>';
        }
        $this->strHtmlExpo .= '    </thead>';
        $this->strHtmlExpo .= '    <tboby>';
        foreach ($this->arrDatoExpo as $arrLineDato) {
            $this->strHtmlExpo .= '       <tr>';
            for ($i = 0; $i < count($arrLineDato); $i++) {
                $this->strHtmlExpo .= '        <td>'.$arrLineDato[$i].'</td>';
            }
            $this->strHtmlExpo .= '       </tr>';
        }
        $this->strHtmlExpo .= '    </tboby>';
        $this->strHtmlExpo .= '</table>';
        $this->Footer();
        return $this->strHtmlExpo;
    }

    protected function Footer() {
        if ($this->strFormExpo == 'HTML') {
            $this->strHtmlExpo .= '</body>';
            $this->strHtmlExpo .= '</html>';
        }
    }

}

?>