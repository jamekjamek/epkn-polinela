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
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
                <?php
                // var_dump($isCheck);
                // die;
                if ($isCheck != null && $isCheck->group_status == 'diterima') : ?>
                  <a href="<?= site_url('mahasiswa/daily/log/add') ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah Data</a>
                <?php endif ?>

              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Capain Pembelajaran</th>
                      <th>Tanggal Pelaksanaan</th>
                      <th>Alat dan Bahan</th>
                      <th>Validasi Supervisor</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($dailyLogs as $log) :
                    ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td>
                          <strong>Capaian Pembelajaran :</strong> <br>
                          <?= $log->learning_achievement ?>
                          <hr>
                          <strong>Sb Capain Pembelajaran : </strong> <br>
                          <?= $log->learning_achievement_sub ?>
                        </td>
                        <td><?= $log->implementation_date ?></td>
                        <td><?= $log->tool ?></td>
                        <td>
                          <?= ($log->validation == 0 ? '<span class="badge badge-pill badge-warning mb-1">Belum Diverikasi</span>' : '<span class="badge badge-pill badge-success mb-1">Sudah Diverifikasi</span>') ?>
                        </td>
                        <td>
                          <div class="btn-group" role="group">
                            <button type="button" class="btn btn-warning modalLogId" data-toggle="modal" data-target="#modalLogId" data-log="<?= $log->id; ?>"><i class="ik ik-eye"></i><span>Detail</span></button>
                            <a href="<?= site_url('mahasiswa/daily/log/edit/' . $this->encrypt->encode($log->id, keyencrypt()) . '/edit') ?>" class="btn btn-success"><i class="ik ik-edit"></i><span>Edit</span></a>

                          </div>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalLogId" tabindex="-1" role="dialog" aria-labelledby="modalLogIdLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLogIdLabel">Detail Daily Log</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Prosedur</th>
                  <th>Komentar</th>
                </tr>
              </thead>
              <tbody class="logIdResult">

              </tbody>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>