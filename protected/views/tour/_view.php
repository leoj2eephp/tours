<?php
/* @var $this TourController */
/* @var $data Tour */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('excursion.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->excursion_id); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('tipoExcursion.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->tipoExcursion->nombre); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->tipoExcursion->nombre); ?>
	<br />

</div>