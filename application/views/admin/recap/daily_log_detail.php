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
                <h3 class="text-uppercase"><?= $title; ?> <strong> <?= $row->fullname ?></strong></h3>
              </div>
              <!-- <a href="" class="btn btn-danger"><i class="ik ik-arrow-left"></i> KEMBALI</a> -->
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kegiatan</th>
                    <th>Tanggal Pelaksanaan</th>
                    <th>Alat dan Bahan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($details as $student) :
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td><?= $student->learning_achievement; ?></td>
                      <td>
                        <ul>
                          <li>
                            <strong>Tempat :</strong> <?= $row->implement_place; ?>
                          </li>
                          <li>
                            <strong>Tanggal :</strong><?= $row->implementation_date; ?>
                          </li>
                          <li>
                            <strong>Jumlah Peserta :</strong> <?= $row->qty; ?>
                          </li>
                        </ul>
                      </td>
                      <td><?= $student->tool; ?></td>
                      <td>
                        <button type="button" class="btn btn-warning modalLogIdAll" data-toggle="modal" data-target="#modalLogIdAll" data-log="<?= $row->id; ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="recap/daily_log/detail_more"><i class="ik ik-eye"></i><span>Selengkapnya</span></button>
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
  <div class="modal fade" id="modalLogIdAll" tabindex="-1" role="dialog" aria-labelledby="modalLogIdLabelAll" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLogIdLabelAll">Detail Daily Log</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Materi</th>
                    <th>Prosedur</th>
                    <th>Hasil Pelaksanaan</th>
                    <th>Komentar</th>
                  </tr>
                </thead>
                <tbody class="logIdResultAll">

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
</div>