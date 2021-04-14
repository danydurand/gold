<?php
// Load the QCubed Development Framework
require_once('qcubed.inc.php');
require_once(__APP_INCLUDES__.'/protected.inc.php');
require_once(__APP_INCLUDES__.'/FormularioBaseKaizen.class.php');

class DirectorioTelefonico extends FormularioBaseKaizen {
    protected $dtrSucuActi;

	protected function Form_Create() {
		parent::Form_Create();

		$this->lblTituForm->Text = 'Directorio de Sucursales';

        $this->dtrSucuActi_Create();
    }

    protected function dtrSucuActi_Create() {

        $this->dtrSucuActi = new QDataRepeater($this);

        $this->dtrSucuActi->Paginator = new QPaginator($this);
        $this->dtrSucuActi->ItemsPerPage = 6;

        $this->dtrSucuActi->PaginatorAlternate = new QPaginator($this);

        $this->dtrSucuActi->UseAjax = true;

        $this->dtrSucuActi->Template = 'dtrSucuActi.tpl.php';

        $this->dtrSucuActi->SetDataBinder('dtgSucursales_Bind');

    }

    public function dtgSucursales_Bind() {
        $objClauOrde   = QQ::Clause();
        $objClauOrde[] = QQ::OrderBy(QQN::Sucursales()->Iata);
        $objClauWher   = QQ::Clause();
        $objClauWher[] = QQ::IsNull(QQN::Sucursales()->DeletedAt);
        $objClauWher[] = QQ::Equal(QQN::Sucursales()->EsAlmacen,SinoType::NO);
        $arrSucuActi   = Sucursales::QueryArray(QQ::AndCondition($objClauWher));
        t('El vector tiene: '.count($arrSucuActi));
        $arrSucuDefi   = array();
        foreach ($arrSucuActi as $objSucuActi) {
            t('Procesando: '.$objSucuActi->Iata);
            t('Receptorias: '.$objSucuActi->CountCountersAsSucursal());
            if ($objSucuActi->CountCountersAsSucursal() > 0) {
                $arrSucuDefi[] = $objSucuActi;
            }
        }
        $this->dtrSucuActi->DataSource = $arrSucuDefi;
    }
}
DirectorioTelefonico::Run('DirectorioTelefonico');
?>