<head>
    <style>
        #hora { width: 56px; }
        .container { max-width: none; width: 1080px; }
        td { padding: 2px 2px 0px 5px; border: 2px solid white; }
        .cabecera { background-color: #007BB9; color: white; }
        .cabecera2 { background-color: #94ABB6; color: white; }
        .ui-datepicker { font-size: 10px; }
        .row-fluid .span8 { width: 100%; }
    </style>
    <script>
        var arrayDays = new Array();
        <?php
            foreach(DayEnum::getArray() as $valor => $dato) {
                echo 'arrayDays['.$valor.'] = "'.$dato.'";';
            }
            echo 'var baseURL = "'.Yii::app()->request->baseUrl.'";';
        ?>
            
        function getDayOfTheWeek(t){
            var date = t.datepicker('getDate');
            index = t.parent().parent().attr('index');
            $("#dia_"+index).val(arrayDays[date.getUTCDay()]);
            $("input[name='ServicioPrograma["+index+"][dia_semana]']").val(date.getUTCDay());
        }
        
        function addButton(){
            //lastRow = parseInt($("#tablaServicios tr:last").attr("index")) + 1;
            lastRow = parseInt($("#tablaServicios tr[index]:last").attr("index")) + 1;
            html = '<tr class="row" index='+lastRow+'>';
            html += '<td><input type="text" class="datepicker" name="ServicioPrograma['+lastRow+'][fecha]" style="width: 74px;" onChange="getDayOfTheWeek($(this))"></td>';
            html += '<td><input type="text" id="dia_'+lastRow+'" disabled="disabled" style="width: 85px;">';
            html += '<input type="hidden" name="ServicioPrograma['+lastRow+'][dia_semana]" /></td>';
            html += '<td><input type="text" name="ServicioPrograma['+lastRow+'][hora]" class="datetimepicker" style="width: 72px;"/></td>';
            html += '<td><select name="ServicioPrograma['+lastRow+'][tipo_servicio_id]" style="width: 125px;" class="ajaxLugares">\n\
                        <option value="">Seleccione</option>';
            <?php
                foreach($tiposServicio as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select></td>';
            html += '<td><select name="ServicioPrograma['+lastRow+'][lugar_id]" id="lugarId_'+lastRow+'" style="width: 150px;"></select></td>';
            html += '<td><select name="ServicioPrograma['+lastRow+'][entrada]" style="width: 56px;"><option value="0">No</option><option value="1">Sí</option></select></td>';
            html += '<td><select name="ServicioPrograma['+lastRow+'][idioma_guia_id]" style="width: 110px;">\n\
                        <option value="">Seleccione</option>';
            <?php
                foreach($idiomas as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select></td>';
            html += '<td><select name="ServicioPrograma['+lastRow+'][extras][]" multiple="multiple" style="width: 110px; height: 56px;">';
            <?php
                foreach($extras as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select></td>';
            //html += '<td><input type="text" name="ServicioPrograma['+lastRow+'][valor]" style="width: 74px;"/></td>';
            html += '<td><div style="float: left;"><input type="button" value="" class="addButton" onClick="addButton()" style="border: none; \n\
                background: url('+baseURL+'/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div>\n\
                    <div style="float: left;"><input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none; \n\
                background: url('+baseURL+'/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div></td>';
            html += '</tr>';
            $("#lastRow").before(html);
            //$("#tablaServicios tr:last").after(html);

            $(".datepicker").datepicker({
                yearRange: '-0:+5',
                minDate: '+0m +0d',
            });
            $('.datetimepicker').datetimepicker({
                timeOnly: true,
                hourGrid: 0,
                minuteGrid: 0,
                timeFormat: 'hh:mm tt',
            });

            $(".ajaxLugares").change(function(){
                $index = $(this).parent().parent().attr("index");
                $.ajax({
                    url: '/tours/index.php/programa/getLugaresAjax',
                    type: 'POST',
                    data: "idTipoServicio="+$(this).val()+"&index="+$index,
                    dataType: 'html',
                    success: function(data){
                        $("#lugarId_"+$index).html(data);
                    }
                });
            });
        }
        
        function removeButton(a){
            index = a.parent().parent().parent().attr("index");
            $("tr[index="+index+"]").remove();
        }
        
        function changeTotales(precio, index) {
            $(".totales_"+index).each(function(i,o){
                total = $(o).val();
                pax = $(o).attr("pax");
                total = (parseInt(total) + parseInt(precio)) * parseInt(pax);
                console.log(precio);
                //$(o).val(total);
            });
        }
        
        $(document).ready(function(){
            
            $(".addButton").click(function(){
                addButton();
            });
            
            $("#fecha").change(function(){
                getDayOfTheWeek($(this));
            });
            
            $(".tipoServicio").change(function(){
                var index = $(this).parent().parent().attr("index");
                var precio = 0;
                if($("#lugarId_"+index).val() != null) {
                    console.log("entre 1");
                    precio = $("#lugarId_"+index+">option:selected").attr("precio");
                } else if(this.options[this.selectedIndex].value != '') {
                    console.log("entre 2");
                    precio = this.options[this.selectedIndex].getAttribute("precio");
                }
                
                console.log(precio);
                //changeTotales(precio, index);
            });
            
            $(".lugares").change(function(){
                var index = $(this).parent().parent().attr("index");
                var precio = 0;
                if($(this).val() != null) {
                    precio = $(this).attr("precio");
                } else if($("#tipoServicio_"+index+">option:selected").val() != '') {
                    precio = $("#tipoServicio_"+index+">option:selected").attr("precio");
                }
                
                changeTotales(precio, index);
            });
            
            $(".container").attr("style", "width: 1580px;");
        });
    </script>
</head>
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'servicios-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>true,
    ));
?>
<div style="float: left;">
    <table class="form cotizacion" id="tablaServicios">
        <?php echo $form->errorSummary($model); ?>
        <tr class="row cabecera">
            <td><?php echo CHtml::activeLabel($model,'fecha'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'dia_semana'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'hora'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'tipo_servicio_id'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'excursion_id'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'entrada'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'idioma_guia_id'); ?></td>
            <td><?php echo CHtml::activeLabel($model,'extras.extra_id'); ?></td>
            <td></td>
        </tr>
        <tr class="row" id="firstRow" index="0">
            <td>
                <?php 
                    Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                        'model'=>$model,
                        'attribute'=>'[0]fecha',
                        'options' => array(
                            'firstDay'=>'1',
                            'yearRange'=>'-0:+5',
                            'minDate'=>'+0m +0d',
                        ),
                        'htmlOptions'=>array(
                            'id'=>'fecha',
                            'style'=>'width: 74px;'
                        ),
                        'language'=>'es',
                    ));
                ?>
            </td>
            <td>
                <?php
                    echo CHtml::textField('','',array('style'=>'width: 85px;','id'=>'dia_0','disabled'=>true));
                    echo CHtml::activeHiddenField($model,'[0]dia_semana'); 
                ?>
            </td>
            <td>
                <?php
                    $this->widget('ext.jui.EJuiDateTimePicker',array(
                        'model'=>$model,
                        'attribute'=>'[0]hora',
                        'language'=>'es',
                        'options'=>array(
                            'showOn'=>'focus',
                            'timeFormat'=>'hh:mm tt',
                            'timeOnly'=>true,
                            'hourGrid'=>0,
                            'minuteGrid'=>0,
                        ),
                        'htmlOptions'=>array('style'=>'width: 72px;')
                    ));
                ?>
            </td>
            <td><?php echo CHtml::activeDropDownList($model,'[0]tipo_servicio_id',$tiposServicio,
                    array(
                        'ajax' => array(
                            'type'=>'POST', //request type
                            'url'=>CController::createUrl('programa/getLugaresAjax'),
                            'data'=>array('idTipoServicio'=>'js:$(this).val()','index'=>'js:$(this).parent().parent().attr("index")'),
                            'update'=>'#lugarId_0',
                            'async'=>false,
                            /*'success'=>'function(data){'
                            . ' alert(data);
                                var index = $(this).parent().parent().attr("index");
                                var precio = 0;
                                if($("#lugarId_"+index).val() != null) {
                                    precio = $("#lugarId_"+index+">option:selected").attr("precio");
                                } else if(this.options[this.selectedIndex].value != "") {
                                    precio = this.options[this.selectedIndex].getAttribute("precio");
                                }

                                console.log(precio);
                                changeTotales(precio, index);'
                            . '}',*/
                        ),
                        'prompt'=>'Seleccione',
                        'style'=>'width: 125px;',
                        'class'=>'tipoServicio',
                        'id'=>'tipoServicio_0',
                    )); ?>
            </td>
            <td>
                <?php echo CHtml::activeDropDownList($model,'[0]excursion_id',array(),array('id'=>'lugarId_0','style'=>'width: 150px;','class'=>'lugares')); ?>
            </td>
            <td><?php echo CHtml::activeDropDownList($model,'[0]entrada',array('No','Sí'),array('style'=>'width: 56px;')); ?></td>
            <td><?php echo CHtml::activeDropDownList($model,'[0]idioma_guia_id',$idiomas,array('prompt'=>'Seleccione','style'=>'width: 110px;')); ?></td>
            <td><?php echo CHtml::activeListBox($model,'[0]extras',$extras,array('style'=>'width: 110px; height: 56px;','multiple'=>'multiple')); ?></td>
            <td><?php echo CHtml::button('',array("class"=>"addButton",
                'style'=>'border: none; background: url('.Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;padding-bottom: 38px; width: 52px;')); ?></td>


        </tr>
        <tr class="row" id="lastRow">
            <td colspan="11" style="text-align: right;">
                <?php echo CHtml::submitButton('Enviar'); ?>
            </td>
        </tr>
    </table><!-- form -->
</div>
<div>
    <table id="tablaTotales">
        <tr class="row cabecera2">
            <td>TOTAL PP</td>
        <?php
            $i = $paxMin;
            for($i;$i<=$paxMax;$i++) {
                echo '<td>'.$i.'</td>';
                echo '<td>Entr.</td>';
            }
        ?>
        </tr>
        <tr class="row" index="0">
            <td>$</td>
        <?php
            $i = $paxMin;
            for($i;$i<=$paxMax;$i++) {
                echo '<td><input type="text" class="totales_0" pax="'.$i.'" style="width: 74px;" /></td>';
                echo '<td>'.($i*40).'</td>';
            }
        ?>
        </tr>
    </table>
</div>

<?php $this->endWidget(); ?>