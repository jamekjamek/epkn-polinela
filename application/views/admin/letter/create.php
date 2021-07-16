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
                    <div class="card-header d-block">
                        <h3 class="text-uppercase"><?= $title; ?></h3>
                    </div>
                    <form action="" method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="header">Header</label>
                                        <textarea class="form-control html-editor <?= form_error('header') ? 'is-invalid' : ''; ?>" rows="10" name="header"><?= set_value("header"); ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= form_error('header'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="document">Dokumen</label>
                                        <select name="document" id="document" class="form-control <?= form_error('document') ? 'is-invalid' : ''; ?>" style="width:100%">
                                            <option></option>
                                            <?php foreach ($document as $documentrow) : ?>
                                                <option value="<?= $documentrow->id ?>"><?= $documentrow->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <div class="invalid-feedback">
                                            <?= form_error('document'); ?>
                                        </div>

                                    </div>
                                    <div class="form-group">
                                        <label for="letter-number">Nomor Surat</label>
                                        <input type="text" class="form-control <?= form_error('letter-number') ? 'is-invalid' : ''; ?>" id="letter-number" placeholder="Masukan nomor surat" name="letter-number" value="<?= set_value('letter-number') ?>">
                                        <div class="invalid-feedback">
                                            <?= form_error('letter-number'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="file" id="corporate-logo" name="corporate-logo" class="file-input" data-type="add-logo" data-id="0">
                                        <label for="corporate-logo"> Pilih gambar..</label>
                                        <div class="image-preview" id="imagePreviewQuestion" style="height: 200;">
                                            <img class="img-thumbnail image-preview__image" alt="Cinque Terre" style="display: none;">
                                            <span class="image-preview__default_text" style="text-align: center;">Logo Akan Tampil disini
                                                <br>
                                                200x200 px
                                            </span>
                                        </div>
                                        <input type="hidden" name="logo" class="logo" value="">
                                        <div class="text-danger">
                                            <?= form_error('logo'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
                            <a href="<?= base_url('admin/letter') ?>" class="btn btn-danger"><i class="ik ik-skip-back"></i>Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="uploadimageModal" class="modal" role="dialog" data-backdrop="static">
    <div class="modal-dialog" style="width: 380px;">
        <div class="modal-content">
            <div class="modal-body">
                <div id="logo_demo" style="width: 350px; margin-top:30px"></div>
                <input type="hidden" class="id-corp" value="">
                <input type="hidden" class="type-corp" value="">
            </div>
            <div class="modal-footer">
                <button class="btn btn-success crop_image_logo">Simpan foto</button>
            </div>
        </div>
    </div>
</div>