<?php
/* @var $this DocumentsController */
/* @var $model Documents */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Documents', 'url'=>array('index')),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);
?>

<h1 style="margin-left: 10px; margin-bottom: 12px;">Create Documents</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>