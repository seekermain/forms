<?php
/* @var $this DocumentsController */
/* @var $model Documents */
/* @var $form CActiveForm */

$area_checkbox = Area::model()->findAll();
if($model->area->id)
	$city_checkbox = City::model()->findAllByAttributes(array('area_id'=>$model->area->id));
else
	$city_checkbox = City::model()->findAllByAttributes(array('area_id'=>$model->area));
?>


<div class="box">
	<div class="box-content">
		<div class="text-center">
			<h3 class="page-header">Форма заявки</h3>
			<p class="note">Поля отмеченные <span class="required">*</span> обязательны для заполнения.</p>
		</div>
	<?php if(!$model->isNewRecord):?>
		<div class="form-group col-sm-6">
		<label class="control-label required"><?php echo $model->getAttributeLabel('id');?></label>
			<input class="form-control" type="text" value="<?php echo $model->id?>" disabled='true'>
		</div>
		
		<div class="form-group col-sm-6">
		<label class="control-label required"><?php echo $model->getAttributeLabel('datetime');?></label>
			<input class="form-control" type="text" value="<?php echo $model->datetime?>" disabled='true'>
		</div>
	<?php endif;?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documents-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php //echo $form->errorSummary($model); ?>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'name',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'name',array('maxlength'=>200, 'class'=>'form-control')); ?>
		<?php echo $form->error($model,'name',array('style'=>'color:red')); ?>
	</div>

	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'area',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'area',CHtml::listData($area_checkbox,'id','name'),array('maxlength'=>200,'class'=>'form-control','id'=>'change-area')); ?>
		<?php echo $form->error($model,'area',array('style'=>'color:red')); ?>
	</div>
	<br>
	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'city',array('class'=>'control-label')); ?>
		<?php echo $form->dropDownList($model,'city',CHtml::listData($city_checkbox,'id','name'),array('maxlength'=>200,'class'=>'form-control','id'=>'change-city')); ?>
		<?php echo $form->error($model,'city',array('style'=>'color:red')); ?>
	</div>
	
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'amount',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'amount',array('maxlength'=>50,'class'=>'form-control change-need','id'=>'change-amount')); ?>
		<?php echo $form->error($model,'amount',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'contribution',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'contribution',array('maxlength'=>50,'class'=>'form-control change-need','id'=>'change-contribution')); ?>
		<?php echo $form->error($model,'contribution',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-4">
		<?php echo $form->labelEx($model,'need',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'need',array('maxlength'=>50,'class'=>'form-control change-need','id'=>'change-need')); ?>
		<?php echo $form->error($model,'need',array('style'=>'color:red')); ?>
	</div>
	
	<div class="form-group col-sm-12">
		<?php echo $form->labelEx($model,'analysis',array('class'=>'control-label')); ?>
		<?php echo $form->textArea($model,'analysis',array('cols'=>50,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'analysis',array('style'=>'color:red')); ?>
	</div>
	
	<legend></legend>
	<div class="text-center">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать заявку' : 'Сохранить изменения',array('class'=>'btn btn-success')); ?>
			<a href="<?php echo Yii::app()->request->getBaseUrl(true);?>" class="btn btn-danger" style="margin-left: 100px;">Закрыть форму</a>
	</div>

<?php $this->endWidget(); ?>
	</div>
</div>
<script>
$(document).ready(function(){
	$(".change-need").keyup(function(){
		var sum;
		sum = $("#change-amount").val()-$("#change-contribution").val();
		$("#change-need").val(sum);
	});
	$("#change-area").change(function(){
		$("#change-area").attr("disabled",true);
		$("#change-city").attr("disabled",true);
		$.ajax({
			type: "POST",
			url: "<?php echo Yii::app()->getBaseUrl(true).Yii::app()->createUrl('ajax/changecity');?>",
			data: {'area_id': $("#change-area").val()},
		}).done(function(data){
			if(data!=false)
			{
				$("#change-city").html(data);
			}
			$("#change-area").attr("disabled",false);
			$("#change-city").attr("disabled",false);
		});
	});
});
</script>