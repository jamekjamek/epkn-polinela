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
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="name">Nama Desa / Kelurahan</label>
                    <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Masukan nama desa atau kelurahan" name="name" value="<?= set_value('name') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('name'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" placeholder="Masukan Email" name="email" value="<?= set_value('email') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('email'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telp">Telpon</label>
                    <input type="text" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>" id="telp" placeholder="Masukan Telpon" name="telp" value="<?= set_value('telp') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('telp'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic">Contact Person</label>
                    <input type="text" class="form-control <?= form_error('pic') ? 'is-invalid' : ''; ?>" id="pic" placeholder="Masukan nama contact person" name="pic" value="<?= set_value('pic') ?>">
                    <div class="invalid-feedback">
                      <?= form_error('pic'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>" rows="5" cols="50"><?= set_value('address') ?></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('address'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="regency">Daerah</label>
                    <select class="get-regency2 form-control <?= form_error('regency') ? 'is-invalid' : ''; ?>" name="regency" id="prregencyodi" style="width: 100%">
                      <option></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="prodi">Pilih Prodi</label>
                    <select class="get-prodi form-control" name="prodi" id="prodi" style="width: 100%">
                      <option></option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="norek">No Rekening</label>
                    <input type="number" class="form-control" id="norek" placeholder="Masukan nomor rekening penerima" name="norek" value="<?= set_value('norek') ?>">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="bank_name">Nama Bank</label>
                    <input type="text" class="form-control" id="bank_name" placeholder="Masukan nama bank penerima" name="bank_name" value="<?= set_value('bank_name') ?>">
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('admin/master/village') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>