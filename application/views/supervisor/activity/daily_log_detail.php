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
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?> <strong> <?= @$row->fullname ?></strong></h3>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <a href="<?= site_url('supervisor/activity/daily_log') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
              <br><br>
              <form name="myform" action='<?= site_url('supervisor/daily_log/verification'); ?>' method="POST">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kegiatan</th>
                      <th>Alat dan Bahan</th>
                      <th>Pelaksanaan</th>
                      <th>Validasi</th>
                      <th>Detail</th>
                      <th>
                        <div class="checkbox-zoom zoom-primary">
                          <label>
                            <input type="checkbox" onchange="checkAll(this)">
                            <span class="cr">
                              <i class="cr-icon ik ik-check txt-primary"></i>
                            </span>
                            <span>All</span>
                          </label>
                        </div>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($dailyLog as $row) :
                    ?>
                      <tr>
                        <?php if ($row->validation == 0) : ?>
                          <input type="hidden" name="dailyLog[]" value="<?= $row->id; ?>">
                        <?php endif ?>
                        <td><?= $i++; ?></td>
                        <td><?= $row->learning_achievement ?></td>
                        <td><?= $row->tool; ?></td>
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
                        <td>
                          <button type="button" class="btn btn-warning modalLogIdAll" data-toggle="modal" data-target="#modalLogIdAll" data-log="<?= $row->id; ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="activity/daily_log/detail_more"><i class="ik ik-eye"></i><span>Detail</span></button>
                        </td>
                        <td>
                          <?php if ($row->validation == 0) {
                            echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverikasi</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-success mb-1">Diverifikasi Pembimbing Lapang</span>';
                          } ?>
                        </td>
                        <td>
                          <?php if ($row->validation == 0) : ?>
                            <div class="checkbox-zoom zoom-primary">
                              <label>
                                <input type="checkbox" value="1" name="approval[]">
                                <span class="cr">
                                  <i class="cr-icon ik ik-check txt-primary"></i>
                                </span>
                                <span></span>
                              </label>
                            </div>
                          <?php endif ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                    <tr>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td>
                        <button class="btn btn-outline-primary" type="submit">Simpan</button>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </form>
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