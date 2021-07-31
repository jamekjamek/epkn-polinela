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
          <div class="card-header d-block">
            <h3 class="text-uppercase"><?= $title; ?></h3>
          </div>
          <div class="row p-2">
            <div class="col-sm-8">
              <table class="table table-borderless">
                <tr>
                  <td>Nama</td>
                  <td>: <?= $leader->id; ?> <?= $leader->npm; ?> - <?= $leader->fullname; ?> - <?= $leader->prodi_name; ?></td>
                </tr>
                <tr>
                  <td>Status Peserta</td>
                  <td>: <?= $leader->status; ?></td>
                </tr>
                <tr>
                  <td>Group Status</td>
                  <td class="text-uppercase">:
                    <?php if (@$letter && $leader->group_status === 'dalam_proses_penerimaan') : ?>
                      <button class="btn btn-success verficationprocess" data-id="<?= $leader->group_id; ?>" data-uri="<?= $this->uri->segment(4); ?>">Proses Verifikasi</button>
                    <?php else : ?>
                      <?= str_replace("_", " ", $leader->group_status); ?>
                    <?php endif; ?>
                  </td>
                </tr>
                <tr>
                  <td>Tempat PKN</td>
                  <td class="text-uppercase">
                    : <?= $leader->company_name . ', ' . $leader->districts . ', ' . $leader->regency . ', ' . $leader->province; ?>
                    <button type="button" class="btn btn-info change-location" data-toggle="modal" data-target="#change-location" data-id="<?= $leader->group_id; ?>">
                      Ubah
                    </button>
                  </td>
                </tr>
                <tr>
                  <td>Waktu PKN</td>
                  <td>: <?= date('d- F-Y', strtotime($leader->start_date))  . ' s/d ' . date('d- F-Y', strtotime($leader->finish_date)); ?></td>
                </tr>
                <tr>
                  <td>Pembimbing Lapang</td>
                  <td>: <?= $leader->pic . ' - ' . $leader->telp . ' (' . $leader->pl . ')'; ?></td>
                </tr>
                <?php if ($leader->group_status === 'diterima') : ?>
                  <tr>
                    <td>Dosen Pembimbing</td>
                    <td>:
                      <?= $leader->lecture_name ?>
                      <button type="button" class="btn btn-info supervisorModal" data-toggle="modal" data-target="#supervisorModal" data-id="<?= $leader->id; ?>">
                        <?php if ($leader->lecture_name === null) : ?>
                          Pilih Dosen Pembimbing
                        <?php else : ?>
                          Ubah
                        <?php endif; ?>
                      </button>
                    </td>
                  </tr>
                <?php endif; ?>
              </table>
            </div>
          </div>
          <div class="card-body">
            <hr>
            <div>
              <a href="<?= site_url('admin/registrations') ?>" class="btn btn-warning"><i class="ik ik-arrow-left"></i>Kembali</a>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMemberModal">Tambah Anggota</button>
            </div>
            <hr />
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Jenis Kelamin</th>
                    <th>Prodi</th>
                    <th>Verifikasi Mahasiswa</th>
                    <th>Status Peserta</th>
                    <th>Dosen Pembimbing</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($getdata->result() as $group) : ?>
                    <?php if ($group->status === 'Anggota') : ?>
                      <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $group->fullname; ?></td>
                        <td><?= $group->gender; ?></td>
                        <td><?= $group->prodi_name; ?></td>
                        <td><?= $group->verify_member; ?></td>
                        <td><?= $group->status; ?></td>
                        <td><?= $group->lecture_name; ?></td>
                        <td>
                          <button type="button" class="btn btn-danger delete-registration-detail" data-id="<?= encodeEncrypt($group->id) ?>" data-url="<?= $this->uri->segment(4) ?>"><i class=" ik ik-trash"></i>Hapus</button>
                        </td>
                      </tr>
                    <?php endif; ?>
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


<div class="modal fade" id="addMemberModal" tabindex="-1" role="dialog" aria-labelledby="addMemberModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addMemberModalLabel">Tambah Anggota <?= $leader->fullname; ?></h5>
      </div>
      <form action="<?= base_url('admin/registrations/addnewmember/' . $this->uri->segment(4)); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" value="<?= $leader->id; ?>">
          <table id="tableMember" class="table table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Mahasiswa</th>
                <th>Jenis Kelamin</th>
                <th>Prodi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($datamember as $member) : ?>
                <tr>
                  <td><input type='checkbox' class='member-checkbox' name='member[]' value="<?= $member->id; ?>"></td>
                  <td><?= $member->fullname; ?></td>
                  <td><?= $member->gender; ?></td>
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

<div class="modal fade" id="supervisorModal" role="dialog" aria-labelledby="supervisorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="supervisorModalLabel">Pilih dosen pembimbing</h5>
      </div>
      <form action="<?= base_url('admin/registrations/updatesupervisor/' . $this->uri->segment(4)); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="registration-id" id="registration-id" value="">
          <select class="form-control get-lecture-supervisor" name="lecture" id="lecture" style="width: 100%;">
            <option value=""></option>
            <?php foreach ($lectures as $lecture) : ?>
              <option value="<?= $lecture->id; ?>"><?= $lecture->name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="moveGroup" role="dialog" aria-labelledby="moveGroupLabel" aria-hidden="true">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="moveGroupLabel">Pindah Group PKL</h5>
      </div>
      <form action="<?= base_url('admin/registrations/updateanothergroup/' . $this->uri->segment(4)); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="id" id="id" value="">
          <select class="form-control get-another-group" name="leadergroup" id="leadergroup" style="width: 100%;">
            <option value=""></option>
            <?php foreach ($anothergroup as $leadergroup) : ?>
              <option value="<?= $leadergroup->group_id; ?>"><?= $leadergroup->fullname . ' - ' . $leadergroup->company_name; ?></option>
            <?php endforeach; ?>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="change-location" role="dialog" aria-labelledby="change-locationLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="change-locationLabel">Ubah Lokasi PKL</h5>
      </div>
      <form action="<?= base_url('admin/registrations/changelocation/' . $this->uri->segment(4)); ?>" method="POST">
        <div class="modal-body">
          <input type="hidden" name="group-id" id="group-id" value="">
          <select class="get-companies form-control" name="company" id="company" style="width: 100%" required>
            <option></option>
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>