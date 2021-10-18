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
                          <a href="<?= base_url($role . '/recap/scoring'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
                          <a href="<?= site_url('pdf/nilaiakhirpkn?prodi=' . $this->input->get('prodi')) ?>" class="btn btn-success" style="margin-top: 30px;">Export</a>
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
                      <th>Periode PKN</th>
                      <th>Nama Mahasiswa</th>
                      <th>NPM</th>
                      <th>Program Studi</th>
                      <th>Laporan & Video</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $row) :
                    ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $row->academic_year; ?></td>
                        <td><?= $row->fullname; ?></td>
                        <td><?= $row->npm; ?></td>
                        <td><?= $row->prodi_name; ?></td>
                        <td>
                          <?php if ($row->file) : ?>
                            <div class="btn-group">
                              <a href="<?= base_url('assets/uploads/laporan/' . $row->file) ?>" class="btn btn-outline-success"><i class="fa fa-file-pdf"></i></a>
                              <button class="btn btn-outline-danger view-video" data-toggle="modal" data-target="#view-video" data-log="<?= encodeEncrypt($row->id); ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="recap/video"><i class="ik ik-youtube"></i></button>
                            </div>
                          <?php else :  ?>
                            <div class="btn-group">
                              <a href="" class="btn btn-outline-success disabled"><i class="fa fa-file-pdf"></i></a>
                              <button class="btn btn-outline-danger view-video disabled"><i class="ik ik-youtube"></i></button>
                            </div>
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php $i++;
                    endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
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