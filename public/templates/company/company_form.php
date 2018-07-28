<?php include(TEMPLATES_DIR . "templates/inc/head.php") ?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Empresas | <a href="<?= url('company') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Regresar</a></h1>
	</div>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-success">
			<div class="panel-heading">
				<h4>Registro De Empresa</h4>
			</div>
			<div class="panel-body">
				<div class="row">
					<form action="" method="POST">
						<input type="hidden" value="<?= csrf_token() ?>" name="csrftoken" required>
						<div class="col-lg-12">
							<div class="form-group">
								<label for="id_name">Nombre De La Empresa</label>
								<input class="form-control" id="id_name" name="name" type="text" placeholder="Nombre De La Empresa" maxlength="50" autocomplete="off" required value="<?= isset($company) ? $company->empresa : '' ?>">
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