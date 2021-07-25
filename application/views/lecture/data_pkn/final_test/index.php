<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th>Waktu Ujian</th>
        <th>Nilai</th>
        <th>Keterangan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <?= $testScore->hari ?>, <?= date('d-m-Y', strtotime($testScore->tgl)) ?>
          <br>
          <?= $testScore->room ?>
        </td>
        <td><?= $testScore->nilai_total ?></td>
        <td><?= $testScore->keterangan ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-info" data-toggle="modal" data-target="#editedFinalScore"><i class="ik ik-edit"></i><span>Edit</span></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view('lecture/data_pkn/final_test/edit'); ?>