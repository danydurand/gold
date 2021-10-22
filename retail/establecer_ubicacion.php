<?php
//-----------------------------------------------------------------------------
// Programa      : establecer_ubicacion.php
// Migrado por   : Daniel Durand
// Fecha Migr.   : 30/05/2021
// Descripcion   : Este programa, permite al Usuario establecer la Sucursal,
//                 Receptoria y Caja en la que se encuenta
//------------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class EstablecerUbicacion extends FormularioBaseKaizen {
    protected $lstSucuDisp;
    protected $lstReceSucu;
    protected $lstCajaRece;
    protected $blnEditMode = false;
    protected $objUbicUsua;

    protected $objTasaDola;
    protected $txtTasaDola;
    protected $objTasaEuro;
    protected $txtTasaEuro;

    protected function Form_Create() {
        parent::Form_Create();

        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->btnSave->Text = '<i class="fa fa-check fa-lg"></i> Guardar';

        $this->objUbicUsua = Parametros::BuscarParametro('UBICACION',$this->objUsuario->LogiUsua,'TODO');
        if ($this->objUbicUsua instanceof Parametros) {
            $this->blnEditMode = true;
            t('Modo edicion');
            $this->lblTituForm->Text = 'Confirmar Ubicacion';
            $this->info('Presione <b>Guardar</b> para Confirmar su Ubicación');
        } else {
            $this->objUbicUsua = new Parametros();
            $this->objUbicUsua->Indice = 'UBICACION';
            $this->objUbicUsua->Codigo = $this->objUsuario->LogiUsua;
            $this->objUbicUsua->Descripcion = 'UBICACION DEL USUARIO: '.$this->objUsuario->LogiUsua;
            t('Modo insercion');
            $this->lblTituForm->Text = 'Establecer Ubicacion';
        }

        $this->lstSucuDisp_Create();
        $this->lstReceSucu_Create();
        $this->lstCajaRece_Create();
        $this->txtTasaDola_Create();
        $this->txtTasaEuro_Create();


        if ($this->blnEditMode) {
            $this->lstSucuDisp_Change();
            $this->lstReceSucu_Change();
        }

    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function lstSucuDisp_Create() {
        /* @var $objSucuRece Sucursales */
        $this->lstSucuDisp = new QListBox($this);
        $this->lstSucuDisp->Name = "Sucursal";
        $this->lstSucuDisp->Width = 250;
        $arrSucuRece = Sucursales::LoadSucursalesActivas('Nombre');
        $arrSucuDisp = [];
        foreach ($arrSucuRece as $objSucuRece) {
            if ($objSucuRece->CountCountersAsSucursal() > 0) {
                $arrSucuDisp[] = $objSucuRece;
            }
        }
        $blnSeleRegi = false;
        $intCantSucu = count($arrSucuDisp);
        $this->lstSucuDisp->AddItem('- Seleccione Una - ('.$intCantSucu.')',null);
        foreach ($arrSucuDisp as $objSucuDisp) {
            $blnSeleRegi = $objSucuDisp->Id == (int)$this->objUbicUsua->Valor1 ? true : false;
            if (!$blnSeleRegi) {
                $blnSeleRegi = $intCantSucu == 1 ? true : false;
            }
            $this->lstSucuDisp->AddItem($objSucuDisp->__toString(), $objSucuDisp->Id, $blnSeleRegi);
        }
        $this->lstSucuDisp->Width = 250;
        $this->lstSucuDisp->Required = true;
        $this->lstSucuDisp->AddAction(new QChangeEvent(), new QAjaxAction('lstSucuDisp_Change'));
    }


    protected function lstReceSucu_Create() {
        $this->lstReceSucu = new QListBox($this);
        $this->lstReceSucu->Name = "Receptoria";
        $this->lstReceSucu->Width = 250;
        $this->lstReceSucu->Required = true;
        $this->lstReceSucu->AddItem('- Seleccione Una - ',null);
        $this->lstReceSucu->AddAction(new QChangeEvent(), new QAjaxAction('lstReceSucu_Change'));
    }

    protected function lstCajaRece_Create() {
        $this->lstCajaRece = new QListBox($this);
        $this->lstCajaRece->Name = "Caja";
        $this->lstCajaRece->Width = 250;
        $this->lstCajaRece->Required = true;
        $this->lstCajaRece->AddItem('- Seleccione Una - ',null);
    }

    protected function txtTasaDola_Create() {
        $this->txtTasaDola = new QFloatTextBox($this);
        $this->txtTasaDola->Name = 'Tasa Dolar';
        $this->txtTasaDola->Width = 100;
        $this->txtTasaDola->Required = true;
        $this->objTasaDola = Tasas::UltimaTasa('USD');
        if ($this->objTasaDola) {
            $this->txtTasaDola->Text = $this->objTasaDola->Tasa;
            $this->txtTasaDola->HtmlAfter = '<span class="texto"> (del '.$this->objTasaDola->Fecha->__toString("DD/MM/YYYY hh:mm:ss").')</span>';
        }
    }

    protected function txtTasaEuro_Create() {
        $this->txtTasaEuro = new QFloatTextBox($this);
        $this->txtTasaEuro->Name = 'Tasa Euro';
        $this->txtTasaEuro->Width = 100;
        $this->txtTasaEuro->Required = true;
        $this->objTasaEuro = Tasas::UltimaTasa('EUR');
        if ($this->objTasaEuro) {
            $this->txtTasaEuro->Text = $this->objTasaEuro->Tasa;
            $this->txtTasaEuro->HtmlAfter = '<span class="texto"> (del '.$this->objTasaEuro->Fecha->__toString("DD/MM/YYYY hh:mm:ss").')</span>';
        }
    }

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

    protected function btnCancel_Click() {
        if (isset($_SESSION['PagiBack'])) {
            $strPagiReto = $_SESSION['PagiBack'];
        } else {
            $objUltiAcce = PilaAcceso::Pop('D');
            $strPagiReto = $objUltiAcce->__toString();
            $strPagiReto = str_replace('../','',$strPagiReto);
            //t('Pagina de Retorno: '.$strPagiReto);
        }
        QApplication::Redirect(__SIST__.'/'.$strPagiReto);
    }

    protected function lstSucuDisp_Change() {
        $intIdxxSucu = $this->lstSucuDisp->SelectedValue;
        if (!is_null($intIdxxSucu)) {
            $this->lstCajaRece->RemoveAllItems();
            $this->lstCajaRece->AddItem('- Seleccione Una - ',null);
            $this->lstReceSucu->RemoveAllItems();
            $arrReceSucu = Counter::LoadArrayBySucursalId($intIdxxSucu);
            $intCantRece = count($arrReceSucu);
            $this->lstReceSucu->AddItem('- Seleccione Una - ('.$intCantRece.')',null);
            foreach ($arrReceSucu as $objReceSucu) {
                if ($this->blnEditMode) {
                    $blnSeleRegi = $objReceSucu->Id == (int)$this->objUbicUsua->Valor2 ? true : false;
                } else {
                    $blnSeleRegi = $intCantRece == 1 ? true : false;
                }
                $this->lstReceSucu->AddItem($objReceSucu->__toString(), $objReceSucu->Id, $blnSeleRegi);
                if ($blnSeleRegi) {
                    $this->lstReceSucu_Change();
                }
            }
        }
    }

    protected function lstReceSucu_Change() {
        $intIdxxRece = $this->lstReceSucu->SelectedValue;
        if (!is_null($intIdxxRece)) {
            $this->lstCajaRece->RemoveAllItems();
            $arrCajaRece = Caja::LoadArrayByCounterId($intIdxxRece);
            $intCantCaja = count($arrCajaRece);
            $this->lstCajaRece->AddItem('- Seleccione Una - ('.$intCantCaja.')',null);
            foreach ($arrCajaRece as $objCajaRece) {
                if ($this->blnEditMode) {
                    $blnSeleRegi = $objCajaRece->Id == (int)$this->objUbicUsua->Valor3 ? true : false;
                } else {
                    $blnSeleRegi = $intCantCaja == 1 ? true : false;
                }
                $this->lstCajaRece->AddItem($objCajaRece->__toString(), $objCajaRece->Id, $blnSeleRegi);
            }
        }
    }

    protected function btnSave_Click() {
        $_SESSION['SucursalId']   = $this->lstSucuDisp->SelectedValue;
        $_SESSION['ReceptoriaId'] = $this->lstReceSucu->SelectedValue;
        $_SESSION['CajaId']       = $this->lstCajaRece->SelectedValue;
        //-----------------------------------------------------------------------------------
        // La Ubicacion del Usuario se guarda en la tabla parametros para futuras ocasiones
        //-----------------------------------------------------------------------------------
        try {
            $this->objUbicUsua->Valor1 = $this->lstSucuDisp->SelectedValue;
            $this->objUbicUsua->Valor2 = $this->lstReceSucu->SelectedValue;
            $this->objUbicUsua->Valor3 = $this->lstCajaRece->SelectedValue;
            $this->objUbicUsua->Save();
        } catch (Exception $e) {
            t('Error Estableciendo la Ubicacion del Usuario: '.$e->getMessage());
            $this->danger($e->getMessage());
        }
        //------------------------------------
        // Las Tasas de Cambio se actualizan
        //------------------------------------
        if ($this->objTasaDola->Tasa != $this->txtTasaDola->Text) {
            $objMoneDola = Divisas::LoadByCodigo('USD');
            try {
                $objNuevDola = new Tasas();
                $objNuevDola->DivisaId  = $objMoneDola->Id;
                $objNuevDola->Tasa      = $this->txtTasaDola->Text;
                $objNuevDola->CreatedAt = new QDateTime(QDateTime::Now());
                $objNuevDola->CreatedBy = $this->objUsuario->CodiUsua;
                $objNuevDola->Save();
                $objNuevDola->logDeCambios('Cread@');
                $this->txtTasaDola->HtmlAfter = '<span class="texto"> (del '.$objNuevDola->CreatedAt->__toString("DD/MM/YYYY hh:mm:ss").')</span>';
            } catch (Exception $e) {
                $this->danger('Error Dolar: '.$e->getMessage());
            }
        }
        if ($this->objTasaEuro->Tasa != $this->txtTasaEuro->Text) {
            $objMoneEuro = Divisas::LoadByCodigo('EUR');
            try {
                $objNuevEuro = new Tasas();
                $objNuevEuro->DivisaId  = $objMoneEuro->Id;
                $objNuevEuro->Tasa      = $this->txtTasaEuro->Text;
                $objNuevEuro->CreatedAt = new QDateTime(QDateTime::Now());
                $objNuevEuro->CreatedBy = $this->objUsuario->CodiUsua;
                $objNuevEuro->Save();
                $objNuevEuro->logDeCambios('Cread@');
                $this->txtTasaDola->HtmlAfter = '<span class="texto"> (del '.$objNuevEuro->CreatedAt->__toString("DD/MM/YYYY hh:mm:ss").')</span>';
            } catch (Exception $e) {
                $this->danger('Error Euro: '.$e->getMessage());
            }
        }
        $_SESSION['TasaDola'] = $this->txtTasaDola->Text;
        $_SESSION['TasaEuro'] = $this->txtTasaEuro->Text;

        $this->success('Ubicacion y Tasas de Cambio Establecidas !!!');
    }

    protected function Form_Validate() {
        if (!is_numeric($this->txtTasaDola->Text)) {
            $this->danger('La Tasa de Cambio del Dolar, debe ser un número');
            return false;
        }
        if (!is_numeric($this->txtTasaEuro->Text)) {
            $this->danger('La Tasa de Cambio del Euro, debe ser un número');
            return false;
        }
        return true;
    }

}

EstablecerUbicacion::Run('EstablecerUbicacion');
?>
