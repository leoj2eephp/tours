<?php
/* @var $this TourController */
/* @var $model Tour */
/* @var $form CActiveForm */
?>
<head>
    <script>
        <?php
            $baseURL = Yii::app()->request->baseUrl;
            echo 'var baseURL = "'.$baseURL.'";';
        ?>
            
        function addButton(){
            lastRow = parseInt($("#creaTour tr[index]:last").attr("index")) + 1;
            html = '<tr class="row" index='+lastRow+' style="height: 56px;">';
            html += '<td><span>Sigue a.. </span></td>';
            html += '<td><select name="Tour['+lastRow+'][excursion_id]" id="ex_'+lastRow+'">';
            <?php
                foreach($excursiones as $valor => $dato) {
                    echo 'html += "<option value='.$valor.'>'.$dato.'</option>";';
                }
            ?>
            html += '</select><input type="hidden" name="Tour['+lastRow+'][primera]" value="0" /></td>';
            html += '<td><div style="float: left;"><input type="button" value="" class="addButton" onClick="addButton()" style="border: none; \n\
                    background: url('+baseURL+'/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div>\n\
                        <div style="float: left;"><input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none; \n\
                    background: url('+baseURL+'/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div></td>';
            html += '<input="hidden" name="Tour['+lastRow+']primera" value="false" />';
            html += '</tr>';

            $("#creaTour tr:last").after(html);
        }
        
        function removeButton(a){
            index = a.parent().parent().parent().attr("index");
            $("tr[index="+index+"]").remove();
        }

        $(document).ready(function(){
            var arrayJS=<?php echo json_encode($tours);?>;
            $(".addButton").click(function(){
                addButton();
            });

            $("select>option").removeAttr("selected");
            for(var i=0;i<arrayJS.length;i++) {
                id = "ex_"+i;
                $("#"+id+">option[value="+arrayJS[i]["excursion_id"]+"]").attr("selected",true);
            }
        });
        
    </script>
</head>
<div class="form">

<?php 
    $baseURL = Yii::app()->request->baseUrl;
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tour-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    )); 
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
        <table id="creaTour">
        <?php
            if($model->isNewRecord) { ?>
                <tr index="0">
                    <td style="width: 100px;"><span>Excursión: </span></td>
                    <td>
                        <?php 
                            echo $form->dropDownList($model, '[0]excursion_id', $excursiones, array("id"=>"ex_0"));
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
                    foreach($tours as $tour) {
                        echo '<tr index="'.($index).'">';
                        if($first) {
                            echo '<td><span>Excursión: </span></td>';
                        } else {
                            echo '<td><span>Sigue a.. </span></td>';
                        }
            ?>
                        <td>
                            <?php echo CHtml::activeDropDownList($model, '['.$index.']excursion_id', $excursiones, array("id"=>"ex_".$index));
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

<?php $this->endWidget(); ?>

</div><!-- form -->