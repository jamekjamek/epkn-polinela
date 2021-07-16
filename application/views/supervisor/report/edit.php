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
              <input type="hidden" name="prodi_id" id="prodi_id" value="" />
              <input type="hidden" name="status" id="status" value="1" />
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-control-label" for="nama_kelas">Tahun Penerimaan</label>
                    <input type=text name="year_accepted" class="form-control <?= form_error('year_accepted') ? 'is-invalid' : ''; ?>" value="<?= $accepted->year_accepted ?>">
                    <div class="invalid-feedback">
                      <?= form_error('year_accepted'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-control-label" for="nama_kelas">Bulan Mulai</label>
                    <input type=text name="start_month" class="form-control <?= form_error('start_month') ? 'is-invalid' : ''; ?>" value="<?= $accepted->start_month ?>">
                    <div class="invalid-feedback">
                      <?= form_error('start_month'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label class="form-control-label" for="nama_kelas">Bulan Selesai</label>
                    <input type=text name="finish_month" class="form-control <?= form_error('finish_month') ? 'is-invalid' : ''; ?>" value="<?= $accepted->finish_month ?>">
                    <div class="invalid-feedback">
                      <?= form_error('finish_month'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Kompetensi mahasiswa yang di harapkan</label>
                <textarea name="competence" id="" cols="30" rows="5" class="form-control <?= form_error('competence') ? 'is-invalid' : ''; ?>"><?= $accepted->competence ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('competence'); ?>
                </div>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Jumlah Mahasiswa</label>
                <input type=text name="qty" class="form-control <?= form_error('qty') ? 'is-invalid' : ''; ?>" value="<?= $accepted->qty ?>">
                <div class="invalid-feedback">
                  <?= form_error('qty'); ?>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
                <a href="<?= site_url('supervisor/report_reception') ?>" class="btn btn-danger"><i class="ik ik-arrow-left"></i>Kembali</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>