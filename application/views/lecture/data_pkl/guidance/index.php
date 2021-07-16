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
            <?php
            if ($degree->degree == 'D3') {
              echo '<button class="btn btn-info" data-toggle="modal" data-target="#editedGuidanceD3"><i class="ik ik-edit"></i><span>Edit</span></button>';
            } else {
              echo '<button class="btn btn-info" data-toggle="modal" data-target="#editedGuidanceD4"><i class="ik ik-edit"></i><span>Edit</span></button>';
            } ?>
            <a href="" class="btn btn-success"><i class="ik ik-download"></i><span>Export</span></a>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
if ($degree->degree == 'D3') {
  $this->load->view('lecture/data_pkl/guidance/edit');
} else {
  $this->load->view('lecture/data_pkl/guidance/edit_d4');
}
?>