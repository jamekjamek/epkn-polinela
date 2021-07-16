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
                    <div class="card-header">
                        <div class="col">
                            <h3 class="text-uppercase"><?= $title; ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="text-right">
                                <a href="<?= $__url_index ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="p-0">
                                        <h6>Perusahaan</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= $registration->company_name ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>Waktu PKL</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= date('d-m-Y', strtotime($registration->start_date)) ?> s.d <?= date('d-m-Y', strtotime($registration->finish_date)) ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>Status Verifikasi Pendaftaran</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0"><?php if ($registration->group_status == 'diverifikasi') {
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
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>Dosen Pembimbing</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= ($registration->lecture_name) ? $registration->lecture_name : '<strong>-</strong>' ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>Dosen Lapangan</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= ($registration->supervisor_name) ? $registration->supervisor_name : '<strong>-</strong>' ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>Ketua Group</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= $registration->member_name ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>File</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= ($registration->file) ? "<a class='btn btn-icon btn-secondary' target='_blank' href=' $__url_file$registration->file'><i class='ik ik-file'></i></a>" : '<strong>-</strong>' ?></h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
                            <p class="mb-0">List Anggota group :</p>
                        </div>
                        <div class="col-12 table-responsive mt-3">
                            <table class="table table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Status Anggota</th>
                                        <th>Anggota Grup</th>
                                        <th>NPM</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach ($data_registration_member as $member) :
                                    ?>
                                        <tr>
                                            <td><?= $i++; ?></td>
                                            <td><?= $member->status ?></td>
                                            <td>
                                                <?= $member->member_name ?>
                                            </td>
                                            <td>
                                                <?= $member->npm ?>
                                            </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="">
                                                    <a href="<?= $__url_dailylog . $this->encrypt->encode($member->id, keyencrypt())   ?>" class="btn btn-icon btn-primary" title="Daily Log"><i class="ik ik-file-text"></i></a>
                                                    <a href="<?= $__url_present . $this->encrypt->encode($member->id, keyencrypt())   ?>" class="btn btn-icon btn-secondary" title="Kehadiran"><i class="ik ik-check-square"></i></a>
                                                    <a href="<?= $__url_finalScore . $this->encrypt->encode($member->id, keyencrypt())   ?>" class="btn btn-info <?= ($member->HM) ? '' : 'disabled'; ?>" title="Skor Akhir">Skor Akhir</a>
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