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
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Penerimaan</th>
                    <th>Perusahaan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($receptions as $reception) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $reception->year_accepted; ?></td>
                      <td><?= $reception->company_name; ?></td>
                      <td>
                        <div class="btn-group">
                          <a class="btn btn-warning" href="<?= base_url('dosen/report_reception/detail/' . encodeEncrypt($reception->company_id)) ?>"><i class="ik ik-eye"></i><span> Detail</span></a>
                          <a href="<?= site_url('pdf/kesediaanperusahaan/' . encodeEncrypt($reception->company_id)) ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span> Export</span></a>
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