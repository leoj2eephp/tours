<tr class="row" index=<?php echo $newRow; ?>>
    <td>
        <?php 
            Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'['.$newRow.']fecha',
                'options' => array(
                    'firstDay'=>'1',
                    'localization'=>'es',
                ),
                'htmlOptions'=>array(
                    'style'=>'width: 74px;'
                )
            ));
        ?>
    </td>
    <td><?php echo CHtml::activeDropDownList($model,'['.$newRow.']dia_semana',DayEnum::getArray(),array('style'=>'width: 110px;')); ?></td>
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
    <td><?php echo CHtml::activeTextField($model,'['.$newRow.']n_personas',array('style'=>'width: 56px;')); ?></td>
    <td><?php echo CHtml::dropDownList('Servicio['.$newRow.'][tipo_servicio_id]',$model,$tiposServicio,
            //echo CHtml::dropDownList('asdf',$model,array('a'=>1,'b'=>2),
            array(
                'ajax' => array(
                    'type'=>'POST', //request type
                    'url'=>CController::createUrl('cotizacion/getLugaresAjax'),
                    'data'=>array('idTipoServicio'=>'js:$(this).val()','index'=>'js:$(this).parent().parent().attr("index")'),
                ),
                'prompt'=>'Seleccione',
                'style'=>'width: 110px;',
            )); ?>
    </td>
    <td>
        <?php echo CHtml::activeDropDownList($model,'['.$newRow.']lugar_id',array(),array('id'=>'lugarId_'.$newRow,'style'=>'width: 150px;')); ?>
    </td>
    <td><?php echo CHtml::activeDropDownList($model,'['.$newRow.']entrada',array('No','Sí'),array('style'=>'width: 56px;')); ?></td>
    <td><?php echo CHtml::activeDropDownList($model,'['.$newRow.']idioma_guia_id',$idiomas,array('style'=>'width: 110px;')); ?></td>
    <td><?php echo CHtml::activeListBox($model,'['.$newRow.']extras',$extras,array('style'=>'width: 110px; height: 56px;','multiple'=>'multiple')); ?></td>
    <td><?php echo CHtml::activeTextField($model,'['.$newRow.']valor',array('style'=>'width: 74px;')); ?></td>
    <td><?php echo CHtml::ajaxButton($label='',$url=CController::createUrl('cotizacion/addRow'),
            $ajaxOptions=array (
                'type'=>'POST', //request type
                'url'=>CController::createUrl('cotizacion/addRow'),
                'data'=>'js:{"rowId": $("#tablaServicios tr:last").attr("index") }',
                'dataType'=>'html',
                //'success'=>"js:function(data){ alert(1); }",
                'success'=>'js:function(data){ $("#tablaServicios tr:last").after(data); }'
            ),
            $htmlOptions=array('style'=>'border: none; background: url('.Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat; '
                . 'padding-bottom: 38px; width: 52px;')); ?>
    </td>
</tr>