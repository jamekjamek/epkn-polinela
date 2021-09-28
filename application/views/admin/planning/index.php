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
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('success') ?>" data-type="success"></div>
    <?php elseif ($this->session->flashdata('error')) : ?>
      <div class="flashdata" data-flashdata=" <?= $this->session->flashdata('error') ?>" data-type="error"></div>
    <?php endif; ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header d-block">
            <div class="d-flex flex-grow-1 min-width-zero card-content">
              <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                <h3 class="text-uppercase"><?= $title; ?></h3>
                <a href="<?= base_url('admin/master/planning_attachment/add'); ?>" class="btn btn-primary"><i class="ik ik-plus-square"></i>Tambah</a>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Program Studi</th>
                    <th>File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($plannings as $planning) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $planning->prodi_name ?></td>
                      <td>
                        <button type="button" class="btn btn-warning modalViewPlanning" data-toggle="modal" data-target="#modalViewPlanning" data-log="<?= $planning->id; ?>"><i class="ik ik-eye"></i><span>VIEW</span></button>
                      </td>
                      <td>
                        <div class="btn-group" role="group">
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#change-planning" data-id="<?= $planning->id; ?>" data-prodi="<?= $planning->prodi_id; ?>"><i class="ik ik-edit"></i><span>Edit</span></button>
                        </div>
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

  <div class="modal fade" id="modalViewPlanning" tabindex="-1" role="dialog" aria-labelledby="modalLogIdLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalViewPlanningLabel"></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
          <div class="modalViewPlanningResult">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="change-planning" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalCenterLabel">Upload Ulang Capaian Pembelajaran</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="<?= site_url('admin_planning_attachment/update') ?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="planningId" id="id">
          <input type="hidden" name="prodiId" id="prodi">
          <div class="modal-body">
            <div class="form-group">
              <label for="invited">File</label>
              <input type="file" class="form-control" id="file" name="file">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>