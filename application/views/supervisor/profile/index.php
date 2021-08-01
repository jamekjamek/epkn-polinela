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
    <?php if ($this->session->flashdata('success')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
    <?php endif; ?>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-block">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <form action="" method="POST">
                <input type="text" class="form-control" name="id" value="<?= set_value('id') ? set_value('id') : $profile->id; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="pic">Nama</label>
                    <input type="text" class="form-control" name="pic" value="<?= set_value('pic') ? set_value('pic') : $profile->pic; ?>" placeholder="Nama pembimbing lapang">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="telp">Nomor Handphone</label>
                    <input type="text" class="form-control <?= form_error('telp') ? 'is-invalid' : ''; ?>" id="telp" placeholder="Nomor telp" name="telp" value="<?= set_value('telp') ? set_value('telp') : $profile->telp; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('telp'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="norek">Nomor Rekening</label>
                    <input type="number" class="form-control <?= form_error('norek') ? 'is-invalid' : ''; ?>" id="norek" placeholder="Nomor telp" name="norek" value="<?= set_value('norek') ? set_value('norek') : $profile->norek; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('norek'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="bank_name">Nama Bank</label>
                    <input type="text" class="form-control <?= form_error('bank_name') ? 'is-invalid' : ''; ?>" id="bank_name" placeholder="Nama bank" name="bank_name" value="<?= set_value('bank_name') ? set_value('bank_name') : $profile->bank_name; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('bank_name'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>