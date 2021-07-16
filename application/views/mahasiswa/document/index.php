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
          <div class="card-header">
            <h3 class="text-uppercase">Informasi</h3>
          </div>
          <div class="card-body">
            <ol>
              <li>
                Di bawah ini adalah berkas-berkas yang diperlukan dalam proses pelaksanaan PKL
              </li>
              <li>
                Hanya <strong>Ketua Grup</strong> yang dapat melihat dan mendownload
              </li>
              <li>
                Langkah awal untuk melakukan download berkas, pastikan <strong>Ketua Grup</strong> mengklik tombol <button class="btn btn-secondary"><i class="ik ik-check-circle"></i>Konfirmasi</button>
              </li>
              <li>
                Tombol akan muncul ketika pendaftaran PKL sudah di verifikasi oleh <strong>Ketua Program Studi</strong>
              </li>
              <li>
                Setelah itu silahkan download berkas yang diperlukan
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
                <?php if ($isCheck != null && $isCheck['group_status'] == 'diverifikasi') : ?>
                  <form action="<?= base_url('mahasiswa/document/update'); ?>" method="POST">
                    <input type="hidden" value="<?= $isCheck['group_id'] ?>" name="group_id">
                    <button type="submit" class="btn btn-secondary"><i class="ik ik-check-circle"></i>Konfirmasi</button>
                  </form>
                <?php endif ?>
              </div>
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
                    $i = 1;
                    foreach ($documents as $document) :
                    ?>
                      <tr>
                        <td><?= $i++ ?></td>
                        <td><?= $document->name ?></td>
                        <td>
                          <?php if ($isCheck != null && $isCheck['group_status'] == 'dalam_proses_penerimaan' || $isCheck['group_status'] == 'diterima') : ?>
                            <a href="<?= site_url($document->link) ?>" class="btn btn-success" target="_blank"><i class="ik ik-download-cloud"></i><span>UNDUH</span></a>
                          <?php else : echo '<small class="text-mute">Anda belum melakukan Konfirmasi</small>';
                          endif ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>