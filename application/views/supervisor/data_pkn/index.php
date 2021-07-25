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
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Dosen Pembimbing</th>
                    <th>Lokasi PKN</th>
                    <th>Waktu PKL</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($dataPkl as $row) :
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td>
                        <strong> <?= $row->npm ?></strong>
                        <br>
                        <?= $row->fullname ?> -
                        <?= $row->status ?>
                      </td>
                      <td><?= $row->lecture_name ?></td>
                      <td><?= $row->company_name; ?></td>
                      <td>
                        <span class="badge badge-pill badge-primary mb-1">
                          <?= date('d-m-Y', strtotime($row->start_date)) ?>
                        </span>
                        s.d <span class="badge badge-pill badge-success mb-1">
                          <?= date('d-m-Y', strtotime($row->finish_date)) ?>
                        </span>
                      </td>
                      <td>
                        <a href="<?= base_url('supervisor/data_pkn/assessment/' . encodeEncrypt($row->id)) ?>" class="btn btn-success"><i class="ik ik-check-square" title="Penilaian PKL"></i><span>Penilaian</span></a>
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