<?php
/* @var $this TipoServicioController */
/* @var $data TipoServicio */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
    <?php echo CHtml::encode($data->nombre); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('sigueA')); ?>:</b>
    <?php echo CHtml::encode($data->sigueA); ?>
    <br />
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
    <?php echo CHtml::encode($data->valor); ?>
    <br />
        
</div>