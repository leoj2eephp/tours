<?php
/* @var $this TourController */
/* @var $model Tour */

$this->menu=array(
    array('label'=>'Crear Tour', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tour-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Tours</h1>

<?php echo CHtml::link('Búsqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
    'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
    $this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'tour-grid',
        'dataProvider'=>$model->search(),
        //'filter'=>$model,
        'columns'=>array(
            'id',
            //'tour_id',
            //'excursion_id',
            //'nombre',
            'nombre',
            //'primera',
            'valor',
            array(
                'class'=>'CButtonColumn',
            ),
        ),
    ));
?>