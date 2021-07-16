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
          <div class="card-header">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
                <?php if ($periode != NULL) : ?>
                  <a href="<?= base_url('mahasiswa/company/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
                <?php endif ?>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <table id="scr-vtr-dynamic" class="table table-hover nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Perusahaan</th>
                    <th>Alamat</th>
                    <th>PIC</th>
                    <th>Label</th>
                    <th>Status</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach ($comapnies as $company) :
                    $province_regency = strtolower($company->regency_name . ' , ' . $company->province_name);
                  ?>
                    <tr>
                      <td><?= $no++; ?></td>
                      <td><?= $company->name; ?></td>
                      <td>
                        <?php
                        $str = $company->address;
                        $cek = (str_split($str, 40)); // return: {'aAbBc','CdDeE','fFg'}
                        for ($i = 0; $i < count($cek); $i++) {
                          echo '<b>' . $cek[$i] . '<br></b>';
                        }
                        ?>
                        <?= ucwords($province_regency); ?>
                      </td>
                      <td>
                        <strong><?= $company->pic; ?></strong>
                        <br>
                        <?= $company->email; ?> | <?= $company->telp; ?>
                      </td>
                      <td>
                        <?php
                        if ($company->label == '-') {
                          echo '<span class="badge badge-pill badge-secondary mb-1">Belum Diverifikasi</span>';
                        } else if ($company->label == 'prodi') {
                          echo '<span class="badge badge-pill badge-success mb-1">Prodi</span>';
                        } else {
                          echo '<span class="badge badge-pill badge-warning mb-1">Bersama</span>';
                        }
                        ?>
                      </td>
                      <td>
                        <?= ($company->status === 'verify' ? '<span class="badge badge-pill badge-success mb-1">Diverifikasi</span>' : '<span class="badge badge-pill badge-secondary mb-1">Belum Diverifikasi</span>') ?>
                      </td>
                      <!-- <td>
                        <a href="<?= base_url('mahasiswa/company/edit/' . $this->encrypt->encode($company->id, keyencrypt()) . '/edit') ?>" title="Edit" class="btn btn-secondary">Edit</a>
                      </td> -->
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