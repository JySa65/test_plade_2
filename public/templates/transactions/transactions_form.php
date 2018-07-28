<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Transacciones | <a href="<?= url('company') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro De Transacci&oacute;n</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_client">Cliente</label>
								<select name="client" id="id_client" class="form-control" autofocus="on" autocomplete="off" required value="">
									<option value="" selected="">Escojer Cliente</option>
									<?php foreach ($clients as $client) { ?>
										<option value="<?= $client->id ?>"><?= $client->nombre ?> <?= $client->apellido ?></option>	
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_company">Empresas</label>
								<select name="company" id="id_company" class="form-control" autofocus="on" autocomplete="off" required value="">
									<option value="" selected="">Escojer Empresa</option>
									<?php foreach ($companys as $company) { ?>
										<option value="<?= $company->id ?>"><?= $company->empresa ?></option>	
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_price">Monto</label>
								<input class="form-control" id="id_price" name="price" type="number" placeholder="Monto" maxlength="50" autocomplete="off" required min="0" step="0.01">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_type_transaction">Tipo de Transacci&oacute;n</label>
								<select name="type_transaction" id="id_type_transaction" class="form-control" autofocus="on" autocomplete="off" required value="">
									<option value="" selected="">Tipo de Transacci&oacute;n</option>
									<option value="1">Ingreso</option>
									<option value="0">Egreso</option>
								</select>
							</div>
						</div>
						<div class="col-lg-12 text-center">
							<div class="form-group">
								<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Aceptar</button>
							</div>
						</div>
					</form>
				</div>                      
			</div>	
			<?php if (SESSION::has('error')) { ?>
				<div class="panel-footer panel-danger">
					<div class="alert alert-danger alert-dismissable">
						<ul>
							<?php 
							if (is_array($_SESSION['error'])) {
								foreach (SESSION::get('error') as $value) { ?>
									<li class="h5"><?= $value ?></li>	
								<?php }
							}else{ ?>
								<li class="h5"><?= SESSION::get('error') ?></li>
							<?php } ?>	
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>


<?php include(TEMPLATES_DIR . "templates/inc/footer.php") ?>