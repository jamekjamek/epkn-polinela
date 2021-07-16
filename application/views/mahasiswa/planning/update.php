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
                <label for="learning_achievement">Capaian</label>
                <input type="learning_achievement" class="form-control <?= form_error('learning_achievement') ? 'is-invalid' : ''; ?>" id="learning_achievement" placeholder="Capain kegiatan" name="learning_achievement" value="<?= set_value('learning_achievement') ? set_value('learning_achievement') : $plan->learning_achievement; ?>">
                <div class="invalid-feedback">
                  <?= form_error('learning_achievement'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="learning_achievement_sub">Sub Capaian</label>
                <input type="learning_achievement_sub" class="form-control <?= form_error('learning_achievement_sub') ? 'is-invalid' : ''; ?>" id="learning_achievement_sub" placeholder="Capain kegiatan" name="learning_achievement_sub" value="<?= set_value('learning_achievement_sub') ? set_value('learning_achievement_sub') : $plan->learning_achievement_sub; ?>">
                <div class="invalid-feedback">
                  <?= form_error('learning_achievement_sub'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="time_qty">Jumlah Jam</label>
                <input type="number" class="form-control <?= form_error('time_qty') ? 'is-invalid' : ''; ?>" id="time_qty" name="time_qty" value="<?= set_value('time_qty') ? set_value('time_qty') : $plan->time_qty; ?>">
                <div class="invalid-feedback">
                  <?= form_error('time_qty'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('mahasiswa/planning') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>