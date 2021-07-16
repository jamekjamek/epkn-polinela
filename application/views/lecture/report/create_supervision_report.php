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
              <input type="hidden" name="group_id" value="<?= $supervision->group_id ?>">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="day">Hari</label>
                    <input type="text" class="form-control <?= form_error('day') ? 'is-invalid' : ''; ?>" id="day" placeholder="Waktu supervisi" name="day" value="<?= $day ?>">
                    <div class="invalid-feedback">
                      <?= form_error('day'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="date">Tanggal</label>
                    <input type="date" class="form-control <?= form_error('date') ? 'is-invalid' : ''; ?>" id="date" name="date" value="<?= $date ?>">
                    <div class="invalid-feedback">
                      <?= form_error('date'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="general_situation">Keadaan Umum</label>
                <textarea name="general_situation" class="form-control <?= form_error('general_situation') ? 'is-invalid' : ''; ?>" id="general_situation" cols="30" rows="3"><?= set_value('general_situation') ? set_value('general_situation') : $supervision->general_situation; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('general_situation'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="general_situation_note">Catatan Keadaan Umum</label>
                <input type="text" class="form-control" id="general_situation_note" placeholder="Catatan untuk keadaan umum" name="general_situation_note" value="<?= set_value('general_situation_note') ? set_value('general_situation_note') : $supervision->general_situation_note; ?>">
              </div>
              <div class="form-group has-error">
                <label for="progress">Kemajuan Pelaksanaan PKL</label>
                <textarea name="progress" class="form-control <?= form_error('progress') ? 'is-invalid' : ''; ?>" id="progress" cols="30" rows="3"><?= set_value('name') ? set_value('progress') : $supervision->progress; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('progress'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="progress_note">Catatan Kemajuan Pelaksanaan PKL</label>
                <input type="text" class="form-control" id="progress_note" placeholder="Catatan untuk kemajuan PKL" name="progress_note" value="<?= set_value('progress_note') ? set_value('progress_note') : $supervision->progress_note; ?>">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="result_problem">Hasil Supervisi (Permasalahan)</label>
                    <textarea name="result_problem" class="form-control <?= form_error('result_problem') ? 'is-invalid' : ''; ?>" id="result_problem" cols="30" rows="3"><?= set_value('name') ? set_value('result_problem') : $supervision->result_problem; ?></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('result_problem'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="result_solve">Hasil Supervisi (Pemecahan Masalah)</label>
                    <textarea name="result_solve" class="form-control <?= form_error('result_solve') ? 'is-invalid' : ''; ?>" id="result_solve" cols="30" rows="3"><?= set_value('result_solve') ? set_value('result_solve') : $supervision->result_solve; ?></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('result_solve'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="result_note">Catatan Hasil Supervisi</label>
                <input type="text" class="form-control" id="result_note" placeholder="Catatan untuk hasil supervisi" name="result_note" value="<?= set_value('name') ? set_value('result_note') : $supervision->result_note; ?>">
              </div>
              <div class="form-group has-error">
                <label for="suggestion">Saran</label>
                <textarea name="suggestion" class="form-control <?= form_error('suggestion') ? 'is-invalid' : ''; ?>" id="suggestion" cols="30" rows="3"><?= set_value('suggestion') ? set_value('suggestion') : $supervision->suggestion; ?></textarea>
                <div class="invalid-feedback">
                  <?= form_error('suggestion'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="suggestion_note">Catatan Saran</label>
                <input type="text" class="form-control" id="suggestion_note" placeholder="Catatan untuk saran" name="suggestion_note" value="<?= set_value('suggestion_note') ? set_value('suggestion_note') : $supervision->suggestion_note; ?>">
              </div>
              <div class="card-footer text-right">
                <a href="<?= base_url('dosen/report_supervision') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>