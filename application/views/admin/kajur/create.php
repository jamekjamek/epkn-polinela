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
                            <div class="form-group">
                                <label for="lecture">Kajur</label>
                                <select class="get-kajur form-control <?= form_error('lecture') ? 'is-invalid' : ''; ?>" name="lecture" id="lecture" style="width: 100%">
                                    <option></option>
                                    <?php foreach ($lectures as $lecture) : ?>
                                        <option value="<?= $lecture->id . ':' . $lecture->major_id; ?>"><?= $lecture->name . ' - ' . $lecture->major; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="invalid-feedback">
                                    <?= form_error('lecture'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
                            <a href="<?= base_url('admin/master/head-of-program') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>