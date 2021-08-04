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
            <h3 class="text-uppercase">Informasi</h3>
          </div>
          <div class="card-body">
            <ol>
              <li>
                Di bawah ini adalah berkas-berkas yang diperlukan dalam proses pelaksanaan PKN
              </li>
              <li>
                Siapapun dalam anggota grup dapat melihat dan mendownload
              </li>
              <li>
                Silahkan download berkas yang diperlukan dnegan mengklik tombol <strong>UNDUH </strong>pada tabel di bawah.
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <table id="scr-vtr-dynamic" class="table table-hover nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Dokumen</th>
                    <th>Download</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if ($attendance != null) : ?>
                    <tr>
                      <td>1</td>
                      <td>Amplop Surat</td>
                      <td>
                        <a href="<?= site_url('pdf/amplop') ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>Surat Pengantar</td>
                      <td>
                        <a href="<?= site_url('pdf/suratpengantar') ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>Surat Tugas</td>
                      <td>
                        <a href="<?= site_url('pdf/surattugas') ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>Permohonan Penggunaan Aplikasi</td>
                      <td>
                        <a href="<?= site_url('pdf/permohonanpenggunaanapp') ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                  <?php
                  else : ?>
                    <tr>
                      <td colspan="3">Data belum tersedia</td>
                    </tr>
                  <?php endif;
                  if ($isCheck['pushed'] == 1) : ?>
                    <tr>
                      <td>5</td>
                      <td>Surat Penarikan</td>
                      <td>
                        <a href="<?= site_url('pdf/suratpenarikan') ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                  <?php
                  endif;
                  if ($supervisorValue) : ?>
                    <tr>
                      <td>6</td>
                      <td>Form Hasil Penilaian Pembimbing Lapang</td>
                      <td>
                        <a href="<?= site_url('pdf/penilaianpembimbinglapang/' . encodeEncrypt($isCheck['id'])) ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                  <?php
                  else : ?>
                    <tr>
                      <td>5</td>
                      <td>Form Penilaian Pembimbing Lapang Kosong</td>
                      <td>
                        <a href="<?= site_url('pdf/penilaianpembimbinglapangkosong/' . encodeEncrypt($isCheck['id'])) ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                      </td>
                    </tr>
                  <?php endif ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>