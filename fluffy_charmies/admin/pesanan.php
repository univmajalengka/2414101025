<?php 
include 'header.php'; 

// (opsional) kalau nanti kamu mau pakai filter GET:
$status     = isset($_GET['status']) ? trim($_GET['status']) : '';
$date_from  = isset($_GET['date_from']) ? trim($_GET['date_from']) : '';
$date_to    = isset($_GET['date_to']) ? trim($_GET['date_to']) : '';

// rakit query (tetap menampilkan semua kalau filter kosong)
$where = [];
if ($status !== '') {
  $esc = mysqli_real_escape_string($koneksi, $status);
  $where[] = "status = '{$esc}'";
}
if ($date_from !== '') {
  $esc = mysqli_real_escape_string($koneksi, $date_from);
  $where[] = "DATE(tanggal_pesan) >= '{$esc}'";
}
if ($date_to !== '') {
  $esc = mysqli_real_escape_string($koneksi, $date_to);
  $where[] = "DATE(tanggal_pesan) <= '{$esc}'";
}
$sql = "SELECT * FROM pesanan";
if ($where) $sql .= " WHERE " . implode(' AND ', $where);
$sql .= " ORDER BY id_pesanan DESC";
?>

<div class="card">
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="card-title mb-0">Riwayat Pesanan Masuk</h3>

    <!-- Tombol ekspor (ikutkan filter jika ada) -->
    <a class="btn btn-success btn-sm"
       href="export_pemesanan.php<?php
          $qs = [];
          if ($status !== '')     $qs[] = 'status=' . urlencode($status);
          if ($date_from !== '')  $qs[] = 'date_from=' . urlencode($date_from);
          if ($date_to !== '')    $qs[] = 'date_to=' . urlencode($date_to);
          echo $qs ? '?'.implode('&', $qs) : '';
       ?>">
      📊 Ekspor ke Spreadsheet
    </a>
  </div>

  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-striped table-hover">
        <thead>
          <tr>
            <th class="text-center">No</th>
            <th>Tanggal Pesan</th>
            <th>Pemesan</th>
            <th>Detail Pesanan</th>
            <th>Total Harga</th>
            <th class="text-center">Status</th>
            <th>Update Status</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = mysqli_query($koneksi, $sql);
          $no = 1;
          while ($row = mysqli_fetch_assoc($result)) {
              // Badge warna status
              $status_row = $row['status'];
              if     ($status_row == 'Baru Masuk') $badge_color = 'bg-primary';
              elseif ($status_row == 'Diproses')   $badge_color = 'bg-warning';
              elseif ($status_row == 'Dikirim')    $badge_color = 'bg-info';
              elseif ($status_row == 'Selesai')    $badge_color = 'bg-success';
              else                                  $badge_color = 'bg-danger'; // Dibatalkan
          ?>
          <tr>
            <td class="text-center"><?php echo $no++; ?></td>
            <td><?php echo date('d M Y, H:i', strtotime($row['tanggal_pesan'])); ?></td>
            <td>
              <strong><?php echo htmlspecialchars($row['nama_pemesan']); ?></strong><br>
              <small class="text-muted"><?php echo htmlspecialchars($row['no_wa']); ?></small>
            </td>
            <td><?php echo nl2br(htmlspecialchars($row['detail_pesanan'])); ?></td>
            <td>Rp <?php echo number_format($row['total_harga']); ?></td>
            <td class="text-center">
              <span class="badge <?php echo $badge_color; ?>"><?php echo htmlspecialchars($status_row); ?></span>
            </td>
            <td>
              <form action="update_status_pesanan.php" method="POST" class="d-flex">
                <input type="hidden" name="id_pesanan" value="<?php echo $row['id_pesanan']; ?>">
                <select name="status_baru" class="form-select form-select-sm me-2">
                  <option value="Diproses"   <?php if($status_row == 'Diproses')   echo 'selected'; ?>>Diproses</option>
                  <option value="Dikirim"    <?php if($status_row == 'Dikirim')    echo 'selected'; ?>>Dikirim</option>
                  <option value="Selesai"    <?php if($status_row == 'Selesai')    echo 'selected'; ?>>Selesai</option>
                  <option value="Dibatalkan" <?php if($status_row == 'Dibatalkan') echo 'selected'; ?>>Dibatalkan</option>
                </select>
                <button type="submit" class="btn btn-sm btn-dark">Update</button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<?php 
include 'footer.php'; 
?>
