<?php
/* @var $this TipoServicioController */
/* @var $model TipoServicio */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
            <?php echo $form->label($model,'id'); ?>
            <?php echo $form->textField($model,'id'); ?>
	</div>
	<div class="row">
            <?php echo $form->label($model,'nombre'); ?>
            <?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
	</div>
        <div class="row">
            <?php echo $form->label($model,'valor'); ?>
            <?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Filtrar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->