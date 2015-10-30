<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<a href="<?php echo Yii::app()->createUrl('site/CreateForm');?>">
<button type="button" class="btn btn-primary btn-lg">Добавить заявку</button>
</a>
<br>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Список заявок</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
				<thead>
						<tr>
							<th><label><input type="text" name="id" value="Номер" class="search_init" style="width:80px" /></label></th>
							<th>Дата</th>
							<th>Район</th>
							<th>Город</th>
							<th>Название</th>
							<th>Стоимость</th>
							<th>Совклад</th>
							<th>Потребность</th>
							<th>Анализ</th>
							<th>Статус</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Ubuntu</td>
							<td>16%</td>
							<td>ф</td>
							<td>13.10</td>
							<td>1</td>
							<td>Ubuntu</td>
							<td>16%</td>
							<td>ф</td>
							<td>13.10</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>Номер</th>
							<th>Дата</th>
							<th>Район</th>
							<th>Город</th>
							<th>Название</th>
							<th>Стоимость</th>
							<th>Совклад</th>
							<th>Потребность</th>
							<th>Анализ</th>
							<th>Статус</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>
<br>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-linux"></i>
					<span>Запросы на редактирование</span>
				</div>
				<div class="box-icons">
					<a class="collapse-link">
						<i class="fa fa-chevron-up"></i>
					</a>
					<a class="expand-link">
						<i class="fa fa-expand"></i>
					</a>
					<a class="close-link">
						<i class="fa fa-times"></i>
					</a>
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content no-padding table-responsive">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
				<thead>
						<tr>
							<th><label><input type="text" name="id" value="Номер заявки" class="search_init" /></label></th>
							<th>Автор запроса</th>
							<th>Дата запроса</th>
							<th>Коммент</th>
							<th>Действие</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>1</td>
							<td>Ubuntu</td>
							<td>16%</td>
							<td>ф</td>
							<td>13.10</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<th>Номер заявки</th>
							<th>Автор запроса</th>
							<th>Дата запроса</th>
							<th>Коммент</th>
							<th>Действие</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1();
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
