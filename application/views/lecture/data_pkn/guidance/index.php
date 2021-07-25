<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th>Nilai</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $guidance->nilai_total ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-info" data-toggle="modal" data-target="#editedGuidanceD4"><i class="ik ik-edit"></i><span>Edit</span></button>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
$this->load->view('lecture/data_pkn/guidance/edit_d4');
?>