<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */

?>

<div class="box">
	<div class="box-content">
		<div class="text-center">
			<h3 class="page-header">Реквизиты пользователя</h3>
			<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
			<?php if(!$model->isNewRecord):?>
				<p class="note">Если оставить поле "Пароль" пустым, старый пароль сохранится</p>
			<?php endif;?>
		</div>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'login',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'login',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'login',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'password',array('class'=>'control-label')); ?>
		<?php if(!$model->isNewRecord):?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control','value'=>'')); ?>
		<?php else:?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control',)); ?>
		<?php endif;?>
		<?php echo $form->error($model,'password',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'realName',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'realName',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'realName',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'email',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-6">
		<?php echo $form->labelEx($model,'role',array('class'=>'control-label')); ?>
		<select class="form-control">
			<option <?php if($model->role=='user') echo 'selected';?>>user</option>
			<option <?php if($model->role=='administrator') echo 'selected';?>>administrator</option>
		</select>
		<?php echo $form->error($model,'role',array('style'=>'color:red')); ?>
	</div>
	<br>
	<legend></legend>
	<div class="text-center form-group">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Добавить' : 'Сохранить изменения',array('class'=>'btn btn-success')); ?>
	</div>

<?php $this->endWidget(); ?>
	</div>
</div>
