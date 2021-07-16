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
                        <div class="invalid-feedback">
                          <?= form_error('regency'); ?>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary" style="margin-top: 30px;"><i class="ik ik-plus-square"></i>Cari</button>
                      <?php if ($this->input->get('prodi')) : ?>
                        <a href="<?= base_url('admin/verification'); ?>" class="btn btn-danger" style="margin-top: 30px;">Reset</a>
                      <?php endif; ?>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <?php if ($this->input->get('prodi')) : ?>
              <div class="dt-responsive">
                <table id="simpletable" class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Data</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = 1;
                    foreach ($students as $student) :
                      $list   = $this->db->get_where('list_check_validation', ['student_id' => $student->id])->row();
                    ?>
                      <tr>
                        <td><?= $i; ?></td>
                        <td><?= $student->fullname; ?></td>
                        <td>
                          <?php if ($student->id === @$list->student_id && @$list->v_bebastanggungan === '1' && $list->v_kompensasi === '1' && @$list->v_kehadiran === '1' && @$list->v_kelulusan === '1') : ?>
                            <ul id="datacek<?= $i; ?>" data-id="<?= $student->id ?>">
                              <li>
                                <div class="form-group form-check" style="font-size: 16px;">
                                  <input type="checkbox" class="form-check-input kehadiranadmin" id="kehadiranadmin<?= $i; ?>" <?= ($student->id === @$list->student_id && @$list->v_kehadiran_admin === '1') ? 'checked' : ''; ?>>
                                  <label class="form-check-label" for="kehadiranadmin<?= $i; ?>">Kehadiran</label>
                                </div>
                              </li>
                            </ul>
                          <?php else : ?>
                            <span class="badge badge-danger">
                              Jurusan belum memverifikasi
                            </span>
                          <?php endif; ?>
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
</div>