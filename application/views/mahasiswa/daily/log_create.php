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
                <div class="col-md-12">
                  <div class="form-group has-error">
                    <label for="learning_achievement">Kegiatan</label>
                    <select class="get-capaian form-control <?= form_error('learning_achievement') ? 'is-invalid' : ''; ?>" name="learning_achievement" id="learning_achievement" style="width: 100%">
                      <option></option>
                    </select>
                    <small class="text-mute">Apabila data tidak ada di pencarian, silahkan ketik saja kemudian pilih yang terketik</small>
                    <div class="invalid-feedback">
                      <?= form_error('learning_achievement'); ?>
                    </div>
                  </div>
                  <div class="form-group has-error">
                    <label for="topic">Materi</label>
                    <textarea name="topic" class="form-control <?= form_error('topic') ? 'is-invalid' : ''; ?>" id="address" cols="30" rows="3"></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('topic'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="tool">Alat dan Bahan</label>
                    <input type="text" class="form-control <?= form_error('tool') ? 'is-invalid' : ''; ?>" id="tool" placeholder="Alat dan bahan" name="tool">
                    <div class="invalid-feedback">
                      <?= form_error('tool'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="email">Tanggal Pelaksanaan</label>
                    <input type="date" class="form-control <?= form_error('implementation_date') ? 'is-invalid' : ''; ?>" id="implementation_date" placeholder="Tanggal pelaksanaan" name="implementation_date">
                    <div class="invalid-feedback">
                      <?= form_error('implementation_date'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="implement_place">Tempat Pelaksanaan</label>
                    <input type="text" class="form-control <?= form_error('implement_place') ? 'is-invalid' : ''; ?>" id="implement_place" placeholder="Tempat pelaksanaa kegiatan" name="implement_place">
                    <div class="invalid-feedback">
                      <?= form_error('implement_place'); ?>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group has-error">
                    <label for="qty">Jumlah Peserta</label>
                    <input type="number" class="form-control <?= form_error('qty') ? 'is-invalid' : ''; ?>" id="qty" placeholder="Jumla peserta" name="qty">
                    <div class="invalid-feedback">
                      <?= form_error('qty'); ?>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="procedure">Prosedur</label>
                <textarea name="procedure" class="form-control <?= form_error('procedure') ? 'is-invalid' : ''; ?>" id="address" cols="30" rows="3"></textarea>
                <div class="invalid-feedback">
                  <?= form_error('procedure'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="description">Hasil Pelaksanaan</label>
                <textarea name="description" class="form-control <?= form_error('description') ? 'is-invalid' : ''; ?>" id="address" cols="30" rows="3"></textarea>
                <div class="invalid-feedback">
                  <?= form_error('description'); ?>
                </div>
              </div>
              <div class="form-group has-error">
                <label for="description">Komentar</label>
                <textarea name="comment" class="form-control <?= form_error('comment') ? 'is-invalid' : ''; ?>" id="comment" cols="30" rows="3"></textarea>
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