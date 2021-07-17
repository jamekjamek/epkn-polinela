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
                    <label for="name">Nama</label>
                    <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" placeholder="Masukan Nama" name="name" value="<?= set_value('name') ?  set_value('name') : $company->name; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('name'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" placeholder="Masukan Email" name="email" value="<?= set_value('email') ?  set_value('email') : $company->email; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('email'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="telp">Telpon</label>
                    <input type="text" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>" id="telp" placeholder="Masukan Telpon" name="telp" value="<?= set_value('telp') ? set_value('telp') : $company->telp; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('telp'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="pic">PIC</label>
                    <input type="text" class="form-control <?= form_error('pic') ? 'is-invalid' : ''; ?>" id="pic" placeholder="Masukan Nama PIC" name="pic" value="<?= set_value('pic') ? set_value('pic') : $company->pic; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('pic'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="address">Alamat</label>
                    <textarea id="address" name="address" class="form-control <?= form_error('address') ? 'is-invalid' : ''; ?>" rows="4" cols="50"><?= set_value('address') ? set_value('address') : $company->address; ?></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('address'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="regency">Daerah</label>
                    <select class="get-regency2 form-control <?= form_error('regency') ? 'is-invalid' : ''; ?>" name="regency" id="prregencyodi" style="width: 100%">
                      <option value="<?= $company->regency_id; ?>"><?= $company->province_name . ' - ' . $company->regency_name . ' - ' . $company->districts_name; ?></option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency'); ?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Label</label>
                    <div class="form-radio">
                      <div class="radio radio-inline">
                        <label>
                          <input type="radio" name="label" value="prodi" <?= $company->label === "-" ? 'checked="checked"' : ''; ?>>
                          <i class="helper"></i>-
                        </label>
                      </div>
                      <div class="radio radio-inline">
                        <label>
                          <input type="radio" name="label" value="prodi" <?= $company->label === "prodi" ? 'checked="checked"' : ''; ?>>
                          <i class="helper"></i>PRODI
                        </label>
                      </div>
                      <div class="radio radio-inline">
                        <label>
                          <input type="radio" name="label" value="bersama" <?= $company->label === "bersama" ? 'checked="checked"' : ''; ?>>
                          <i class="helper"></i>BERSAMA
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="name">Status</label>
                    <div class="form-radio">
                      <div class="radio radio-inline">
                        <label>
                          <input type="radio" name="status" value="verify" <?= $company->status === "verify" ? 'checked="checked"' : ''; ?>>
                          <i class="helper"></i>Verifikasi
                        </label>
                      </div>
                      <div class="radio radio-inline">
                        <label>
                          <input type="radio" name="status" value="bersama" <?= $company->status === "not_verify" ? 'checked="checked"' : ''; ?>>
                          <i class="helper"></i>Tidak Verifikasi
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('admin/master/company') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>