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
                    <a class="btn btn-info" href="<?= base_url('ketuplak/pkn'); ?>">Reset</a>
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
                    $uri = $this->uri->segment(3);
                    if ($uri) {
                      $sumStudent         = $this->db->get_where('student', ['prodi_id' => $major->prodi_id, 'academic_year_id' => $uri])->num_rows();
                      $sumDiterima        = $this->db->query("SELECT count(*) as sumDiterima  FROM `student` JOIN registration on registration.student_id = student.id WHERE student.prodi_id = '" . $major->prodi_id . "' AND registration.academic_year_id = '$uri'")->row();
                      $sumDalamProses     = $this->db->get_where('registration', ['group_status' => 'dalam_proses_penerimaan', 'prodi_id' => $major->prodi_id, 'academic_year_id' => $uri])->num_rows();
                      $sumGraduated     = $this->db->get_where('student', ['status' => 'graduated', 'prodi_id' => $major->prodi_id, 'academic_year_id' => $uri])->num_rows();
                    } else {
                      $sumStudent         = $this->db->get_where('student', ['prodi_id' => $major->prodi_id])->num_rows();
                      $sumDiterima        = $this->db->query("SELECT count(*) as sumDiterima  FROM `student` JOIN registration on registration.student_id = student.id WHERE student.prodi_id = '" . $major->prodi_id . "'")->row();
                      $sumDalamProses     = $this->db->get_where('registration', ['group_status' => 'dalam_proses_penerimaan', 'prodi_id' => $major->prodi_id])->num_rows();
                      $sumGraduated     = $this->db->get_where('student', ['status' => 'graduated', 'prodi_id' => $major->prodi_id])->num_rows();
                    }
                  ?>
                    <tr>
                      <td class="text-center"><?= $i++; ?></td>
                      <td><?= $major->prodi ?></td>
                      <td class="text-center"><?= $sumStudent ?></td>
                      <td class="text-center"><?= $sumDiterima->sumDiterima; ?></td>
                      <td class="text-center"><?= $sumGraduated; ?></td>
                      <td class="text-center">
                        <?php if ($sumDiterima === 0) : ?>
                          0 %
                        <?php else : ?>
                          <?= number_format(($sumGraduated / $sumStudent), 2) * 100 . ' %'; ?>
                        <?php endif; ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <?php
                $uri = $this->uri->segment(3);
                if ($uri) {
                  $allStudent = $this->db->query("SELECT COUNT(id) as all_student FROM `student` where academic_year_id = '$uri'")->row();
                  $sumAllDiterima = $this->db->query("SELECT count(*) as sumDiterima  FROM `student` JOIN registration on registration.student_id = student.id WHERE registration.academic_year_id = '$uri'")->row();
                  $sumAllGraduated = $this->db->query("SELECT COUNT(id) as all_graduated FROM `student` where academic_year_id = '$uri' AND status = 'graduated'")->row();
                } else {
                  $allStudent = $this->db->query("SELECT COUNT(id) as all_student FROM `student`")->row();
                  $sumAllDiterima = $this->db->query("SELECT count(*) as sumDiterima  FROM `student` JOIN registration on registration.student_id = student.id")->row();
                  $sumAllGraduated = $this->db->query("SELECT COUNT(id) as all_graduated FROM `student` WHERE status = 'graduated'")->row();
                }
                ?>
                <tfoot>
                  <tr>
                    <th colspan="2" class="text-right">Total</th>
                    <th class="text-center"><?= $allStudent->all_student ?></td>
                    <th class="text-center"><?= $sumAllDiterima->sumDiterima ?></th>
                    <th class="text-center"><?= $sumAllGraduated->all_graduated ?></th>
                    <th class="text-center">
                      <?php if ($sumAllDiterima->sumDiterima === 0) : ?>
                        0 %
                      <?php else : ?>
                        <?= number_format(($sumAllGraduated->all_graduated / $allStudent->all_student), 2) * 100 . ' %'; ?>
                      <?php endif; ?>
                    </th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>