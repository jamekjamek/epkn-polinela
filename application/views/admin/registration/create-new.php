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
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header d-block">
                        <h3 class="text-uppercase"><?= $title; ?></h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="leader">Pilih Prodi</label>
                                        <select class="get-prodi form-control <?= form_error('prodi') ? 'is-invalid' : ''; ?>" name="prodi" id="prodi" style="width: 100%;">
                                            <option></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('prodi'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="leader">Pilih Ketua</label>
                                        <select class="get-leader form-control <?= form_error('leader') ? 'is-invalid' : ''; ?>" name="leader" id="leader" style="width: 100%">
                                            <option value="<?= set_value('leader'); ?>"><?= set_value('leader'); ?></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('leader'); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="company">Pilih Perusahaan</label>
                                        <select class="get-companies form-control <?= form_error('company') ? 'is-invalid' : ''; ?>" name="company" id="company" style="width: 100%">
                                            <option></option>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('company'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
                            <a href="<?= base_url('admin/registrations') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>