<?php
/* @var $this DocumentsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documents',
);

$this->menu=array(
	array('label'=>'Create Documents', 'url'=>array('create')),
	array('label'=>'Manage Documents', 'url'=>array('admin')),
);
$atts = Documents::model();
?>

<h1>Заявки</h1>
<a href="<?php echo Yii::app()->createUrl('documents/create');?>" class="btn btn-primary btn-lg">Добавить заявку</a>
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
							<th><label><input type="text" name="id" value="<?php echo $atts->getAttributeLabel('id');?>" class="search_init" style="width:80px" /></label></th>
							<th><?php echo $atts->getAttributeLabel('datetime');?></th>
							<th><?php echo $atts->getAttributeLabel('area');?></th>
							<th><?php echo $atts->getAttributeLabel('city');?></th>
							<th><?php echo $atts->getAttributeLabel('name');?></th>
							<th><?php echo $atts->getAttributeLabel('amount');?></th>
							<th><?php echo $atts->getAttributeLabel('contribution');?></th>
							<th><?php echo $atts->getAttributeLabel('need');?></th>
							<th><?php echo $atts->getAttributeLabel('analysis');?></th>
							<th><?php echo $atts->getAttributeLabel('state');?></th>
						</tr>
					</thead>
					<tbody>
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
					<?php foreach($dataProvider AS $data):?>
						<tr>
							<td><a href="<?php echo Yii::app()->createUrl('documents/update',array('id'=>$data->id))?>"><?php echo $data->id?></a></td>
							<td><?php echo $data->datetime?></td>
							<td><?php echo $data->areas->name?></td>
							<td><?php echo $data->cities->name?></td>
							<td><?php echo $data->name?></td>
							<td><?php echo $data->amount?></td>
							<td><?php echo $data->contribution?></td>
							<td><?php echo $data->need?></td>
							<td><?php echo $data->analysis?></td>
							<td><?php echo $atts->translateState($data->state)?></td>
						</tr>
					<?php endforeach;?>
					</tbody>
					<tfoot>
						<tr>
							<th><?php echo $atts->getAttributeLabel('id');?></th>
							<th><?php echo $atts->getAttributeLabel('datetime');?></th>
							<th><?php echo $atts->getAttributeLabel('area');?></th>
							<th><?php echo $atts->getAttributeLabel('city');?></th>
							<th><?php echo $atts->getAttributeLabel('name');?></th>
							<th><?php echo $atts->getAttributeLabel('amount');?></th>
							<th><?php echo $atts->getAttributeLabel('contribution');?></th>
							<th><?php echo $atts->getAttributeLabel('need');?></th>
							<th><?php echo $atts->getAttributeLabel('analysis');?></th>
							<th><?php echo $atts->getAttributeLabel('state');?></th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>


<style>

    @media print {

        @page {size:landscape}
        a:link:after, a:visited:after {content:"";font-size:90%;}

        header{
            display: none;
        }
        .btn {
            display: none;
        }

        .box .box-header{
            display: none;
        }

        .container{
            width: 100%;
        }

        #datatable-2_wrapper > .box-content{
            display: none;
        }

        #datatable-2{
            display: block;
            font-size: 12px;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
        }

        #datatable-2 th{
            background: none;
            padding: 2px;
        }

        #datatable-2.table-datatable .sorting{
            background: none;
            padding: 2px;
        }

        #datatable-2 input{
            display: none;
        }
    }
</style>


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