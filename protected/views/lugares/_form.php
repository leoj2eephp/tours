<?php
/* @var $this LugaresController */
/* @var $model Lugares */
/* @var $form CActiveForm */
?>
<head>
    <script>
        var arrayJS = null;
        var idTipoServicioSelected = null;
        <?php
            $baseURL = Yii::app()->request->baseUrl;
            echo 'var baseURL = "'.$baseURL.'";';
            echo 'idTipoServicioSelected = '.$model["lugars"]["tipo_servicio_id"];
        ?>
            
        $(document).ready(function(){
        <?php
            if(isset($lugares)) { ?>
                arrayJS=<?php echo json_encode($lugares);?>;
        <?php } ?>
            $(".addButton").click(function(){
                addButton();
            });
            
            $(".lugar>option").removeAttr("selected");
            if(arrayJS != null) {
                for(var i=0;i<arrayJS.length;i++) {
                    id = "ex_"+i;
                    $("#"+id+">option[value="+arrayJS[i]["lugar_id"]+"]").attr("selected",true);
                }
            }
            //forzar tipo servicio seleccionado
            $("#tipoServicioId>option").each(function(i,o) {
                if(o.value == idTipoServicioSelected) {
                   $("#tipoServicioId>option")[i].selected = true;
                }
            });
            
            $("#tipoServicioId").change(function(){
                $.ajax({
                    url: baseURL+'/index.php/lugares/getByServiceType',
                    data: 'idTipoServicio='+$(this).val(),
                    dataType: 'html',
                    success: function(data){
                        $(".lugar").html(data);
                    }
                });
            });
        });
        
        function addButton(){
            lastRow = parseInt($("#creaLugares tr[index]:last").attr("index")) + 1;
            html = '<tr class="row" index='+lastRow+' style="height: 56px;">';
            html += '<td><span>Sigue a.. </span></td>';
            html += '<td><select name="Lugares['+lastRow+'][lugar_id]" id="ex_'+lastRow+'" class="lugar">';
            <?php
                foreach($lugars as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select><input type="hidden" name="Lugares['+lastRow+'][primera]" value="0" />';
            //html += '<input type="hidden" name="Lugares['+lastRow+'][tipo_excursion_id]" class="tipo_excursion_id" value="'+$("#Tour_0_tipo_excursion_id").val()+'"/></td>';
            html += '<td><div style="float: left;"><input type="button" value="" class="addButton" onClick="addButton()" style="border: none; \n\
                    background: url('+baseURL+'/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div>\n\
                        <div style="float: left;"><input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none; \n\
                    background: url('+baseURL+'/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div></td>';
            html += '</tr>';

            $("#creaLugares tr:last").after(html);
        }
        
        function removeButton(a){
            index = a.parent().parent().parent().attr("index");
            $("tr[index="+index+"]").remove();
        }
    </script>
</head>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugares-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
            
        <div class="row">
            Tipo Servicio: 
            <?php
            if($model->isNewRecord) {
                echo $form->dropDownList($modelTS, 'id', $tipoServicioList, array("id"=>"tipoServicioId")); 
            } else {
                echo $form->dropDownList($model['lugars'], 'tipo_servicio_id', $tipoServicioList, array("id"=>"tipoServicioId")); 
            }
            ?>
	</div>
        
        <table id="creaLugares">
        <?php
            if($model->isNewRecord) { ?>
                <tr index="0">
                    <td style="width: 100px;"><span>Lugares: </span></td>
                    <td>
                        <?php 
                            echo $form->dropDownList($model, '[0]lugar_id', $lugars, array("id"=>"ex_0", "class"=>"lugar"));
                            echo $form->hiddenField($model, '[0]primera', array("value"=>"1"));
                        ?>
                    </td>
                    <td><?php echo CHtml::button('',array("class"=>"addButton",
                        'style'=>'border: none; background: url('.Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;'
                        . 'padding-bottom: 38px; width: 52px;')); ?></td>
                </tr>
            <?php } else {
                    $first = true;
                    $index = 0;
                    foreach($lugares as $l) {
                        echo '<tr index="'.($index).'">';
                        if($first) {
                            echo '<td><span>Lugar: </span></td>';
                        } else {
                            echo '<td><span>Sigue a.. </span></td>';
                        }
            ?>
                        <td>
                            <?php echo CHtml::activeDropDownList($model, '['.$index.']lugar_id', $lugars, array("id"=>"ex_".$index, "class"=>"lugar"));
                            ?>
                            <?php 
                                if($first)
                                    echo $form->hiddenField($model, '['.$index.']primera', array("value"=>"1"));
                                else
                                    echo $form->hiddenField($model, '['.$index.']primera', array("value"=>"0"));
                            ?>
                        </td>
                <?php   if($first) {
                            echo '<td>';
                            echo CHtml::button('',array("class"=>"addButton",
                                'style'=>'border: none; background: url('.Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;'
                                . 'padding-bottom: 38px; width: 52px;'));
                            echo '</td>';
                        } else { ?>
                        <td>
                            <div style="float: left;">
                                <input type="button" value="" class="addButton" onClick="addButton();" style="border: none; 
                                    background: url(<?php echo $baseURL; ?>/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/>
                            </div>
                            <div style="float: left;">
                                <input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none;
                                    background: url(<?php echo $baseURL; ?>/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/>
                            </div>
                        </td>
            <?php       }
                        echo '</tr>';
                        $first = false;
                        $index++;
                    }
                } 
            ?>
        </table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        
        <pre>
        <?php //print_r($model); ?>
        </pre>

<?php $this->endWidget(); ?>

</div><!-- form -->
