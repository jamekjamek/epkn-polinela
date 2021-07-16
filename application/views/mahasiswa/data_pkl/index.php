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
    <?php if ($detail != null && $detail->degree == 'D4') { ?>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <h3 class="text-uppercase">Upload Laporan PKL</h3>
            </div>
            <div class="card-body">
              <?php
              $query = $this->db->get_where('registration', ['file !=' => '', 'id' => $detail->registration_id])->row_array();
              if ($query) {
                $this->load->view('mahasiswa/data_pkl/report');
              } else {
                $this->load->view('mahasiswa/data_pkl/upload');
              } ?>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <?php
            $query = $this->db->get_where('registration', ['file !=' => '', 'id' => @$detail->registration_id])->row_array();
            if (@$detail->degree == 'D4' && $query == null) {
              echo '<small class="text-mute">Silahkan upload laporan PKL anda untuk dapat melihat nilai</small>';
            } else if ($query && @$detail->degree == 'D4') { ?>
              <div class="table-responsive">
                <table class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th rowspan="2">Dosen Pembimbing</th>
                      <th rowspan="2">Lokasi</th>
                      <th colspan="5" class="text-center">Nilai</th>
                      <th rowspan="2" class="text-center">Status Kelulusan</th>
                    </tr>
                    <tr>
                      <td>Supervisi</td>
                      <td>Bimbingan</td>
                      <td>Ujian</td>
                      <td>Pembimbing Lapang</td>
                      <td>Nilai Akhir</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= $detail->lecture_name ?></td>
                      <td><?= $detail->company_name ?></td>
                      <td><?= $detail->supervision_value ?></td>
                      <td><?= $detail->lecture_value ?></td>
                      <td><?= $detail->final_score_value ?></td>
                      <td><?= $detail->supervisor_value ?></td>
                      <td><?= $detail->result_final_score ?> (<?= $detail->HM ?>)</td>
                      <td><?= $detail->student_status ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php } else { ?>
              <div class="table-responsive">
                <table class="table table-hover" style="padding: 20px;">
                  <thead>
                    <tr>
                      <th rowspan="2">Dosen Pembimbing</th>
                      <th rowspan="2">Lokasi</th>
                      <th colspan="5" class="text-center">Nilai</th>
                      <th rowspan="2" class="text-center">Status Kelulusan</th>
                    </tr>
                    <tr>
                      <td>Supervisi</td>
                      <td>Bimbingan</td>
                      <td>Ujian</td>
                      <td>Pembimbing Lapang</td>
                      <td>Nilai Akhir</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><?= @$detail->lecture_name ?></td>
                      <td><?= @$detail->company_name ?></td>
                      <td><?= @$detail->supervision_value ?></td>
                      <td><?= @$detail->lecture_value ?></td>
                      <td><?= @$detail->final_score_value ?></td>
                      <td><?= @$detail->supervisor_value ?></td>
                      <td><?= @$detail->result_final_score ?> <?= @$detail->HM ?></td>
                      <td><?= @$detail->student_status ?></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>