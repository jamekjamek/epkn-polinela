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
              <li>Pastikan data anda sudah diisi lengkap, untuk cek bisa klik <a href="<?= site_url('mahasiswa/profile') ?>" class="btn btn-outline-info">Profile</a> </li>
              <li>
                Klik tombol <button class="btn btn-success"><i class="ik ik-plus-square"></i>Daftar</button> untuk melakukan
                pendaftaran PKL
              </li>
              <li>
                Pendaftaran PKL hanya bisa di lakukan 1 (satu) kali sampai proses verifikasi selesai, apabila verifikasi
                di tolak tombol <button class="btn btn-success"><i class="ik ik-plus-square"></i>Daftar</button> akan muncul kembali
              </li>
              <li>
                Pendfataran tidak dapat di update, jadi harus teliti dalam melakukan pendaftaran
              </li>
              <li>Apabila aggota grup menolak pendaftaran dan kuota kelompok kurang dari jumlah kuota yang di buka, Ketua grup dapat mengundang anggota lainnya.</li>
              <li>Setelah proses pendaftaran di verifikasi, selanjutnya sebagai Ketua grup untuk mendownload berkas yang disediakan</li>
              <li>Setelah mendapatkan surat balasan dari perusahaan tujuan, Ketua wajib upload surat balasan jika ada, upload di form yang disediakan di bawah</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

    <?php
    if ($verification != null) {
      if ($verification['status'] == 'Anggota') : ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="text-uppercase">Verifikasi Undangan Anggota Grup PKL</h3>
              </div>
              <div class="card-body">
                <?php if ($group_id != null) : ?>
                  <?php
                  $leaderCheck = $this->db->get_where('v_group_pkl_student', ['group_id' => $group_id['group_id'], 'status' => 'Ketua'])->row_array();
                  ?>
                  <?php if ($verification['verify_member'] == 'Pending') { ?>
                    <h6>Anda diundang oleh <strong> <?= $leaderCheck['fullname'] ?></strong> sebagai <strong>ANGGOTA GRUP PKL</strong>. Klik tombol di samping untuk menerima/menolak undangan <button type="" class="btn btn-sm btn-outline-info" data-toggle="modal" data-target="#konfirmasi">KONFIRMASI</button></h6>
                  <?php } else if ($verification['verify_member'] == 'Diterima') { ?>
                    <h6>Anda menima undangan <strong> <?= $leaderCheck['fullname'] ?></strong> sebagai <strong>ANGGOTA GRUP PKL</strong>.</h6>
                  <?php } else { ?>

                  <?php } ?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php } ?>

    <?php if ($verification != null) {
      if ($verification['status'] == 'Ketua') : ?>
        <div class="row">
          <div class="col-sm-12">
            <div class="card">
              <div class="card-header">
                <h3 class="text-uppercase">Surat Balasan Dari Perusahaan</h3>
              </div>
              <div class="card-body">
                <?php if ($isCheckLetter != null) : ?>
                  <?php
                  $query = $this->db->get_where('response_letter', ['registration_group_id' => $isCheckLetter['group_id']])->row_array();
                  if ($query) { ?>
                    <div class="table-responsive">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>No Surat Balsan</th>
                            <th>File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if ($isCheckLetter != null) : ?>
                            <?php
                            $i = 1;
                            $letters = $this->db->get_where('response_letter', ['registration_group_id' => $isCheckLetter['group_id']])->result();
                            foreach ($letters as $letter) :
                            ?>
                              <tr>
                                <td>
                                  <?= $letter->letter_number ?>
                                </td>
                                <td>
                                  <a href="<?= base_url('assets/uploads/' . $letter->file) ?>" class="btn btn-success"><?= $letter->file; ?></a>
                                </td>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  <?php } else { ?>
                    <form action="<?= site_url('mahasiswa/registration/uploaded') ?>" method="post" enctype="multipart/form-data">
                      <input type="hidden" value="<?= $group_id['group_id'] ?>" name="registration_group_id">
                      <div class="form-group row">
                        <label for="letter_number" class="col-sm-2 col-form-label">No Surat Balasan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="letter_number" placeholder="No surat balasan" name="letter_number" required>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="file" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-8">
                          <input type="file" name="file" class="form-control" required accept=".pdf">
                          <small id="passwordHelpBlock" class="form-text text-muted">
                            File yang di upload berupa pdf
                          </small>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="btn" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary mr-2">Upload</button>
                        </div>
                      </div>
                    </form>
                  <?php } ?>
                <?php endif ?>
              </div>
            </div>
          </div>
        </div>
      <?php endif ?>
    <?php } ?>

    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <div class="col">
              <h3 class="text-uppercase"><?= $title; ?></h3>
            </div>
            <div class="text-right">
              <?php
              $this->db->select('a.*,b.id as userid, b.username, c.status,c.group_status, c.verify_member');
              $this->db->join('user as b', 'a.npm=b.username');
              $this->db->join('registration as c', 'c.student_id=a.id');
              $this->db->where('b.id', $this->session->userdata()['username']->id);
              $addButton = $this->db->get('student as a')->row();
              ?>
              <?php if (!$addButton || $addButton->group_status === 'ditolak' || $addButton->verify_member === 'Ditolak') : ?>
                <a href="<?= base_url('mahasiswa/registration/add'); ?>" class="btn btn-success"><i class="ik ik-plus-square"></i>Daftar PKL</a>
              <?php endif; ?>

              <?php if (@$addButton->status === 'Ketua') : ?>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMemberModal">Tambah Anggota</button>
              <?php endif; ?>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Anggota</th>
                    <th>Dosen Pembimbing & Supervisor</th>
                    <th>Lokasi PKL</th>
                    <th>Waktu PKL</th>
                    <th>Verifikasi Prodi</th>
                    <th>Verifikasi Anggota</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if ($group_id != null) : ?>
                    <?php
                    $i = 1;
                    $this->db->select('a.*,b.id company_id, b.pic, b.telp, b.name company_name,c.fullname,c.npm,c.email student_email,d.name as lecture_name,e.username pl');
                    $this->db->join('company b', 'a.company_id=b.id', 'LEFT');
                    $this->db->join('student c', 'a.student_id=c.id', 'LEFT');
                    $this->db->join('lecture d', 'a.lecture_id=d.id', 'LEFT');
                    $this->db->join('supervisor e', 'a.supervisor_id=e.id', 'LEFT');
                    $registrations = $this->db->get_where('registration a', ['a.group_id' => $group_id['group_id']])->result();
                    foreach ($registrations as $registration) :
                    ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td>
                          <strong> <?= $registration->npm ?></strong>
                          <br>
                          <?= $registration->fullname ?> -
                          <?= $registration->status ?>
                        </td>
                        <td>
                          <?php if ($registration->lecture_name) {
                            echo '<strong>' . $registration->lecture_name . '</strong> & <strong>' . $registration->pic . '</strong>';
                          } ?>
                        </td>
                        <td><?= $registration->company_name; ?></td>
                        <td>
                          <span class="badge badge-pill badge-primary mb-1">
                            <?= date('d-m-Y', strtotime($registration->start_date)) ?>
                          </span>
                          s.d <span class="badge badge-pill badge-success mb-1">
                            <?= date('d-m-Y', strtotime($registration->finish_date)) ?>
                          </span>
                        </td>
                        <td>
                          <?php if ($registration->group_status == 'belum_terverifikasi') {
                            echo '<span class="badge badge-pill badge-secondary mb-1">Pendaftaran Belum Diverfikasi</span>';
                          } else if ($registration->group_status == 'diverifikasi') {
                            echo '<span class="badge badge-pill badge-info mb-1">Pendaftaran Diverfikasi</span>';
                          } else if ($registration->group_status == 'dalam_proses_penerimaan') {
                            echo '<span class="badge badge-pill badge-info mb-1">Proses Konfirmasi Perusahaan</span>';
                          } else if ($registration->group_status == 'diterima') {
                            echo '<span class="badge badge-pill badge-success mb-1">Pendaftaran Diterima</span>';
                          } else {
                            echo '<span class="badge badge-pill badge-danger mb-1">Pendaftaran Ditolak</span>';
                          }
                          ?>
                        </td>
                        <td>
                          <?php if ($registration->verify_member == 'Diterima') {
                            echo '<span class="badge badge-pill badge-success mb-1">Diterima</span>';
                          } else if ($registration->verify_member == 'Ditolak') {
                            echo '<span class="badge badge-pill badge-danger mb-1">Ditolak</span>';
                          } else if ($registration->verify_member == 'Pending') {
                            echo '<span class="badge badge-pill badge-secondary mb-1">Pending</span>';
                          } else {
                          }
                          ?>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterLabel">Konfirmasi Undangan Grup PKL</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <form action="<?= site_url('mahasiswa/registration/invited') ?>" method="post">
            <input type="hidden" name="student_id" value="<?= $verification['student_id'] ?>">
            <div class="modal-body">
              <div class="form-group">
                <label for="invited">Konfirmasi Undangan</label>
                <select class="form-control" name="invited" id="invited" style="width: 100%">
                  <option value="Diterima">Diterima</option>
                  <option value="Ditolak">Ditolak</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addMemberModalLabel">Tambah Anggota <?= $leader->fullname; ?></h5>
        </div>
        <form action="<?= base_url('mahasiswa/registration/addnewmember/') ?>" method="POST">
          <div class="modal-body">
            <input type="hidden" name="id" value="<?= $leader->leaderid; ?>">
            <table id="tableMember" class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nama Mahasiswa</th>
                  <th>Prodi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach (@$members as $member) : ?>
                  <tr>
                    <td><input type='checkbox' class='member-checkbox' name='member[]' value="<?= $member->id; ?>"></td>
                    <td><?= $member->fullname; ?></td>
                    <td><?= $member->prodi_name; ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>