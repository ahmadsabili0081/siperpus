<?php
include ('./config/config.php');
include ('./config/koneksi.php');
include ('./functions/method.php');

$notif = isset($_GET['notif']) ? $_GET['notif'] : '';
?>


<?php include ('./templates/header.php'); ?>
<div class="container-fluid">
  <div class="col-md-8 mx-auto mt-4">
    <div class="card">
      <div class="card-header">
        <h3>Tambah Pinjaman</h3>
      </div>
      <?php
      if ($notif === "required") {
        echo "<div class='alert alert-danger text-center mx-3 my-2' role='alert'>
                Field masih kosong!
              </div>";
      }

      ?>
      <div class="card-body">
        <form action="<?= BASE_URL . "./functions/proccess_loan_details.php" ?>" method="post">
          <div class="col row">
            <div class="col-sm-6 mb-3">
              <label for="">Anggota</label>
              <?php
              $user_data = get_user($koneksi);
              ?>
              <select name="id_anggota" class="form-select">
                <option value="" selected>--Pilih Anggota--</option>
                <?php foreach ($user_data as $data): ?>
                  <option value="<?= $data['id_user'] ?>"><?= $data['nama']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="col-sm-6 mb-3">
              <label for="">Buku</label>
              <select name="id_buku" class="form-select">
                <option value="" selected>--Pilih Buku--</option>
                <?php
                $data_book = get_book($koneksi);
                ?>
                <?php foreach ($data_book as $data): ?>
                  <option value="<?= $data['id_buku'] ?>"><?= $data['judul']; ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col row">
            <div class="col-sm-6 mb-3">
              <label for="">Tanggal Pinjam</label>
              <input type="date" class="form-control tglPinjam" name="tgl_pinjam">
            </div>
            <div class="col-sm-6 mb-3">
              <label for="">Tanggal Batas Kembali</label>
              <input type="date" class="form-control tgl_batas_kembali" name="tgl_batas_kembali">
            </div>
          </div>
          <div class="mb-3">
            <label for="">Tanggal Kembali</label>
            <input type="date" class="form-control tgl_kembali" name="tgl_kembali">
          </div>
          <div class="mb-3">
            <label for="">Denda</label>
            <input type="text" class="form-control denda" name="denda" placeholder="Rp.-">
          </div>
          <a href="<?= BASE_URL . "loan_details.php"; ?>" class="btn btn-sm btn-warning">Kembali</a>
          <button class="btn btn-sm btn-primary" type="submit">Tambah Buku</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="<?= BASE_URL . "./assets/js/jquery-3.7.1.js" ?>"></script>
<script>
  $(document).ready(function () {
    $('.tglPinjam').on('change', function () {
      const maxPinjaman = 14;
      const tglBatasKembali = new Date(this.value);
      tglBatasKembali.setDate(tglBatasKembali.getDate() + maxPinjaman);

      let hari = tglBatasKembali.getDate();
      let bulan = tglBatasKembali.getMonth() + 1;
      let tahun = tglBatasKembali.getFullYear();

      let btsPengembalian = `${tahun}-${bulan < 10 ? '0' + bulan : bulan}-${hari < 10 ? '0' + hari : hari}`;
      $('.tgl_batas_kembali').val(btsPengembalian);
      console.log($('.tgl_batas_kembali').val());
    });
  })

  $('.tgl_kembali').on('change', function () {
    const batasPinjaman = 14; // hari
    const dendaHarian = 1000; // denda per hari

    const tglPinjam = new Date($('.tglPinjam').val());
    const tglKembali = new Date(this.value);
    const tglBatasKembali = new Date($('.tgl_batas_kembali').val());

    const selisihHari = Math.ceil((tglKembali - tglBatasKembali) / (1000 * 60 * 60 * 24));
    // Jika terlambat, hitung denda
    let totalDenda = 0;
    if (selisihHari > 0) totalDenda = selisihHari * dendaHarian;
    $('.denda').val(totalDenda);
  })
</script>
<?php include ('./templates/footer.php'); ?>