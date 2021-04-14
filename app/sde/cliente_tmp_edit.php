<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ClienteTmpEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the ClienteTmp class.  It uses the code-generated
 * ClienteTmpMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a ClienteTmp columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both cliente_tmp_edit.php AND
 * cliente_tmp_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ClienteTmpEditForm extends ClienteTmpEditFormBase {
    protected $lblOtraSucu;
    protected $lblSucuClie;
    protected $chkAsigSucu;
    protected $lstSucuClie;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ClienteTmpMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctClienteTmp = ClienteTmpMetaControl::CreateFromPathInfo($this);

        $this->lblTituForm->Text = 'Sub-Cliente - '.$this->mctClienteTmp->TitleVerb;
        $this->lblTituForm->Text .= ' ('.($this->intPosiRegi+1).'/'.$this->intCantRegi.')';

        $this->btnNuevRegi->Visible = false;

		// Call MetaControl's methods to create qcontrols based on ClienteTmp's data fields
		$this->txtCodigoContrato = $this->mctClienteTmp->txtCodigoContrato_Create();
		$this->txtCodigoContrato->Name = 'Contrato #';
		$this->txtCodigoContrato->Required = false;

		$this->txtNombre = $this->mctClienteTmp->txtNombre_Create();
		$this->txtNombre->Width = 300;
		$this->txtNombre->Required = false;

		$this->txtRif = $this->mctClienteTmp->txtRif_Create();
		$this->txtRif->Name = 'Cédula/RIF';
		$this->txtRif->Required = false;

		$this->txtDireccion = $this->mctClienteTmp->txtDireccion_Create();
		$this->txtDireccion->TextMode = QTextMode::MultiLine;
		$this->txtDireccion->Width = 260;
		$this->txtDireccion->Height = 80;
		$this->txtDireccion->Required = false;

        $this->txtDirEntregaFactura = $this->mctClienteTmp->txtDirEntregaFactura_Create();

        $this->txtSucursal = $this->mctClienteTmp->txtSucursal_Create();

        $this->lblSucuClie = $this->mctClienteTmp->lblSucursal_Create();
        $this->lblSucuClie->Name = 'Sucursal';

        $this->txtOtraSucursal = $this->mctClienteTmp->txtOtraSucursal_Create();

        $this->lblOtraSucu = $this->mctClienteTmp->lblOtraSucursal_Create();
        $this->lblOtraSucu->Name = 'Población actual';

        $this->lstSucuClie_Create();
        $this->chkAsigSucu_Create();
        $this->Sucursal_Validate();

        $this->txtPersCona = $this->mctClienteTmp->lblPersCona_Create();
        $this->txtPersCona->Name = 'Persona Contacto';

        $this->txtTeleCona = $this->mctClienteTmp->lblTeleCona_Create();
        $this->txtTeleCona->Name = 'Teléfono Contacto';

        $this->calFechCarg = $this->mctClienteTmp->lblFechCarg_Create();
		$this->txtObservacion = $this->mctClienteTmp->txtObservacion_Create();
        $this->chkAjustar = $this->mctClienteTmp->chkAjustar_Create();

        if (strlen($this->txtObservacion->Text) > 0) {
            if (!$this->chkAjustar->Checked) {
                $this->mensaje('Este Sub-Cliente ya no requiere ajustes!','','s','check');
            } else {
                $this->mensaje($this->txtObservacion->Text,'','w','exclamation-triangle');
            }
        }

        $this->btnSave->CausesValidation = false;
    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function determinarPosicion() {
        if ($this->mctClienteTmp->ClienteTmp && !isset($_SESSION['DataClienteTmp'])) {
            $_SESSION['DataClienteTmp'] = serialize(array($this->mctClienteTmp->ClienteTmp));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataClienteTmp']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctClienteTmp->ClienteTmp->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('ClienteTmp',$this->mctClienteTmp->ClienteTmp->Id);
    }

    protected function lstSucuClie_Create() {
        $this->lstSucuClie = new QListBox($this);
        $this->lstSucuClie->Name = QApplication::Translate('Seleccione la Sucursal a relacionar');
        $this->lstSucuClie->AddItem(QApplication::Translate('- Seleccione Uno -'),null);
        $this->CargarSucursales();
        $this->lstSucuClie->Width = 200;
    }

    protected function chkAsigSucu_Create() {
        $this->chkAsigSucu = new QCheckBox($this);
        $this->chkAsigSucu->Name = QApplication::Translate('Desea que la Población Actual quede asociada a la Sucursal seleccionada?');
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function CargarSucursales() {
        foreach (Estacion::LoadArrayByCodiStat(1) as $objSucuClie) {
            if ($objSucuClie->EsUnAlmacen == SinoType::NO) {
                $this->lstSucuClie->AddItem($objSucuClie->__toString(),$objSucuClie->CodiEsta);
            }
        }
    }

    protected function Sucursal_Validate() {
        if (strlen($this->txtOtraSucursal->Text) > 0) {
            $this->lblOtraSucu->Visible = true;
            $this->lstSucuClie->Visible = true;
            $this->chkAsigSucu->Visible = true;
            $this->lblSucuClie->Visible = false;
        } else {
            $this->lblOtraSucu->Visible = false;
            $this->lstSucuClie->Visible = false;
            $this->chkAsigSucu->Visible = false;
            $this->lblSucuClie->Visible = true;
        }
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/cliente_tmp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/cliente_tmp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/cliente_tmp_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/cliente_tmp_edit.php/'.$objRegiTabl->Id);
    }



    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------------------------------------------
        // Se verifican y se setean los datos del Sub-Cliente a Guardar o Actualizar.
        //----------------------------------------------------------------------------
        $this->chkAjustar->Checked = false;
        $intClieAsig = 0;
        //-----------------------------------------------------------------------
        // Si se ha seleccionado una Sucursal, se asigna la misma al Sub-cliente
        //-----------------------------------------------------------------------
        if ($this->lstSucuClie->SelectedValue) {
            $this->txtSucursal->Text = $this->lstSucuClie->SelectedValue;
            //--------------------------------------------------------
            // Si se eligió relacionar la Sede actual con la Sucursal
            // seleccionada, entonces se elabora dicha relación.
            //--------------------------------------------------------
            if ($this->chkAsigSucu->Checked) {
                $objSucuSele = Estacion::LoadByCodiEsta($this->txtSucursal->Text);
                $objSucuSele->PalabraRelacionada = !$objSucuSele->PalabraRelacionada
                    ? $this->txtOtraSucursal->Text
                    : $objSucuSele->PalabraRelacionada.','.$this->txtOtraSucursal->Text;
                $objSucuSele->Save();
                //----------------------------------------------------------------------
                // Luego, se obtienen los Sub-clientes que poseen la misma Sede actual,
                // y a cada uno se les asigna la Sucursal relacionada.
                //----------------------------------------------------------------------
                $objClauWher = QQ::Clause();
                $objClauWher[] = QQ::Equal(QQN::ClienteTmp()->OtraSucursal,$this->txtOtraSucursal->Text);
                $objClauWher[] = QQ::Equal(QQN::ClienteTmp()->Ajustar,true);
                $arrClieAsig = ClienteTmp::QueryArray(QQ::AndCondition($objClauWher));
                foreach ($arrClieAsig as $objClieAsig) {
                    $objRegiViej = clone $objClieAsig;
                    $objClieAsig->Sucursal = $objSucuSele->CodiEsta;
                    $objClieAsig->OtraSucursal = '';
                    $objClieAsig->Ajustar = false;
                    $objClieAsig->Save();
                    $objRegiNuev = $objClieAsig;
                    $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                    if ($objResuComp->FriendlyComparisonStatus == 'different') {
                        //------------------------------------------
                        // En caso de que el objeto haya cambiado
                        //------------------------------------------
                        $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
                        $arrLogxCamb['intRefeRegi'] = $objClieAsig->Id;
                        $arrLogxCamb['strNombRegi'] = 'Sub-Cliente Importado ('.$objClieAsig->CodigoContrato.') del Cliente '.$objClieAsig->MasterId;
                        $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                        $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cliente_tmp_edit.php/'.$objClieAsig->Id;
                        LogDeCambios($arrLogxCamb);
                    }
                    $intClieAsig++;
                }
            }
            $this->txtOtraSucursal->Text = '';
        }
        $blnTodoOkey = $this->ValidarDatos();
        if ($blnTodoOkey) {
            //--------------------------------------------
            // Se clona el objeto para verificar cambios
            //--------------------------------------------
            $objRegiViej = clone $this->mctClienteTmp->ClienteTmp;
            $this->mctClienteTmp->SaveClienteTmp();
            if ($this->mctClienteTmp->EditMode) {
                //---------------------------------------------------------------------
                // Si estamos en modo Edicion, entonces se verifican la existencia
                // de algun cambio en algun dato
                //---------------------------------------------------------------------
                $objRegiNuev = $this->mctClienteTmp->ClienteTmp;
                $objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
                if ($objResuComp->FriendlyComparisonStatus == 'different') {
                    //------------------------------------------
                    // En caso de que el objeto haya cambiado
                    //------------------------------------------
                    $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
                    $arrLogxCamb['intRefeRegi'] = $this->mctClienteTmp->ClienteTmp->Id;
                    $arrLogxCamb['strNombRegi'] = $this->mctClienteTmp->ClienteTmp->Nombre.' | Cliente: '.$this->mctClienteTmp->ClienteTmp->MasterId;
                    $arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                    $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cliente_tmp_edit.php/'.$this->mctClienteTmp->ClienteTmp->Id;
                    LogDeCambios($arrLogxCamb);
                }
            } else {
                $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
                $arrLogxCamb['intRefeRegi'] = $this->mctClienteTmp->ClienteTmp->Id;
                $arrLogxCamb['strNombRegi'] = $this->mctClienteTmp->ClienteTmp->Nombre.' | Cliente: '.$this->mctClienteTmp->ClienteTmp->MasterId;
                $arrLogxCamb['strDescCamb'] = "Creado";
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/cliente_tmp_edit.php/'.$this->mctClienteTmp->ClienteTmp->Id;
                LogDeCambios($arrLogxCamb);
            }
            $strMensUsua = 'Transacción Exitosa!';
            if ($intClieAsig > 0) {
                $strMensUsua .= ' La sucursal '.$this->txtSucursal->Text.' ha sido asignada a '.$intClieAsig.' Sub-Cliente(s) más!';
            }
            $this->mensaje($strMensUsua,'','','check');
        }
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctClienteTmp->TablasRelacionadasClienteTmp();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);

            //$this->lblId->Warning = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->mensaje('Existen registros relacionados en %s',$strTablRela);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            // Delegate "Delete" processing to the ArancelMetaControl
            $this->mctClienteTmp->DeleteClienteTmp();
            $arrLogxCamb['strNombTabl'] = 'ClienteTmp';
            $arrLogxCamb['intRefeRegi'] = $this->mctClienteTmp->ClienteTmp->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctClienteTmp->ClienteTmp->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }

    //-----------------------------
    // Otras acciones del Programa
    //-----------------------------

    protected function ValidarDatos() {
        $blnTodoOkey = true;
        $strMensUsua = 'Los siguientes datos son requeridos: ';

        if (strlen($this->txtOtraSucursal->Text) > 0) {
            $strMensUsua = 'La Sede actual no es válida!';
            $blnTodoOkey = false;
        }

        if ($blnTodoOkey) {
            if (strlen($this->txtCodigoContrato->Text) == 0) {
                $strMensUsua .= 'Nro. Contrato';
                $blnTodoOkey = false;
            }

            if (strlen($this->txtNombre->Text) == 0) {
                if (strlen($strMensUsua) > 0) {
                    $strMensUsua .= ', ';
                }
                $strMensUsua .= 'Nombre';
                $blnTodoOkey = false;
            }

            if (strlen($this->txtRif->Text) == 0) {
                if (strlen($strMensUsua) > 0) {
                    $strMensUsua .= ', ';
                }
                $strMensUsua .= 'Cédula/RIF';
                $blnTodoOkey = false;
            }

            if (strlen($this->txtDireccion->Text) == 0) {
                if (strlen($strMensUsua) > 0) {
                    $strMensUsua .= ', ';
                }
                $strMensUsua .= 'Dirección';
                $blnTodoOkey = false;
            }
        }

        if (!$blnTodoOkey) {
            $this->mensaje($strMensUsua,'m','d','hand-stop-o');
        }

        return $blnTodoOkey;
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// cliente_tmp_edit.tpl.php as the included HTML template file
ClienteTmpEditForm::Run('ClienteTmpEditForm');
?>