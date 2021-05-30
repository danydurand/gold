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

    protected function Form_Create() {
        parent::Form_Create();

        $this->lblTituForm->Text = 'Establecer Ubicacion';

        $this->objDefaultWaitIcon = new QWaitIcon($this);
        $this->btnSave->Text = '<i class="fa fa-check fa-lg"></i> Guardar';

        $this->lstSucuDisp_Create();
        $this->lstReceSucu_Create();
        $this->lstCajaRece_Create();

    }

    //--------------------------------
    // Aqui se crean los objetos
    //--------------------------------

    protected function lstSucuDisp_Create() {
        $this->lstSucuDisp = new QListBox($this);
        $this->lstSucuDisp->Name = "Sucursal";
        $this->lstSucuDisp->Width = 250;
        $arrSucuDisp = Sucursales::LoadSucursalesActivas('Nombre');
        $intCantSucu = count($arrSucuDisp);
        $this->lstSucuDisp->AddItem('- Seleccione Una - ('.$intCantSucu.')',null);
        foreach ($arrSucuDisp as $objSucuDisp) {
            $this->lstSucuDisp->AddItem($objSucuDisp->__toString(), $objSucuDisp->Id);
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

    //---------------------------------------
    // Acciones asociadas a los objetos
    //---------------------------------------

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
                $blnSeleRegi = $intCantRece == 1 ? true : false;
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
                $blnSeleRegi = $intCantCaja == 1 ? true : false;
                $this->lstCajaRece->AddItem($objCajaRece->__toString(), $objCajaRece->Id, $blnSeleRegi);
            }
        }
    }

    protected function btnSave_Click() {
        $_SESSION['SucursalId']   = $this->lstSucuDisp->SelectedValue;
        $_SESSION['ReceptoriaId'] = $this->lstReceSucu->SelectedValue;
        $_SESSION['CajaId']       = $this->lstCajaRece->SelectedValue;
        $this->success('Ubicacion Establecida !!!');
    }



}

EstablecerUbicacion::Run('EstablecerUbicacion');
?>
