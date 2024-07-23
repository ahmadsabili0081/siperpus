<?php
include ('./config/config.php');
include ('./config/koneksi.php');
include ('./functions/method.php');
?>

<?php include ('./templates/header.php'); ?>
<div class="container-fluid">
  <div class="col-md-8 mx-auto mt-4">
    <a href="<?= BASE_URL . "add_book.php"; ?>" class="btn btn-sm btn-primary my-2">Tambah Buku</a>
    <a href="<?= BASE_URL . "loan_details.php"; ?>" class="btn btn-sm btn-success my-2 text-white">Detail Pinjam
      Buku</a>
    <table class="table table-striped table-hover table-dark">
      <thead>
        <tr>
          <th>No</th>
          <th>Judul</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Isbn</th>
          <th>Tahun Terbit</th>
          <th>Jumlah Tersedia</th>
          <th>Kategori</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $data_book = get_data($koneksi);
        $no = 1;
        ?>
        <?php foreach ($data_book as $data): ?>
          <tr>
            <td><?= $no++; ?></td>
            <td><?= $data['judul']; ?></td>
            <td><?= $data['pengarang']; ?></td>
            <td><?= $data['penerbit']; ?></td>
            <td><?= $data['isbn']; ?></td>
            <td><?= $data['tahun_terbit']; ?></td>
            <td><?= $data['jumlah_tersedia']; ?></td>
            <td><?= $data['nama_kategori']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<?php include ('./templates/footer.php'); ?>