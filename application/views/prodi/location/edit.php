<div class="main-content">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-map bg-blue"></i>
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
          <div id="app" data-module="KaprodiFormModule" class="card-body">
            <form action="<?= $__url_update; ?>" method="POST">
              <div class="form-group has-error">
                <label for="name">Nama Perusahaan</label>
                <input type="text" class="form-control <?= form_error('name') ? 'is-invalid' : ''; ?>" id="name" value="<?= set_value('name') ? set_value('name') : $location->name; ?>"
                  placeholder="Nama Perusahaan e.g PT Bukit Asam" name="name">
                <div class="invalid-feedback">
                  <?= form_error('name'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="address">Alamat Perusahaan</label>
                <textarea name="address"
                  class="form-control html-editor <?= form_error('address') ? 'is-invalid' : ''; ?>" id="address"
                  cols="30" rows="3"><?= set_value('address') ? htmlspecialchars(set_value('address')) : htmlspecialchars($location->address); ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('address'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="name">Provinsi</label>
                <select class="get-province form-control <?= form_error('province_id') ? 'is-invalid' : ''; ?>" data-selected="<?= $location->province_id; ?>"
                  name="province_id" id="province">
                </select>
                <div class="invalid-feedback">
                  <?= form_error('province_id'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="name">Kabupaten</label>
                <select class="get-regency form-control <?= form_error('regency_id') ? 'is-invalid' : ''; ?>" data-selected="<?= $location->regency_id; ?>"
                  name="regency_id" id="regency">
                </select>
                <div class="invalid-feedback">
                  <?= form_error('regency_id'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="email">Email Perusahaan</label>
                <input type="text" class="form-control <?= form_error('email') ? 'is-invalid' : ''; ?>" id="email" value="<?= set_value('email') ? set_value('email') : $location->email; ?>"
                  placeholder="Email Perusahaan e.g email@mail.com" name="email">
                <div class="invalid-feedback">
                  <?= form_error('email'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="telp">Telp Perusahaan</label>
                <input type="text" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>" id="telp" value="<?= set_value('telp') ? set_value('telp') : $location->telp; ?>"
                  placeholder="Telephone Perusahaan e.g 0721xxxx" name="telp">
                <div class="invalid-feedback">
                  <?= form_error('telp'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="pic">PIC</label>
                <input type="text" class="form-control <?= form_error('pic') ? 'is-invalid' : ''; ?>" id="pic" value="<?= set_value('pic') ? set_value('pic') : $location->pic; ?>"
                  placeholder="PIC Perusahaan e.g Surya" name="pic">
                <div class="invalid-feedback">
                  <?= form_error('pic'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= $__url_index ?>" class="btn btn-danger"><i
                  class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>

</script>