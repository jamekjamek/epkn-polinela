w<div class="main-content">
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
                  <a href="<?= base_url('admin/master/village/export'); ?>" class="btn btn-success"><i class="ik ik-plus-square"></i>Export</a>
                  <a href="<?= base_url('admin/master/village/import'); ?>" class="btn btn-info"><i class="ik ik-plus-square"></i>Import</a>
                  <a href="<?= base_url('admin/master/village/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
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
                    <th>Desa</th>
                    <th>Alamat</th>
                    <th>Kontak Person</th>
                    <th>Status</th>
                    <th>Bank</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $j = 1;
                  foreach ($allvillage as $company) : ?>
                    <tr>
                      <td><?= $j++; ?></td>
                      <td><?= $company->name; ?></td>
                      <td>
                        <?php
                        $str = $company->address;
                        $cek = (str_split($str, 40)); // return: {'aAbBc','CdDeE','fFg'}
                        for ($i = 0; $i < count($cek); $i++) {
                          echo '<b>' . $cek[$i] . '<br></b>';
                        }
                        ?><?= $company->districts_name; ?>,
                        <?= $company->regency_name; ?>, <?= $company->province_name; ?>
                      </td>
                      <td>
                        <strong><?= $company->pic; ?></strong>
                        <br>
                        <?= $company->email; ?> | <?= $company->telp; ?>
                      </td>
                      <td>
                        <?php if ($company->status === 'verify') : ?>
                          <span class="badge badge-pill badge-success mb-1">Verifikasi</span>
                        <?php else : ?>
                          <span class="badge badge-pill badge-danger mb-1">Tidak Verifikasi</span>
                        <?php endif; ?>
                      </td>
                      <td>
                        <?= $company->norek ?> <br>
                        <?= $company->bank_name ?>
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <a href="<?= base_url('admin/master/village/edit/' . encodeEncrypt($company->id)) ?>" class="btn btn-success"><i class="ik ik-edit" title="Edit desa"></i></a>
                          <button type="button" class="btn btn-danger delete-company" data-id="<?= encodeEncrypt($company->id) ?>"><i class=" ik ik-trash" title="Hapus desa"></i></button>
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