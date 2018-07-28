<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Clientes | <a href="<?= url('client') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro De Clientes</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_name">Nombres</label>
								<input class="form-control" id="id_name" name="name" type="text" placeholder="Nombres" maxlength="50" autocomplete="off" required value="<?= isset($client) ? $client->nombre : '' ?>">
							</div>
						</div>
						<div class="col-lg-6">
							<div class="form-group">
								<label for="id_last_name">Apellidos</label>
								<input class="form-control" id="id_last_name" name="last_name" type="text" placeholder="Apellidos" maxlength="50" autocomplete="off" required value="<?= isset($client) ? $client->apellido : '' ?>">
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