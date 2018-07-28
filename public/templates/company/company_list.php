<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas | <a href="<?= url('company/add/') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Nueva Empresa</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Listado De Empresas</h4>
			</div>
			<div class="panel-body">
				<table width="100%" class="table table-hover" id="dataTables-example">
					<thead>
						<tr>
							<th>#</th>
							<th>Nombre</th>
							<th>Aciones</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($companys) { foreach ($companys as $company) { ?>
							<tr>
								<td valign=middle><?= $company->id ?></td>
								<td valign=middle><?= $company->empresa ?></td>
								<td valign=middle>
									<a href="<?= url("company/update/{$company->id}") ?>" class="btn btn-primary" title="Actualizar companye"><i class="fa fa-edit fa-2x" id="update2"></i></a> 

									<a href="<?= url("company/delete/{$company->id}") ?>" class="btn btn-danger" title="Eliminar companye"><i class="fa fa-trash-o fa-2x" id="delete2"></i></a>

									<a href="<?= url("company/detail/{$company->id}") ?>" class="btn btn-info" title="Ver Cliente"><i class="fa fa-search-plus fa-2x" id="detail2"></i></a>
								</td>
							</tr>
						<?php }}else {  ?>
							<tr>
								<td valign=middle>No Hay</td>
								<td valign=middle>Empresas</td>
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