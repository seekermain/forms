<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="language" content="en">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/bootstrap/bootstrap.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet">
		<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Righteous' rel='stylesheet' type='text/css'>
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/fancybox/jquery.fancybox.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/fullcalendar/fullcalendar.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/xcharts/xcharts.min.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/select2/select2.css" rel="stylesheet">
		<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/style.css" rel="stylesheet">
		<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/jquery/jquery-2.1.0.min.js"></script>
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	</head>

<body>
<?php if(Yii::app()->user->isGuest):?>
<?php echo $content; ?>
<?php else:?>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="top-panel" class="col-xs-12 col-sm-12">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
						<ul class="nav navbar-nav">
							<li><a href="<?php echo Yii::app()->request->getBaseUrl(true);?>">Все заявки</a></li>
						</ul>
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
										<span class="welcome">Добро пожаловать!</span>
										<span style="font-size:15pt"><?php echo Yii::app()->user->getModel()->login?></span>
									</div>
								</a>
								<ul class="dropdown-menu">
									<?php if(Yii::app()->user->role=='administrator'):?>
									<li>
										<a href="<?php echo Yii::app()->createUrl('requests/admin');?>">
											<i class="fa fa-bars"></i>
											<span>Запросы на изменение заявок</span>
										</a>
									</li>
									<li>
										<a href="<?php echo Yii::app()->createUrl('area/admin');?>">
											<i class="fa fa-list"></i>
											<span>Районы</span>
										</a>
									</li>
									<li>
										<a href="<?php echo Yii::app()->createUrl('city/admin');?>">
											<i class="fa fa-list"></i>
											<span>Города</span>
										</a>
									</li>
									<li>
										<a href="<?php echo Yii::app()->createUrl('user/admin');?>">
											<i class="fa fa-users"></i>
											<span>Пользователи</span>
										</a>
									</li>
									<?php endif;?>
									<li>
										<a href="<?php echo Yii::app()->createUrl('site/logout');?>">
											<i class="fa fa-power-off"></i>
											<span>Выйти</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<div class="container" id="page">
	<div id="main" class="container-fluid">
		<div id="content">
			<div class="inner-content">
				<?php echo $content; ?>
			</div>
		</div>
	</div>
</div><!-- page -->

<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/bootstrap/bootstrap.min.js"></script>
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/justified-gallery/jquery.justifiedgallery.min.js"></script>
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/tinymce/tinymce.min.js"></script>
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/tinymce/jquery.tinymce.min.js"></script>
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/plugins/datatables/jquery.dataTables.js"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="<?php echo Yii::app()->request->getBaseUrl(true); ?>/js/devoops.js"></script>
<?php endif?>
</body>
</html>
