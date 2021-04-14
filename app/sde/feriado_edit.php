<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/FeriadoEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Feriado class.  It uses the code-generated
 * FeriadoMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Feriado columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both feriado_edit.php AND
 * feriado_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class FeriadoEditForm extends FeriadoEditFormBase {
    /* @var $chkFechEsta QCheckBox */
    protected $chkFechEsta;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the FeriadoMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctFeriado = FeriadoMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Feriado's data fields
		$this->lblId = $this->mctFeriado->lblId_Create();

		$this->calFecha = $this->mctFeriado->calFecha_Create();
		$this->calFecha->Width = 100;

        $this->chkFechEsta_Create();

        if ($this->mctFeriado->EditMode) {
            $objDiaxFeri = $this->diaFeriadoEstandar();
            //---------------------------------------------------------
            // Si el parámetro es detectado, quiere decir que la fecha
            // representa un día feriado estándar.
            //---------------------------------------------------------
            if ($objDiaxFeri) {
                $this->chkFechEsta->Checked = true;
            }
        }
	}

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctFeriado->Feriado && !isset($_SESSION['DataFeriado'])) {
            $_SESSION['DataFeriado'] = serialize(array($this->mctFeriado->Feriado));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataFeriado']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctFeriado->Feriado->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Feriado',$this->mctFeriado->Feriado->Id);
    }

    protected function chkFechEsta_Create() {
        $this->chkFechEsta = new QCheckBox($this);
        $this->chkFechEsta->Name = 'Estándar ?';
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/feriado_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/feriado_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/feriado_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/feriado_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        $strMensUsua = 'Transacción Exitosa';
        $blnParaEdit = true;
        $blnFechEsta = false;
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctFeriado->Feriado;
		$this->mctFeriado->SaveFeriado();
        //-------------------------------------------------------------------------------
        // Si la fecha ha sido declarada como día feriado estándar, la misma se registra
        // en la lista de parámetros los cuales representan dicho término.
        //-------------------------------------------------------------------------------
        if ($this->chkFechEsta->Checked) {
            $blnFechEsta = true;
            //--------------------------------------------------------------------------
            // Previamente se verifica si la fecha ya existe en la lista de parámetros.
            //--------------------------------------------------------------------------
            $objDiaxEsta = $this->diaFeriadoEstandar();
            if (!$objDiaxEsta) {
                //-----------------------------------------------------------
                // Si no existe, se crea un nuevo parámetro correspondiente.
                //-----------------------------------------------------------
                $blnParaEdit = false;
                $objDiaxEsta = new Parametro();
                $objDiaxEsta->IndiPara = 'FeriEsta';
                $objDiaxEsta->DescPara = 'Dia Feriado Estandar';
                $objDiaxEsta->ParaTxt1 = '.';
            }
            //------------------------------------------------------
            // Se clona el objeto del parámetro a crear o a editar.
            //------------------------------------------------------
            $objParaViej = $objDiaxEsta;
            //----------------------------------------------------------------------
            // Se asigna o actualiza la fecha como código, y se guarda el registro.
            //----------------------------------------------------------------------
            $objDiaxEsta->CodiPara = $this->mctFeriado->Feriado->Fecha->format('dm');
            $objDiaxEsta->Save();
            if ($blnParaEdit) {
                //---------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia
                // de algun cambio en algun dato.
                //---------------------------------------------------------------------
                $objParaNuev = $this->mctFeriado->Feriado;
                $objParaComp = QObjectDiff::Compare($objParaViej, $objParaNuev);
                if ($objParaComp->FriendlyComparisonStatus == 'different') {
                    //--------------------------------------------------
                    // En caso de que el objeto Parámetro haya cambiado
                    //--------------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'Parametro';
                    $arrLogxCamb['intRefeRegi'] = $objDiaxEsta->__codigoRegistro();
                    $arrLogxCamb['strNombRegi'] = $objDiaxEsta->DescPara;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objParaComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametro_edit.php/'.$objDiaxEsta->__codigoRegistro();
                    LogDeCambios($arrLogxCamb);
                    $this->mensaje('Transacción Exitosa','','','check');
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'Parametro';
                $arrLogxCamb['intRefeRegi'] = $objDiaxEsta->__codigoRegistro();
                $arrLogxCamb['strNombRegi'] = $objDiaxEsta->DescPara;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametro_edit.php/'.$objDiaxEsta->__codigoRegistro();
                LogDeCambios($arrLogxCamb);
            }
            $strMensUsua .= ' - La fecha se registró como Día Feriado Estándar';
        }
        //--------------------------------------------------------------
        // Se inicializan criterios para el registro de la transacción.
        //--------------------------------------------------------------
        $intRefeRegi = $this->mctFeriado->Feriado->Id;
        $strNombRegi = $this->mctFeriado->Feriado->Fecha->format('Y-m-d');
        //------------------------------------------------------------------------------------
        // Si se trata de un día estándar, se indica dicho estatus en el nombre del registro.
        //------------------------------------------------------------------------------------
        if ($blnFechEsta) {
            $strNombRegi .= ' - Estandar';
        }
        if ($this->mctFeriado->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctFeriado->Feriado;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Feriado';
				$arrLogxCamb['intRefeRegi'] = $intRefeRegi;
				$arrLogxCamb['strNombRegi'] = $strNombRegi;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/feriado_edit.php/'.$intRefeRegi;
				LogDeCambios($arrLogxCamb);
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Feriado';
			$arrLogxCamb['intRefeRegi'] = $intRefeRegi;
			$arrLogxCamb['strNombRegi'] = $strNombRegi;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/feriado_edit.php/'.$intRefeRegi;
			LogDeCambios($arrLogxCamb);
		}
        $this->mensaje($strMensUsua,'','','check');
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctFeriado->TablasRelacionadasFeriado();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $this->mensaje(sprintf('Existen registros relacionados en %s',$strTablRela),'','d','hand-stop-o');
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            //--------------------------------------------------------------
            // Se inicializan criterios para el registro de la transacción.
            //--------------------------------------------------------------
            $intRefeRegi = $this->mctFeriado->Feriado->Id;
            $strNombRegi = $this->mctFeriado->Feriado->Fecha->format('Y-m-d');
            //---------------------------------------------------------------------------
            // Si la fecha está declarada como Día Feriado Estándar, se elimina el mismo
            // de la lista de parámetros correspondientes.
            //---------------------------------------------------------------------------
            if ($this->chkFechEsta->Checked) {
                $strNombRegi .= ' - Estandar';
                $objDiaxEsta = $this->diaFeriadoEstandar();
                $objDiaxEsta->Delete();
                //-------------------------------------------------------
                // Se registra la transacción correspondiente el el log.
                //-------------------------------------------------------
                $arrLogxCamb['strNombTabl'] = 'Parametro';
                $arrLogxCamb['intRefeRegi'] = $objDiaxEsta->__codigoRegistro();
                $arrLogxCamb['strNombRegi'] = $objDiaxEsta->DescPara;
                $arrLogxCamb['strDescCamb'] = "Borrado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/parametro_edit.php/'.$objDiaxEsta->__codigoRegistro();
                LogDeCambios($arrLogxCamb);
            }
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctFeriado->DeleteFeriado();
            $arrLogxCamb['strNombTabl'] = 'Feriado';
            $arrLogxCamb['intRefeRegi'] = $intRefeRegi;
            $arrLogxCamb['strNombRegi'] = $strNombRegi;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }

    protected function diaFeriadoEstandar() {
        //------------------------------------------------------
        // Se extrae a un string, el día y mes del día feriado.
        //------------------------------------------------------
        $strDiaxFeri = $this->mctFeriado->Feriado->Fecha->format('dm');
        //--------------------------------------------------------------------------------
        // El string obtenido, se usa como código para buscar el parámetro que representa
        // el día feriado estándar.
        //--------------------------------------------------------------------------------
        return BuscarDiaFeriadoEstandar($strDiaxFeri);
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// feriado_edit.tpl.php as the included HTML template file
FeriadoEditForm::Run('FeriadoEditForm');
?>