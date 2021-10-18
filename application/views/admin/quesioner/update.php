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
              <div class="form-group">
                <label for="role_id">Role</label>
                <select class="get-role-quesioner form-control <?= form_error('role_id') ? 'is-invalid' : ''; ?>" name="role_id" id="role_id" style="width: 100%">
                  <option></option>
                  <?php foreach ($getRole as $role) : ?>
                    <?php if ($quesioner->role_id === $role->id) : ?>
                      <option value="<?= $role->id ?>" selected><?= $role->name; ?></option>
                    <?php else : ?>
                      <option value="<?= $role->id ?>"><?= $role->name; ?></option>
                    <?php endif ?>
                  <?php endforeach; ?>
                </select>
                <div class="invalid-feedback">
                  <?= form_error('role_id'); ?>
                </div>
              </div>
              <div class="form-group">
                <label for="link">Link Quesioner</label>
                <input type="text" class="form-control <?= form_error('link') ? 'is-invalid' : ''; ?>" id="link" placeholder="Masukan link url quesioner" name="link" value="<?= set_value('link') ? set_value('link') : $quesioner->link; ?>">
                <div class="invalid-feedback">
                  <?= form_error('link'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('admin/master/quesioner') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>