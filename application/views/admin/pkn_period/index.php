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
                <div>
                  <h3 class="text-uppercase"><?= $title; ?></h3>
                </div>
                <div>
                  <?= ($check == 2) ? '' : '<a href="' . base_url('admin/pkn_period/add') . '" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>'; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Periode Pelaksanaan</th>
                    <th>Tahun Akademik & Status</th>
                    <th>Waktu Pelaksanaan PKL</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($periods as $periode) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $periode->title; ?></td>
                      <td><?= $periode->academic_year; ?>
                        <?= ($periode->academic_year_status == 1) ? ' <span class="badge badge-info">Aktif</span>' : '<span class="badge badge-danger">Tidak Aktif</span>'; ?>
                      </td>
                      <td><?= date('d-m-Y', strtotime($periode->start_time_pkl)) . ' - ' . date('d-m-Y', strtotime($periode->finish_time_pkl)); ?></td>
                      <td>
                        <?= ($periode->academic_year_status == 0) ? '' : '<a href="' . base_url('admin/pkn_period/edit/' . encodeEncrypt($periode->id)) . '" class="btn btn-success">Edit</a>'; ?>
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