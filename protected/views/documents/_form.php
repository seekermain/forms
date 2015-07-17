<?php
/* @var $this DocumentsController */
/* @var $model Documents */
/* @var $form CActiveForm */
?>


<div class="box">
	<div class="box-content">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<div class="text-center">
		<h3 class="page-header">Форма заявки</h3>
		<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
	</div>

	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>200, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'area',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'area',array('maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'area',array('style'=>'color:red')); ?>
	</div>
	<br>
	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'city',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'city',array('maxlength'=>200,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'city',array('style'=>'color:red')); ?>
	</div>
	
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'amount',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'amount',array('maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'amount',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'contribution',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'contribution',array('maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'contribution',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'need',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'need',array('maxlength'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'need',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'analysis',array('class'=>'control-label')); ?>
		<?php echo $form->textArea($model,'analysis',array('cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'analysis',array('style'=>'color:red')); ?>
	</div>
	
	
	<div class="text-center">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать заявку' : 'СОхранить изменения',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
</div>