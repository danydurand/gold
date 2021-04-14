<?php
//-----------------------------------------------------------------------------
// Programa      : sde_checkpoint_master_list.php
// Realizado por : Juan Duran
// Fecha Elab.   : 02/03/2017
// Descripcion   : Este programa muestra la lista con el resultado
//                 de la búsqueda del manifiesto.
//-----------------------------------------------------------------------------
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__FORMBASE_CLASSES__ . '/SdeContenedorListFormBase.class.php');

class SdeCheckpointMasterList extends SdeContenedorListFormBase {
    // protected $arrEnca2PDF = array();
    // protected $arrAnch2PDF = array();
    // protected $arrJust2PDF = array();
    // protected $arrDato2PDF = array();
    // protected $blnHayxDato;

    // protected $arrDataSour = array();

    protected $dtgSdeContenedor;

    // protected $btnIngrRegi;
    // protected $btnBuscRegi;
    // protected $btnImprRegi;
    protected $btnExpoExce;
    // protected $btnExpoAPdf;
    // protected $btnEditRegi;

    // // DataGrid Columns
    // protected $colEditLinkColumn;
    // protected $colNumeCont;
    // protected $colCodiOper;
    // protected $colFecha;
    // protected $colStatCont;
    // protected $colProductoId;
    // protected $colMontoFlete;
    // protected $colMaster;
    // protected $colNumeroValijas;
    // protected $colValijas;
    // protected $colPaisId;
    // protected $colHora;
    
    // Override Form Event Handlers as Needed
    protected function Form_Run() {
        parent::Form_Run();

        // Security check for ALLOW_REMOTE_ADMIN
        // To allow access REGARDLESS of ALLOW_REMOTE_ADMIN, simply remove the line below
        QApplication::CheckRemoteAdmin();           
    }

    protected function Form_Create() {
        parent::Form_Create();
        $this->lblTituForm->Text = QApplication::Translate('Lista de Checkpoints');

        // Instantiate the Meta DataGrid
        $this->dtgSdeContenedor = new SdeContenedorDataGrid($this);
        $this->dtgSdeContenedor->FontSize = 13;
        $this->dtgSdeContenedor->ShowFilter = false;

        // Style the DataGrid (if desired)
        $this->dtgSdeContenedor->CssClass = 'datagrid';
        $this->dtgSdeContenedor->AlternateRowStyle->CssClass = 'alternate';

        // Add Pagination (if desired)
        $this->dtgSdeContenedor->Paginator = new QPaginator($this->dtgSdeContenedor);
        $this->dtgSdeContenedor->ItemsPerPage = __FORM_DRAFTS_FORM_LIST_ITEMS_PER_PAGE__;

        // Higlight the datagrid rows when mousing over them
        $this->dtgSdeContenedor->AddRowAction(new QMouseOverEvent(), new QCssClassAction('selectedStyle'));
        $this->dtgSdeContenedor->AddRowAction(new QMouseOutEvent(), new QCssClassAction());

        // Add a click handler for the rows.
        // We can use $_CONTROL->CurrentRowIndex to pass the row index to dtgPersonsRow_Click()
        // or $_ITEM->Id to pass the object's id, or any other data grid variable
        $this->dtgSdeContenedor->RowActionParameterHtml = '<?= $_ITEM->NumeCont ?>';
        $this->dtgSdeContenedor->AddRowAction(new QClickEvent(), new QAjaxAction('dtgSdeContenedorRow_Click'));

        // Use the MetaDataGrid functionality to add Columns for this datagrid

        // Create the Other Columns (note that you can use strings for asistente's properties, or you
        // can traverse down QQN::asistente() to display fields that are down the hierarchy)

        //$this->dtgSdeContenedor->MetaAddColumn('NumeCont');
        //$this->dtgSdeContenedor->MetaAddColumn(QQN::SdeContenedor()->CodiOperObject);
        $this->dtgSdeContenedor->MetaAddColumn('Master');
        $this->dtgSdeContenedor->MetaAddColumn('Fecha');

        $colStatus = $this->dtgSdeContenedor->MetaAddColumn('StatCont');
        $colStatus->Name = 'Estatus';

        $this->dtgSdeContenedor->MetaAddColumn(QQN::SdeContenedor()->Producto);
        //$this->dtgSdeContenedor->MetaAddColumn('MontoFlete');
        //$this->dtgSdeContenedor->MetaAddColumn('NumeroValijas');
        //$this->dtgSdeContenedor->MetaAddColumn('Valijas');
        //$this->dtgSdeContenedor->MetaAddColumn('PaisId');
        //$this->dtgSdeContenedor->MetaAddColumn('Hora');

        $this->btnExpoExce_Create();
    }

    public function dtgSdeContenedorsRow_Click($strFormId, $strControlId, $strParameter) {
        $intId = intval($strParameter);
        QApplication::Redirect("sde_checkpoint_master_edit.php/$intId");
    }

    /*public function CrearColumnas() {
        $this->colEditLinkColumn = new QDataGridColumn(QApplication::Translate('Edit'), '<?= $_FORM->dtgSdeContenedor_EditLinkColumn_Render($_ITEM) ?>');
        $this->colEditLinkColumn->HtmlEntities = false;
        $this->colNumeCont = new QDataGridColumn(QApplication::Translate('Master'), '<?= QString::Truncate($_ITEM->NumeCont, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->NumeCont), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->NumeCont, false)),'Width=100');
        $this->colCodiOper = new QDataGridColumn(QApplication::Translate('Codi Oper'), '<?= $_FORM->dtgSdeContenedor_CodiOperObject_Render($_ITEM); ?>');
        $this->colFecha = new QDataGridColumn(QApplication::Translate('Fecha'), '<?= $_FORM->dtgSdeContenedor_Fecha_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Fecha), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Fecha, false)));
        $this->colStatCont = new QDataGridColumn(QApplication::Translate('Status'), '<?= $_FORM->dtgSdeContenedor_StatCont_Render($_ITEM); ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->StatCont), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->StatCont, false)),'Width=250');
        $this->colProductoId = new QDataGridColumn(QApplication::Translate('Producto'), '<?= $_FORM->dtgSdeContenedor_Producto_Render($_ITEM); ?>');
        $this->colMontoFlete = new QDataGridColumn(QApplication::Translate('Monto Flete'), '<?= $_ITEM->MontoFlete; ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->MontoFlete), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->MontoFlete, false)));
        $this->colMaster = new QDataGridColumn(QApplication::Translate('Master'), '<?= $_ITEM->Master; ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Master), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Master, false)));
        $this->colNumeroValijas = new QDataGridColumn(QApplication::Translate('Numero Valijas'), '<?= $_ITEM->NumeroValijas; ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->NumeroValijas), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->NumeroValijas, false)));
        $this->colValijas = new QDataGridColumn(QApplication::Translate('Valijas'), '<?= QString::Truncate($_ITEM->Valijas, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Valijas), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Valijas, false)),'Width=500');
        $this->colPaisId = new QDataGridColumn(QApplication::Translate('Pais Id'), '<?= $_ITEM->PaisId; ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->PaisId), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->PaisId, false)));
        $this->colHora = new QDataGridColumn(QApplication::Translate('Hora'), '<?= QString::Truncate($_ITEM->Hora, 200); ?>', array('OrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Hora), 'ReverseOrderByClause' => QQ::OrderBy(QQN::SdeContenedor()->Hora, false)),'Width=15');
    }

    public function dtgAddColumnsSdeContenedor() {
        $this->dtgSdeContenedor->AddColumn($this->colEditLinkColumn);
        $this->dtgSdeContenedor->AddColumn($this->colNumeCont);
        //$this->dtgSdeContenedor->AddColumn($this->colCodiOper);
        $this->dtgSdeContenedor->AddColumn($this->colFecha);
        $this->dtgSdeContenedor->AddColumn($this->colStatCont);
        $this->dtgSdeContenedor->AddColumn($this->colProductoId);
        //$this->dtgSdeContenedor->AddColumn($this->colMontoFlete);
        //$this->dtgSdeContenedor->AddColumn($this->colMaster);
        //$this->dtgSdeContenedor->AddColumn($this->colNumeroValijas);
        //$this->dtgSdeContenedor->AddColumn($this->colValijas);
        //$this->dtgSdeContenedor->AddColumn($this->colPaisId);
        //$this->dtgSdeContenedor->AddColumn($this->colHora);
    }

    public function dtgSdeContenedor_EditLinkColumn_Render(SdeContenedor $objSdeContenedor) {
        return sprintf('<a href="sde_checkpoint_master_edit.php?strNumeCont=%s">%s</a>',
        $objSdeContenedor->NumeCont,
        QApplication::Translate('Seleccionar'));
        $strNumeCont = $objSdeContenedor->NumeCont;
        $SESION['NumeCont'] = serialize($strNumeCont);
    }

    public function dtgSdeContenedor_CodiOperObject_Render(SdeContenedor $objSdeContenedor) {
        if (!is_null($objSdeContenedor->CodiOperObject)) {
            return $objSdeContenedor->CodiOperObject->__toString();
        } else {
            return null;
        }
    }

    public function dtgSdeContenedor_Fecha_Render(SdeContenedor $objSdeContenedor) {
        if (!is_null($objSdeContenedor->Fecha)) {
            return $objSdeContenedor->Fecha->__toString("DD/MM/YYYY");
        } else {
            return null;
        }
    }

    public function dtgSdeContenedor_Producto_Render(SdeContenedor $objSdeContenedor) {
        if (!is_null($objSdeContenedor->Producto)) {
            return $objSdeContenedor->Producto->__toString();
        } else {
            return null;
        }
    }

    public function dtgSdeContenedor_StatCont_Render(SdeContenedor $objSdeContenedor) {
        if (!is_null($objSdeContenedor->StatCont)) {
            if ($objSdeContenedor->StatCont == 'P') {
                $strStatCont = 'EN PROCESO DE AUDITORIA';
            }
            if ($objSdeContenedor->StatCont == 'R') {
                $strStatCont = 'CONFIRMADO';
            }
            return $strStatCont;
        } else {
            return null;
        }
    }*/

    protected function dtgSdeContenedor_Bind() {
        //------------------------------------------------------------
        // Se chequea la existencia de algun criterio de busqueda
        // y en caso positivo, se aplica dicho criterio, en caso
        // contrario, se cargan todos las recolectas
        //------------------------------------------------------------
        if (isset($_SESSION['Criterio']) && isset($_SESSION['TablCrit']) && $_SESSION['TablCrit'] == 'SdeContenedor') {
            $objCondicion = unserialize($_SESSION['Criterio']);
            $this->dtgSdeContenedor->TotalItemCount = SdeContenedor::QueryCount(QQ::AndCondition($objCondicion));
            $objClauses = array();
            if ($objClause = $this->dtgSdeContenedor->OrderByClause) {
                array_push($objClauses, $objClause);
                if ($objClause = $this->dtgSdeContenedor->LimitClause) {
                    array_push($objClauses, $objClause);
                    $this->dtgSdeContenedor->DataSource = SdeContenedor::QueryArray(QQ::AndCondition($objCondicion),$objClauses);
                    //--------------------------------------------------------------
                    // Vector de datos necesarios para ser enviado a la rutina PDF
                    //--------------------------------------------------------------
                    $objClauses = array();
                    if ($objClause = $this->dtgSdeContenedor->OrderByClause) {
                        array_push($objClauses, $objClause);
                        $this->arrDataSour = SdeContenedor::QueryArray(QQ::AndCondition($objCondicion),$objClauses);
                    }
                }
            }
        } else {
            // Get Total Count b/c of Pagination
            $this->dtgSdeContenedor->TotalItemCount = SdeContenedor::CountAll();

            $objClauses = array();
            if ($objClause = $this->dtgSdeContenedor->OrderByClause) {
                array_push($objClauses, $objClause);
                if ($objClause = $this->dtgSdeContenedor->LimitClause) {
                    array_push($objClauses, $objClause);
                    $this->dtgSdeContenedor->DataSource = SdeContenedor::LoadAll($objClauses);
                    //--------------------------------------------------------------
                    // Vector de datos necesarios para ser enviado a la rutina PDF
                    //--------------------------------------------------------------
                    $objClauses = array();
                    if ($objClause = $this->dtgSdeContenedor->OrderByClause) {
                        array_push($objClauses, $objClause);
                        $this->arrDataSour = SdeContenedor::LoadAll($objClauses);
                    }
                }
            }
        }
    }

    /*protected function btnPdf_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------------
        // Datos necesarios para imprimir reporte PDF
        //--------------------------------------------------
        if ($this->blnHayxDato) {
            $_SESSION['Dato'] = serialize($this->arrDato2PDF);
            $_SESSION['Enca'] = serialize($this->arrEnca2PDF);
            $_SESSION['Anch'] = serialize($this->arrAnch2PDF);
            $_SESSION['Just'] = serialize($this->arrJust2PDF);
            QApplication::Redirect('../util/includes/tabla2pdf2.php?nomb_repo=SdeContenedor');
        }
    }

    protected function btnXls_Click($strFormId, $strControlId, $strParameter) {
        //--------------------------------------------------
        // Datos necesarios para imprimir reporte PDF
        //--------------------------------------------------
        foreach ($this->arrDataSour as $objTabla) {
            if ($objTabla->NumeCont) {
                $strNumeCont = $objTabla->NumeCont.' ';
            } else {
                $strNumeCont = 'N/A';
            }
            if ($objTabla->Fecha) {
                $strFechCont = $objTabla->Fecha->__toString("DD/MM/YYYY");
            } else {
                $strFechCont = 'N/A';
            }
            if ($objTabla->StatCont) {
                if ($objTabla->StatCont == 'R') {
                    $strStatCont = 'Procesado';
                } else {
                    $strStatCont = 'Pendiente';
                }
            } else {
                $strStatCont = 'N/A';
            }
            if ($objTabla->ProductoId) {
                $strCodiProd = $objTabla->Producto->__toString();
            } else {
                $strCodiProd = 'N/A';
            }
            $this->arrDato2PDF[] = array($strNumeCont.' ',$strFechCont,$strStatCont,$strCodiProd);
        }
        if (isset($this->arrDato2PDF)) {
            $this->arrEnca2PDF = array('Manifiesto', 'Fecha Creacion', 'Estatus' , 'Tipo de Producto');
            $this->arrAnch2PDF = array(30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30,30);
            $this->arrJust2PDF = array('C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C','C');
            $this->blnHayxDato = true;
        } else {
            $this->blnHayxDato = false;
        }
        if ($this->blnHayxDato) {
            $_SESSION['Dato'] = serialize($this->arrDato2PDF);
            $_SESSION['Enca'] = serialize($this->arrEnca2PDF);
            $_SESSION['Anch'] = serialize($this->arrAnch2PDF);
            $_SESSION['Just'] = serialize($this->arrJust2PDF);
            QApplication::Redirect('../util/includes/tabla2xls2.php?nomb_repo=SdeContenedor');
        }
    }*/
}

SdeCheckpointMasterList::Run('SdeCheckpointMasterList');
?>