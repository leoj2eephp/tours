<?php
/* @var $this TourController */
/* @var $data Tour */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tour_id')); ?>:</b>
	<?php echo CHtml::encode($data->tour_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excursion_id')); ?>:</b>
	<?php echo CHtml::encode($data->excursion_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primera')); ?>:</b>
	<?php echo CHtml::encode($data->primera); ?>
	<br />


</div>