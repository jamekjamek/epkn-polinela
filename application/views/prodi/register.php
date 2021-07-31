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

              <div class="btn-group">
                <a href="<?= base_url('pdf/dosenpembimbing/' . $prodi); ?>" class="btn btn-info" style="margin-top: 30px;"><i class="ik ik-pdf"></i>Export Dosen Pembimbing</a>
                <a href="<?= site_url('pdf/pembimbinglapang/' . $prodi) ?>" class="btn btn-success" style="margin-top: 30px;"><i class="ik ik-pdf"></i>Export Pembimbing Lapang</a>
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
                    <th>Pembimbing</th>
                    <th>Lokasi</th>
                    <th>Berkas</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($group as $row) :
                  ?>
                    <tr>
                      <td><?= $i; ?></td>
                      <td>
                        <strong><?= $row->academic_year; ?> </strong><br>
                        Pelaksanaan : <?= date('d-m-Y', strtotime($row->start_date)) ?> s.d <?= date('d-m-Y', strtotime($row->finish_date)) ?>
                      </td>
                      <td>
                        <strong><?= $row->npm; ?></strong>
                        <br>
                        <?= $row->fullname; ?> <br>
                        <strong><?= $row->status; ?></strong> Kelompok
                      </td>
                      <td>
                        Dosen : <br>
                        <strong><?= $row->nip; ?></strong>
                        <br>
                        <?= $row->lecture_name; ?>
                        <hr>
                        Pembimbing Lapang : <br>
                        <?= $row->pic; ?>
                      </td>
                      <td><?= $row->company_name; ?></td>
                      <td>
                        <div class="btn-group">
                          <a href="<?= base_url('assets/uploads/laporan/' . $row->file) ?>" class="btn btn-outline-success"><i class="fa fa-file-pdf"></i></a>
                          <button class="btn btn-outline-danger view-video" data-toggle="modal" data-target="#view-video" data-log="<?= encodeEncrypt($row->id); ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="video"><i class="ik ik-youtube"></i></button>
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
  <div class="modal fade" id="view-video" tabindex="-1" role="dialog" aria-labelledby="view-video-label" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view-video-label">Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9 videoResult">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>