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
                </div>
                <div>
                  <a href="<?= base_url('admin/letter/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
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
                    <th>Dokumen</th>
                    <th>No Surat</th>
                    <th>Detail</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($letters as $letter) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $letter->document; ?></td>
                      <td> <?= $letter->letter_number; ?></td>
                      <td>
                        <a href="<?= base_url('admin/letter/detail/' . encodeEncrypt($letter->id)) ?>" class="btn btn-success">Detail</a>

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

<?php if ($this->session->flashdata('success')) : ?>
  <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
<?php elseif ($this->session->flashdata('error')) : ?>
  <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
<?php endif; ?>