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
				<h4>Eliminar Cliente: <?= strtoupper($client->nombre) ?></h4>
			</div>
			<div class="panel-body">
                <form action="" method="POST">
                    <input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
                    <h2 class="text-center">¿Esta Seguro De Eliminar?</h2>
                    <div class="col-lg-12">
                        <h4><b>Nombres: </b><?= $client->nombre ?></h4>
                    </div>
                    <div class="col-lg-12">
                        <h4><b>Apellidos: </b><?= $client->apellido ?></h4>
                    </div>
                    <div class="col-lg-12 text-center">
                        <div class="form-group">
                            <br><br>
                            <button class="btn btn-danger btn-block"><i class="fa fa-trash-o"></i> Aceptar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include(TEMPLATES_DIR . "templates/inc/footer.php") ?>