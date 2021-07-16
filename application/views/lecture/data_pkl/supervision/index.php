<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th>Waktu Supervisi</th>
        <th>Nilai</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $supervisionTime->time ?></td>
        <td><?= $supervisionTime->nilai_total ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-info" data-toggle="modal" data-target="#edited"><i class="ik ik-edit"></i><span>Edit</span></button>
            <a href="" class="btn btn-success"><i class="ik ik-download"></i><span>Export</span></a>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view('lecture/data_pkl/supervision/edit'); ?>