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
          <div class="card-body">
            <form action="" method="POST">
              <div class="row">
                <div class="col-sm-5">
                  <div class="form-group">
                    <label for="leader">Pilih Prodi</label>
                    <select class="get-prodi form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="prodi" id="prodi" style="width: 100%">
                      <option></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="leader">Pilih Ketua</label>
                    <select class="get-leader form-control <?= form_error('leader') ? 'is-invalid' : ''; ?>" name="leader" id="leader" style="width: 100%">
                      <option></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="company">Pilih Perusahaan</label>
                    <select class="get-companies form-control <?= form_error('company') ? 'is-invalid' : ''; ?>" name="company" id="company" style="width: 100%">
                      <option></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="start-date">Tanggal Mulai</label>
                        <input type="date" class="form-control" id="start-date" placeholder="Masukan Tanggal Mulai">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="finish-date">Tanggal Selesai</label>
                        <input type="date" class="form-control" id="finish-date" placeholder="Masukan Tanggal Mulai">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-7">
                  <button type="button" class="btn btn-primary my-4" id="search-member-button"><i class="ik ik-save"></i>Cari Anggota</button>
                  <div align="center" class="loadinggif d-none"><img src="<?= base_url('assets/img/gif/loading.gif') ?>" style="height:50px; width:50px" /></div>
                  <div class="dt-responsive d-none">
                    <table id="simpletable" class="table table-hover" style="padding: 20px;">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Mahasiswa</th>
                          <th>Prodi</th>
                        </tr>
                      </thead>
                      <tbody id="get-data-member">
                        <!-- <tr>
                          <td><input type="checkbox" class="member-checkbox" name="member[]" value="1b7a1e1f-dca8-11eb-9096-0cc47abcfaa6"></td>
                          <td>Fahmi Faturrohman</td>
                          <td>Manajemen Informatika</td>
                        </tr>
                        <tr>
                          <td><input type="checkbox" class="member-checkbox" name="member[]" value="1b2bc98a-dca8-11eb-9096-0cc47abcfaa6"></td>
                          <td>Erzi Riksa Putra</td>
                          <td>Manajemen Informatika</td>
                        </tr> -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <button type="button" id="btn-save-register" class="btn btn-primary" data-quantity="<?= $periode->quantity; ?>"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('admin/registrations') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>