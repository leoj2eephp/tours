<?php
/* @var $this ExcursionController */
/* @var $model Excursion */
/* @var $form CActiveForm */
?>
<style>
    img { max-width: 50%; }
</style>
<script>
    <?php
        $baseURL = Yii::app()->request->baseUrl;
        echo 'var baseURL = "'.$baseURL.'";';
    ?>
    function addButton(){
        lastRow = parseInt($("#imagesUploader tr[index]:last").attr("index")) + 1;
        html = '<tr class="row" index='+lastRow+' style="height: 56px;">';
        html += '<td><input type="hidden" value="" name="Excursion[image]['+lastRow+']"><input type="file" name="Excursion[image]['+lastRow+']" accept="image/*" /></td>';
        html += '<td><div style="float: left;"><input type="button" value="" class="addButton" onClick="addButton()" style="border: none; \n\
                background: url('+baseURL+'/images/add_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div>\n\
                    <div style="float: left;"><input type="button" value="" class="removeButton" onClick="removeButton($(this))" style="border: none; \n\
                background: url('+baseURL+'/images/delete_button_min.png)no-repeat;padding-bottom: 11px; width: 23px;"/></div></td>';
        html += '</tr>';
        
        $("#imagesUploader tr:last").after(html);
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
<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'excursion-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
    )); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>
    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'nombre'); ?>
        <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'nombre'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'descripcion'); ?>
        <?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>150, 'style'=>'width: 605px;')); ?>
        <?php echo $form->error($model,'descripcion'); ?>
    </div>
    
    <!--<ul class="thumbnails">
        <li class="span3" style="width: 250px;" >
            <div class="thumbnail">
                <?php
                    /*$items = array();
                    foreach($model->sigueA as $valor) {
                        $items[$valor->sigue_a_id] = array('selected' => 'selected');
                    }
                    $selected = array($items);
                ?>
                <?php echo $form->labelEx($model, 'sigueA'); ?>
                <?php
                    if(!$model->isNewRecord)
                        echo $form->listBox($model, 'sigueA', $excursionList, array('multiple'=>true, 'options'=>$selected[0]));
                    else
                        echo $form->listBox($model, 'sigueA', $excursionList, array('multiple'=>true));*/
                ?>
            </div>
        </li>
        <li class="span3" style="width: 101px;" >
            <div class="thumbnail">
                <?php
                    /*$items = array();
                    foreach($model->sigueA as $valor) {
                        $items[$valor->sigue_a_id] = array('selected' => 'selected');
                    }
                    $selected = array($items);
                ?>
                <?php echo $form->labelEx($model, 'seguidaPor'); ?>
                <?php
                    if(!$model->isNewRecord)
                        echo $form->listBox($model, 'seguidaPor', $excursionList, array('multiple'=>true, 'options'=>$selected[0]));
                    else
                        echo $form->listBox($model, 'seguidaPor', $excursionList, array('multiple'=>true));*/
                ?>
            </div>
        </li>
    </ul>-->
    
    <div class="row">
    </div>
    
    <!--<div class="row" style="float: left;">
        <?php
            /*echo $form->labelEx($model, 'ruta_archivo');
            echo $form->fileField($model, 'image');*/
        ?>
    </div>
    
    <div>
        <?php
            //if($model->ruta_imagen != '') echo CHtml::image($model->ruta_imagen,'',array('style'=>'padding-left: 20px;'));
        ?>
    </div>-->
    
    <table id="imagesUploader">
        <tr>
            <th colspan="2" style="text-align: left; padding-top: 5px;"><?php echo $form->labelEx($model, 'Subir imagen'); ?></th>
        </tr>
        <tr index="0">
            <td>
                <?php echo $form->fileField($model, 'image[0]'); ?>
            </td>
            <td><?php echo CHtml::button('',array("class"=>"addButton",
                'style'=>'border: none; background: url('.Yii::app()->request->baseUrl.'/images/add_button.png) no-repeat;'
                . 'padding-bottom: 38px; width: 52px;')); ?></td>
        </tr>
        <?php
            if(!$model->isNewRecord) {
                foreach($model->imagenes as $imagen) {
                    echo '<tr index="'.($imagen->id).'">';
        ?>
                    <td>
                        <?php echo $form->fileField($model, 'image['.$imagen->id.']'); ?>
                        <?php echo $form->hiddenField($model, 'image['.$imagen->id.']', array('value'=>$imagen->id)); ?>
                    </td>
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
                    
                    <?php
                        echo '<td>';
                        echo CHtml::image($imagen->ruta_imagen,'',array('style'=>'padding-left: 20px;'));
                        echo '</td>';
                    
                    echo '</tr>';
                }
            } 
        ?>
    </table>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>

<?php $this->endWidget(); ?>
</div><!-- form -->