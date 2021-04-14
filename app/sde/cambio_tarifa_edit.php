<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/CambioTarifaEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the CambioTarifa class.  It uses the code-generated
 * CambioTarifaMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a CambioTarifa columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cambio_tarifa_edit.php AND
 * cambio_tarifa_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class CambioTarifaEditForm extends CambioTarifaEditFormBase {
    protected $objUsuario;
    protected $btnListCamb;

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
        $this->lblTituForm->Text = 'Cambio de Tarifa';


        $this->objUsuario = unserialize($_SESSION['User']);

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the CambioTarifaMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctCambioTarifa = CambioTarifaMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on CambioTarifa's data fields
		$this->lblId = $this->mctCambioTarifa->lblId_Create();

		$objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
		$this->lstTarifaOrigen = $this->mctCambioTarifa->lstTarifaOrigen_Create(null,null,$objClauOrde);
		$this->lstTarifaOrigen->Name = 'Los Cliente que tienen';
		$this->lstTarifaOrigen->Width = 250;
		$this->lstTarifaOrigen->Required = false;
		$this->lstTarifaOrigen->AddAction(new QChangeEvent(), new QAjaxAction('lstTariOrig_Change'));

        if (!$this->mctCambioTarifa->EditMode) {
            //----------------------------------------------------------------------------------
            // En la Insercion, la lista de Tarifa Destino se construye vacia, puesto que se
            // llena, posteriormente a la eleccion de la Tarifa Origen
            //----------------------------------------------------------------------------------
            $this->lstTarifaDestino = $this->mctCambioTarifa->lstTarifaDestinoVacia_Create();
        } else {
            //-----------------------------------------------------------------------------------
            // En la modificacion, la lista de Tarifa Destino, se llena con cualquiera que no
            // sea la Tarifa Origen
            //-----------------------------------------------------------------------------------
            $objClauWher   = QQ::Clause();
            $objClauWher[] = QQ::NotEqual(QQN::FacTarifa()->Id,$this->mctCambioTarifa->CambioTarifa->TarifaOrigenId);
            $this->lstTarifaDestino = $this->mctCambioTarifa->lstTarifaDestino_Create(null,QQ::AndCondition($objClauWher),$objClauOrde);
        }
		$this->lstTarifaDestino->Name = 'Ahora deben tener';
		$this->lstTarifaDestino->Width = 250;
		$this->lstTarifaDestino->Required = false;
		$this->lstTarifaDestino->AddAction(new QChangeEvent(), new QAjaxAction('lstTariDest_Change'));

		$this->txtExcluir = $this->mctCambioTarifa->txtExcluir_Create();
		$this->txtExcluir->Name = 'A Excepción de';
		$this->txtExcluir->Width = 250;
		$this->txtExcluir->Placeholder = 'Codigos en lineas separada';

		$this->calEjecutarEl = $this->mctCambioTarifa->calEjecutarEl_Create();
		$this->calEjecutarEl->Name = 'Ejecutar el cambio el';

		$this->calRegistradoEl = $this->mctCambioTarifa->calRegistradoEl_Create();
		$this->calRegistradoEl->Enabled = false;
		$this->calRegistradoEl->ForeColor = 'blue';

        $this->txtRegistradoPor = $this->mctCambioTarifa->txtRegistradoPor_Create();
        $this->txtRegistradoPor->Enabled = false;
        $this->txtRegistradoPor->ForeColor = 'blue';

        $this->calEjecutadoEl = $this->mctCambioTarifa->lblEjecutadoEl_Create();

		$this->calHoraEjecucion = $this->mctCambioTarifa->lblHoraEjecucion_Create();

		$this->txtComentario = $this->mctCambioTarifa->lblComentario_Create();
		$this->txtComentario->HtmlEntities = false;

        $this->btnListCamb_Create();

        if (!$this->mctCambioTarifa->EditMode) {
            $this->calRegistradoEl->DateTime = new QDateTime(QDateTime::Now);
            $this->txtRegistradoPor->Text = $this->objUsuario->LogiUsua;
        } else {
            if (!is_null($this->mctCambioTarifa->CambioTarifa->EjecutadoEl)) {
                $this->btnSave->Visible = false;
                $this->btnDelete->Visible = false;
                $this->btnListCamb->Visible = false;
            }
        }

	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function btnListCamb_Create() {
        $this->btnListCamb = new QButtonW($this);
        $this->btnListCamb->Text = TextoIcono('mail-forward','Otros Cambios','','lg');
        $this->btnListCamb->AddAction(new QClickEvent(), new QServerAction('btnListCamb_Click'));
    }

    protected function determinarPosicion() {
        if ($this->mctCambioTarifa->CambioTarifa && !isset($_SESSION['DataCambioTarifa'])) {
            $_SESSION['DataCambioTarifa'] = serialize(array($this->mctCambioTarifa->CambioTarifa));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataCambioTarifa']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctCambioTarifa->CambioTarifa->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('CambioTarifa',$this->mctCambioTarifa->CambioTarifa->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnListCamb_Click() {
        QApplication::Redirect(__SIST__.'/cambio_tarifa_list.php');
    }

    protected function btnVolvList_Click() {
        $objUltiAcce = PilaAcceso::Pop('D');
        QApplication::Redirect(__SIST__."/".$objUltiAcce->__toString());
    }


    protected function lstTariOrig_Change() {
        if (!is_null($this->lstTarifaOrigen->SelectedValue)) {
            //-------------------------------------------------------------------
            // Se muestra en pantalla la cantidad de Clientes con Tarifa Origen
            //-------------------------------------------------------------------
            $intClieOrig   = MasterCliente::CountByTarifaId($this->lstTarifaOrigen->SelectedValue);
            $this->lstTarifaOrigen->Name = 'Tarifa Origen ('.$intClieOrig.')';
            $objClauOrde   = QQ::Clause();
            $objClauOrde[] = QQ::OrderBy(QQN::FacTarifa()->Id,false);
            $arrTariDisp = FacTarifa::LoadAll($objClauOrde);
            $intCantTari = count($arrTariDisp);
            $this->lstTarifaDestino->RemoveAllItems();
            $this->lstTarifaDestino->AddItem('- Seleccione Uno - ('.$intCantTari.')', null);
            foreach ($arrTariDisp as $objTariDisp) {
                if ($objTariDisp->Id != $this->lstTarifaOrigen->SelectedValue) {
                    $this->lstTarifaDestino->AddItem($objTariDisp->__toString(), $objTariDisp->Id);
                }
            }
            $this->lstTarifaDestino->Width = 250;
        }
    }

    protected function lstTariDest_Change() {
        if (!is_null($this->lstTarifaDestino->SelectedValue)) {
            //-------------------------------------------------------------------
            // Se muestra en pantalla la cantidad de Clientes con Tarifa Destino
            //-------------------------------------------------------------------
            $intClieDest = MasterCliente::CountByTarifaId($this->lstTarifaDestino->SelectedValue);
            $this->lstTarifaDestino->Name = 'Tarifa Destino (' . $intClieDest . ')';
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/cambio_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/cambio_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/cambio_tarifa_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/cambio_tarifa_edit.php/'.$objRegiTabl->Id);
    }


    protected function enviarMensajeDeError($strMensErro) {
        $this->mensaje($strMensErro,'','d',__iHAND__);
    }

    protected function Form_Validate() {
	    if (is_null($this->lstTarifaOrigen->SelectedValue)) {
	        $strMensError = 'Debe especificar la Tarifa que desea cambiar';
	        $this->enviarMensajeDeError($strMensError);
	        return false;
        }
	    if (is_null($this->lstTarifaDestino->SelectedValue)) {
	        $strMensError = 'Debe especificar la nueva Tarifa que los Clientes tendrán';
	        $this->enviarMensajeDeError($strMensError);
	        return false;
        }
	    if (is_null($this->calEjecutarEl->DateTime)) {
	        $strMensError = 'Debe especificar la Fecha en que se realizará el cambio';
	        $this->enviarMensajeDeError($strMensError);
	        return false;
        }
        $dttFechDhoy = FechaDeHoy();
        if ($this->calEjecutarEl->DateTime->__toString("YYYY-MM-DD") < $dttFechDhoy) {
            $strMensError = 'La Fecha de Ejecución no puede ser inferior a la de hoy!';
	        $this->enviarMensajeDeError($strMensError);
            return false;
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------
        // Se clona el objeto para verificar cambios
        //--------------------------------------------
        $this->txtExcluir->Text = nl2br2($this->txtExcluir->Text);

        $objRegiViej = clone $this->mctCambioTarifa->CambioTarifa;
        $this->mctCambioTarifa->SaveCambioTarifa();
        $strNombCamb = $this->lstTarifaOrigen->SelectedName.' por '.$this->lstTarifaDestino->SelectedName;
        if ($this->mctCambioTarifa->EditMode) {
            //---------------------------------------------------------------------
            // Si estamos en modo Edicion, entonces se verifican la existencia
            // de algun cambio en algun dato
            //---------------------------------------------------------------------
            $objRegiNuev = $this->mctCambioTarifa->CambioTarifa;
            $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
            if ($objResuComp->FriendlyComparisonStatus == 'different') {
                //------------------------------------------
                // En caso de que el objeto haya cambiado
                //------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'CambioTarifa';
                $arrLogxCamb['intRefeRegi'] = $this->mctCambioTarifa->CambioTarifa->Id;
                $arrLogxCamb['strNombRegi'] = $strNombCamb;
                $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cambio_tarifa_edit.php/'.$this->mctCambioTarifa->CambioTarifa->Id;
                LogDeCambios($arrLogxCamb);
                $this->mensaje('Transacción Exitosa','','','check');
            }
        } else {
            $arrLogxCamb['strNombTabl'] = 'CambioTarifa';
            $arrLogxCamb['intRefeRegi'] = $this->mctCambioTarifa->CambioTarifa->Id;
            $arrLogxCamb['strNombRegi'] = $strNombCamb;
            $arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cambio_tarifa_edit.php/'.$this->mctCambioTarifa->CambioTarifa->Id;
            LogDeCambios($arrLogxCamb);
            $this->mensaje('Transacción Exitosa','','','check');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $strNombCamb = $this->lstTarifaOrigen->SelectedName.' por '.$this->lstTarifaDestino->SelectedName;
        $arrTablRela = $this->mctCambioTarifa->TablasRelacionadasCambioTarifa();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctCambioTarifa->DeleteCambioTarifa();
            $arrLogxCamb['strNombTabl'] = 'CambioTarifa';
            $arrLogxCamb['intRefeRegi'] = $this->mctCambioTarifa->CambioTarifa->Id;
            $arrLogxCamb['strNombRegi'] = $strNombCamb;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// cambio_tarifa_edit.tpl.php as the included HTML template file
CambioTarifaEditForm::Run('CambioTarifaEditForm');
?>