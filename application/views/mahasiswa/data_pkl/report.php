<div class="table-responsive">
  <table class="table">
    <tr>
      <th style="width: 15%;">File</th>
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
  </table>
</div>