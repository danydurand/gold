            <table class="table table-condensed">
                <thead>
                    <tr>
                        <th width="10%">Forma Pago</th>
                        <th>Divisa</th>
                        <th>Referencia</th>
                        <th>Banco</th>
                        <th>Monto del Pago</th>
                        <th>Pago USD</th>
                        <th>Pago BS</th>
                        <th style="text-align: center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php $this->lstFormPago->Render(); ?></td>
                        <td><?php $this->lstDiviPago->Render(); ?></td>
                        <td><?php $this->txtRefePago->Render(); ?></td>
                        <td><?php $this->lstBancPago->Render(); ?></td>
                        <td><?php $this->txtMontDivi->Render(); ?></td>
                        <td><?php $this->txtMontDola->Render(); ?></td>
                        <td><?php $this->txtMontBoli->Render(); ?></td>
                        <td style="text-align: center">
                            <?php $this->btnSavePago->Render(); ?>
                            <?php $this->btnCancPago->Render(); ?>
                            <?php $this->btnBorrPago->Render(); ?>
                        </td>
                    </tr>
                </tbody>
            </table>




