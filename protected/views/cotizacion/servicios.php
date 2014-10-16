<head>
    <style>
        #hora { width: 56px; }
    </style>
</head>
<table class="form cotizacion">
<?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($model);?>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'fecha'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'dia_semana'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'hora'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'n_personas'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'tipo_servicio_id'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'lugar_id'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'entrada'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'tipoServicio'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'idioma_guia_id'); ?></td>
        <td><?php echo CHtml::activeLabel($model,'valor'); ?></td>
    </tr>
    <tr class="row">
        <td>
            <?php 
                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                    'model'=>$model,
                    'attribute'=>'fecha',
                    'options' => array(
                        'showAnim'=>'blind',
                    ),
                    'htmlOptions'=>array(
                        'style'=>'width: 74px;'
                    )
                ));
            ?>
        </td>
        <td><?php echo CHtml::activeDropDownList($model,'dia_semana',DayEnum::getArray(),array('style'=>'width: 110px;')); ?></td>
        <td>
            <?php
                $this->widget('application.extensions.timepicker.timepicker', array(
                    'model'=>$model,
                    'name'=>'hora',
                    'id'=>'hora',
                    'options'=>array(
                        'showOn'=>'focus',
                        'timeFormat'=>'hh:mm',
                        'timeOnly'=>true,
                        'hourGrid'=>0,
                        'minuteGrid'=>0,
                    ),
                ));
            ?>
        </td>
        <td><?php echo CHtml::activeTextField($model,'n_personas',array('style'=>'width: 56px;')); ?></td>
        <td><?php echo CHtml::activeDropDownList($model,'tipo_servicio_id',$tiposServicio,
                array(
                    'ajax' => array(
                        'type'=>'POST', //request type
                        'url'=>CController::createUrl('CotizacionController/loadByTipoServicio'),
                        'data'=>'js:lugarId=$("#lugarId").val()',
                        'update'=>'#'.CHtml::activeId($model,'lugar_id'), //selector to update
                        //'data'=>'js:javascript statement' 
                        //leave out the data key to pass all form values through
                        )
                )); ?>
        </td>
        <td>
            <?php echo CHtml::activeDropDownList($model,'lugar_id',array(),array('id'=>'lugarId')); ?>
        </td>
        <td><?php echo CHtml::activeTextField($model,'entrada',array('style'=>'width: 56px;')); ?></td>
        <td><?php echo CHtml::activeTextField($model,'tipoServicio'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'idioma_guia_id'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'valor'); ?></td>
    </tr>
    
    <tr class="row submit">
        <td><?php echo CHtml::submitButton('Cotizar'); ?></td>
    </tr>
<?php echo CHtml::endForm(); ?>
</table><!-- form -->
<pre>
    <?php
                //print_r(new timepicker());
    ?>
</pre>