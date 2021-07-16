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
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="col-12 table-responsive mt-3">
              <div class="row mb-4">
                <div class="col-3">
                  <label for="name">Tahun Akademik</label>
                  <select class="form-control" data-selected="<?= $academicyear; ?>" name="academicyear" id="academicyear" data-menu="report_supervision">
                    <option value="">-- Pilih Tahun Akademik --</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Lokasi</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Waktu Supervisi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($reports as $row) :
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $row->company_name ?></td>
                      <td><?= $row->studentcount ?></td>
                      <td><?= $row->time ?></td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="<?= base_url('dosen/report_supervision/edit/' . $this->encrypt->encode($row->group_id, keyencrypt()) . '/edit') ?>" class="btn btn-success" title="Update"><i class="ik ik-edit"></i>Isi Laporan</a>
                          <a href="<?= base_url('dosen/report_supervision/detail/' . encodeEncrypt($row->group_id)) ?>" class="btn btn-warning"><i class="ik ik-eye" title="Detail"></i><span>Detail</span></a>
                        </div>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>