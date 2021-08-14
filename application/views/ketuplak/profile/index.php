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
              <input type="hidden" class="form-control" name="user_id" value="<?= set_value('user_id') ? set_value('user_id') : $profile->user_id; ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" value="<?= set_value('username') ? set_value('username') : $profile->username; ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : ''; ?>" id="password" placeholder="Password" name="password">
                    <small class="text-mute">Abaikan ini jika tidak ingin ganti password</small>
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