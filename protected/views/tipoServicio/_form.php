<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-servicio-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'nombre'); ?>
            <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'nombre'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'sigueA'); ?>
            <?php echo $form->dropDownList($model,'sigueA',array(0=>'NO', 1=>'SÍ')); ?>
            <?php echo $form->error($model,'sigueA'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'valor'); ?>
            <?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>100)); ?>
            <?php echo $form->error($model,'valor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->