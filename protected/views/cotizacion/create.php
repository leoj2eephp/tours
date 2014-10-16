<?php
/* @var $this CotizacionController */
?>
<head>
    <style>
        .cotizacion td {
            padding: 0px 7px 0px 4px;
        }
    </style>
</head>
<table class="form cotizacion">
<?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($cotizacionForm);?>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'nombre'); ?></td>
        <td><?php echo CHtml::activeTextField($cotizacionForm,'nombre'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'pais'); ?></td>
        <td><?php echo CHtml::activeDropDownList($cotizacionForm,'pais_id',$paisesData,array('id'=>'idPais')); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'tipoMoneda'); ?></td>
        <td><?php echo CHtml::activeDropDownList($cotizacionForm,'moneda_id',$monedasData,array('id'=>'idMonedas')); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'asunto'); ?></td>
        <td><?php echo CHtml::activeDropDownList($cotizacionForm,'asunto_id', array(1=>AsuntoEnum::COTIZACION(), 2=>AsuntoEnum::CONFIRMACION()),array('id'=>'idAsunto')); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'fecha'); ?></td>
        <td>
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$cotizacionForm,
                'attribute'=>'fecha',
                'options' => array(
                    'showAnim'=>'blind',
                    //'regional'=>'es',
                    //'dateFormat'=>'d/m/yy'
                ),
                'language'=>'es',
              ));
            ?>
            <?php //echo CHtml::activeTextField($cotizacionForm,'fecha'); ?>
        </td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'nombre_pasajero'); ?></td>
        <td><?php echo CHtml::activeTextField($cotizacionForm,'nombre_pasajero'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'numero_pax'); ?></td>
        <td><?php echo CHtml::activeTextField($cotizacionForm,'numero_pax'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'nombreHotel'); ?></td>
        <td><?php echo CHtml::activeDropDownList($cotizacionForm,'hotel_id',$hotelesData,array('id'=>'idHotel')); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'fecha_inicio'); ?></td>
        <td>
            <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$cotizacionForm,
                'attribute'=>'fecha_inicio',
                'options' => array(
                    'showAnim'=>'blind',
                    //'dateFormat'=>'d/m/yy'
                ),
                'language'=>'es',
              ));
            ?>
            <?php //echo CHtml::activeTextField($cotizacionForm,'fecha_inicio'); ?>
        </td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($cotizacionForm,'fecha_termino'); ?></td>
        <td>
            <?php
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$cotizacionForm,
                'attribute'=>'fecha_termino',
                'options' => array(
                    'showAnim'=>'blind',
                    //'dateFormat'=>'d/m/yy'
                ),
                'language'=>'es',
              ));
            ?>
            <?php //echo CHtml::activeTextField($cotizacionForm,'fecha_termino'); ?>
        </td>
    </tr>
    
    <tr class="row submit">
        <td><?php echo CHtml::submitButton('Siguiente'); ?></td>
    </tr>
<?php echo CHtml::endForm(); ?>
</table><!-- form -->