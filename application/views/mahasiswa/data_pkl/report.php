<div class="table-responsive">
  <table class="table">
    <tr>
      <th style="width: 15%;">File Laporan</th>
      <td>: <a href="<?= base_url('assets/uploads/laporan/' . $file->file) ?>"><?= $file->file ?></a> </td>
    </tr>
    <tr>
      <th>Video PKN</th>
      <td>
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src="<?= $file->youtube_link ?>" allowfullscreen></iframe>
        </div>
      </td>
    </tr>
    <tr>
      <td>
        <a href="<?= site_url('mahasiswa/data_pkn/upload/update/' . encodeEncrypt($file->id)) ?>" class="btn btn-success">Edit</a>
      </td>
      <td></td>
    </tr>
  </table>
</div>