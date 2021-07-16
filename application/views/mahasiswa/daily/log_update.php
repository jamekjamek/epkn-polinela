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
              <input type="hidden" name="registration_id" id="registration_id" value="<?= $isCheck['id'] ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="learning_achievement">Capain Pembelajaran</label>
                    <select class="get-capaian form-control <?= form_error('learning_achievement') ? 'is-invalid' : ''; ?>" name="learning_achievement" id="learning_achievement" style="width: 100%">
                      <option value="<?= $log->learning_achievement; ?>"><?= $log->learning_achievement ?></option>
                    </select>
                    <small class="text-mute">Apabila data tidak ada di pencarian, silahkan ketik saja kemudian pilih yang terketik</small>
                    <div class="invalid-feedback">
                      <?= form_error('learning_achievement'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="learning_achievement_sub">Sub Capaian Pembelajaran</label>
                    <select class="get-subcapaian form-control <?= form_error('learning_achievement_sub') ? 'is-invalid' : ''; ?>" name="learning_achievement_sub" id="learning_achievement_sub" style="width: 100%">
                      <option value="<?= $log->learning_achievement_sub; ?>"><?= $log->learning_achievement_sub ?></option>
                    </select>
                    <small class="text-mute">Apabila data tidak ada di pencarian, silahkan ketik saja kemudian pilih yang terketik</small>
                    <div class="invalid-feedback">
                      <?= form_error('learning_achievement_sub'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="email">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control <?= form_error('implementation_date') ? 'is-invalid' : ''; ?>" id="implementation_date" name="implementation_date" value="<?= set_value('implementation_date') ? set_value('implementation_date') : $log->implementation_date; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('implementation_date'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="tool">Alat dan Bahan</label>
                    <input type="text" class="form-control <?= form_error('tool') ? 'is-invalid' : ''; ?>" id="tool" name="tool" value="<?= set_value('tool') ? set_value('tool') : $log->tool; ?>">
                    <div class="invalid-feedback">
                      <?= form_error('tool'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="description">Prosedur</label>
                <textarea name="description" class="form-control html-editor <?= form_error('description') ? 'is-invalid' : ''; ?>" id="address" cols="30" rows="3">
                <?= set_value('description') ? set_value('description') : $log->description; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('description'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="description">Komentar</label>
                <textarea name="comment" class="form-control html-editor <?= form_error('comment') ? 'is-invalid' : ''; ?>" id="comment" cols="30" rows="3">
                <?= set_value('comment') ? set_value('comment') : $log->comment; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('comment'); ?>
                </div>
              </div>
              <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              <a href="<?= base_url('mahasiswa/daily/log') ?>" class="btn btn-warning"><i class="ik ik-skip-back"></i>Kembali</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>