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
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="form-group">
                        <label for="prodi">Pilih Prodi</label>
                        <select class="get-prodi form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="prodi" id="prodi" style="width: 100%" required>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="form-group">
                        <label for="prodi">Pilih Tahun Akademik</label>
                        <select class="get-periode-pkl form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="periode" id="periode" style="width: 100%" required>
                          <option></option>
                          <?php foreach ($allPeriode as $periode) : ?>
                            <option value="<?= $periode->id; ?>"> <?= $periode->name ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="ik ik-plus-square"></i>Cari</button>
                        <?php if ($this->input->get('prodi')) : ?>
                          <a href="<?= base_url($role . '/daily_log'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <?php if ($this->input->get('prodi')) : ?>
              <div class="table-responsive">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Periode</th>
                      <th>Mahasiswa</th>
                      <th>Program Studi</th>
                      <th>Lokasi PKN</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($students as $student) :
                    ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $student->academic_year; ?></td>
                        <td>
                          <strong><?= $student->npm; ?></strong> <br>
                          <?= $student->fullname; ?>
                        </td>
                        <td><?= $student->prodi_name; ?></td>
                        <td><?= $student->company_name; ?></td>
                        <td>
                          <div class="btn-group">
                            <a href="<?= site_url($role . '/daily_log/detail/' . $student->registration_id) ?>" class="btn btn-outline-secondary">DETAIL</a>
                            <a href="<?= site_url('pdf/lembarisianpkn/' . encodeEncrypt($student->registration_id)) ?>" target="_blank" class="btn btn-outline-success">Export</a>
                          </div>
                        </td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>