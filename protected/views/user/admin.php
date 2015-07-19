<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);
?>

<h1>Пользователи</h1>

<a href="<?php echo Yii::app()->createUrl('user/create');?>">
<button type="button" class="btn btn-primary btn-lg">Добавить пользователя</button>
</a>
<br>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<span>Список заявок</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>

				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
				<thead>
						<tr>
							<th><?php echo $model->getAttributeLabel('id');?></th>
							<th><?php echo $model->getAttributeLabel('login');?></th>
							<th><?php echo $model->getAttributeLabel('realName');?></th>
							<th><?php echo $model->getAttributeLabel('email');?></th>
							<th><?php echo $model->getAttributeLabel('role');?></th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($dataProvider->data AS $data):?>
						<tr>
							<td><a href="<?php echo Yii::app()->createUrl('user/update',array('id'=>$data->id))?>"><?php echo $data->id?></a></td>
							<td><?php echo $data->login?></td>
							<td><?php echo $data->realName?></td>
							<td><?php echo $data->email?></td>
							<td><?php echo $data->role?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable2();
	LoadSelect2Script(MakeSelect2);
}
function MakeSelect2(){
	$('select').select2();
	$('.dataTables_filter').each(function(){
		$(this).find('label input[type=text]').attr('placeholder', 'Search');
	});
}
$(document).ready(function() {
	// Load Datatables and run plugin on tables 
	LoadDataTablesScripts(AllTables);
	// Add Drag-n-Drop feature
	WinMove();
});
</script>
