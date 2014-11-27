<?php
/* @var $this LugaresController */
/* @var $data Lugares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lugar.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->lugar_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipoServicio.nombre')); ?>:</b>
	<?php echo CHtml::encode($data->lugars->tipo_servicio_id); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

</div>