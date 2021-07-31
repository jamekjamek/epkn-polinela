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
            <form action="<?= site_url('mahasiswa/data_pkn/uploaded') ?>" method="post" enctype="multipart/form-data">
              <input type="hidden" value="<?= $update->id ?>" name="registration_id">
              <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">File Laporan PKL</label>
                <div class="col-sm-8">
                  <input type="file" name="file" class="form-control" required accept=".pdf">
                  <small id="passwordHelpBlock" class="form-text text-muted">
                    File yang di upload berupa pdf
                  </small>
                </div>
              </div>
              <div class="form-group row">
                <label for="file" class="col-sm-2 col-form-label">Embed Youtube</label>
                <div class="col-sm-8">
                  <input type="text" name="youtube_link" class="form-control" value="<?= set_value('youtube_link') ? set_value('youtube_link') : $update->youtube_link; ?>">
                  <small id="youtube_link" class="form-text text-muted">
                    Masukkan embed youtube mu disini, tutorial embed dapat di lihat disini <a href="https://support.google.com/youtube/answer/171780?hl=en">https://support.google.com/youtube/answer/171780?hl=en</a>
                  </small>
                </div>
              </div>
              <div class="form-group row">
                <label for="btn" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary mr-2">Upload</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>