<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: login.php");
    exit();

}

include "koneksi.php";
include "header.php";

$id = $_GET['id'];

$query = mysqli_query($conn,"SELECT * FROM anggota WHERE id='$id'");

$data = mysqli_fetch_assoc($query);

?>

<section class="py-5">

<div class="container">

<div class="card shadow">

<div class="card-header">

Edit Data Anggota

</div>

<div class="card-body">

<form action="update_anggota.php" method="POST" onsubmit="return validasiForm();">

<input type="hidden" name="id" value="<?= $data['id'];?>">

<div class="mb-3">

<label>Nama</label>

<input
type="text"
id="nama"
name="nama"
class="form-control"
value="<?= $data['nama'];?>">

</div>

<div class="mb-3">

<label>Tempekan</label>

<select
name="tempekan"
class="form-select">

<option <?=($data['tempekan']=="Kaja Kangin")?"selected":"";?>>
Kaja Kangin
</option>

<option <?=($data['tempekan']=="Kaja Kauh")?"selected":"";?>>
Kaja Kauh
</option>

<option <?=($data['tempekan']=="Kelod Kangin")?"selected":"";?>>
Kelod Kangin
</option>

<option <?=($data['tempekan']=="Kelod Kauh")?"selected":"";?>>
Kelod Kauh
</option>

</select>

</div>

<div class="mb-3">

<label>Alamat</label>

<textarea
id="alamat"
name="alamat"
class="form-control"><?= $data['alamat'];?></textarea>

</div>

<div class="mb-3">

<label>No HP</label>

<input
type="text"
id="no_hp"
name="no_hp"
class="form-control"
value="<?= $data['no_hp'];?>">

</div>

<div class="mb-3">

<label>Status</label>

<select
name="status"
class="form-select">

<option value="Aktif" <?=($data['status']=="Aktif")?"selected":"";?>>

Aktif

</option>

<option value="Tidak Aktif" <?=($data['status']=="Tidak Aktif")?"selected":"";?>>

Tidak Aktif

</option>

</select>

</div>

<div class="mb-3">

<label>Keterangan</label>

<select
name="keterangan"
class="form-select">

<option value="Aktif mengikuti kegiatan STT"
<?=($data['keterangan']=="Aktif mengikuti kegiatan STT")?"selected":"";?>>

Aktif mengikuti kegiatan STT

</option>

<option value="Menikah"
<?=($data['keterangan']=="Menikah")?"selected":"";?>>

Menikah

</option>

<option value="Bekerja di luar daerah"
<?=($data['keterangan']=="Bekerja di luar daerah")?"selected":"";?>>

Bekerja di luar daerah

</option>

</select>

</div>

<button class="btn btn-warning">

<i class="fa-solid fa-pen"></i>

Update

</button>

<a href="anggota.php" class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</div>

</section>

<?php include "footer.php"; ?>