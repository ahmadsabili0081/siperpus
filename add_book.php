<?php
include ('./config/config.php');
include ('./config/koneksi.php');
include ('./functions/method.php');

?>

<?php include ('./templates/header.php'); ?>
<div class="container-fluid">
  <div class="col-md-6 mx-auto mt-4">
    <div class="card">
      <div class="card-header">
        <h3>Tambah Buku</h3>
      </div>
      <?php
      $notif = isset($_GET['notif']) ? $_GET['notif'] : '';
      if ($notif === "required") {
        echo "<div class='alert alert-danger text-center mx-3 my-2' role='alert'>
                Isi Field dengan benar! Jangan kosong!
              </div>";
      }

      if ($notif == "success") {
        echo "<div class='alert alert-success text-center mx-3 my-2' role='alert'>
                Data buku berhasil ditambahkan!
              </div>";
      }
      ?>
      <div class="card-body">
        <form action="<?= BASE_URL . "./functions/proccess_add_book.php" ?>" method="post">
          <div class="col row">
            <div class="col-sm-6 mb-3">
              <label for="">Judul Buku</label>
              <input type="text" class="form-control" name="judul" placeholder="Judul Buku..">
            </div>
            <div class="col-sm-6 mb-3">
              <label for="">Pengarang</label>
              <input type="text" class="form-control" name="pengarang" placeholder="Pengarang..">
            </div>
          </div>
          <div class="col row">
            <div class="col-sm-6 mb-3">
              <label for="">Penerbit</label>
              <input type="text" class="form-control" name="penerbit" placeholder="Penerbit..">
            </div>
            <div class="col-sm-6 mb-3">
              <label for="">Isbn</label>
              <input type="text" class="form-control" name="isbn" placeholder="Isbn..">
            </div>
          </div>
          <div class="col row">
            <div class="col-sm-6 mb-3">
              <label for="">Tahun Terbit</label>
              <select name="tahun_terbit" class="form-select">
                <option value="" selected>--Pilih Tahun Terbit--</option>
                <?php for ($year = 2000; $year <= date('Y'); $year++): ?>
                  <option value="<?= $year ?>"><?= $year; ?></option>
                <?php endfor; ?>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="">Jumlah Tersedia</label>
              <input type="number" class="form-control" name="jumlah_tersedia" placeholder="Jumlah Tersedia..">
            </div>
          </div>
          <div class="mb-3">
            <label for="">Kategori</label>
            <select name="id_kategori" class="form-select">
              <option value="" selected>--Pilih Kategori Buku--</option>
              <?php
              $data_kategori = get_data_kategori($koneksi);
              ?>
              <?php foreach ($data_kategori as $data): ?>
                <option value="<?= $data['id_kategori'] ?>"><?= $data['nama_kategori']; ?></option>
              <?php endforeach; ?>

            </select>
          </div>
          <a href="<?= BASE_URL; ?>" class="btn btn-sm btn-warning">Kembali</a>
          <button class="btn btn-sm btn-primary" type="submit">Tambah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php include ('./templates/footer.php'); ?>