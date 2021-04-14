<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/MensajeYamaguchiListFormBase.class.php');

/**
 * This is a quick-and-dirty draft QForm object to do the List All functionality
 * of the MensajeYamaguchi class.  It uses the code-generated
 * MensajeYamaguchiDataGrid control which has meta-methods to help with
 * easily creating/defining MensajeYamaguchi columns.
 *
 * Any display customizations and presentation-tier logic can be implemented
 * here by overriding existing or implementing new methods, properties and variables.
 * 
 * NOTE: This file is overwritten on any code regenerations.  If you want to make
 * permanent changes, it is STRONGLY RECOMMENDED to move both mensaje_yamaguchi_list.php AND
 * mensaje_yamaguchi_list.tpl.php out of this Form Drafts directory.
 *
 * @package My QCubed Application
 * @subpackage Drafts
 */
class MensajeYamaguchiListForm extends MensajeYamaguchiListFormBase {
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

		$this->lblTituForm->Text = 'Mensajes CORP';

		// Instantiate the Meta DataGrid
		$this->dtgMensajeYamaguchis = new MensajeYamaguchiDataGrid($this);
		$this->dtgMensajeYamaguchis->FontSize = 13;
		$this->dtgMensajeYamaguchis->ShowFilter = false;

		// Style the DataGrid (if desired)
		$this->dtgMensajeYamaguchis->CssClass = 'datagrid';
		$this->dtgMensajeYamaguchis->AlternateRowStyle->CssClass = 'alternate';

		$objClauOrde   = QQ::Clause();
		$objClauOrde[] = QQ::OrderBy(QQN::MensajeYamaguchi()->Id,false);
		$objClauOrde[] = QQ::OrderBy(QQN::MensajeYamaguchi()->Orden);

		// Se ordenan los registros por Orden.
		$this->dtgMensajeYamaguchis->AdditionalClauses = $objClauOrde;

		// Add Pagination (if desired)
		$this->dtgMensajeYamaguchis->Paginator = new QPaginator($this->dtgMensajeYamaguchis);
		$this->dtgMensajeYamaguchis->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

		// Higlight the datagrid rows when mousing over them
		$this->dtgMensajeYamaguchis->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
		$this->dtgMensajeYamaguchis->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

		// Add a click handler for the rows.
		// We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
		// or $_ITEM->Id to pass the object's id, or any other data grid variable
		$this->dtgMensajeYamaguchis->RowActionParameterHtml = '<?= $_ITEM->Id ?>';
		$this->dtgMensajeYamaguchis->AddRowAction(new QClickEvent(), new QAjaxAction('dtgMensajeYamaguchisRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

		// Create the Other Columns (note that you can use strings for mensaje_yamaguchi's properties, or you
		// can traverse down QQN::mensaje_yamaguchi() to display fields that are down the hierarchy)
		$colIconStat = new QDataGridColumn('ST', '<?= $_FORM->IconStatusColumnRender($_ITEM) ?>');
		$colIconStat->HtmlEntities = false;
		$colIconStat->Width = 10;
		$this->dtgMensajeYamaguchis->AddColumn($colIconStat);

		$colTipoMens = new QDataGridColumn('Tipo','<?= $_FORM->dtgMensajeYamaguchi_Tipo_Render($_ITEM); ?>');
		$colTipoMens->OrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->Tipo,false);
		$colTipoMens->ReverseOrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->Tipo);
		$colTipoMens->Width = 100;
		$this->dtgMensajeYamaguchis->AddColumn($colTipoMens);

		$this->dtgMensajeYamaguchis->MetaAddColumn('Texto');

		$colOrdMens = $this->dtgMensajeYamaguchis->MetaAddColumn('Orden');
		$colOrdMens->Width = 50;

		$colFechInic = new QDataGridColumn('Fecha Inicial','<?= $_ITEM->FechInic->__toString("DD/MM/YYYY") ?>');
		$colFechInic->OrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->FechInic, false);
		$colFechInic->ReverseOrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->FechInic);
		$colFechInic->Width = 100;
		$this->dtgMensajeYamaguchis->AddColumn($colFechInic);

		/*$colFechFina = new QDataGridColumn('Fecha Final','<?= $_ITEM->FechFin->__toString("DD/MM/YYYY") ?>');
		$colFechFina->OrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->FechFin, false);
		$colFechFina->ReverseOrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->FechFin);
		$colFechFina->Width = 100;
		$this->dtgMensajeYamaguchis->AddColumn($colFechFina);*/

		$colTiemInde = new QDataGridColumn('T.Indefinido','<?= $_FORM->dtgMensajeYamaguchi_TiempoIndefinido_Render($_ITEM); ?>');
		$colTiemInde->OrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->TiempoIndefinido,false);
		$colTiemInde->ReverseOrderByClause = QQ::OrderBy(QQN::MensajeYamaguchi()->TiempoIndefinido);
		$colTiemInde->Width = 50;
		$colTiemInde->FilterType = null;
		$this->dtgMensajeYamaguchis->AddColumn($colTiemInde);

        $this->btnExpoExce_Create();
    }

    //-----------------------------------
	// Acciones Asociadas a los Objetos
	//-----------------------------------

	public function dtgMensajeYamaguchisRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("mensaje_yamaguchi_edit.php/$intId");
	}

	public function IconStatusColumnRender(MensajeYamaguchi $objMensYama) {
		if ($objMensYama->FechFin) {
			if ($objMensYama->__vigente()) {
				return TextoIconoColor(__iOJOS__,'','','lg','green');
			} else {
				return TextoIconoColor(__iOJOT__,'','','lg','red');
			}
		} else {
			return TextoIconoColor(__iOJOS__,'','','lg','green');
		}
	}

	public function dtgMensajeYamaguchi_Tipo_Render(MensajeYamaguchi $objMensYama) {
		if (!is_null($objMensYama->Tipo)) {
			$objParaMens = Parametro::LoadMensajeYamaguchiByTipo($objMensYama->Tipo);
			if ($objParaMens) {
				return $objParaMens->ParaTxt1;
			} else {
				return null;
			}
		} else {
			return null;
		}
	}

	public function dtgMensajeYamaguchi_TiempoIndefinido_Render(MensajeYamaguchi $objMensYama) {
		if (!is_null($objMensYama->TiempoIndefinido)) {
			if ($objMensYama->TiempoIndefinido) {
				return 'Si';
			} else {
				return 'No';
			}
		} else {
			return 'No';
		}
	}
}


// Go ahead and run this form object to generate the page and event handlers, implicitly using
// mensaje_yamaguchi_list.tpl.php as the included HTML template file
MensajeYamaguchiListForm::Run('MensajeYamaguchiListForm');
?>