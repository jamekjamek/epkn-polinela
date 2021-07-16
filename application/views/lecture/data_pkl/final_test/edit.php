<div class="modal fade" id="editedFinalScore" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterLabel">Edit Ujian PKL</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="<?= site_url('dosen/data_pkl/assessment/test_score/' . $this->uri->segment('4')) ?>" method="POST" name="testScore">
          <input type="hidden" name="registration_id" value="<?= $testScore->registration_id ?>">
          <input type="hidden" name="final_score_id" value="<?= $testScore->id ?>">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Hari</label>
                <input type='text' name='hari' placeholder="Hari ujian" class="form-control" required="" value="<?= $testScore->hari ?>" />
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
                <select class="get form-control" name="room_id" id="room_id" style="width: 100%" required>
                  <?php foreach ($rooms as $room) : ?>
                    <option <?php if ($room->id == $testScore->room_id) {
                              echo 'selected="selected"';
                            } ?> value="<?= $room->id ?>"><?= $room->name ?>
                    </option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai</label>
                <input type='text' name='nilai_1' placeholder="Penguasaan Materi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_1 ?>" />
                <small class="text-mute font-italic">Penguasaan Materi (40%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Nilai Tertimbang</label>
                <input type=text name="jumlah_1" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilaitertimbang_1 ?>">
                <small class="text-mute font-italic">Penguasaan Materi (40%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_2' placeholder="Komunikasi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_2 ?>" />
                <small class="text-mute font-italic">Komunikasi (30%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_2" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilaitertimbang_2 ?>">
                <small class="text-mute font-italic">Komunikasi (30%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_3' placeholder="Penggunaan Media Presentasi" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_3 ?>" />
                <small class="text-mute font-italic">Penggunaan Media Presentasi (20%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_3" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' required="" value="<?= $testScore->nilaitertimbang_3 ?>">
                <small class="text-mute font-italic">Penggunaan Media Presentasi (20%)</small>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input type='text' name='nilai_4' placeholder="Penampilan" class="form-control" onFocus="startCalc();" onBlur="stopCalc();" required="" value="<?= $testScore->nilai_4 ?>" />
                <small class="text-mute font-italic">Penampilan (10%)</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <input type=text name="jumlah_4" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilaitertimbang_4 ?>">
                <small class="text-mute font-italic">Penampilan (10%)</small>
              </div>
              <div class="form-group">
                <label class="form-control-label" for="nama_kelas">Total Nilai</label>
                <input type=text name="total" class="form-control" onchange='tryNumberFormat(this.form.thirdBox);' readonly="" value="<?= $testScore->nilai_total ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="keterangan">Keadaan/Suasana Ujian</label>
            <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control">
            <?= $testScore->keterangan ?>
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary"><i class="ik ik-save"></i>Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>