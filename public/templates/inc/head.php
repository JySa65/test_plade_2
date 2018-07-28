<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="id=edge">
	<title>Test Plade</title>
	<link rel="stylesheet" href= <?= STATIC_DIR . "css/bootstrap.min.css"; ?> >
	<link rel="stylesheet" href= <?= STATIC_DIR . "css/metisMenu.min.css"; ?> >
	<link rel="stylesheet" href= <?= STATIC_DIR . "css/sb-admin-2.min.css"; ?> >
	<!-- <script src="https://use.fontawesome.com/93102f031a.js"></script> -->
	<link rel="stylesheet" href= <?= STATIC_DIR . "css/font-awesome.min.css"; ?> >
</head>
<body>
	<div id="wrapper">

		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= url('') ?>">Test Plade</a>
			</div>
			<!-- /.navbar-header -->

			<div class="navbar-default sidebar" role="navigation" style="">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
					</li>
					<li class="active">
						<a href="<?= url(''); ?>" class="active"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
					</li>
					<li>
						<a href="<?= url('client'); ?>"><i class="fa fa-users fa-fw"></i>Clientes</a>
					</li>
					<li>
						<a href="<?= url('company'); ?>"><i class="fa fa-university fa-fw"></i> Empresas</a>
					</li>
					<li>
						<a href="<?= url('transactions'); ?>"><i class="fa fa-support fa-fw"></i> Transacciones</a>
					</li>
				</ul>
			</div>
			<!-- /.sidebar-collapse -->
		</div>
		<!-- /.navbar-static-side -->
	</nav>

	<div id="page-wrapper">
		<div class="container-fluid">