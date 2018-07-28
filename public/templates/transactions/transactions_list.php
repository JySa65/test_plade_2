<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Transacciones | <a href="<?= url('transactions/add/') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nueva Transacci&oacute;n</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Listado De Transacciones</h4>
			</div>
			<div class="panel-body">
				<table width="100%" class="table table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>#</th>
							<th>Cliente</th>
							<th>Empresa</th>
							<th>Monto</th>
							<th>Tipo</th>
							<th>Aciones</th>
						</tr>
					</thead>
					<tbody>
						<?php $acum = 1; if ($transactions) { foreach ($transactions as $transaction) { ?>
							<tr>
								<td valign=middle><?= $acum ?></td>
								<td valign=middle><?= $transaction->nombre ?> <?= $transaction->apellido ?></td>
								<td valign=middle><?= $transaction->empresa ?></td>
								<td valign=middle><?= $transaction->monto ?></td>
								<td valign=middle><?= $transaction->tipo == 1 ? "<span class='text-success'><i class='fa fa-plus-circle'></i></span>" : "<span class='text-danger'><i class='fa fa-minus-circle'>"?></td>
								<td valign=middle>
									<a href="<?= url("transactions/delete/{$transaction->id}") ?>" class="btn btn-danger" title="Eliminar transactione"><i class="fa fa-trash-o fa-2x" id="delete2"></i></a>

									<a href="<?= url("transactions/detail/{$transaction->id}") ?>" class="btn btn-info" title="Ver Cliente"><i class="fa fa-search-plus fa-2x" id="detail2"></i></a>
								</td>
							</tr>
						<?php $acum+= 1;}}else {  ?>
							<tr>
								<td valign=middle>No</td>
								<td valign=middle>Hay</td>
								<td valign=middle>Transacciones</td>
								<td valign=middle>Registradas</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>                          
			</div>
		</div>
	</div>
</div>

<?php include(TEMPLATES_DIR . "templates/inc/footer.php") ?>