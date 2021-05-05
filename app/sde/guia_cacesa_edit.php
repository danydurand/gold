<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/GuiaCacesaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the GuiaCacesa class.  It uses the code-generated
 * GuiaCacesaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a GuiaCacesa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both guia_cacesa_edit.php AND
 * guia_cacesa_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class GuiaCacesaEditForm extends GuiaCacesaEditFormBase {
    
    protected $lblDestGuia;
    protected $lstSucuDest;
    protected $chkAsigDest;
    protected $lblOtroDestino;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the GuiaCacesaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctGuiaCacesa = GuiaCacesaMetaControl::CreateFromPathInfo($this);

        $this->lblTituForm->Text = 'Guia' . ' - ' . $this->mctGuiaCacesa->TitleVerb;
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

        $this->btnNuevRegi->Visible = false;

		// Call MetaControl's methods to create qcontrols based on GuiaCacesa's data fields
		$this->calFechCarg = $this->mctGuiaCacesa->lblFechCarg_Create();
		$this->calFechCarg->Name = 'Fecha';

		$this->txtNumeGuia = $this->mctGuiaCacesa->lblNumeGuia_Create();
		$this->txtNumeGuia->Name = 'Guía Gold';

		$this->txtGuiaExte = $this->mctGuiaCacesa->lblGuiaExte_Create();
		$this->txtGuiaExte->Name = 'Guía Cliente';

		$this->txtOrigGuia = $this->mctGuiaCacesa->lblOrigGuia_Create();
		$this->txtOrigGuia->Name = 'Origen';

		$this->txtDestGuia = $this->mctGuiaCacesa->txtDestGuia_Create();

        $this->lblDestGuia = $this->mctGuiaCacesa->lblDestGuia_Create();
		$this->lblDestGuia->Name = 'Destino';

        $this->txtOtroDestino = $this->mctGuiaCacesa->txtOtroDestino_Create();

        $this->lblOtroDestino = $this->mctGuiaCacesa->lblOtroDestino_Create();
        $this->lblOtroDestino->Name = 'Destino actual';

        $this->lstSucuDest_Create();
        $this->chkAsigDest_Create();
        $this->btnDestGuia_Validate();

        $this->txtNombRemi = $this->mctGuiaCacesa->lblNombRemi_Create();
        $this->txtNombRemi->Name = 'Remitente';

        $this->txtNombDest = $this->mctGuiaCacesa->txtNombDest_Create();
        $this->txtNombDest->Name = 'Destinatario';
        $this->txtNombDest->Width = 246;

        $this->txtDireDest = $this->mctGuiaCacesa->txtDireDest_Create();
        $this->txtDireDest->Name = 'Dirección del Destinatario';
        $this->txtDireDest->TextMode = QTextMode::MultiLine;
        $this->txtDireDest->Width = 246;
        $this->txtDireDest->Rows = 4;

        $this->txtTeleDest = $this->mctGuiaCacesa->txtTeleDest_Create();
        $this->txtTeleDest->Name = 'Teléfono(s) del Destinatario';
        $this->txtTeleDest->Width = 245;

        $this->txtDescCont = $this->mctGuiaCacesa->txtDescCont_Create();
        $this->txtDescCont->Name = 'Descripción del Contenido';
        $this->txtDescCont->TextMode = QTextMode::MultiLine;
        $this->txtDescCont->Width = 246;
        $this->txtDescCont->Rows = 3;

        $this->txtCantPiez = $this->mctGuiaCacesa->txtCantPiez_Create();
        $this->txtCantPiez->Width = 40;

        $this->txtPesoGuia = $this->mctGuiaCacesa->txtPesoGuia_Create();
        $this->txtPesoGuia->Width = 50;

        $this->chkAjustar = $this->mctGuiaCacesa->chkAjustar_Create();

		$this->txtObservacion = $this->mctGuiaCacesa->lblObservacion_Create();
		$this->txtObservacion->Width = 246;

        if (strlen($this->txtObservacion->Text) > 0) {
            if (!$this->chkAjustar->Checked) {
                $this->success('Esta Guía ya no requiere ajustes !');
            } else {
                $this->danger(utf8_encode($this->txtObservacion->Text));
            }
        }
	}

	//----------------------------
	// Aquí se Crean los Objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctGuiaCacesa->GuiaCacesa && !isset($_SESSION['DataGuiaCacesa'])) {
            $_SESSION['DataGuiaCacesa'] = serialize(array($this->mctGuiaCacesa->GuiaCacesa));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataGuiaCacesa']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctGuiaCacesa->GuiaCacesa->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('GuiaCacesa',$this->mctGuiaCacesa->GuiaCacesa->Id);
    }

    protected function lstSucuDest_Create() {
        $this->lstSucuDest = new QListBox($this);
        $this->lstSucuDest->Name = QApplication::Translate('Sucursal Válida');
        $this->lstSucuDest->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->CargarDestinos();
        $this->lstSucuDest->Width = 200;
    }

    protected function chkAsigDest_Create() {
        $this->chkAsigDest = new QCheckBox($this);
        $this->chkAsigDest->Name = QApplication::Translate('Desea que el Destino Actual quede asociado a la Sucursal seleccionada?');
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos 
	//-----------------------------------

    protected function CargarDestinos() {
	    //$objClauOrde   = QQ::Clause();
	    //$objClauOrde[] = QQ::
        foreach (Sucursales::LoadAll() as $objSucursal) {
            //if ($objSucursal->EsAlmacen == SinoType::NO) {
                $this->lstSucuDest->AddItem($objSucursal->__toString(),$objSucursal->Iata);
            //}
        }
    }

    protected function btnDestGuia_Validate() {
        if (strlen($this->txtOtroDestino->Text) > 0) {
            $this->lblOtroDestino->Visible = true;
            $this->lstSucuDest->Visible = true;
            $this->chkAsigDest->Visible = true;
            $this->lblDestGuia->Visible = false;
        } else {
            $this->lblOtroDestino->Visible = false;
            $this->lstSucuDest->Visible = false;
            $this->chkAsigDest->Visible = false;
            $this->lblDestGuia->Visible = true;
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/guia_cacesa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/guia_cacesa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/guia_cacesa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/guia_cacesa_edit.php/'.$objRegiTabl->Id);
    }


    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //------------------------------------------------------------------
        // Si se ha seleccionado una Sucursal, se asigna la misma a la guia
        //------------------------------------------------------------------
        if ($this->lstSucuDest->SelectedValue) {
            $this->txtDestGuia->Text = $this->lstSucuDest->SelectedValue;
            $this->txtOtroDestino->Text = '';
        }
        if ($this->VerificarDatos()) {
            //--------------------------------------------
            // Se clona el objeto para verificar cambios
            //--------------------------------------------
            $objRegiViej = clone $this->mctGuiaCacesa->GuiaCacesa;
            $this->chkAjustar->Checked = false;
            $this->mctGuiaCacesa->GuiaCacesa->Observacion = '';
            $this->mctGuiaCacesa->GuiaCacesa->Ajustar = SinoType::NO;
            $this->mctGuiaCacesa->SaveGuiaCacesa();
            if ($this->mctGuiaCacesa->EditMode) {
                $objNotaEntr = $this->mctGuiaCacesa->GuiaCacesa->NotaEntrega;
                $objNotaEntr->PorCorregir -= 1;
                $objNotaEntr->PorProcesar  = $objNotaEntr->Cargadas - $objNotaEntr->PorCorregir;
                $objNotaEntr->Save();
                //---------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia
                // de algun cambio en algun dato
                //---------------------------------------------------------------------
                $objRegiNuev = $this->mctGuiaCacesa->GuiaCacesa;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //------------------------------------------
                    // En caso de que el objeto haya cambiado
                    //------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'GuiaCacesa';
                    $arrLogxCamb['intRefeRegi'] = $this->mctGuiaCacesa->GuiaCacesa->Id;
                    $arrLogxCamb['strNombRegi'] = 'Guia Importada ('.$this->mctGuiaCacesa->GuiaCacesa->NumeGuia.') del Cliente '.$this->mctGuiaCacesa->GuiaCacesa->Cliente->NombClie;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guia_cacesa_edit.php/'.$this->mctGuiaCacesa->GuiaCacesa->Id;
                    LogDeCambios($arrLogxCamb);
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'GuiaCacesa';
                $arrLogxCamb['intRefeRegi'] = $this->mctGuiaCacesa->GuiaCacesa->Id;
                $arrLogxCamb['strNombRegi'] = 'Guia Importada ('.$this->mctGuiaCacesa->GuiaCacesa->NumeGuia.') del Cliente '.$this->mctGuiaCacesa->GuiaCacesa->Cliente->NombClie;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/guia_cacesa_edit.php/'.$this->mctGuiaCacesa->GuiaCacesa->Id;
                LogDeCambios($arrLogxCamb);
            }
            $this->success('Transacción Exitosa !!!');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctGuiaCacesa->TablasRelacionadasGuiaCacesa();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctGuiaCacesa->DeleteGuiaCacesa();
            $arrLogxCamb['strNombTabl'] = 'GuiaCacesa';
            $arrLogxCamb['intRefeRegi'] = $this->mctGuiaCacesa->GuiaCacesa->Id;
            $arrLogxCamb['strNombRegi'] = 'Guia Importada ('.$this->mctGuiaCacesa->GuiaCacesa->NumeGuia.') del Cliente '.$this->mctGuiaCacesa->GuiaCacesa->Cliente->NombClie;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }

    //------------------------------
    // Otras Acciones del Programa
    //------------------------------

    protected function VerificarDatos() {
        if (strlen($this->txtOtroDestino->Text) > 0) {
            $this->danger('El destino no es valido !!!');
            return false;
        }
        if (strlen($this->txtNombDest->Text) == 0) {
            $this->danger('El nombre del destinatario es requerido !!!');
            return false;
        }
        if (strlen($this->txtDireDest->Text) == 0) {
            $this->danger('La direccion del destinatario es requerida !!!');
            return false;
        }
        if (strlen($this->txtDescCont->Text) == 0) {
            $this->danger('La descripcion del contenido de la guia es requerida !!!');
            return false;
        }
        if ((strlen($this->txtCantPiez->Text) == 0) || ($this->txtCantPiez->Text == 0)) {
            $this->danger('La cantidad de piezas es requerida !!!');
            return false;
        }
        if ((strlen($this->txtPesoGuia->Text) == 0) || ($this->txtPesoGuia->Text == 0)) {
            $this->danger('El peso de la guia es requerido !!!');
            return false;
        }
        if (strlen($this->txtTeleDest->Text) == 0) {
            $this->danger('El telefono del destinatario es requerido !!!');
            return false;
        }
        $this->txtTeleDest->Text = DejarSoloLosNumeros2($this->txtTeleDest->Text);
        //-------------------------------------------------------------------------------
        // En la cadena del campo, se verifica de que exista más de un teléfono
        // del destinatario, mediante un signo divisor reglamentario entre los
        // mismos. En este caso estos números deben estar separador por un slash ("/").
        //-------------------------------------------------------------------------------
        $arrTeleDest = explode('/',$this->txtTeleDest->Text);
        if ($arrTeleDest !== false) {
            //------------------------------------------------------------------------------------------
            // Si existe más de un número, se iteran uno por uno, validando su formato correspondiente.
            //------------------------------------------------------------------------------------------
            foreach  ($arrTeleDest as $strTeleDest) {
                $strTeleDest = DejarSoloLosNumeros($strTeleDest);
                if (strlen($strTeleDest) > 12) {
                    $this->danger('Cada Nro de Teléfono debe tener max. 12 digitos: Ej: 584121236541');
                    return false;
                }
            }
        } else {
            //-----------------------------------------------------------------------------------------------
            // Se entiende que existe solamente un número del destinatario, y se valida el formato del mismo
            //-----------------------------------------------------------------------------------------------
            if (strlen($this->txtTeleDest->Text) > 11) {
                $this->danger('El Teléfono debe tener 11 caracteres');
                return false;
            }
        }

        return true;
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// guia_cacesa_edit.tpl.php as the included HTML template file
GuiaCacesaEditForm::Run('GuiaCacesaEditForm');
?>