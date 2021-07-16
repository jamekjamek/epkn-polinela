<div id="app" data-module="KaprodiRegistrationIndex" class="main-content">
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
            <div class="col">
              <h3 class="text-uppercase"><?= $title; ?></h3>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 table-responsive mt-3">
                <div class="row mb-4">
                  <div class="col-3">
                    <label for="name">Tahun Akademik</label>
                    <select class="get-academic form-control" data-url="<?= $__url_index; ?>" data-selected="<?= $academic_id; ?>" name="academicyear" id="academicyear">
                      <option value="">-- Pilih Tahun Akademik --</option>
                    </select>
                  </div>
                </div>
                <table id="tableRegister" class="table table-hover">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Status Anggota</th>
                      <th>Perusahaan</th>
                      <th>Waktu PKL</th>
                      <th>Verifikasi Pendaftaran</th>
                      <th>Berkas</th>
                      <th>Dosen Pembimbing</th>
                      <th>Dosen Lapangan</th>
                      <th>Anggota Grup</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($data_registration as $registration) :
                    ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td>
                          <?= $registration->status ?>
                        </td>
                        <td><?= $registration->company_name; ?></td>
                        <td>
                          <span class="badge badge-pill badge-primary mb-1">
                            <?= date('d-m-Y', strtotime($registration->start_date)) ?>
                          </span>
                          s.d <span class="badge badge-pill badge-success mb-1">
                            <?= date('d-m-Y', strtotime($registration->finish_date)) ?>
                          </span>
                        </td>
                        <td>
                          <?php if ($registration->group_status == 'diverifikasi') {
                            echo '<span class="badge badge-pill badge-info mb-1">Pendaftaran Diverfikasi</span>';
                          } else if ($registration->group_status == 'belum_terverifikasi') {
                            echo '<span class="badge badge-pill badge-muted mb-1 text-white">Belum Terverifikasi</span>';
                          } else if ($registration->group_status == 'dalam_proses_penerimaan') {
                            echo '<span class="badge badge-pill badge-info mb-1">Proses Konfirmasi Perusahaan</span>';
                          } else if ($registration->group_status == 'diterima') {
                            echo '<span class="badge badge-pill badge-success mb-1">Pendaftaran Diterima</span>';
                          } else if ($registration->group_status == 'ditolak') {
                            echo '<span class="badge badge-pill badge-danger mb-1">Pendaftaran Ditolak</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverifikasi</span>';
                          }
                          ?>
                        </td>
                        <td>
                          <?= ($registration->file) ? "<a class='btn btn-icon btn-secondary' target='_blank' href=' $__url_file$registration->file'><i class='ik ik-file'></i></a>" : '<strong>-</strong>' ?>
                        </td>
                        <td>
                          <?= ($registration->lecture_name) ? $registration->lecture_name : '<strong>-</strong>' ?>
                        </td>
                        <td>
                          <?= ($registration->supervisor_name) ? $registration->supervisor_name : '<strong>-</strong>' ?>
                        </td>
                        <td>
                          <?= $registration->member_name ?>
                        </td>
                        <td>
                          <?php if (!$registration->file && $registration->status == 'Ketua') { ?>
                            <button data-url="<?= $__url_upload ?>" data-group_id="<?= $registration->group_id ?>" data-reg_id="<?= $registration->id ?>" class="btn btn-info upload mb-1" title="Upload">upload</button>
                          <?php } ?>
                          <?php if ($registration->group_status == 'dalam_proses_penerimaan') { ?>
                            <button data-group_id="<?= $registration->group_id ?>" data-reg_id="<?= $registration->id ?>" class="btn btn-success approval mb-1" data-status="<?= $registration->status ?>" title="Approval">persetujuan</button>
                          <?php } else if ($registration->group_status == 'belum_terverifikasi') { ?>
                            <button data-url="<?= $__url_verifikasi . $this->encrypt->encode($registration->id, keyencrypt()) ?>" class="btn btn-success mb-1 verify" title="Verifikasi">verifikasi</button>
                          <?php } ?>
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