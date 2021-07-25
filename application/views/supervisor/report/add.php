<div class="modal fade" id="ready" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Kompetensi Mahasiswa yang diharapkan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('supervisor/report_reception/add') ?>" method="POST">
          <input type="hidden" name="prodi_id" id="prodi_id" value="" />
          <input type="hidden" name="company_id" id="company_id" value="<?= $company->id ?>" />
          <input type="hidden" name="academic_year_id" id="academic_year_id" value="<?= $academic_year->id ?>" />
          <input type="hidden" name="status" id="status" value="1" />
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Tahun Penerimaan</label>
                <input type="number" name="year_accepted" class="form-control" placeholder="Isikan tahun depan" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Bulan Mulai</label>
                <select name="start_month" id="" class="form-control" required>
                  <option value="">-- Bulan --</option>
                  <?php foreach ($months as $month) :
                    echo '<option value="' . $month . '">' . $month . '</option>';
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Bulan Selesai</label>
                <select name="finish_month" id="" class="form-control" required>
                  <option value="">-- Bulan --</option>
                  <?php foreach ($months as $month) :
                    echo '<option value="' . $month . '">' . $month . '</option>';
                  endforeach;
                  ?>
                </select>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="nama_kelas">Kompetensi mahasiswa yang di harapkan</label>
            <textarea name="competence" id="" cols="30" rows="5" class="form-control" required></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="nama_kelas">Jumlah Mahasiswa</label>
            <input type="number" name="qty" class="form-control" placeholder="Jumlah mahasiswa">
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>