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
                        <div class="col">
                            <h3 class="text-uppercase"><?= $title; ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 table-responsive mt-3">
                                <table id="simpletable" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Perusahaan</th>
                                            <th>Waktu PKL</th>
                                            <th>Dosen Pembimbing</th>
                                            <th>Dosen Lapangan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = 1;
                                        foreach ($data_registration as $registration) :
                                        ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
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
                                                    <?= ($registration->lecture_name) ? $registration->lecture_name : '<strong>-</strong>' ?>
                                                </td>
                                                <td>
                                                    <?= ($registration->supervisor_name) ? $registration->supervisor_name : '<strong>-</strong>' ?>
                                                </td>
                                                <td>
                                                    <a href="<?= $__url_detail . $this->encrypt->encode($registration->id, keyencrypt())  ?>" class="btn btn-secondary mb-1" title="detail">detail</a>
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