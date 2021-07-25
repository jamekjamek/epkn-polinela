<div class="main-content">
	<div class="container-fluid">
		<div class="page-header">
			<div class="row align-items-end">
				<div class="col-lg-8">
					<div class="page-header-title">
						<i class="ik ik-inbox bg-blue"></i>
						<div class="d-inline">
							<h5><?= $title; ?></h5>
							<span><?= $desc; ?></span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<nav class="breadcrumb-container" aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?= base_url(); ?>">Dashboard</a>
							</li>
							<li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="card">
					<div class="card-header d-block">
						<h3 class="text-uppercase"><?= $title; ?></h3>
					</div>
					<form action="" method="POST">
						<div class="card-body">
							<div class="row">
								<div class="col-sm-6">
									<div class="form-group">
										<label for="document">Dokumen</label>
										<select name="document" id="document" class="form-control <?= form_error('document') ? 'is-invalid' : ''; ?>" style="width:100%">
											<option></option>
											<?php foreach ($document as $documentrow) : ?>
												<option value="<?= $documentrow->id ?>"><?= $documentrow->name; ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback">
											<?= form_error('document'); ?>
										</div>
									</div>
									<div class="form-group">
										<label for="letter-number">Nomor Surat</label>
										<input type="text" class="form-control <?= form_error('letter-number') ? 'is-invalid' : ''; ?>" id="letter-number" placeholder="Masukan nomor surat" name="letter-number" value="<?= set_value('letter-number') ?>">
										<div class="invalid-feedback">
											<?= form_error('letter-number'); ?>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
							<a href="<?= base_url('admin/letter') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>