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
            <!--jika brhasil -->
            <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
        <?php elseif ($this->session->flashdata('error')) : ?>
            <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
            <!--jika gagal -->
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
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="padding: 20px;">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><strong>Data</strong> </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= $leader->group_status === 'dalam_proses_penerimaan' && !@$letter ? 'text-danger' : ''; ?>" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><strong> Surat Balasan </strong></a>
                        </li>

                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <!-- Data -->
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row" style="padding: 20px;">
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
                                            <td class="text-uppercase">: <?= $leader->company_name . ', ' . $leader->districts . ', ' . $leader->regency . ', ' . $leader->province; ?></td>
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
                        </div>
                        <!-- Surat Balasan -->
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row" style="padding: 20px;">
                                <div class="col-sm-12">
                                    <?php if ($getdata->num_rows() >= 2) : ?>
                                        <?php if ($leader->group_status === 'diverifikasi') : ?>
                                            <h5 class="text-info">Mohon menunggu <?= $leader->fullname ?> Mendowload berkas-berkas keperluan pkl dan menunggu surat balasan dari <?= $leader->company_name; ?></h5>
                                        <?php endif; ?>
                                        <?php if (@$letter) : ?>
                                            <embed src="<?= base_url('assets/uploads/' . $letter->file) ?>" type="application/pdf" height="800px" width="100%">
                                        <?php endif; ?>
                                        <?php if ($leader->group_status === 'dalam_proses_penerimaan' && !@$letter) : ?>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <h5 class="text-uppercase">Upload Surat Balasan</h5>
                                                    <hr>
                                                    <form action="<?= base_url('admin/registrations/upload/' . $this->uri->segment(4)) ?>" method="post" enctype="multipart/form-data">
                                                        <input type="hidden" value="<?= $leader->group_id; ?>" name="registration_group_id">
                                                        <div class="form-group row">
                                                            <label for="letter_number" class="col-sm-2 col-form-label">No Surat Balasan</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="letter_number" placeholder="No surat balasan" name="letter_number" required>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="file" class="col-sm-2 col-form-label">File</label>
                                                            <div class="col-sm-10">
                                                                <input type="file" class="form-control" id="file" name="file" accept=".pdf" required>
                                                                <div id="file" class="form-text text-info"> File yang di upload berupa pdf</div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="btn" class="col-sm-2 col-form-label"></label>
                                                            <div class="col-sm-10">
                                                                <button type="submit" class="btn btn-primary mr-2">Upload</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <h5 class="text-info">Mohon menambahkan anggota group PKL terlebih dahulu minimal 1 Anggota. Saat ini anggota yang terdaftar berjumlah <?= $getdata->num_rows() - 1; ?> Anggota yang di ketuai oleh <?= $leader->fullname; ?></h5>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <hr>
                        <div>
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
                                                    <?php if (@$letter && $group->group_status === 'dalam_proses_penerimaan') : ?>
                                                        <?php if ($leader->group_status === 'dalam_proses_penerimaan') : ?>
                                                            Verifikasi Ketua terlebih dahulu
                                                        <?php else : ?>
                                                            <button class="btn btn-success verficationprocess" data-id="<?= $group->id; ?>" data-uri="<?= $this->uri->segment(4); ?>">Proses Verifikasi</button>
                                                        <?php endif; ?>
                                                    <?php else : ?>
                                                        <?php if ($group->group_status === 'diverifikasi') : ?>
                                                            <span class="text-uppercase">
                                                                <?= str_replace("_", " ", $group->group_status); ?>
                                                            </span>
                                                        <?php else : ?>
                                                            <?php if ($group->group_status === 'ditolak') : ?>
                                                                <?php
                                                                $this->db->where('group_status !=', 'ditolak');
                                                                $ditolak = $this->db->get_where('registration', ['student_id' => $group->student_id]);
                                                                ?>
                                                                <?php if ($ditolak->num_rows() > 0) : ?>
                                                                    <?php if ($ditolak->row()->group_id != $leader->group_id) : ?>
                                                                        Sudah di pindahkan ke group lain
                                                                    <?php else : ?>
                                                                        <span class="text-uppercase">
                                                                            <button type="button" class="btn btn-warning moveGroup" data-toggle="modal" data-target="#moveGroup" data-id="<?= $group->id; ?>" data-student="<?= $group->student_id; ?>">
                                                                                Pindahkan Group PKL lain karena <?= str_replace("_", " ", $group->group_status); ?> oleh Perusahaan
                                                                            </button>
                                                                        </span>
                                                                    <?php endif; ?>
                                                                <?php else : ?>
                                                                    <span class="text-uppercase">
                                                                        <button type="button" class="btn btn-warning moveGroup" data-toggle="modal" data-target="#moveGroup" data-id="<?= $group->id; ?>" data-student="<?= $group->student_id; ?>">
                                                                            Pindahkan Group PKL lain karena <?= str_replace("_", " ", $group->group_status); ?> oleh Perusahaan
                                                                        </button>
                                                                    </span>
                                                                <?php endif; ?>
                                                            <?php else : ?>
                                                                <?php if ($leader->group_status === 'dalam_proses_penerimaan') : ?>
                                                                    Verifikasi Ketua terlebih dahulu
                                                                <?php else : ?>
                                                                    <?php if ($group->verify_member === 'Ditolak') : ?>
                                                                        Member menolak undangan ketua
                                                                    <?php else : ?>
                                                                        <!-- <button type="button" class="btn btn-info supervisorModal" data-toggle="modal" data-target="#supervisorModal" data-id="<?= $group->id; ?>">
                                                                            <?php if ($group->lecture_name === null) : ?>
                                                                                Pilih Dosen Pembimbing
                                                                            <?php else : ?>
                                                                                Ubah Dosen Pembimbing
                                                                            <?php endif; ?>
                                                                        </button> -->
                                                                        Pilih Dosen Pembimbing Dari Ketua
                                                                    <?php endif; ?>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
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