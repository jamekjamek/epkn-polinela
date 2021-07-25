<div class="modal fade" id="edited" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Edit Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('supervisor/data_pkn/assessment/save/' . $this->uri->segment('4')) ?>" method="POST" name="supervisorForm">
          <input type="hidden" name="registration_id" value="<?= $supervisor->registration_id ?>">
          <input type="hidden" name="supervisor_score_id" value="<?= $supervisor->id ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai</label>
                <input type='text' name='nilai_1' placeholder="Perencanaan kegiatan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_1 ?>" />
                <small class="text-mute font-italic">Perencanaan Kegiatan (20%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
                <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_1 ?>">
                <small class="text-mute font-italic">Perencanaan Kegiatan (20%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_2' placeholder="Pelaksanaan Pekerjaan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_2 ?>" />
                <small class="text-mute font-italic">Pelaksanaan Pekerjaan (30%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_2 ?>">
                <small class="text-mute font-italic">Pelaksanaan Pekerjaan (30%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_3' placeholder="Kerjasama Tim" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_3 ?>" />
                <small class="text-mute font-italic">Kerjasama Tim (20%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_3 ?>">
                <small class="text-mute font-italic">Kerjasama Tim (20%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_4' placeholder="Kreativitas" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_4 ?>" />
                <small class="text-mute font-italic">Kreativitas (10%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_4" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_4 ?>">
                <small class="text-mute font-italic">Kreativitas (10%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_5' placeholder="Kedisiplinan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_5 ?>" />
                <small class="text-mute font-italic">Kedisiplinan (10%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_5" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_5 ?>">
                <small class="text-mute font-italic">Kedisiplinan (10%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_6' placeholder="Sikap" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $supervisor->nilai_6 ?>" />
                <small class="text-mute font-italic">Sikap (10%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_6" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilaitertimbang_6 ?>">
                <small class="text-mute font-italic">Sikap (10%)</small>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Total Nilai</label>
                <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $supervisor->nilai_total ?>">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>