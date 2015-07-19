<?php
/* @var $this DocumentsController */
/* @var $model Documents */

$this->breadcrumbs=array(
	'Documents'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Documents', 'url'=>array('index')),
	array('label'=>'Create Documents', 'url'=>array('create')),
	array('label'=>'Update Documents', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Documents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);
?>

<h1>Заявка №<?php echo $model->id; ?></h1>

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'name',
		'city',
		'area',
		'amount',
		'contribution',
		'need',
		'analysis',
		'datetime',
		'state',
	),
)); */?>
<div class="box">
	<div class="box-content">

	<div class="text-center">
		<h3 class="page-header">Просмотр заявки</h3>
	</div>

	<?php //echo ($model); ?>

	<div class="form-group col-sm-6">
	<label class="control-label required"><?php echo $model->getAttributeLabel('id');?></label>
		<input class="form-control" type="text" value="<?php echo $model->id?>" disabled='true'>
	</div>
	
	<div class="form-group col-sm-6">
	<label class="control-label required"><?php echo $model->getAttributeLabel('datetime');?></label>
		<input class="form-control" type="text" value="<?php echo $model->datetime?>" disabled='true'>
	</div>

	<div class="form-group col-sm-12">
		<label class="control-label required"><?php echo $model->getAttributeLabel('name');?></label>
		<input class="form-control" type="text" value="<?php echo $model->name?>" disabled='true'>
	</div>

	<div class="form-group col-sm-12">
	<label class="control-label required"><?php echo $model->getAttributeLabel('area');?></label>
		<input class="form-control" type="text" value="<?php echo $model->area?>" disabled='true'>
	</div>

	<div class="form-group col-sm-12">
	<label class="control-label required"><?php echo $model->getAttributeLabel('city');?></label>
		<input class="form-control" type="text" value="<?php echo $model->city?>" disabled='true'>
	</div>
	
	<div class="form-group col-sm-4">
	<label class="control-label required"><?php echo $model->getAttributeLabel('amount');?></label>
		<input class="form-control" type="text" value="<?php echo $model->amount?>" disabled='true'>
	</div>
	
	<div class="form-group col-sm-4">
	<label class="control-label required"><?php echo $model->getAttributeLabel('contribution');?></label>
		<input class="form-control" type="text" value="<?php echo $model->contribution?>" disabled='true'>
	</div>
	
	<div class="form-group col-sm-4">
	<label class="control-label required"><?php echo $model->getAttributeLabel('need');?></label>
		<input class="form-control" type="text" value="<?php echo $model->need?>" disabled='true'>
	</div>
	
	<div class="form-group col-sm-12">
	<label class="control-label required"><?php echo $model->getAttributeLabel('analysis');?></label>
		<input class="form-control" type="textarea" value="<?php echo $model->analysis?>" disabled='true'>
	</div>
	
	<legend></legend>
	<div class="text-center">
			<a id="open_modal" href="#" class="btn btn-success">Отправить заявку на изменение</a>
			<a href="<?php echo Yii::app()->request->getBaseUrl(true);?>" class="btn btn-danger" style="margin-left: 100px;">Обратно к списку</a>
	</div>

	</div>
</div>
<div id="modalbox" class="" style="display: none;">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Запрос на изменение заявки</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
			<div class="form-group col-sm-12">
				<label class="control-label required">Прокомментируйте запрос:</label>
				<textarea class="devoops-modal-inner-textarea form-control" style="min-height:200px"></textarea>
			</div>
		</div>
		<div class="devoops-modal-note">
		</div>
		<div class="devoops-modal-bottom text-center">
		<a id="send_request" href="#" class="btn btn-success send_request">Отправить</a>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
	$("#open_modal").click(function(event){
		event.preventDefault();
		// $(".devoops-modal-inner").html('<div class="form-group col-sm-12">'+
		// 		'<label class="control-label required">Прокомментируйте запрос:</label>'+
		// 		'<textarea class="form-control" style="min-height:200px"></textarea>'+
		// 	'</div>');
		//$(".devoops-modal-bottom").html('<a id="send_request" href="#" class="btn btn-success send_request">Отправить</a>');
		$("#modalbox").attr("style","display:block");
		$("#send_request").attr("disabled",false);
	});
	$("#send_request").click(function(event){
		event.preventDefault();
		$(".devoops-modal-note").html("");
		$("#send_request").attr("disabled",true);
		$.ajax({
			type: "POST",
			url: "<?php echo Yii::app()->getBaseUrl(true).Yii::app()->createUrl('ajax/request');?>",
			data: {'doc_id':'<?php echo $model->id;?>', 'comment':$(".devoops-modal-inner-textarea").val()},
		}).done(function(data){
			var a;
			$("#send_request").attr("disabled",false);
			a = JSON.parse(data);
			$(".devoops-modal-note").html('<span class="'+a['type']+'">'+a['note']+'</span>');
		});
	});
});
</script>