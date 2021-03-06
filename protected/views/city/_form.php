<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
$area_checkbox = Area::model()->findAll();
?>

<div class="box">
	<div class="box-content">
		<div class="text-center">
			<h3 class="page-header">Добавление города</h3>
			<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
		</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'area_id',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'area_id',CHtml::listData($area_checkbox,'id','name'),array('maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'area_id',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->