<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->breadcrumbs=array(
	'Login',
);
?>

<div class="box" style="width:40%;margin-left:30%;margin-top:100px">
	<div class="box-content">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="text-center">
		<h3 class="page-header">Пройдите авторизацию пожалуйста</h3>
		<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
	</div>
	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'username',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
		<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
		<?php echo $form->error($model,'password',array('style'=>'color:red')); ?>

	</div>


	<div class="text-center">
		<?php echo CHtml::submitButton('Войти',array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
</div>
