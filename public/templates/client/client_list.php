<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Clientes | <a href="<?= url('client/add/') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nuevo Cliente</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Listado De Clientes</h4>
			</div>
			<div class="panel-body">
				<table width="100%" class="table table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre y Apellido</th>
							<th>Aciones</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($clients) { foreach ($clients as $client) { ?>
							<tr>
								<td valign=middle><?= $client->id ?></td>
								<td valign=middle><?= $client->nombre ?> <?= $client->apellido ?></td>
								<td valign=middle>
									<a href="<?= url("client/update/{$client->id}") ?>" class="btn btn-primary" title="Actualizar Cliente"><i class="fa fa-edit fa-2x" id="update2"></i></a> 

									<a href="<?= url("client/delete/{$client->id}") ?>" class="btn btn-danger" title="Eliminar Cliente"><i class="fa fa-trash-o fa-2x" id="delete2"></i></a>

									<a href="<?= url("client/detail/{$client->id}") ?>" class="btn btn-info" title="Ver Cliente"><i class="fa fa-search-plus fa-2x" id="detail2"></i></a>
								</td>
							</tr>
							<?php }}else {  ?>
								<tr>
									<td valign=middle>No Hay</td>
									<td valign=middle>Clientes</td>
									<td valign=middle>Registrados</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>                          
				</div>
			</div>
		</div>
	</div>


	<?php include(TEMPLATES_DIR . "templates/inc/footer.php") ?>