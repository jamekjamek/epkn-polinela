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
      <div class="col-sm-6">
        <div class="card">
          <div class="card-header d-block">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="title">Judul</label>
                    <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : ''; ?>" id="title" placeholder="Masukan Judul Periode" name="title" value="<?= set_value('title') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('title'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="starttimepkl">Tanggal Mulai PKN</label>
                    <input type="date" class="form-control <?= form_error('starttimepkl') ? 'is-invalid' : ''; ?>" id="starttimepkl" name="starttimepkl" value="<?= set_value('starttimepkl'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('starttimepkl'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="finishtimepkl">Tanggal Selesai PKN</label>
                    <input type="date" class="form-control <?= form_error('finishtimepkl') ? 'is-invalid' : ''; ?>" id="finishtimepkl" name="finishtimepkl" value="<?= set_value('finishtimepkl'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('finishtimepkl'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('admin/pkn_period') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>