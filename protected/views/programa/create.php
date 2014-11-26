<?php
/* @var $this ProgramaController */
?>
<head>
    <style>
        .cotizacion td {
            padding: 0px 7px 0px 4px;
        }
    </style>
    <script>
        var paxArray = [4,5,6,7,8,9,10,11,12];
        $(document).ready(function(){
            $("#CotizacionForm_fecha_inicio").change(function(){
                var thisDate = convertDateEsToEn($(this).val(), 2);
                $("#CotizacionForm_fecha_termino").datepicker("option", "minDate", thisDate);
            });
            
            $("#paxMin").change(function(){
                valorMin = $(this).val();
                $("#paxMax>option").remove();
                $(paxArray).each(function(i,o){
                    if(o >= parseInt(valorMin)) {
                        var option = document.createElement("option");
                        option.text = o;
                        option.value = o;
                        document.getElementById("paxMax").add(option);
                    }
                });
                $("#paxMax>option").each(function(i,o){
                    if(parseInt(o.value) > parseInt(valorMin))
                        console.log(o.value+' '+valorMin);
                });
            })
        });
    </script>
</head>
<table class="form cotizacion">
<?php echo CHtml::beginForm(); ?>
    <?php echo CHtml::errorSummary($model);?>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'nombre'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'nombre'); ?></td>
        <td><?php echo CHtml::error($model,'nombre'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'empresa_id'); ?></td>
        <td><?php echo CHtml::activeDropDownList($model,'empresa_id',$empresasData,array('id'=>'idEmpresa')); ?></td>
        <td><?php echo CHtml::error($model,'empresa_id'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'fecha'); ?></td>
        <td>
            <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model,
                'attribute'=>'fecha',
                'options' => array(
                    'showAnim'=>'blind',
                    'yearRange'=>'-0:+5',
                    'minDate'=>'+0m +0d',
                ),
                'language'=>'es',
              ));
            ?>
        </td>
        <td><?php echo CHtml::error($model,'fecha'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'nombre_programa'); ?></td>
        <td><?php echo CHtml::activeTextField($model,'nombre_programa'); ?></td>
        <td><?php echo CHtml::error($model,'nombre_programa'); ?></td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'pais'); ?></td>
        <td><?php echo CHtml::activeDropDownList($model,'pais_id',$paisesData,array('id'=>'idPais')); ?></td>
        <td><?php echo CHtml::error($model,'pais_id'); ?></td>
    </tr>
    <tr class="row">
        <td colspan="3">
            <table>
                <tr class="row">
                    <td><?php echo CHtml::activeLabel($model,'Desde'); ?></td>
                    <td><?php echo CHtml::activeDropDownList($model,'pax_min',$rangoPax,array('id'=>'paxMin', 'style'=>'width: 50px;')); ?></td>
                    <td><?php echo CHtml::error($model,'pax_min'); ?></td>
                    <td><?php echo CHtml::activeLabel($model,'Hasta'); ?></td>
                    <td><?php echo CHtml::activeDropDownList($model,'pax_max',$rangoPax,array('id'=>'paxMax', 'style'=>'width: 50px;')); ?></td>
                    <td><?php echo CHtml::error($model,'pax_max'); ?></td>
                </tr>
            </table>
        </td>
    </tr>
    <tr class="row">
        <td><?php echo CHtml::activeLabel($model,'tipoMoneda'); ?></td>
        <td><?php echo CHtml::activeDropDownList($model,'moneda_id',$monedasData,array('id'=>'idMonedas')); ?></td>
        <td><?php echo CHtml::error($model,'moneda_id'); ?></td>
    </tr>
    
    <tr class="row submit">
        <td><?php echo CHtml::submitButton('Siguiente'); ?></td>
    </tr>
<?php echo CHtml::endForm(); ?>
</table><!-- form -->