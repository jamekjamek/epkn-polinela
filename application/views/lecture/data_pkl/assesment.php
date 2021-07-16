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
      <div class="col-lg-4 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <h4 class="card-title mt-10"><?= $detail->fullname ?></h4>
              <p class="card-subtitle"><?= $detail->company_name ?></p>
            </div>
          </div>
          <hr class="mb-0">
          <div class="card-body">
            <small class="text-muted d-block">Email address </small>
            <h6><?= $detail->student_email ?></h6>
            <small class="text-muted d-block pt-10">Phone</small>
            <h6><?= $detail->no_hp ?></h6>
            <small class="text-muted d-block pt-10">Address</small>
            <h6><?= $detail->address ?></h6>
          </div>
        </div>
        <a href="<?= site_url('dosen/data_pkl') ?>" class="btn btn-outline-success mx-2"><i class="ik ik-arrow-left"></i> <span> Kembali</span></a>
      </div>
      <div class="col-lg-8 col-md-7">
        <div class="card">
          <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="pills-supervisi-tab" data-toggle="pill" href="#supervisi" role="tab" aria-controls="pills-supervisi" aria-selected="false">Supervisi</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-bimbingan-tab" data-toggle="pill" href="#bimbingan" role="tab" aria-controls="pills-bimbingan" aria-selected="false">Bimbingan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-ujian-tab" data-toggle="pill" href="#ujian" role="tab" aria-controls="pills-ujian" aria-selected="false">Ujian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-nilai-akhir-tab" data-toggle="pill" href="#nilai-akhir" role="tab" aria-controls="pills-nilai-akhir" aria-selected="false">Nilai Akhir</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="supervisi" role="tabpanel" aria-labelledby="pills-supervisi-tab">
              <div class="card-body">
                <?php if ($supervision) :
                  $this->load->view('lecture/data_pkl/supervision/index');
                else :
                  $this->load->view('lecture/data_pkl/supervision/add');
                endif ?>
              </div>
            </div>
            <div class="tab-pane fade" id="bimbingan" role="tabpanel" aria-labelledby="pills-bimbingan-tab">
              <div class="card-body">
                <?php if ($guidance) {
                  $this->load->view('lecture/data_pkl/guidance/index');
                } else {
                  if ($degree->degree == 'D3') {
                    $this->load->view('lecture/data_pkl/guidance/add');
                  } else {
                    $this->load->view('lecture/data_pkl/guidance/add_d4');
                  }
                } ?>
              </div>
            </div>
            <div class="tab-pane fade" id="ujian" role="tabpanel" aria-labelledby="pills-ujian-tab">
              <div class="card-body">
                <?php if ($testScore) :
                  $this->load->view('lecture/data_pkl/final_test/index');
                else :
                  $this->load->view('lecture/data_pkl/final_test/add');
                endif ?>
              </div>
            </div>
            <div class="tab-pane fade" id="nilai-akhir" role="tabpanel" aria-labelledby="pills-nilai-akhir-tab">
              <div class="card-body">
                <?php if ($finalScore) {
                  $this->load->view('lecture/data_pkl/final_score/index');
                } else {
                  echo '<small class="text-mute">Nilai akhir belum dapat dimunculkan, silahkan isi nilai supervisi, nilai bimbingan dan nilai ujian PKL terlebih dahulu</small>';
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>