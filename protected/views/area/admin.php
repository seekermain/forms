<?php
/* @var $this AreaController */
/* @var $model Area */

$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Area', 'url'=>array('index')),
	array('label'=>'Create Area', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#area-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Районы</h1>

<a href="<?php echo Yii::app()->createUrl('area/create');?>" class="btn btn-primary btn-lg">Добавить район</a>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'area-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
