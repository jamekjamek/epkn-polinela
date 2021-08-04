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
        <td><?= @$supervisionTime->time ?></td>
        <td><?= @$supervisionTime->nilai_total ?></td>
        <td>
          <div class="btn-group">
            <button class="btn btn-info" data-toggle="modal" data-target="#edited"><i class="ik ik-edit"></i><span>Edit</span></button>
            
            <?php if ($detail->pushed == 0) : ?>
              <button class="btn btn-secondary verified" data-id="<?= @$supervisionTime->registration_id; ?>" data-groupid="<?= @$supervisionTime->group_id; ?>" data-uri="<?= $this->uri->segment(4); ?>"><i class="ik ik-check-square"></i><span> Verifikasi Penarikan</span></button>
            <?php endif ?>
          </div>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<?php $this->load->view('lecture/data_pkn/supervision/edit'); ?>