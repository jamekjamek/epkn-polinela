<div id="app" data-module="KaprodiIndexModule" class="main-content">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-map bg-blue"></i>
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
                <a href="<?= $__url_create; ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableKaprodi" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>PIC</th>
                    <th>Label</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($locations as $location) :
                    $province_regency = strtolower($location->regency_name . ' , ' . $location->province_name);
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $location->name; ?></td>
                      <td><?= $location->address; ?>, <?= ucwords($province_regency); ?></td>
                      <td><?= $location->email; ?></td>
                      <td>
                        <?= $location->pic; ?>
                        <hr>
                        <?= $location->telp; ?>
                      </td>
                      <td>
                        <?php
                        if ($location->label == '-') {
                          echo '<span class="badge badge-pill badge-secondary mb-1">Not Verified</span>';
                        } else if ($location->label == 'prodi') {
                          echo '<span class="badge badge-pill badge-success mb-1">Prodi</span>';
                        } else {
                          echo '<span class="badge badge-pill badge-warning mb-1">Bersama</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <?= ($location->status === 'verify' ? '<span class="badge badge-pill badge-success mb-1">Verified</span>' : '<span class="badge badge-pill badge-danger mb-1">Not Verified</span>') ?>
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <?php if ($location->status <> 'verify') { ?>
                            <button data-url="<?= $__url_verifikasi . $this->encrypt->encode($location->id, keyencrypt()) ?>" class="btn btn-icon btn-secondary verify" title="Verifikasi"><i class="ik ik-check"></i></button>
                          <?php } ?>
                          <a href="<?= $__url_edit . $this->encrypt->encode($location->id, keyencrypt()) ?>" class="btn btn-icon btn-success" title="Edit"><i class="ik ik-edit"></i></a>
                          <button data-url="<?= $__url_delete . $this->encrypt->encode($location->id, keyencrypt()) ?>" class="btn btn-icon btn-danger delete" title="Delete"><i class="ik ik-trash"></i></button>
                        </div>
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