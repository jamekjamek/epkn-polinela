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
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="dt-responsive">
              <table id="simpletable" class="table table-hover" style="padding: 20px;">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Keterangan</th>
                    <th>Group Id</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datahistory as $history) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td style="text-transform: uppercase;"><?= $history->username; ?></td>
                      <td><?= $history->description; ?> </td>
                      <td>
                        <button type="button" class="btn btn-link modalgroupid" data-toggle="modal" data-target="#modalGroupId" data-group="<?= $history->group_id; ?>"><?= $history->group_id; ?>
                        </button>
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

<div class="modal fade" id="modalGroupId" tabindex="-1" role="dialog" aria-labelledby="modalGroupIdLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg mt-0 mb-0" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalGroupIdLabel">GROUP ID 1624485600a11222c5-bd15-11eb-a91e-0cc47abcfaa6</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Perusahaan</th>
                  <th>Waktu PKL</th>
                  <th>Mahasiswa</th>
                  <th>Prodi</th>
                  <th>Member</th>
                </tr>
              </thead>
              <tbody class="groupIdResult">


              </tbody>
            </table>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>