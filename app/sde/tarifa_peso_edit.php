<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/TarifaPesoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the TarifaPeso class.  It uses the code-generated
 * TarifaPesoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a TarifaPeso columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both tarifa_peso_edit.php AND
 * tarifa_peso_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class TarifaPesoEditForm extends TarifaPesoEditFormBase {
    protected $decPorcIvax;
    protected $decFactIvax;
    protected $intIdxxTari;
    protected $objTariPadr;
    protected $objDatabase;

	// Override Form Event Handlers as Needed
	protected function Form_Run() {
		parent::Form_Run();

		// Security check for ALLOW_REMOTE_ADMIN
		// To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
		QApplication::CheckRemoteAdmin();
	}

    //	protected function Form_Load() {}
	protected function Form_Create() {
		parent::Form_Create();

        $this->intIdxxTari = $_SESSION['IdxxTari'];
        $this->objTariPadr = FacTarifa::Load($this->intIdxxTari);
        $this->objDatabase = FacTarifa::GetDatabase();

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the TarifaPesoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctTarifaPeso = TarifaPesoMetaControl::CreateFromPathInfo($this);

        //$this->decPorcIvax = FacImpuesto::LoadImpuestoVigente('IVA',FechaDeHoy());
        //$this->decFactIvax = 1 + ($this->decPorcIvax / 100);

        //if (!is_null($this->mctTarifaPeso->TarifaPeso->Tarifa->TasaIva)) {
        //    $this->decPorcIvax = $this->mctTarifaPeso->TarifaPeso->Tarifa->TasaIva;
        //    $this->decFactIvax = 1 + ($this->decPorcIvax / 100);
        //}

        // Call MetaControl's methods to create qcontrols based on TarifaPeso's data fields
		$this->lblId = $this->mctTarifaPeso->lblId_Create();

        $this->lstTarifa = $this->mctTarifaPeso->lstTarifa_Create();
        $this->lstTarifa->Width = 200;

        //$this->lstTipo = $this->mctTarifaPeso->lstTipo_Create();
        //$this->lstTipo->Width = 100;

        $this->txtPesoInicial = $this->mctTarifaPeso->txtPesoInicial_Create();
        $this->txtPesoInicial->HtmlAfter = ' Kgs';
        $this->txtPesoInicial->Width = 100;

        $this->txtPesoFinal = $this->mctTarifaPeso->txtPesoFinal_Create();
        $this->txtPesoFinal->HtmlAfter = ' Kgs';
        $this->txtPesoFinal->Width = 100;
        $this->txtPesoFinal->AddAction(new QBlurEvent(), new QAjaxAction('txtPesoFinal_Blur'));

        $this->txtMontoTarifa = $this->mctTarifaPeso->txtMontoTarifa_Create();
        $this->txtMontoTarifa->HtmlAfter = ' Bs';
        $this->txtMontoTarifa->Width = 100;

        //$this->txtPorcentajeFp = $this->mctTarifaPeso->txtPorcentajeFp_Create();
        //$this->txtPorcentajeFp->Name = '% de Franqueo Postal';
        //$this->txtPorcentajeFp->HtmlAfter = ' %';
        //$this->txtPorcentajeFp->Width = 30;

        //$this->txtFranqueoPostal = $this->mctTarifaPeso->txtFranqueoPostal_Create();
        //$this->txtFranqueoPostal->AddAction(new QBlurEvent(), new QAjaxAction('txtFranqueoPostal_Blur'));
        //$this->txtFranqueoPostal->HtmlAfter = ' Bs';
        //$this->txtFranqueoPostal->Width = 100;

        //$this->txtMontoBase = $this->mctTarifaPeso->txtMontoBase_Create();
        //$this->txtMontoBase->Enabled = false;
        //$this->txtMontoBase->ForeColor = 'blue';
        //$this->txtMontoBase->HtmlAfter = ' Bs';
        //$this->txtMontoBase->Width = 100;

        $this->txtPesoInicial->SetFocus();

        if (!$this->mctTarifaPeso->EditMode) {
            if (isset($_SESSION['TariAnte'])) {
                $objTarifa = FacTarifa::Load($_SESSION['TariAnte']);
                $decPesoInci = $objTarifa->PesoInicial;
                $this->txtPesoInicial->Text = $decPesoInci + 0.001;
                $this->txtPesoFinal->Text = $decPesoInci + 1;
                $this->txtMontoTarifa->Text = '';
            }
        }
        //if (!$this->mctTarifaPeso->EditMode) {
        //    $this->txtFranqueoPostal->Text = 0;
        //    if (isset($_SESSION['TipoAnte']) && isset($_SESSION['TariAnte'])) {
        //        $objTarifa = FacTarifa::Load($_SESSION['TariAnte']);
        //
        //        if ($_SESSION['TipoAnte'] == TipoTarifaType::NAC) {
        //            $decPesoInci = $objTarifa->PesoInicial;
        //        } else {
        //            $decPesoInci = $objTarifa->PesoInicialUrbano;
        //        }
        //        $this->txtPesoInicial->Text = $decPesoInci + 0.001;
        //        $this->txtPesoFinal->Text = $decPesoInci + 1;
        //        $this->txtMontoTarifa->Text = '';
        //        // $this->txtPesoFinal->SetFocus();
        //    }
        //}
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctTarifaPeso->TarifaPeso && !isset($_SESSION['DataTarifaPeso'])) {
            $_SESSION['DataTarifaPeso'] = serialize(array($this->mctTarifaPeso->TarifaPeso));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataTarifaPeso']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctTarifaPeso->TarifaPeso->Id) {
                $this->intPosiRegi = $intContRegi;
                break;
            } else {
                $intContRegi++;
            }
        }
    }

    protected function btnLogxCamb_Create() {
        $this->btnLogxCamb = new QButton($this);
        $this->btnLogxCamb->Text = '<i class="fa fa-file-text-o fa-lg"></i> Hist';
        $this->btnLogxCamb->CssClass = 'btn btn-default btn-sm';
        $this->btnLogxCamb->HtmlEntities = false;
        $this->btnLogxCamb->AddAction(new QClickEvent(), new QAjaxAction('btnLogxCamb_Click'));
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('TarifaPeso',$this->mctTarifaPeso->TarifaPeso->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/tarifa_peso_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_peso_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/tarifa_peso_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/tarifa_peso_edit.php/'.$objRegiTabl->Id);
    }

    protected function RedirectToListPage() {
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$this->intIdxxTari);
    }

    protected function btnVolvList_Click() {
        QApplication::Redirect(__SIST__.'/fac_tarifa_edit.php/'.$this->intIdxxTari);
    }

    protected function txtPesoFinal_Blur() {
	    $this->mensaje();
	    $blnTodoOkey = true;
	    //--------------------------------------
        // Se valida el campo del Peso Inicial.
        //--------------------------------------
        if (!strlen($this->txtPesoInicial->Text)) {
	        $blnTodoOkey = false;
            $this->mensaje('El Peso Inicial es requerido para poder otorgar el Porcentaje del Franqueo!');
        }
        //--------------------------------------
        // Se valida el campo del Peso Final.
        //--------------------------------------
        if (!strlen($this->txtPesoFinal->Text)) {
            $blnTodoOkey = false;
            $this->mensaje('El Peso Final es requerido para poder otorgar el Porcentaje del Franqueo!');
        }
        //-----------------------------------------------------------------------------------------------------------
        // Si se supera la Validación de los campos, se procede a asignar el porcentaje de Franqueo correspondiente.
        //-----------------------------------------------------------------------------------------------------------
//        if ($blnTodoOkey) {
//            $this->txtPorcentajeFp->Text = asignarPorcFranqueo($this->txtPesoInicial->Text);
//        }
    }

    //protected function txtFranqueoPostal_Blur() {
    //    $decBaseImpo = $this->txtMontoTarifa->Text - $this->txtFranqueoPostal->Text;
    //    $decMontIvax = $decBaseImpo - ($decBaseImpo / $this->decFactIvax);
    //    $strMontBase = nform(round(strval($decBaseImpo - $decMontIvax),2));
    //    $this->txtMontoBase->Text = $strMontBase;
    //    $this->txtPesoInicial->SetFocus();
    //}

    /*protected function txtFranqueoPostal_Blur() {
        $arrParaBase = array();
        $arrParaBase['MontTari'] = $this->txtMontoTarifa->Text;
        $arrParaBase['FactIvax'] = $this->decFactIvax;
        $arrParaBase['FranPost'] = $this->txtFranqueoPostal->Text;

        $decMontBase = CalcularMontoBaseTarifa($arrParaBase);

        $arrParaIvax = array();
        $arrParaIvax['MontTari'] = $this->txtMontoTarifa->Text;
        $arrParaIvax['FactIvax'] = $this->decFactIvax;
        $arrParaIvax['FranPost'] = $this->txtFranqueoPostal->Text;
        $arrParaIvax['PorcIvax'] = $this->decPorcIvax;

        $decMontIvax = CalcularIvaTarifa($arrParaIvax);

        $decTariSuma = $decMontBase + $this->txtFranqueoPostal->Text + $decMontIvax;
        $decDifeTari = $this->txtMontoTarifa->Text - $decTariSuma;
        if ($decDifeTari > 0) {
            $decNuevBase = $decMontBase + $decDifeTari;
        } else {
            $decNuevBase = $decMontBase;
        }
        $this->txtMontoBase->Text = round(strval($decNuevBase));
    }*/

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctTarifaPeso->TarifaPeso;
		$this->mctTarifaPeso->SaveTarifaPeso();
		if ($this->mctTarifaPeso->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctTarifaPeso->TarifaPeso;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'TarifaPeso';
				$arrLogxCamb['intRefeRegi'] = $this->mctTarifaPeso->TarifaPeso->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctTarifaPeso->TarifaPeso->Tarifa->Descripcion;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_peso_edit.php/'.$this->mctTarifaPeso->TarifaPeso->Id;
				LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'TarifaPeso';
			$arrLogxCamb['intRefeRegi'] = $this->mctTarifaPeso->TarifaPeso->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctTarifaPeso->TarifaPeso->Tarifa->Descripcion;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/tarifa_peso_edit.php/'.$this->mctTarifaPeso->TarifaPeso->Id;
			LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
        }
        if (!is_null($this->lstTarifa->SelectedValue)) {
            $_SESSION['TariAnte'] = $this->lstTarifa->SelectedValue;
        } else {
            unset($_SESSION['TariAnte']);
        }
        if (!is_null($this->lstTipo->SelectedValue)) {
            $_SESSION['TipoAnte'] = $this->lstTipo->SelectedValue;
        } else {
            unset($_SESSION['TipoAnte']);
        }
        $this->mctTarifaPeso->TarifaPeso->Tarifa->actualizarPesosLimite();
        $this->btnNuevRegi->Visible = true;
    }

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctTarifaPeso->TablasRelacionadasTarifaPeso();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctTarifaPeso->DeleteTarifaPeso();
            $arrLogxCamb['strNombTabl'] = 'TarifaPeso';
            $arrLogxCamb['intRefeRegi'] = $this->mctTarifaPeso->TarifaPeso->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctTarifaPeso->TarifaPeso->Tarifa->Descripcion;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->mctTarifaPeso->TarifaPeso->Tarifa->actualizarPesosLimite();
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// tarifa_peso_edit.tpl.php as the included HTML template file
TarifaPesoEditForm::Run('TarifaPesoEditForm');
?>