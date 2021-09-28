<form action="<?= site_url('dosen/data_pkn/assessment/test_score/' . $this->uri->segment('4')) ?>" method="POST" name="testScore">
  <input type="hidden" name="registration_id" value="<?= $detail->id ?>">
  <input type="hidden" name="student_id" value="<?= $detail->student_id ?>">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Hari</label>
        <select name="hari" id="hari" class="form-control" required>
          <option value="">-- Hari --</option>
          <?php foreach ($days as $day) : ?>
            <option value="<?= $day ?>"><?= $day ?></option>
          <?php endforeach ?>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Tanggal Ujian</label>
        <input type=date name="tgl" class="form-control">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Waktu</label>
        <input type="time" name="waktu" placeholder="Hari ujian" class="form-control" required="" />
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Ruangan</label>
        <input type="text" name="room" placeholder="Tempat ujian" class="form-control" required="" value="Politeknik Negeri Lampung" />
        <small class="text-mute font-italic">Silahkan ganti nama ruangan di atas apabila berbeda</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai</label>
        <input type='text' name='nilai_1' placeholder="Penguasaan Materi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Penyampaian Materi (35%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
        <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Penyampaian Materi (35%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_2' placeholder="Lembar isian kegiatan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Lembar Isian Kegiatan (15%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Lembar Isian Kegiatan (15%)</small>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <input type='text' name='nilai_3' placeholder="Kemampuan argumentasi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" />
        <small class="text-mute font-italic">Kemampuan Argumentasi (50%)</small>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
        <small class="text-mute font-italic">Kemampuan Argumentasi (50%)</small>
      </div>
      <div class="form-group">
        <label class="form-control-label" for="nama_kelas">Total Nilai</label>
        <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="">
      </div>
    </div>
  </div>
  <div class="form-group">
    <label class="form-control-label" for="keterangan">Keadaan/Suasana Ujian</label>
    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
</form>