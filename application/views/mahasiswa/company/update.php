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
              <input type="hidden" name="id" value="<?= $company->id; ?>" id="company_id">
              <input type="hidden" name="kabupaten_id" value="<?= $company->regency_id; ?>" id="kabupaten_id">
              <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
              <div class="form-group has-error">
                <label for="name">Nama Perusahaan</label>
                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" name="name" value="<?= set_value('name') ? set_value('name') : $company->name; ?>">
                <div class="invalid-feedback">
                  <?= form_error('name'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="pic">PIC</label>
                <input type="text" class="form-control <?= form_error('pic') ? 'is-invalid' : ''; ?>" id="pic" name="pic" value="<?= set_value('pic') ? set_value('pic') : $company->pic; ?>">
                <div class="invalid-feedback">
                  <?= form_error('pic'); ?>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="email">Email Perusahaan</label>
                    <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?= set_value('email') ? set_value('email') : $company->email; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('email'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="telp">Telp Perusahaan</label>
                    <input type="text" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>" id="telp" name="telp" value="<?= set_value('telp') ? set_value('telp') : $company->telp; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('telp'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="name">Provinsi</label>
                    <select class="get-province form-control <?= form_error('province_id') ? 'is-invalid' : ''; ?>" name="province_id" id="province">
                      <option value="">-- Pilih Provinsi --</option>
                      <?php foreach ($provinces as $province) : ?>
                        <?php if ($company->province_id == $province->id) : ?>
                          <option value="<?= $province->id ?>" selected><?= $province->name ?></option>
                        <?php else : ?>
                          <option value="<?= $province->id ?>"><?= $province->name ?></option>
                        <?php endif; ?>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('province_id'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="name">Kabupaten</label>
                    <select class="get-regency form-control <?= form_error('regency_id') ? 'is-invalid' : ''; ?>" name="regency_id" id="regency">
                      <option value="">-- Pilih Kabupaten --</option>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('regency_id'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="address">Alamat Perusahaan</label>
                <textarea name="address" class="form-control html-editor <?= form_error('address') ? 'is-invalid' : ''; ?>" id="address" cols="30" rows="3"><?= set_value('address') ? set_value('address') : $company->address; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('address'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('mahasiswa/company') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>