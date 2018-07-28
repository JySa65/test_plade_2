<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Cliente: <?= strtoupper($client->nombre) ?> | <a href="<?= url('client') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Detalle Cliente: <?= strtoupper($client->nombre) ?></h4>
			</div>
			<div class="panel-body">
                <div class="col-lg-12">
                    <h4><b>Nombres: </b><?= $client->nombre ?></h4>
                </div>
                <div class="col-lg-12">
                    <h4><b>Apellidos: </b><?= $client->apellido ?></h4>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(TEMPLATES_DIR . "templates/inc/footer.php") ?>