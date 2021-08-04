<?php
$guidebook = $this->db->query("SELECT * FROM guidebook WHERE status = 1")->row();
?>
<div class="main-content">
  <div class="container-fluid">
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      Halo <strong> <?= $showName->lecture_name ?>!</strong> Selamat datang di aplikasi E-PKN Politeknik Negeri Lampung
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="ik ik-x"></i>
      </button>
    </div>

    <div class="row clearfix">
      <?php $this->load->view('dashboard/counting_lecture') ?>
    </div>

    <div class="card latest-update-card">
      <div class="card-header">
        <h3>Informasi</h3>
        <div class="card-header-right">
          <ul class="list-unstyled card-option">
            <li><i class="ik ik-chevron-left action-toggle"></i></li>
            <li><i class="ik ik-minus minimize-card"></i></li>
            <li><i class="ik ik-x close-card"></i></li>
          </ul>
        </div>
      </div>
      <div class="card-block">
        <div class="scroll-widget">
          <div class="latest-update-box">
            <div class="row pt-20 pb-30">
              <div class="col-auto text-right update-meta pr-0">
                <i class="b-success update-icon ring"></i>
              </div>
              <div class="col pl-5">
                <a href="#!">
                  <h6>Buku Panduan PKN</h6>
                </a>
                <a href="<?= site_url('assets/uploads/guidebook/' . $guidebook->file) ?>">
                  <button class="btn btn-success"><i class="ik ik-download-cloud"></i><span></span>Download Buku Panduan PKN</button></a>
              </div>
            </div>
            <div class="row">
              <div class="col-auto text-right update-meta pr-0">
                <i class="b-danger update-icon ring"></i>
              </div>
              <div class="col pl-5">
                <a href="#!">
                  <h6>Mahasiswa Bimbingan PKN Aktif</h6>
                </a>
                <?php if ($students != null) : ?>
                  <div class="col-12 table-responsive mt-3">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Mahasiswa</th>
                          <th>Pembimbing Lapang</th>
                          <th>Lokasi</th>
                          <th>Berkas</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $i = 1;
                        foreach ($students as $student) :
                        ?>
                          <tr>
                            <td><?= $i++; ?></td>
                            <td>
                              <strong> <?= $student->npm ?></strong>
                              <br>
                              <?= $student->fullname ?> -
                              <?= $student->status ?>
                            </td>
                            <td>
                              <?= $student->pic; ?> <br>
                              Telp : <?= $student->telp; ?>
                            </td>
                            <td><?= $student->company_name; ?></td>
                            <td>
                              <?php if ($student->file) : ?>
                                <div class="btn-group">
                                  <a href="<?= base_url('assets/uploads/laporan/' . $student->file) ?>" class="btn btn-outline-success"><i class="fa fa-file-pdf"></i></a>
                                  <button class="btn btn-outline-danger view-video" data-toggle="modal" data-target="#view-video" data-log="<?= encodeEncrypt($student->id); ?>" data-role="<?= $this->session->userdata('role') ?>" data-menu="data_pkn/view_video"><i class="ik ik-youtube"></i></button>
                                </div>
                              <?php else :  ?>
                                <div class="btn-group">
                                  <a href="" class="btn btn-outline-success disabled"><i class="fa fa-file-pdf"></i></a>
                                  <button class="btn btn-outline-danger view-video disabled"><i class="ik ik-youtube"></i></button>
                                </div>
                              <?php endif ?>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                <?php else :
                  echo '<small class="text-mute">Anda belum terdaftar sebagai dosen pembimbing atau mahasiswa masih dalam tahap verifikasi pembekalan</small>';
                endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="view-video" tabindex="-1" role="dialog" aria-labelledby="view-video-label" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="view-video-label">Video</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="embed-responsive embed-responsive-16by9 videoResult">

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>