<form action="<?= site_url('dosen/data_pkl/assessment/supervision/' . $this->uri->segment('4')) ?>" method="POST" name="supervisiForm">
  <input type="hidden" name="registration_id" value="<?= $detail->id ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai</label>
        <input type='text' name='nilai_1' placeholder="Kemajuan pelaksanaan PKL" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo trim(@$row["nilai_1"]) ?>" required="" />
        <small class="text-mute font-italic">Kemajuan pelaksanaan PKL (40%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
        <input type=text name="jumlah_1" value="<?php echo trim(@$row["nilaitertimbang_1"]) ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Kemajuan pelaksanaan PKL (40%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_2' placeholder="Pengisian lembar isian kegiatan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo trim(@$row["nilai_2"]) ?>" required="" />
        <small class="text-mute font-italic">Pengisian lembar isian kegiatan (30%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_2" value="<?php echo trim(@$row["nilaitertimbang_2"]) ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Pengisian lembar isian kegiatan (30%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_3' placeholder="Konsultasi/Diskusi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" value="<?php echo trim(@$row["nilai_3"]) ?>" required="" />
        <small class="text-mute font-italic">Konsultasi/Diskusi (30%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_3" value="<?php echo trim(@$row["nilaitertimbang_3"]) ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Konsultasi/Diskusi (30%)</small>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Total Nilai</label>
        <input type=text name="total" value="<?php echo trim(@$row["nilai_total"]) ?>" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
      </div>
    </div>
  </div>
  <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
</form>