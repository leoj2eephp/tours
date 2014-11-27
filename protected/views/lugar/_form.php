<?php
/* @var $this LugarController */
/* @var $model Lugar */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'lugar-form',
	//'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'nombre'); ?>
            <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'nombre'); ?>
	</div>
	<div class="row">
            <?php echo $form->labelEx($model,'tipo_servicio_id'); ?>
            <?php echo $form->dropDownList($model,'tipo_servicio_id',$tipoServicios); ?>
            <?php echo $form->error($model,'tipo_servicio_id'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'valor'); ?>
            <?php echo $form->textField($model,'valor',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->