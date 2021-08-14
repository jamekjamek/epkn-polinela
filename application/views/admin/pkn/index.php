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
                <div>
                  <h3 class="text-uppercase"><?= $title; ?></h3>
                  <br>

                  <div class="form-group">
                    <label for="academicyearketuplak">Tahun Akademik</label>
                    <select class="form-control" id="academicyearketuplak" style="width:100%" required name="academic">
                      <option></option>
                      <?php foreach ($academicyear as $academic) : ?>
                        <option value="<?= $academic->id ?>"><?= $academic->name ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <?php if ($this->uri->segment(3)) : ?>
                    <a class="btn btn-info" href="<?= base_url('major/pkn'); ?>">Reset</a>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Program Studi</th>
                    <th>Jumlah Mahasiswa</th>
                    <th>Jumlah Ditempatkan</th>
                    <th>Jumlah Lulus</th>
                    <th>Presentase Lulus</th>
                  </tr>
                </thead>
                <tbody>

                  <?php $i = 1;
                  foreach ($majors as $major) :
                    $uri = $this->uri->segment(4);
                    if ($uri) {
                      $sumStudent         = $this->db->get_where('student', ['prodi_id' => $major->prodi_id, 'academic_year_id' => $uri])->num_rows();
                      $sumDiterima        = $this->db->get_where('registration', ['group_status' => 'Diterima', 'prodi_id' => $major->prodi_id, 'academic_year_id' => $uri])->num_rows();
                      $sumGraduated     = $this->db->get_where('student', ['status' => 'graduated', 'prodi_id' => $major->prodi_id])->num_rows();
                    } else {
                      $sumStudent         = $this->db->get_where('student', ['prodi_id' => $major->prodi_id])->num_rows();
                      $sumDiterima        = $this->db->get_where('registration', ['group_status' => 'Diterima', 'prodi_id' => $major->prodi_id])->num_rows();
                      $sumGraduated     = $this->db->get_where('student', ['status' => 'graduated', 'prodi_id' => $major->prodi_id])->num_rows();
                    }
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $major->name ?></td>
                      <td><?= $major->prodi ?></td>
                      <td><?= $sumStudent ?></td>
                      <td><?= $sumDiterima; ?></td>
                      <td><?= $sumGraduated; ?></td>
                      <td>
                        <?php if ($sumDiterima === 0) : ?>
                          0 %
                        <?php else : ?>
                          <?= number_format(($sumGraduated / $sumStudent), 2) * 100 . ' %'; ?>
                        <?php endif; ?>
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