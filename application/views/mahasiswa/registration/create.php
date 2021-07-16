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
            <small class="form-text text-muted">Periode pendaftaran PKL saat ini adalah <strong><?= $periode->title ?></strong> dengan jumlah kuota setiap kelompok minimal <strong><?= $periode->quantity ?> orang</strong> dibuka pada tanggal <strong><?= $periode->start_time ?></strong> s.d <strong><?= $periode->finish_time ?></strong> dengan pelaksanaan PKL pada tanggal <strong><?= $periode->start_time_pkl ?></strong> s.d <strong><?= $periode->finish_time_pkl ?></strong> </small>
          </div>
          <div class="card-body">
            <form action="" method="POST">
              <input type="hidden" name="leader" id="leader" value="<?= $student['id']; ?>">
              <input type="hidden" name="prodi" id="prodi" value="<?= $student['prodi_id']; ?>">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="company">Pilih Perusahaan</label>
                    <select class="get-companyregis form-control <?= form_error('company') ? 'is-invalid' : ''; ?>" name="company" id="company" style="width: 100%">
                      <option></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="get-start-date">Tanggal Mulai PKL</label>
                    <input type="date" class="form-control" id="get-start-date" value="<?= $periode->start_time_pkl ?>" readonly>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Tanggal mulai di ambil dari periode yang dibuka
                    </small>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="get-finish-date">Tanggal Selesai PKL</label>
                    <input type="date" class="form-control" id="get-finish-date" value="<?= $periode->finish_time_pkl ?>" readonly>
                    <small id="passwordHelpBlock" class="form-text text-muted">
                      Tanggal selesai di ambil dari periode yang dibuka
                    </small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <button type="button" class="btn btn-primary my-4" id="search-member-registration"><i class="ik ik-save"></i>Cari Anggota</button>
                  <div align="center" class="loadinggif d-none"><img src="<?= base_url('assets/img/gif/loading.gif') ?>" style="height:50px; width:50px" /></div>
                  <div class="dt-responsive d-none">
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Mahasiswa</th>
                          <th>Prodi</th>
                        </tr>
                      </thead>
                      <tbody id="get-data-member-registration">
                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    Pilih perusahaan terlebih dahulu, kemudian klik tombol <strong>Cari Anggota</strong>
                  </small>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-group" style="float: right;">
                  <a href="<?= base_url('mahasiswa/registration') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                  <button type="button" id="btn-save-registration" class="btn btn-primary" data-quantity="<?= $periode->quantity; ?>"><i class="ik ik-save"></i>Simpan</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>