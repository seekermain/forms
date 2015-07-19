<?php
/* @var $this RequestsController */
/* @var $model Requests */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Requests', 'url'=>array('index')),
	array('label'=>'Create Requests', 'url'=>array('create')),
);

?>

<h1>Запросы на изменение заявок</h1>
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
							<th><?php echo $model->getAttributeLabel('doc_id');?></th>
							<th><?php echo User::model()->getAttributeLabel('login');?></th>
							<th><?php echo $model->getAttributeLabel('state_time');?></th>
							<th><?php echo $model->getAttributeLabel('comment');?></th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>

					<?php foreach($dataProvider AS $data):?>
						<tr>
							<td><?php echo $data->doc_id?></td>
							<td><?php echo $data->user->login?></td>
							<td><?php echo $data->state_time?></td>
							<td><?php echo $data->comment?></td>
							<td>
								<table>
									<tr>
										<td><a href="<?php echo Yii::app()->createUrl('requests/updatestate',array('id'=>$data->id,'action'=>'Access'));?>" class="btn btn-success">Разрешить</a></td>
										<td><a href="<?php echo Yii::app()->createUrl('requests/updatestate',array('id'=>$data->id,'action'=>'Save'));?>" class="btn btn-danger">Запретить</a></td>
									</tr>
								</table>
							</td>
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