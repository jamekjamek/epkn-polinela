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
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <a href="<?= site_url('supervisor/activity/attendance') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
              <br><br>
              <form name="myform" action='<?= site_url('supervisor/attendance/verification'); ?>' method="POST">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Mahasiswa</th>
                      <th>Tanggal Kehadiran</th>
                      <th>Waktu Kehadiran</th>
                      <th>Keterangan</th>
                      <th>Validasi</th>
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
                    foreach ($attendance as $row) :
                    ?>
                      <tr>
                        <?php if ($row->validation == 0) : ?>
                          <input type="hidden" name="attendance[]" value="<?= $row->id; ?>">
                        <?php endif ?>
                        <td><?= $i++; ?></td>
                        <td>
                          <strong> <?= $row->npm ?></strong>
                          <br>
                          <?= $row->fullname ?>
                        </td>
                        <td><?= date('d-m-Y', strtotime($row->created_at)) ?></td>
                        <td><?= $row->time_in; ?> s.d <?= $row->time_out; ?></td>
                        <td><?= $row->attendance; ?></td>
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
                        <button class="btn btn-outline-primary" type="submit">Verifikasi</button>
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
</div>