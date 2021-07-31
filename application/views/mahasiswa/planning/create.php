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
      <div class="col-12">
        <div class="card">
          <div class="card-header d-block">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" name="registration_id" value="<?= $registration['id'] ?>">
              <div class="form-group has-error">
                <label for="learning_achievement">Program</label>
                <input type="learning_achievement" class="form-control <?= form_error('learning_achievement') ? 'is-invalid' : ''; ?>" id="learning_achievement" placeholder="Rencana program" name="learning_achievement">
                <div class="invalid-feedback">
                  <?= form_error('learning_achievement'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="learning_achievement_sub">Sub Program</label>
                <input type="learning_achievement_sub" class="form-control <?= form_error('learning_achievement_sub') ? 'is-invalid' : ''; ?>" id="learning_achievement_sub" placeholder="Sub capaian kegiatan" name="learning_achievement_sub">
                <div class="invalid-feedback">
                  <?= form_error('learning_achievement_sub'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="time_qty">Jumlah Jam</label>
                <input type="number" class="form-control <?= form_error('time_qty') ? 'is-invalid' : ''; ?>" id="time_qty" placeholder="Jumlah jam kegiatan e.g 2" name="time_qty">
                <div class="invalid-feedback">
                  <?= form_error('time_qty'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('mahasiswa/program') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>