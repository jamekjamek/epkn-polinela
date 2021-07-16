<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th rowspan="2">Aksi</th>
        <th colspan="7">Rincian Nilai</th>
        <th rowspan="2">Total Nilai</th>
      </tr>
      <tr>
        <th>Pengetahuan</th>
        <th>Pelaksanaan</th>
        <th>K3</th>
        <th>Kerjasama</th>
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
            <!-- <a href="" class="btn btn-success"><i class="ik ik-download"></i><span>Export</span></a> -->
          </div>
        </td>
        <td><?= $supervisor->nilai_1 ?></td>
        <td><?= $supervisor->nilai_2 ?></td>
        <td><?= $supervisor->nilai_3 ?></td>
        <td><?= $supervisor->nilai_4 ?></td>
        <td><?= $supervisor->nilai_5 ?></td>
        <td><?= $supervisor->nilai_6 ?></td>
        <td><?= $supervisor->nilai_7 ?></td>
        <td><?= $supervisor->nilai_total ?></td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view('supervisor/data_pkl/supervision/edit'); ?>