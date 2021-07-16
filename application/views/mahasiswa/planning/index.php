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
                if ($isCheck != null && $isCheck->group_status == 'diterima') : ?>
                  <div class="btn-group" role="group">
                    <a href="<?= base_url('mahasiswa/planning/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
                    <a href="<?= base_url('pdf/lembarperencanaankegiatanpkl'); ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i>Export</a>
                  </div>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Kegiatan</th>
                    <th>Jumlah Jam</th>
                    <th>Persetujuan & Revisi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($plannings as $planning) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><strong><?= $planning->npm; ?></strong> <br> <?= $planning->fullname ?></td>
                      <td>
                        <strong>Capaian :</strong>
                        <?= $planning->learning_achievement; ?>
                        <br>
                        <strong>Sub Capaian :</strong>
                        <?= $planning->learning_achievement_sub; ?>
                      </td>
                      <td><?= $planning->time_qty; ?></td>
                      <td>
                        <?php if ($planning->approval == 0) {
                          echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverikasi</span>';
                        } else if ($planning->approval == 1) {
                          echo '<span class="badge badge-pill badge-info mb-1">Diverifikasi Dosen Pembimbing</span>';
                        } else {
                          echo '<span class="badge badge-pill badge-success mb-1">Diverifikasi Pembimbing Lapang</span>';
                        } ?>
                      </td>
                      <td>
                        <?php if ($planning->approval == 0 || $planning->approval == 2) : ?>
                          <a href="<?= base_url('mahasiswa/planning/edit/' . $this->encrypt->encode($planning->id, keyencrypt()) . '/edit') ?>" class="btn btn-icon btn-success" title="Edit"><i class="ik ik-edit"></i></a>
                        <?php endif ?>
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