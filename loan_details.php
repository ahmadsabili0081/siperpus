<?php
include ('./config/config.php');
include ('./config/koneksi.php');
include ('./functions/method.php');

$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
if (isset($_POST['search'])) {
  $data_load = get_search($koneksi, $_POST['search']);
} else {
  $data_load = get_peminjaman($koneksi);
}
?>


<?php include ('./templates/header.php'); ?>
<div class="container-fluid">
  <div class="col-md-8 mx-auto mt-4">
    <div class="col-md row m-0">
      <div class="col-md-6">
        <a href="<?= BASE_URL . "add_load_details.php"; ?>" class="btn btn-sm btn-primary my-2">Tambah Pinjaman</a>
        <a href="<?= BASE_URL; ?>" class="btn btn-sm btn-success my-2">Data Buku</a>
      </div>
      <div class="col-md-6">
        <form class="row g-3" action="" method="post">
          <div class="col-auto">
            <label for="inputPassword2" class="visually-hidden">Search</label>
            <input type="text" class="form-control" name="search" placeholder="Search..">
          </div>
          <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
          </div>
        </form>
      </div>
    </div>

    <table class="table table-striped table-hover table-dark">
      <?php
      if ($notif === "success") {
        echo "<div class='alert alert-danger text-center mx-3 my-2' role='alert'>
            Data berhasil ditambahkan!
          </div>";
      }
      ?>
      <thead>
        <tr>
          <th>No</th>
          <th>Anggota</th>
          <th>Buku</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Batas Kembali</th>
          <th>Tanggal Kembali</th>
          <th>Denda</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        ?>

        <?php foreach ($data_load as $data): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['nama']; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['tgl_pinjam']; ?></td>
            <td><?= $data['tgl_batas_kembali']; ?></td>
            <td><?= $data['tgl_kembali']; ?></td>
            <td><?= $data['denda']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include ('./templates/footer.php'); ?>