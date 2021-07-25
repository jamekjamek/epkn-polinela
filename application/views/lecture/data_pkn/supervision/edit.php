<div class="modal fade" id="edited" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Edit Supervisi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('dosen/data_pkn/assessment/supervision/' . $this->uri->segment('4')) ?>" method="POST" name="supervisiForm">
          <input type="hidden" name="supervision_id" value="<?= $supervision->id ?>">
          <input type="hidden" name="registration_id" value="<?= $supervision->registration_id ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai</label>
                <input type='text' name='nilai_1' placeholder="Kemajuan pelaksanaan PKL" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?= $supervision->nilai_1 ?>" required="" />
                <small class="text-mute font-italic">Kemajuan pelaksanaan PKL (40%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
                <input type=text name="jumlah_1" value="<?= $supervision->nilaitertimbang_1 ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
                <small class="text-mute font-italic">Kemajuan pelaksanaan PKL (40%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_2' placeholder="Pengisian lembar isian kegiatan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?= $supervision->nilai_2 ?>" required="" />
                <small class="text-mute font-italic">Pengisian lembar isian kegiatan (40%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_2" value="<?= $supervision->nilaitertimbang_2 ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
                <small class="text-mute font-italic">Pengisian lembar isian kegiatan (40%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_3' placeholder="Konsultasi/Diskusi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?= $supervision->nilai_3 ?>" required="" />
                <small class="text-mute font-italic">Konsultasi/Diskusi (20%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_3" value="<?= $supervision->nilaitertimbang_3 ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
                <small class="text-mute font-italic">Konsultasi/Diskusi (20%)</small>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Total Nilai</label>
                <input type=text name="total" value="<?= $supervision->nilai_total ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>