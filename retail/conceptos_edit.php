<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__ . '/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/ConceptosEditFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do Create, Edit, and Delete functionality
 * of the Conceptos class.  It uses the code-generated
 * ConceptosMetaControl class, which has meta-methods to help with
 * easily creating/defining controls to modify the fields of a Conceptos columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both conceptos_edit.php AND
 * conceptos_edit.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class ConceptosEditForm extends ConceptosEditFormBase {
    protected $lstOperacion;
    protected $lstAplicaComo;
    protected $lstTipo;
    protected $lstActuaSobre;
    protected $dtgRangConc;
    protected $dtgConcInvo;

    protected $blnAgreRang = true;
    protected $lblTituRang;
    protected $txtRangInic;
    protected $txtRangFina;
    protected $txtValoRang;
    protected $btnAgreRang;
    protected $btnEditRang;
    protected $btnSaveRang;
    protected $btnCancRang;
    protected $blnEditRang = false;
    protected $intEditRang;

    protected $lblRangInic;
    protected $lblRangFina;
    protected $lblValoRang;
    protected $lblAcciRang;

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

		// Use the CreateFromPathInfo shortcut (this can also be done manually using the ConceptosMetaControl constructor)
		// MAKE SURE we specify "$this" as the MetaControl's (and thus all subsequent controls') parent
		$this->mctConceptos = ConceptosMetaControl::CreateFromPathInfo($this);

		// Call MetaControl's methods to create qcontrols based on Conceptos's data fields
		$this->lblId = $this->mctConceptos->lblId_Create();
		$this->txtNombre = $this->mctConceptos->txtNombre_Create();
		$this->txtNombre->Width = 140;
		$this->txtOrden = $this->mctConceptos->txtOrden_Create();
		$this->txtOrden->Width = 40;
		$this->txtProductos = $this->mctConceptos->txtProductos_Create();
		$this->txtProductos->Width = 140;
		$this->txtProductos->AddAction(new QBlurEvent(), new QAjaxAction('txtProductos_Blur'));

		$this->txtMostrarComo = $this->mctConceptos->txtMostrarComo_Create();
		$this->txtMostrarComo->Width = 140;
		$this->chkActivo = $this->mctConceptos->chkActivo_Create();
		$this->calFechaInicial = $this->mctConceptos->calFechaInicial_Create();
		$this->calFechaInicial->Width = 120;
		$this->calFechaFinal = $this->mctConceptos->calFechaFinal_Create();
		$this->calFechaFinal->Width = 120;

		$this->chkEsFijo = $this->mctConceptos->chkEsFijo_Create();
		$this->chkEsFijo->Name = 'Es Fijo ?';

        $this->txtOperacion = $this->mctConceptos->txtOperacion_Create();
        $this->lstOperacion = $this->lstOperacion_Create();

        $this->txtAplicaComo = $this->mctConceptos->txtAplicaComo_Create();
        $this->lstAplicaComo = $this->lstAplicaComo_Create();

		$this->txtTipo = $this->mctConceptos->txtTipo_Create();
		$this->lstTipo = $this->lstTipo_Create();

		$this->txtActuaSobre = $this->mctConceptos->txtActuaSobre_Create();
		$this->txtActuaSobre->Visible = false;
        $this->lstActuaSobre = $this->lstActuaSobre_Create();

		$this->txtValor = $this->mctConceptos->txtValor_Create();
		$this->txtValor->AddAction(new QChangeEvent(), new QAjaxAction('txtValor_Change'));

		$this->txtDbquery = $this->mctConceptos->txtDbquery_Create();
		$this->txtBaseImponible = $this->mctConceptos->txtBaseImponible_Create();
		$this->txtBaseImponible->Width = 50;
		$this->txtMetodo = $this->mctConceptos->txtMetodo_Create();
        $this->chkAplicarTasa = $this->mctConceptos->chkAplicarTasa_Create();
        $this->txtCondicion = $this->mctConceptos->txtCondicion_Create();
		$this->calCreatedAt = $this->mctConceptos->calCreatedAt_Create();
		$this->calUpdatedAt = $this->mctConceptos->calUpdatedAt_Create();
		$this->lblDeletedAt = $this->mctConceptos->lblDeletedAt_Create();
		$this->txtCreatedBy = $this->mctConceptos->txtCreatedBy_Create();
		$this->txtUpdatedBy = $this->mctConceptos->txtUpdatedBy_Create();
		$this->txtDeletedBy = $this->mctConceptos->txtDeletedBy_Create();

        $this->dtgRangConc_Create();
        $this->dtgConcInvo_Create();
        $this->lstTipo_Change();
        $this->txtValor_Change();

        $this->lblTituRang_Create();
        $this->txtRangInic_Create();
        $this->txtRangFina_Create();
        $this->txtValoRang_Create();
        $this->btnSaveRang_Create();
        $this->btnCancRang_Create();

        $this->lblRangInic_Create();
        $this->lblRangFina_Create();
        $this->lblValoRang_Create();
        $this->lblAcciRang_Create();

        if ($this->mctConceptos->EditMode) {
            $this->lstAplicaComo_Change();
        }

    }

	//----------------------------
	// Aqui se crean los objetos 
	//----------------------------

    protected function lblTituRang_Create() {
	    $this->lblTituRang = new QLabel($this);
	    $this->lblTituRang->Text = 'Rangos del Concepto <i class="fa fa-plus-circle fa-lg"></i>';
	    $this->lblTituRang->HtmlEntities = false;
	    $this->lblTituRang->CssClass = 'titulo';
	    $this->lblTituRang->AddAction(new QClickEvent(), new QAjaxAction('lblTituRang_Click'));
    }

    protected function txtRangInic_Create() {
	    $this->txtRangInic = new QTextBox($this);
	    $this->txtRangInic->Width = 80;
	    $this->txtRangInic->Required = true;
	    $this->txtRangInic->Visible = false;
    }

    protected function txtRangFina_Create() {
	    $this->txtRangFina = new QTextBox($this);
	    $this->txtRangFina->Width = 80;
	    $this->txtRangFina->Required = true;
        $this->txtRangFina->Visible = false;
    }

    protected function txtValoRang_Create() {
	    $this->txtValoRang = new QTextBox($this);
	    $this->txtValoRang->Width = 100;
	    $this->txtValoRang->Required = true;
	    $this->txtValoRang->Visible = false;
    }

    protected function btnSaveRang_Create() {
        $this->btnSaveRang = new QButton($this);
        $this->btnSaveRang->Text = '<i class="fa fa-floppy-o fa-lg"></i>';
        $this->btnSaveRang->CssClass = 'btn btn-primary btn-sm';
        $this->btnSaveRang->HtmlEntities = false;
        $this->btnSaveRang->Visible = false;
        $this->btnSaveRang->AddAction(new QClickEvent(), new QServerAction('btnSaveRang_Click'));
    }

    protected function btnCancRang_Create() {
        $this->btnCancRang = new QButton($this);
        $this->btnCancRang->Text = '<i class="fa fa-times-circle fa-lg"></i>';
        $this->btnCancRang->CssClass = 'btn btn-warning btn-sm';
        $this->btnCancRang->HtmlEntities = false;
        $this->btnCancRang->Visible = false;
        $this->btnCancRang->AddAction(new QClickEvent(), new QServerAction('btnCancRang_Click'));
    }

    protected function lblRangInic_Create() {
        $this->lblRangInic = new QLabel($this);
        $this->lblRangInic->Text = 'R.Inic.';
        $this->lblRangInic->Visible = false;
    }

    protected function lblRangFina_Create() {
        $this->lblRangFina = new QLabel($this);
        $this->lblRangFina->Text = 'R.Fina';
        $this->lblRangFina->Visible = false;
    }

    protected function lblValoRang_Create() {
        $this->lblValoRang = new QLabel($this);
        $this->lblValoRang->Text = 'Valor';
        $this->lblValoRang->Visible = false;
    }

    protected function lblAcciRang_Create() {
        $this->lblAcciRang = new QLabel($this);
        $this->lblAcciRang->Text = 'Acción';
        $this->lblAcciRang->Visible = false;
    }


    protected function dtgRangConc_Create() {
        $this->dtgRangConc = new QDataGrid($this);
        $this->dtgRangConc->FontSize = 12;
        $this->dtgRangConc->ShowFilter = false;

        $this->dtgRangConc->CssClass = 'datagrid';
        $this->dtgRangConc->AlternateRowStyle->CssClass = 'alternate';

        $this->dtgRangConc->UseAjax = true;
        $this->dtgRangConc->SetDataBinder('dtgRangConc_Bind');

        $this->dtgRangConc->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgRangConc->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Click event on datagrid's row to execute an action
        $this->dtgRangConc->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
        $this->dtgRangConc->AddRowAction(new QClickEvent(), new QAjaxAction('dtgRangConcRow_Click'));

        $this->createDtgRangConcColumns();
    }


    protected function dtgRangConc_Bind() {
        $this->dtgRangConc->DataSource = $this->mctConceptos->Conceptos->GetConceptoRangosAsConceptoArray();
    }

    protected function createDtgRangConcColumns() {
        $colRangInic = new QDataGridColumn($this);
        $colRangInic->Name = QApplication::Translate('Rango Inicial');
        $colRangInic->Html = '<?= $_ITEM->RangoInicial ?>';
        $colRangInic->Width = 140;
        $this->dtgRangConc->AddColumn($colRangInic);

        $colRangFina = new QDataGridColumn($this);
        $colRangFina->Name = QApplication::Translate('Rango Final');
        $colRangFina->Html = '<?= $_ITEM->RangoFinal; ?>';
        $colRangFina->Width = 180;
        $this->dtgRangConc->AddColumn($colRangFina);

        $colValoRang = new QDataGridColumn($this);
        $colValoRang->Name = QApplication::Translate('Valor');
        $colValoRang->Html = '<?= $_ITEM->Valor; ?>';
        $colValoRang->Width = 60;
        $colValoRang->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgRangConc->AddColumn($colValoRang);
    }

    public function dtgRangConcRow_Click($strFormId, $strControlId, $strParameter) {
	    $id = (int)$strParameter;
        $this->intEditRang = $id;
        t('Voy a editar el registro cuyo id es: '.$this->intEditRang);
	    $this->mostrarCampos('edit');
	    $objConcRang = ConceptoRangos::Load($id);
        $this->txtRangInic->Text = $objConcRang->RangoInicial;
        $this->txtRangFina->Text = $objConcRang->RangoFinal;
        $this->txtValoRang->Text = $objConcRang->Valor;
        $this->blnEditRang       = true;

        t('Editando: '.$this->intEditRang);
    }


    //-----------------------------------------------------------------------------------
    // Conceptos Involucrados para Base Imponible del Concepto que se esta visualizando
    //-----------------------------------------------------------------------------------

    protected function btnSaveRang_Click() {
	    t('Aqui estoy: '.$this->blnEditRang);
	    if (!$this->blnEditRang) {
	        t('Modo nuevo registro');
            $objConcRang = new ConceptoRangos();
            $objConcRang->ConceptoId = $this->mctConceptos->Conceptos->Id;
            $objConcRang->CreatedBy  = $this->objUsuario->CodiUsua;
        } else {
	        t('Modo edicion: '.$this->intEditRang);
            $objConcRang = ConceptoRangos::Load($this->intEditRang);
            $objConcRang->UpdatedBy = $this->objUsuario->CodiUsua;
        }
	    $objConcRang->RangoInicial = (float)$this->txtRangInic->Text;
	    $objConcRang->RangoFinal   = (float)$this->txtRangFina->Text;
	    $objConcRang->Valor        = (float)$this->txtValoRang->Text;
	    $objConcRang->Save();

        t('guarde');
        // Se refresca la lista de rangos
	    $this->dtgRangConc->Refresh();

	    t('refresque');
	    // Se resetean los campos input del rango
        $this->txtRangInic->Text = '';
        $this->txtRangFina->Text = '';
        $this->txtValoRang->Text = '';

        t('resetee');
	    // Se notifica al Usuario el exito de la transaccion
        $this->success('Transaccion Exitosa.  Rango guardado !!!');
    }

    protected function btnCancRang_Click() {

        $this->mostrarCampos('add');

    }

    public function lblTituRang_Click() {
        $this->mostrarCampos('add');
    }

    protected function mostrarCampos($strAction='add') {
	    if ($strAction == 'add') {
            $this->blnEditRang = false;
            $this->txtRangInic->Visible = !$this->txtRangInic->Visible;
            $this->txtRangFina->Visible = !$this->txtRangFina->Visible;
            $this->txtValoRang->Visible = !$this->txtValoRang->Visible;
            $this->btnSaveRang->Visible = !$this->btnSaveRang->Visible;
            $this->btnCancRang->Visible = true;

            $this->txtRangInic->Text = '';
            $this->txtRangFina->Text = '';
            $this->txtValoRang->Text = '';

            $this->lblRangInic->Visible = !$this->lblRangInic->Visible;
            $this->lblRangFina->Visible = !$this->lblRangFina->Visible;
            $this->lblValoRang->Visible = !$this->lblValoRang->Visible;
            $this->lblAcciRang->Visible = !$this->lblAcciRang->Visible;
        }
        if ($strAction == 'edit') {
            $this->blnEditRang = true;
            $this->txtRangInic->Visible = true;
            $this->txtRangFina->Visible = true;
            $this->txtValoRang->Visible = true;
            $this->btnSaveRang->Visible = true;
            $this->btnCancRang->Visible = true;

            $this->lblRangInic->Visible = true;
            $this->lblRangFina->Visible = true;
            $this->lblValoRang->Visible = true;
            $this->lblAcciRang->Visible = true;
        }
    }

    protected function dtgConcInvo_Create() {
        $this->dtgConcInvo = new QDataGrid($this);
        $this->dtgConcInvo->FontSize = 12;
        $this->dtgConcInvo->ShowFilter = false;
        $this->dtgConcInvo->CssClass = 'datagrid';
        $this->dtgConcInvo->AlternateRowStyle->CssClass = 'alternate';
        $this->dtgConcInvo->UseAjax = true;
        $this->dtgConcInvo->SetDataBinder('dtgConcInvo_Bind');
        $this->createDtgConcInvoColumns();
    }

    protected function dtgConcInvo_Bind() {
	    $objClauWher   = QQ::Clause();
	    $objClauWher[] = QQ::Equal(QQN::Conceptos()->BaseImponible,$this->txtActuaSobre->Text);
        $this->dtgConcInvo->DataSource = Conceptos::QueryArray(QQ::AndCondition($objClauWher));
    }

    protected function createDtgConcInvoColumns() {
        $colNombConc = new QDataGridColumn($this);
        $colNombConc->Name = QApplication::Translate('Nombre');
        $colNombConc->Html = '<?= $_ITEM->Nombre ?>';
        $colNombConc->Width = 150;
        $this->dtgConcInvo->AddColumn($colNombConc);

        $colProdConc = new QDataGridColumn($this);
        $colProdConc->Name = QApplication::Translate('Productos');
        $colProdConc->Html = '<?= $_ITEM->Productos; ?>';
        $colProdConc->Width = 150;
        $this->dtgConcInvo->AddColumn($colProdConc);

        $colOperConc = new QDataGridColumn($this);
        $colOperConc->Name = QApplication::Translate('Oper');
        $colOperConc->Html = '<?= $_ITEM->Operacion; ?>';
        $colOperConc->HorizontalAlign = QHorizontalAlign::Right;
        $this->dtgConcInvo->AddColumn($colOperConc);
    }


    public function lstOperacion_Create() {
        $this->lstOperacion = new QListBox($this);
        $this->lstOperacion->Name = 'Operacion';
        $this->lstOperacion->Width = 160;
        $this->lstOperacion->Required = true;
        $this->lstOperacion->AddItem('- Seleccione -',null);
        $this->lstOperacion->AddItem('SUMA','SUMA',$this->mctConceptos->Conceptos->Operacion=='SUMA');
        $this->lstOperacion->AddItem('RESTA','RESTA',$this->mctConceptos->Conceptos->Operacion=='RESTA');
        return $this->lstOperacion;
    }

    public function lstAplicaComo_Create() {
        $this->lstAplicaComo = new QListBox($this);
        $this->lstAplicaComo->Name = 'Aplica Como';
        $this->lstAplicaComo->Width = 160;
        $this->lstAplicaComo->Required = true;
        $this->lstAplicaComo->AddItem('- Seleccione -',null);
        $this->lstAplicaComo->AddItem('CANT','CANT',$this->mctConceptos->Conceptos->AplicaComo=='CANT');
        $this->lstAplicaComo->AddItem('PORC','PORC',$this->mctConceptos->Conceptos->AplicaComo=='PORC');
        $this->lstAplicaComo->AddAction(new QChangeEvent(), new QAjaxAction('lstAplicaComo_Change'));
        return $this->lstAplicaComo;
    }

    public function lstTipo_Create() {
        $this->lstTipo = new QListBox($this);
        $this->lstTipo->Name = 'Tipo';
        $this->lstTipo->Width = 160;
        //$this->lstTipo->Required = true;
        $this->lstTipo->AddItem('- Seleccione -',null);
        $this->lstTipo->AddItem('CAMPO','CAMPO',$this->mctConceptos->Conceptos->Tipo=='CAMPO');
        $this->lstTipo->AddItem('CONCEPTO','CONCEPTO',$this->mctConceptos->Conceptos->Tipo=='CONCEPTO');
        $this->lstTipo->AddItem('BASEIMP','BASEIMP',$this->mctConceptos->Conceptos->Tipo=='BASEIMP');
        $this->lstTipo->AddAction(new QChangeEvent(), new QAjaxAction('lstTipo_Change'));
        return $this->lstTipo;
    }

    public function lstActuaSobre_Create() {
        $this->lstActuaSobre = new QListBox($this);
        $this->lstActuaSobre->Name = 'Actua Sobre';
        $this->lstActuaSobre->Width = 160;
        //$this->lstActuaSobre->Required = true;
        $this->lstActuaSobre->AddItem('- Seleccione -',null);
        return $this->lstActuaSobre;
    }

    protected function determinarPosicion() {
        if ($this->mctConceptos->Conceptos && !isset($_SESSION['DataConceptos'])) {
            $_SESSION['DataConceptos'] = serialize(array($this->mctConceptos->Conceptos));
        }
        $this->arrDataTabl = unserialize($_SESSION['DataConceptos']);
        $this->intCantRegi = count($this->arrDataTabl);
        //-------------------------------------------------------------------------------
        // Se determina la posicion del registro actual, dentro del vector de registros
        //-------------------------------------------------------------------------------
        $intContRegi = 0;
        foreach ($this->arrDataTabl as $objTable) {
            if ($objTable->Id == $this->mctConceptos->Conceptos->Id) {
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
        $this->btnLogxCamb->Visible = Log::CountByTablaRef('Conceptos',$this->mctConceptos->Conceptos->Id);
    }

    //-----------------------------------
	// Acciones relativas a los objetos 
	//-----------------------------------

    protected function txtProductos_Blur() {
	    if (!$this->mctConceptos->EditMode) {
            //------------------------------------------------------------------------------
            // Se sugiere el orden o posicion del Concepto en funcion del primer producto
            // de la lista especificada por el Usuario
            //------------------------------------------------------------------------------
            if (strlen($this->txtProductos->Text)) {
                $arrListProd = explode(',', $this->txtProductos->Text);
                if (count($arrListProd)) {
                    $strPrimProd   = $arrListProd[0];
                    $objClauWher[] = QQ::Like(QQN::Conceptos()->Productos,'%'.$strPrimProd.'%');
                    $objClauOrde[] = QQ::OrderBy(QQN::Conceptos()->Orden, false);
                    $arrListConc   = Conceptos::QueryArray(QQ::AndCondition($objClauWher), $objClauOrde);
                    $intOrdeProp   = $arrListConc[0]->Orden;
                    $this->txtOrden->Text = $intOrdeProp + 1;
                }
            }
        }
    }

    protected function lstAplicaComo_Change() {
        if (!is_null($this->lstAplicaComo->SelectedValue)) {
            $strApliComo = $this->lstAplicaComo->SelectedName;
            if ($strApliComo == 'CANT') {
                $this->lstTipo->Required = false;
                $this->lstTipo->HtmlAfter = ' (Opc)';
                $this->lstActuaSobre->Required = false;
                $this->lstActuaSobre->HtmlAfter = ' (Opc)';
                $this->txtValor->Name = 'Cantidad';
            } else {
                $this->lstTipo->Required = true;
                $this->lstTipo->HtmlAfter = '';
                $this->lstActuaSobre->Required = true;
                $this->lstActuaSobre->HtmlAfter = '';
                $this->txtValor->Name = 'Porcentaje';
            }
        }
    }

    protected function agregar_Campos() {
        $this->lstActuaSobre->RemoveAllItems();
        $arrNombCamp = Conceptos::CamposValues();
        $this->lstActuaSobre->AddItem('- Seleccione - ('.count($arrNombCamp).')',null);
        foreach ($arrNombCamp as $strNombCamp) {
            $this->lstActuaSobre->AddItem($strNombCamp,$strNombCamp,$this->mctConceptos->Conceptos->ActuaSobre==$strNombCamp);
        }
    }

    protected function agregar_Conceptos() {
        $this->lstActuaSobre->RemoveAllItems();
        $objClauWher   = QQ::Clause();
        if ($this->mctConceptos->EditMode) {
            $objClauWher[] = QQ::LessThan(QQN::Conceptos()->Orden,$this->mctConceptos->Conceptos->Orden);
        }
        $objClauWher[] = QQ::Equal(QQN::Conceptos()->Activo,true);
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Conceptos()->Orden);
        $arrConcAnte   = Conceptos::QueryArray(QQ::AndCondition($objClauWher),$objClauOrde);
        $this->lstActuaSobre->AddItem('- Seleccione - ('.count($arrConcAnte).')',null);
        foreach ($arrConcAnte as $objConcAnte) {
            $this->lstActuaSobre->AddItem(
                $objConcAnte->__toString(),
                $objConcAnte->Nombre,
                trim($this->mctConceptos->Conceptos->ActuaSobre)==trim($objConcAnte->Nombre)
            );
        }
    }

    protected function lstTipo_Change() {
	    $strValoSele = trim($this->lstTipo->SelectedValue);

	    $this->txtActuaSobre->Visible = ($strValoSele == 'BASEIMP');
        $this->dtgConcInvo->Visible   = ($strValoSele == 'BASEIMP');
        $this->lstActuaSobre->Visible = !$this->txtActuaSobre->Visible;

        if ($strValoSele == 'CONCEPTO') {
            $this->agregar_Conceptos();
            $this->lstActuaSobre->Name = 'Aplica s/el Concepto';
        }
        if ($strValoSele == 'CAMPO') {
            $this->agregar_Campos();
            $this->lstActuaSobre->Name = 'Aplica s/el Campo';
        }
    }

    protected function txtValor_Change() {
        $this->txtMetodo->Required  = ($this->txtValor->Text == 'metodo');
        $this->txtMetodo->Visible   = ($this->txtValor->Text == 'metodo');
        $this->dtgRangConc->Visible = ($this->txtValor->Text == 'rango');
    }

    protected function btnProxRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi+1];
        QApplication::Redirect(__SIST__.'/conceptos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnRegiAnte_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intPosiRegi-1];
        QApplication::Redirect(__SIST__.'/conceptos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnPrimRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[0];
        QApplication::Redirect(__SIST__.'/conceptos_edit.php/'.$objRegiTabl->Id);
    }

    protected function btnUltiRegi_Click() {
        $objRegiTabl = $this->arrDataTabl[$this->intCantRegi-1];
        QApplication::Redirect(__SIST__.'/conceptos_edit.php/'.$objRegiTabl->Id);
    }

    protected function Form_Validate()
    {
        $blnTodoOkey = parent::Form_Validate();
        if ($blnTodoOkey) {
            $mixValoCamp = $this->txtValor->Text;
            if (!is_numeric($mixValoCamp)) {
                if (!in_array($mixValoCamp,['metodo','rango'])) {
                    $strTextMens = 'El Valor del Concepto debe ser: "metodo", "rango" o "un numero"';
                    $this->danger($strTextMens);
                    return false;
                }
            }
        }
        return true;
    }

    protected function btnSave_Click($strFormId, $strControlId, $strParameter) {
		//--------------------------------------------
		// Se clona el objeto para verificar cambios 
		//--------------------------------------------
		$objRegiViej = clone $this->mctConceptos->Conceptos;

		$this->txtOperacion->Text  = $this->lstOperacion->SelectedValue;
		$this->txtAplicaComo->Text = $this->lstAplicaComo->SelectedValue;
		$this->txtTipo->Text       = $this->lstTipo->SelectedValue;
		if ($this->lstActuaSobre->Visible) {
            $this->txtActuaSobre->Text = $this->lstActuaSobre->SelectedValue;
        }
		$this->mctConceptos->SaveConceptos();
		if ($this->mctConceptos->EditMode) {
			//---------------------------------------------------------------------
			// Si estamos en modo Edicion, entonces se verifican la existencia
			// de algun cambio en algun dato 
			//---------------------------------------------------------------------
			$objRegiNuev = $this->mctConceptos->Conceptos;
			$objResuComp = QObjectDiff::Compare($objRegiViej, $objRegiNuev);
			if ($objResuComp->FriendlyComparisonStatus == 'different') {
				//------------------------------------------
				// En caso de que el objeto haya cambiado 
				//------------------------------------------
				$arrLogxCamb['strNombTabl'] = 'Conceptos';
				$arrLogxCamb['intRefeRegi'] = $this->mctConceptos->Conceptos->Id;
				$arrLogxCamb['strNombRegi'] = $this->mctConceptos->Conceptos->Nombre;
				$arrLogxCamb['strDescCamb'] = implode(',',$objResuComp->DifferentFields);
                $arrLogxCamb['strEnlaEnti'] = __SIST__.'/conceptos_edit.php/'.$this->mctConceptos->Conceptos->Id;
				LogDeCambios($arrLogxCamb);
                $this->success('Transacción Exitosa !!!');
			}
		} else {
			$arrLogxCamb['strNombTabl'] = 'Conceptos';
			$arrLogxCamb['intRefeRegi'] = $this->mctConceptos->Conceptos->Id;
			$arrLogxCamb['strNombRegi'] = $this->mctConceptos->Conceptos->Nombre;
			$arrLogxCamb['strDescCamb'] = "Creado";
            $arrLogxCamb['strEnlaEnti'] = __SIST__.'/conceptos_edit.php/'.$this->mctConceptos->Conceptos->Id;
			LogDeCambios($arrLogxCamb);
            $this->success('Transacción Exitosa !!!');
		}
	}

    protected function btnDelete_Click($strFormId, $strControlId, $strParameter) {
        //----------------------------------------
        // Se verifica la integridad referencial
        //----------------------------------------
        $blnTodoOkey = true;
        $arrTablRela = $this->mctConceptos->TablasRelacionadasConceptos();
        if (count($arrTablRela)) {
            $strTablRela = implode(',',$arrTablRela);
            $strTextMens = sprintf('Existen registros relacionados en %s',$strTablRela);
            $this->danger($strTextMens);
            $blnTodoOkey = false;
        }
        if ($blnTodoOkey) {
            $this->mctConceptos->DeleteConceptos();
            $arrLogxCamb['strNombTabl'] = 'Conceptos';
            $arrLogxCamb['intRefeRegi'] = $this->mctConceptos->Conceptos->Id;
            $arrLogxCamb['strNombRegi'] = $this->mctConceptos->Conceptos->Nombre;
            $arrLogxCamb['strDescCamb'] = "Borrado";
            LogDeCambios($arrLogxCamb);
            $this->RedirectToListPage();
        }
    }
}

// Go ahead and run this form object to render the page and its event handlers, implicitly using
// conceptos_edit.tpl.php as the included HTML template file
ConceptosEditForm::Run('ConceptosEditForm');
?>