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
                          <a href="<?= site_url('prodi/attendance/detail/' . $student->registration_id) ?>" class="btn btn-outline-secondary">DETAIL</a>
                          <a href="<?= site_url('pdf/kehadiran/' . $student->registration_id) ?>" class="btn btn-outline-success">EXPORT</a>
                        </div>
                      </td>
                    </tr>
                  <?php $i++;
                  endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>