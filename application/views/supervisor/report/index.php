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
              <li>Di bawah ini merupakan data program studi yang ada di Politeknik Negeri Lampung</li>
              <li>Perusahaan sebagai pihak untuk mengisi form di bawah ini untuk melakukan pengecekan apakah di tahun depan bersedia menerima mahasiswa kembali untuk PKN</li>
              <li>Klik tombol <button class="btn btn-success">YA</button> apabila perusahaan Bapak/Ibu bersedia menerima</li>
              <li>Selanjutnya akan tampil pop-up untuk mengisi data seperti <strong>Tahun Penerimaan, Bulan PKN, Kompentensi Mahasiswa dan Jumlah Mahasiswa</strong></li>
              <li>Setelah melakukan pengisian maka tombol <button class="btn btn-primary">UPDATE</button> akan muncul</li>
              <li>Bapak/Ibu dapat melakukan update data apabila ada kesalahan</li>
              <li>Bapak/Ibu dapat membatalkan apabila ternyata perusahaan Bapak/Ibu tidak menerima prodi yang sebelum nya terisi, dengan mengklik tombol <button class="btn btn-danger">BATAL</button></li>
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
                <div class="btn-group">
                  <a href="<?= site_url('pdf/kesediaanperusahaan') ?>" target="_blank" class="btn btn-success"><i class="ik ik-download-cloud"></i>Export</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Program Studi</th>
                    <th>Kesediaan Menerima</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i = 1;
                  foreach ($prodi as $row) :
                  ?>
                    <tr>
                      <td><?= $i++ ?></td>
                      <td>
                        <?= $row->prodi_name ?> (<?= $row->degree ?>)
                      </td>
                      <td>
                        <?php
                        $result = $this->db->get_where('willingness_to_accept', ['prodi_id' => $row->prodi_id])->row();
                        if ($result != null) :
                        ?>
                          <div class="btn-group">
                            <a href="<?= site_url('supervisor/report_reception/update/' . $this->encrypt->encode($row->prodi_id, keyencrypt())) ?>" class="btn btn-primary">UPDATE</a>
                            <button type="button" class="btn btn-danger delete-reception" data-id="<?= encodeEncrypt($row->prodi_id) ?>">BATAL</button>
                          </div>
                        <?php
                        else :
                          echo '
                            <button data-toggle="modal" data-target="#ready" class="btn btn-success reception" data-id="' . $row->prodi_id . '">YA</button> <br/>
                            <small class="text-mute">Silahkan klik tombol <strong>YA</strong> jika menerima</small>
                            ';
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
<?php $this->load->view('supervisor/report/add') ?>