<?php
/* @var $this LugaresController */
/* @var $data Lugares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugares_id')); ?>:</b>
	<?php echo CHtml::encode($data->lugares_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoServicio.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->primera); ?>
	<br />


</div>