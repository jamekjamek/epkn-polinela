<form action="<?= site_url('supervisor/data_pkl/assessment/save/' . $this->uri->segment('4')) ?>" method="POST" name="supervisorForm">
  <input type="hidden" name="registration_id" value="<?= $detail->id ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai</label>
        <input type='text' name='nilai_1' placeholder="Pengetahuan terhadap pekerjaan yang dilaksanakan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Pengetahuan terhadap pekerjaan yang dilaksanakan (20%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
        <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Pengetahuan terhadap pekerjaan yang dilaksanakan (20%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_2' placeholder="Pelaksanaan Pekerjaan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Pelaksanaan Pekerjaan (30%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Pelaksanaan Pekerjaan (30%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_3' placeholder="Penerapan K3" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Penerapan K3 (10%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Penerapan K3 (10%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_4' placeholder="Kerjasama Tim" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Kerjasama Tim (10%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_4" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Kerjasama Tim (10%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_5' placeholder="Kreativitas" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Kreativitas (10%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_5" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Kreativitas (10%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_6' placeholder="Kedisiplinan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Kedisiplinan (10%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_6" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Kedisiplinan (10%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_7' placeholder="Sikap" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Sikap (10%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_7" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Sikap (10%)</small>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Total Nilai</label>
        <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
</form>