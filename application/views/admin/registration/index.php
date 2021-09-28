<div class="main-content">
  <div class="container-fluid">
    <div class="page-header">
      <div class="row align-items-end">
        <div class="col-lg-8">
          <div class="page-header-title">
            <i class="ik ik-inbox bg-blue"></i>
            <div class="d-inline">
              <h5><?= $title; ?></h5>
              <span><?= $desc; ?></span>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <nav class="breadcrumb-container" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?= base_url(); ?>">Dashboard</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page"><?= $title; ?></li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
    <?php if ($this->session->flashdata('success')) : ?>
      <!--jika brhasil -->
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
      <!--jika gagal -->
    <?php endif; ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <div>
                  <h3 class="text-uppercase"><?= $title; ?></h3>
                </div>
                <div>
                    <a href="<?= base_url('admin/registrations/import'); ?>" class="btn btn-info"><i class="ik ik-plus-square"></i>Import Excel</a>
                    <button class="btn  <?= (count($allRegistrationLeader) > 0) ? 'btn-dark' : 'btn-success' ?>" id="generate-data" <?= (count($allRegistrationLeader) > 0) ? 'Disabled' : '' ?>><i class="ik ik-plus-square"></i>Generate Data</button>
                    <a href="<?= base_url('admin/registrations/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
                </div>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover table-registration" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Status</th>
                    <th>Perusahaan</th>
                    <th>Waktu PKL</th>
                    <th>Nama Ketua</th>
                    <th>Anggota</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($allRegistrationLeader as $leader) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $leader->status; ?></td>
                      <td><?= $leader->company_name; ?></td>
                      <td><?= date('d-m-Y', strtotime($leader->start_date)) . ' - ' . date('d-m-Y', strtotime($leader->finish_date)); ?></td>
                      <!-- <td><?= $leader->group_status; ?></td> -->
                      <td><?= $leader->npm . ' - ' . $leader->fullname . ' - ' . $leader->prodi_name; ?></td>
                      <td>
                        <?php
                        $this->db->select("count(b.id) AS jumlahmhs, count(case when b.gender='L' then 1 end) as male_cnt, count(case when b.gender='P' then 1 end) as female_cnt");
                        $this->db->join('student b', 'a.student_id = b.id');
                        $this->db->where('a.status !=', 'Ketua');
                        $this->db->group_by("a.group_id");
                        $member = $this->db->get_where('registration a', ['a.group_id' => $leader->group_id])->row();
                        ?>
                        <a href="<?= base_url('admin/registrations/detail/' . encodeEncrypt($leader->id)) ?>" class="btn btn-link"><?= @$member->jumlahmhs; ?> Anggota (<?= @$member->male_cnt ?>L, <?= @$member->female_cnt ?>P)</a>
                      </td>
                      <td>
                        <button type="button" class="btn btn-danger delete-registration" data-id="<?= encodeEncrypt($leader->group_id) ?>"><i class=" ik ik-trash"></i>Hapus</button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>