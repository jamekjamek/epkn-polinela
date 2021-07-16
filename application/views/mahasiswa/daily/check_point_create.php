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
              <input type="hidden" name="registration_id" id="registration_id" value="<?= $isCheck['id'] ?>">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group has-error">
                    <label for="attendance">Kehadiran</label>
                    <select name="attendance" id="attendance" class="form-control attendance <?= form_error('attendance') ? 'is-invalid' : ''; ?>">
                      <option value="">-- Pilih Keterangan --</option>
                      <option value="H">H</option>
                      <option value="I">I</option>
                      <option value="S">S</option>
                      <option value="A">A</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('attendance'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4" id="time_in" style="display: none;">
                  <div class="form-group has-error">
                    <label for="time_in">Jam Masuk</label>
                    <input type="time" class="form-control <?= form_error('time_in') ? 'is-invalid' : ''; ?>" id="time_in" placeholder="Jam masuk" name="time_in">
                    <div class="invalid-feedback">
                      <?= form_error('time_in'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-4" id="time_out" style="display: none;">
                  <div class="form-group has-error">
                    <label for="time_out">Jam Selesai</label>
                    <input type="time" class="form-control <?= form_error('time_out') ? 'is-invalid' : ''; ?>" id="time_out" placeholder="Jam selesai" name="time_out">
                    <div class="invalid-feedback">
                      <?= form_error('time_out'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('mahasiswa/daily/check_point') ?>" class="btn btn-warning"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>