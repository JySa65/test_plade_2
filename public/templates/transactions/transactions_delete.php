<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Transaccion N° <?= $transaction->id ?> | <a href="<?= url('transactions') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
    </div>
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
            <div class="panel-heading">
                <h4>Detalle Transaccion</h4>
            </div>
			<div class="panel-body">
                <form action="" method="POST">
                    <input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
                    <h2 class="text-center">¿Esta Seguro De Eliminar?</h2>
                    <div class="col-lg-12">
                        <h4><b>Cliente: </b><?= $transaction->nombre ?> <?= $transaction->apellido ?></h4>
                        <h4><b>Empresa: </b><?= $transaction->empresa ?></h4>
                        <h4><b>Monto: </b><?= $transaction->monto ?></h4>
                        <h4><b>Tipo: </b><?= $transaction->tipo == 1 ? "Ingreso <span class='text-success'><i class='fa fa-plus-circle'></i></span>" : "Egreso <span class='text-danger'><i class='fa fa-minus-circle'></i>" ?> </h4>
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