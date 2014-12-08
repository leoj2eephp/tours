<?php
/* @var $this ExtraController */
/* @var $model Extra */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'extra-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
            <?php echo $form->labelEx($model,'nombre'); ?>
            <?php echo $form->textField($model,'nombre',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'nombre'); ?>
	</div>
        <div class="row">
            <?php echo $form->labelEx($model,'valor'); ?>
            <?php echo $form->textField($model,'valor',array('size'=>45,'maxlength'=>45)); ?>
            <?php echo $form->error($model,'valor'); ?>
	</div>
        
	<div class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->