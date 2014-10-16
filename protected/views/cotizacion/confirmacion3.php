<head>
    <style>
        .container { max-width: none; width: 1080px; }
        td { padding: 2px 2px 0px 2px; border: 2px solid white; }
        .cabecera { background-color: #007BB9; color: white; }
        .ui-datepicker { font-size: 10px; }
        th { text-align: left; color: #007BB9; padding: 10px 0 5px 0; }
    </style>
    <script>
        
        <?php echo 'var baseURL = "'.Yii::app()->request->baseUrl.'";'; ?>
        
        function addButton(){
            lastRow = parseInt($("#tablaPasajeros tr[index]:last").attr("index")) + 1;
            console.log("kajsgf");
            html = '<tr class="row" index="'+lastRow+'">';
            html += '<td><input type="text" name="Pasajero['+lastRow+'][nombre]" style="width: 245px;"/></td>';
            html += '<td><select name="Pasajero['+lastRow+'][pais_id]" style="width: 95px;">\n\
                        <option value="">Seleccione</option>';
            <?php
                foreach($paises as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select></td>';
            html += '<td><input type="text" name="Pasajero['+lastRow+'][fecha_nac]" class="datepicker" style="width: 75px;"/></td>';
            html += '<td><input type="text" name="Pasajero['+lastRow+'][pasaporte]" style="width: 145px;"/></td>';
            html += '<td><textarea name="Pasajero['+lastRow+'][observaciones]" style="width: 405px;"></textarea></td>';
            html += '<td><div style="float: left;"><input type="button" value="" class="addButton" onClick="addButton()" style="border: none; \n\
                background: url('+baseURL+'/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div>\n\
                    <div style="float: left;"><input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none; \n\
                background: url('+baseURL+'/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div></td>';
            $("#tablaPasajeros tr[index]:last").after(html);
            
            $(".datepicker").datepicker();
        }
        
        function removeButton(a){
            index = a.parent().parent().parent().attr("index");
            $("tr[index="+index+"]").remove();
        }
        
        $(document).ready(function(){
            
            $(".addButton").click(function(){
                addButton();
            });
            
        });
        
    </script>
</head>
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'confirmacion-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
)); ?>
<table class="form cotizacion">
    <?php echo CHtml::errorSummary($model);?>
    <tr>
        <th>N° COTIZACION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $model->nombre_pasajero.' '.$model->id; ?></th>
    </tr>
    <tr>
        <td>
            <table>
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'cotizante.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'cotizante.pais.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'moneda.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'asunto.descripcion'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'fecha'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'nombre_pasajero'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'numero_pax'); ?></td>
                </tr>
                <tr class="row">
                    <td><?php echo CHtml::activeTextField($model['cotizante'],'nombre',array('style'=>'width: 245px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model['cotizante']['pais'],'nombre',array('style'=>'width: 85px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model['moneda'],'nombre',array('style'=>'width: 95px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model['asunto'],'descripcion',array('style'=>'width: 95px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model,'fecha',array('style'=>'width: 85px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model,'nombre_pasajero',array('disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model,'numero_pax',array('style'=>'width: 55px;','disabled'=>true)); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'hotel.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'fecha_inicio'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'fecha_termino'); ?></td>
                </tr>
                <tr class="row">
                    <td><?php echo CHtml::activeTextField($model['hotel'],'nombre',array('style'=>'width: 245px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model,'fecha_inicio',array('style'=>'width: 85px;','disabled'=>true)); ?></td>
                    <td><?php echo CHtml::activeTextField($model,'fecha_termino',array('style'=>'width: 95px;','disabled'=>true)); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <td>
            <table>
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.fecha'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.hora_vuelo',array('style'=>'width: 59px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.num_vuelo'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.linea_aerea_id'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.hora_pickup',array('style'=>'width: 59px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.idioma_id'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'arrivoCjc.detalle_servicio_id'); ?></td>
                </tr>
                <tr class="row">
                    <?php if(isset($model['arrivoCjc'])) { ?>
                        <td>
                            <?php
                                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$model['arrivoCjc'],
                                    'attribute'=>'fecha',
                                    'options' => array(
                                        'firstDay'=>'1',
                                        'dateFormat'=>'DD, d MM, yy'
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'fechaArrivo',
                                        'style'=>'width: 245px;'
                                    ),
                                    'language'=>'es',
                                ));
                            ?>
                        </td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$model['arrivoCjc'],
                                    'attribute'=>'hora_vuelo',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'horaVueloArrivo',
                                        'style'=>'width: 59px;',
                                    )
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeTextField($model['arrivoCjc'],'num_vuelo',array('style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($model['arrivoCjc'],'linea_aerea_id',$lineasAereas,array('style'=>'width: 75px;')); ?></td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$model['arrivoCjc'],
                                    'attribute'=>'hora_pickup',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'horaPickupArrivo',
                                        'style'=>'width: 59px;',
                                    )
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeDropDownList($model['arrivoCjc'],'idioma_id',$idiomas,array('prompt'=>'Seleccione','style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($model['arrivoCjc']['detalleServicio'],'nombre',$detalleServicios,
                            array('style'=>'width: 110px;','options'=>array($model['arrivoCjc']->detalle_servicio_id=>array('selected'=>true)))); ?></td>
                    <?php } else { ?>
                        <td>
                            <?php 
                                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$modelArrivoCjc,
                                    'attribute'=>'fecha',
                                    'options' => array(
                                        'firstDay'=>'1',
                                        'dateFormat'=>'DD, d MM, yy'
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'fecha',
                                        'style'=>'width: 245px;'
                                    ),
                                    'language'=>'es',
                                ));
                            ?>
                        </td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$modelArrivoCjc,
                                    'attribute'=>'hora_vuelo',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array('style'=>'width: 59px;')
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeTextField($modelArrivoCjc,'num_vuelo',array('style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($modelArrivoCjc,'linea_aerea_id',$lineasAereas,array('style'=>'width: 75px;')); ?></td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$modelArrivoCjc,
                                    'attribute'=>'hora_pickup',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array('style'=>'width: 59px;')
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeDropDownList($modelArrivoCjc,'idioma_id',$idiomas,array('prompt'=>'Seleccione','style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($modelArrivoCjc,'detalle_servicio_id',$detalleServicios,array('style'=>'width: 110px;')); ?></td>
                    <?php } ?>
                </tr>
            </table>
            <table>
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.fecha'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.hora_vuelo',array('style'=>'width: 59px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.num_vuelo'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.linea_aerea_id'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.hora_pickup',array('style'=>'width: 59px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.idioma_id'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'salidaCjc.detalle_servicio_id'); ?></td>
                </tr>
                <tr class="row">
                    <?php if(isset($model['salidaCjc'])) { ?>
                        <td>
                            <?php 
                                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$model['salidaCjc'],
                                    'attribute'=>'fecha',
                                    'options' => array(
                                        'firstDay'=>'1',
                                        'dateFormat'=>'DD, d MM, yy'
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'fechaSalida',
                                        'style'=>'width: 245px;'
                                    ),
                                    'language'=>'es',
                                ));
                            ?>
                        </td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$model['salidaCjc'],
                                    'attribute'=>'hora_vuelo',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,s
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'horaVueloSalida',
                                        'style'=>'width: 59px;',
                                    )
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeTextField($model['salidaCjc'],'num_vuelo',array('style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($model['salidaCjc'],'linea_aerea_id',$lineasAereas,array('style'=>'width: 75px;')); ?></td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$model['salidaCjc'],
                                    'attribute'=>'hora_pickup',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array(
                                        'id'=>'horaPickupSalida',
                                        'style'=>'width: 59px;',
                                    )
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeDropDownList($model['salidaCjc'],'idioma_id',$idiomas,array('prompt'=>'Seleccione','style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($model['salidaCjc'],'detalle_servicio_id',$detalleServicios,array('style'=>'width: 75px;')); ?></td>
                    <?php } else { ?>
                        <td>
                            <?php 
                                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$modelSalidaCjc,
                                    'attribute'=>'fecha',
                                    'options' => array(
                                        'firstDay'=>'1',
                                        'dateFormat'=>'DD, d MM, yy'
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'width: 245px;'
                                    ),
                                    'language'=>'es',
                                ));
                            ?>
                        </td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$modelSalidaCjc,
                                    'attribute'=>'hora_vuelo',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array('style'=>'width: 59px;')
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeTextField($modelSalidaCjc,'num_vuelo',array('style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($modelSalidaCjc,'linea_aerea_id',$lineasAereas,array('style'=>'width: 75px;')); ?></td>
                        <td>
                            <?php
                                $this->widget('ext.jui.EJuiDateTimePicker',array(
                                    'model'=>$modelSalidaCjc,
                                    'attribute'=>'hora_pickup',
                                    'language'=>'es',
                                    'options'=>array(
                                        'showOn'=>'focus',
                                        'timeFormat'=>'hh:mm tt',
                                        'timeOnly'=>true,
                                        'hourGrid'=>0,
                                        'minuteGrid'=>0,
                                    ),
                                    'htmlOptions'=>array('style'=>'width: 59px;')
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeDropDownList($modelSalidaCjc,'idioma_id',$idiomas,array('prompt'=>'Seleccione','style'=>'width: 110px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($modelSalidaCjc,'detalle_servicio_id',$detalleServicios,array('style'=>'width: 110px;')); ?></td>
                    <?php } ?>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th>DATOS DE PASAJERO</th>
    </tr>
    <tr>
        <td>
            <table id="tablaPasajeros">
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'pasajeros.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'pasajeros.pais.nacionalidad'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'pasajeros.fecha_nac'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'pasajeros.pasaporte'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'pasajeros.observaciones'); ?></td>
                    <td></td>
                </tr>
                <?php $i=0; if(!empty($model['pasajeros'])) { 
                    foreach($model['pasajeros'] as $pasajeros) { ?>
                        <tr class="row" index="<?php echo $i; ?>">
                            <td><?php echo CHtml::activeTextField($pasajeros,'['.$i.']nombre',array('style'=>'width: 245px;')); ?></td>
                            <td><?php echo CHtml::activeTextField($pasajeros['pais'],'['.$i.']nacionalidad',array('style'=>'width: 95px;')); ?></td>
                            <td>
                                <?php 
                                    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                        'model'=>$pasajeros,
                                        'attribute'=>'['.$i.']fecha_nac',
                                        'options' => array(
                                            'firstDay'=>'1',
                                            'dateFormat'=>'d/m/y'
                                        ),
                                        'htmlOptions'=>array(
                                            'style'=>'width: 75px;',
                                        ),
                                        'language'=>'es',
                                    ));
                                ?>
                            </td>
                            <td><?php echo CHtml::activeTextField($pasajeros,'['.$i.']pasaporte',array('style'=>'width: 145px;')); ?></td>
                            <td><?php echo CHtml::activeTextField($pasajeros,'['.$i.']observaciones',array('style'=>'width: 405px;')); ?></td>
                            <td><?php echo CHtml::button('',array("class"=>"addButton",'style'=>'border: none; background: url('.
                                Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;padding-bottom: 38px; width: 52px;')); ?></td>
                    <?php $i++;}
                } else { ?>
                    <tr class="row" index="0">
                        <td><?php echo CHtml::activeTextField($modelPasajero,'[0]nombre',array('style'=>'width: 245px;')); ?></td>
                        <td><?php echo CHtml::activeDropDownList($modelPasajero,'[0]pais_id',$paises,array('style'=>'width: 95px;','prompt'=>'Seleccione')); ?></td>
                        <td>
                            <?php
                                Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                                    'model'=>$modelPasajero,
                                    'attribute'=>'[0]fecha_nac',
                                    'options' => array(
                                        'firstDay'=>'1',
                                        //'dateFormat'=>'DD, d MM, yy'
                                    ),
                                    'htmlOptions'=>array(
                                        'style'=>'width: 75px;',
                                    ),
                                    'language'=>'es',
                                ));
                            ?>
                        </td>
                        <td><?php echo CHtml::activeTextField($modelPasajero,'[0]pasaporte',array('style'=>'width: 145px;')); ?></td>
                        <td><?php echo CHtml::activeTextArea($modelPasajero,'[0]observaciones',array('style'=>'width: 405px;')); ?></td>
                        <td><?php echo CHtml::button('',array("class"=>"addButton",'style'=>'border: none; background: url('.
                            Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;padding-bottom: 38px; width: 52px;')); ?></td>
                <?php } ?>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
        <th>ITINERARIO SERVICIO</th>
    </tr>
    <tr>
        <td>
            <table>
                <tr class="row cabecera">
                    <td><?php echo CHtml::activeLabel($model,'servicios.cotizacion_id',array('style'=>'width: 68px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.fecha'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.dia_semana'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.hora'); ?></td>
                    <td><?php echo CHtml::label('N° Pers.','servicios.n_personas',array('style'=>'width: 29px;')); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.tipoServicio.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.lugar.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.entrada'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.idiomaGuia.nombre'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.extras.idioma_guia_id'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'servicios.valor'); ?></td>
                </tr>
                <?php foreach($model['servicios'] as $servicios) {
                    $extrasString;
                    foreach ($servicios['extras'] as $extras) {
                        $extrasString[] = $extras->nombre;
                    }
                    $servicios->fecha = date('d-M-y', strtotime($servicios->fecha));
                    $servicios->hora = date('h:i', strtotime($servicios->hora)); ?>
                    <tr class="row">
                        <td><?php echo CHtml::activeTextField($servicios,'cotizacion_id',array('style'=>'width: 68px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios,'fecha',array('style'=>'width: 65px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::textField('',DayEnum::getDayById($servicios->dia_semana),array('style'=>'width: 77px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios,'hora',array('style'=>'width: 44px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios,'n_personas',array('style'=>'width: 29px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios['tipoServicio'],'nombre',array('style'=>'width: 132px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios['lugar'],'nombre',array('style'=>'width: 154px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::textField('',$servicios->entrada == 1 ? 'SÍ' : 'NO',array('style'=>'width: 54px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios['idiomaGuia'],'nombre',array('style'=>'width: 94px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::textArea('',implode(',', $extrasString),array('style'=>'width: 184px;','disabled'=>true)); ?></td>
                        <td><?php echo CHtml::activeTextField($servicios,'valor',array('style'=>'width: 74px;','disabled'=>true)); ?></td>
                    </tr>
                <?php } ?>
            </table>
        </td>
    </tr>
    <tr class="row" id="lastRow">
        <td colspan="11" style="text-align: right;">
            <?php echo CHtml::submitButton('Enviar'); ?>
        </td>
    </tr>
</table>
<?php $this->endWidget(); ?>