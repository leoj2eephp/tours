<?php
/* @var $this LugaresController */
/* @var $model Lugares */
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
            <?php echo $form->label($model,'lugares_id'); ?>
            <?php echo $form->textField($model,'lugares_id'); ?>
	</div>
	<div class="row">
            <?php echo $form->label($model,'lugar_id'); ?>
            <?php echo $form->textField($model,'lugar_id'); ?>
	</div>
	<div class="row">
            <?php echo $form->label($model,'primera'); ?>
            <?php echo $form->textField($model,'primera'); ?>
	</div>
        <div class="row">
            <?php echo $form->label($model,'valor'); ?>
            <?php echo $form->textField($model,'valor',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->