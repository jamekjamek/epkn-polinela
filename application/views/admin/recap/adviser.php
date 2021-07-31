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
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-6">
                <form action="" method="GET">
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="prodi">Pilih Prodi</label>
                        <select class="get-prodi form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="prodi" id="prodi" style="width: 100%" required>
                          <option></option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="btn-group">
                        <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="ik ik-plus-square"></i>Cari</button>
                        <?php if ($this->input->get('prodi')) : ?>
                          <a href="<?= base_url('admin/recap/adviser'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
                          <a href="<?= base_url('pdf/dosenpembimbing/' . $this->input->get('prodi')); ?>" class="btn btn-success" style="margin-top: 30px;"><i class="ik ik-pdf"></i>EXPORT</a>
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
                      <th>Mahasiswa</th>
                      <th>Dosen Pembimbing</th>
                      <th>Lokasi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($lecturers as $lecturer) :
                    ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $lecturer->academic_year; ?></td>
                        <td>
                          <strong><?= $lecturer->npm; ?></strong>
                          <br>
                          <?= $lecturer->fullname; ?>
                        </td>
                        <td>
                          <strong><?= $lecturer->nip; ?></strong>
                          <br>
                          <?= $lecturer->lecture_name; ?>
                        </td>
                        <td><?= $lecturer->company_name; ?></td>
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
</div>