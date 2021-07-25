<form action="<?= site_url('dosen/data_pkn/assessment/guidance/' . $this->uri->segment('4')) ?>" method="POST" name="guidanceFormD4">
  <input type="hidden" name="registration_id" value="<?= $detail->id ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai</label>
        <input type='text' name='nilai_1' placeholder="Rencana kegiatan/program kerja" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Rencana Kegiatan/Program kerja (25%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
        <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Rencana Kegiatan/Program kerja (25%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_2' placeholder="Pelaksanaan kegiatan program" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Pelaksanaan Kegiatan Program (30%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Pelaksanaan Kegiatan Program (30%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_3' placeholder="Nilai Supervisi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" readonly value="<?= @$supervision->nilai_total ?>" />
        <small class="text-mute font-italic">Nilai Supervisi (25%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Nilai Supervisi (25%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_4' placeholder="Laporan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Laporan (20%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_4" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Laporan (20%)</small>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Total Nilai</label>
        <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
</form>