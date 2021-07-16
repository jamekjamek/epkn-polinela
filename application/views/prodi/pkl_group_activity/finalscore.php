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
                        <div class="col">
                            <h3 class="text-uppercase"><?= $title; ?></h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="col-12">
                            <div class="text-right">
                                <a href="<?= $__url_back ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                            </div>
                            <table class="table table-borderless">
                                <tr>
                                    <td class="p-0">
                                        <h6>Mahasiswa</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= $student->fullname ?></h6>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="p-0">
                                        <h6>NPM</h6>
                                    </td>
                                    <td class="p-0">
                                        <h6> : </h6>
                                    </td>
                                    <td class="p-0">
                                        <h6><?= $student->npm ?></h6>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-12">
                            <p class="mb-0">Skor Akhir :</p>
                        </div>
                        <div class="col-12 table-responsive mt-3">
                            <table id="simpletable" class="table table-hover dataTable">
                                <thead>
                                    <tr>
                                        <th>Dosen Pembimbing</th>
                                        <th>Lokasi</th>
                                        <th>Supervisi</th>
                                        <th>Bimbingan</th>
                                        <th>Ujian</th>
                                        <th>Pembimbing Lapangan</th>
                                        <th>Nilai Akhir</th>
                                        <th>Status Kelulusan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?= $data_score->lecture_name ?></td>
                                        <td>
                                            <?= $data_score->company_name ?>
                                        </td>
                                        <td>
                                            <?= $data_score->supervision_value ?>
                                        </td>
                                        <td>
                                            <?= $data_score->lecture_value ?>
                                        </td>
                                        <td>
                                            <?= $data_score->final_score_value ?>
                                        </td>
                                        <td>
                                            <?= $data_score->supervisor_value ?>
                                        </td>
                                        <td>
                                            <?= $data_score->result_final_score . ' ' . $data_score->HM ?>
                                        </td>
                                        <td>
                                            <?= $data_score->student_status ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>