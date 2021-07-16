<form action="<?= site_url('mahasiswa/data_pkl/uploaded') ?>" method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?= $detail->registration_id ?>" name="registration_id">
  <div class="form-group row">
    <label for="file" class="col-sm-2 col-form-label">File Laporan PKL</label>
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