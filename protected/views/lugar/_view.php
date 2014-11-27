<?php   
/* @var $this LugarController */
/* @var $data Lugar */
?>

<div class="view">

    <pre>
        <?php print_r($model); ?>
    </pre>
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
    <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
    <?php echo CHtml::encode($data->nombre); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_servicio_id')); ?>:</b>
    <?php echo CHtml::encode($data->tipo_servicio_id); ?>
    <br />

    <b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
    <?php echo CHtml::encode($data->valor); ?>
    <br />

</div>