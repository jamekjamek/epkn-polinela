<div class="modal fade" id="editedFinalScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Edit Ujian PKN</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('dosen/data_pkn/assessment/test_score/' . $this->uri->segment('4')) ?>" method="POST" name="testScore">
          <input type="hidden" name="registration_id" value="<?= $testScore->registration_id ?>">
          <input type="hidden" name="final_score_id" value="<?= $testScore->id ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Hari</label>
                <select name="hari" id="hari" class="form-control" required>
                  <option value="">-- Hari --</option>
                  <?php foreach ($days as $day) :
                    if ($testScore->hari === $day) {
                      echo  '<option value="' . $day . '" selected>' . $day . '</option>';
                    } else {
                      echo  '<option value="' . $day . '">' . $day . '</option>';
                    }
                  endforeach ?>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Tanggal Ujian</label>
                <input type=date name="tgl" class="form-control" value="<?= $testScore->tgl ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Waktu</label>
                <input type="time" name="waktu" placeholder="Hari ujian" class="form-control" required="" value="<?= $testScore->waktu ?>" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Ruangan</label>
                <input type=text name="room" class="form-control" value="<?= $testScore->room ?>">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai</label>
                <input type='text' name='nilai_1' placeholder="Penyampaian materi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_1 ?>" />
                <small class="text-mute font-italic">Penyampaian Materi (35%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
                <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilaitertimbang_1 ?>">
                <small class="text-mute font-italic">Penyampaian Materi (35%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_2' placeholder="Lembar isian kegiatan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_2 ?>" />
                <small class="text-mute font-italic">Lembar Isian Kegiatan (15%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilaitertimbang_2 ?>">
                <small class="text-mute font-italic">Lembar Isian Kegiatan (15%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_3' placeholder="Kemampuan argumentasi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_3 ?>" />
                <small class="text-mute font-italic">Kemampuan Argumentasi (50%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' required="" value="<?= $testScore->nilaitertimbang_3 ?>">
                <small class="text-mute font-italic">Kemampuan Argumentasi (50%)</small>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Total Nilai</label>
                <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilai_total ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="keterangan">Keadaan/Suasana Ujian</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"><?= $testScore->keterangan ?></textarea>
          </div>
          <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>