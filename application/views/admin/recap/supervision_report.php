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
                    <div class="col-sm-4">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="ik ik-plus-square"></i>Cari</button>
                        <?php if ($this->input->get('prodi')) : ?>
                          <a href="<?= base_url('admin/recap/supervision_report'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
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
                      <th>Program Studi</th>
                      <th>Perusahaan</th>
                      <th>Dosen</th>
                      <th>Waktu Supervisi</th>
                      <th>Detail</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($groups as $group) :
                    ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $group->academic_year; ?></td>
                        <td><?= $group->prodi_name; ?></td>
                        <td><?= $group->company_name; ?></td>
                        <td><?= $group->lecture_name; ?></td>
                        <td>
                          <?php if ($group->time) {
                            echo $group->time;
                          } else {
                            echo '<small class="text-mute">Belum melakukan supervisi</small>';
                          }
                          ?>
                        </td>
                        <td>
                          <div class="btn-group">
                            <?php if ($group->id) : ?>
                              <button type="button" class="btn btn-outline-info modalLogIdAll" data-toggle="modal" data-target="#modalLogIdAll" data-log="<?= $group->id; ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="recap/supervision_report/detail">DETAIL</button>
                              <a href="<?= site_url('pdf/laporansupervisipkn/' . encodeEncrypt($group->id)) ?>" class="btn btn-outline-success">EXPORT</a>
                            <?php else : ?>
                              <button type="button" class="btn btn-outline-info disabled">DETAIL</button>
                              <a href="<?= site_url('pdf/laporansupervisipkn/' . encodeEncrypt($group->id)) ?>" class="btn btn-outline-success disabled">EXPORT</a>
                            <?php endif ?>
                          </div>
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
  <div class="modal fade" id="modalLogIdAll" tabindex="-1" role="dialog" aria-labelledby="modalLogIdLabelAll" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLogIdLabelAll">Detail</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <form>
            <div class="table-responsive">
              <table class="table table-hover logIdResultAll">

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