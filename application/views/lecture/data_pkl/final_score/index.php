<div class="table-responsive">
  <table class="table text-center">
    <thead>
      <tr>
        <th>Tahun Akademik</th>
        <th>Nilai Akhir</th>
        <th>Huruf Mutu</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?= $finalScore->academic_year ?></td>
        <td><?= $finalScore->result_final_score ?></td>
        <td><?= $finalScore->HM ?></td>
        <td>
          <a href="" class="btn btn-success"><i class="ik ik-download"></i><span>Export</span></a>
        </td>
      </tr>
    </tbody>
  </table>
</div>