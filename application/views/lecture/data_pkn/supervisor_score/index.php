<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th rowspan="2">Aksi</th>
        <th colspan="6">Rincian Nilai</th>
        <th rowspan="2">Total Nilai</th>
      </tr>
      <tr>
        <th>Perencanaan Kegiatan</th>
        <th>Pelaksanaan Pekerjaan</th>
        <th>Kerjasama dan Teamwork</th>
        <th>Kreativitas</th>
        <th>Kedisiplinan</th>
        <th>Sikap</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <div class="btn-group">
            <button class="btn btn-info" data-toggle="modal" data-target="#edited"><i class="ik ik-edit"></i><span>Edit</span></button>
          </div>
        </td>
        <td><?= $supervisorScore->nilai_1 ?></td>
        <td><?= $supervisorScore->nilai_2 ?></td>
        <td><?= $supervisorScore->nilai_3 ?></td>
        <td><?= $supervisorScore->nilai_4 ?></td>
        <td><?= $supervisorScore->nilai_5 ?></td>
        <td><?= $supervisorScore->nilai_6 ?></td>
        <td><?= $supervisorScore->nilai_total ?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view('lecture/data_pkn/supervisor_score/edit'); ?>