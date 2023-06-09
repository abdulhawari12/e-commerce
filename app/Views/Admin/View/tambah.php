<?= $this->extend("Admin/Layout/templates"); ?>
<?= $this->section("main"); ?>
<form action="/Admin/add" method="post" enctype="multipart/form-data">
  <?= csrf_field(); ?>
  <h3>Form Tambah Data</h3>
  <section class="form-group">
    <input type="text" placeholder=" " value="<?= old("nama") ?>" name="nama"
    id="p1" class="form-input <?=(validation_show_error("nama")) ? "is-invalid" : ""; ?>" />
  <label for="p1">Nama Produk</label>
</section>
<?php if (validation_show_error("nama")) : ?>
<section class="invalid-feedback">
  <span><?= validation_show_error("nama"); ?></span>
</section>
<?php endif; ?>
<section class="form-group">
  <input type="text" placeholder=" " value="<?= old("harga") ?>" name="harga"
  id="p2" class="form-input <?= validation_show_error("harga") ? "is-invalid" :
  ""; ?>" />
<label for="p2">Harga Produk</label>
</section>
<?php if (validation_show_error("harga")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("harga") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
  <select name="kategori" id="kategori">
    <option value="all">Pilih Kategori</option>
    <option value="Baju">Baju</option>
    <option value="Celana">Celana</option>
    <option value="Hijab">Hijab</option>
    <option value="Backpack">Backpack</option>
    <option value="Kacamata">Kacamata</option>
    <option value="Topi">Topi</option>
    <option value="Dompet">TDompet</option>
    <option value="Sendal">Sendal</option>
    <option value="Jeans">Jeans</option>
    <option value="Jaket">Jaket</option>
    <option value="Jam Tangan">Jam Tangan</option>
    <option value="Sabuk">Sabuk</option>
    <option value="Sepatu">Sepatu</option>
    <option value="Sweater">Sweater</option>
  </select>
</section>
<?php if (validation_show_error("kategori")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("kategori") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="number" placeholder=" " value="<?= old("diskon") ?>" name="diskon"
id="p10" class="form-input <?= (validation_show_error("diskon")) ? "is-invalid" : ""; ?>" />
<label for="p10">Diskon</label>
</section>
<?php if (validation_show_error("diskon")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("diskon") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="number" placeholder=" " value="<?= old("stok") ?>" name="stok"
id="p11" class="form-input <?= (validation_show_error("stok")) ? "is-invalid" : ""; ?>" />
<label for="p11">Stok</label>
</section>
<?php if (validation_show_error("stok")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("stok") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="text" placeholder=" " value="<?= old("gambar1") ?>"
name="gambar1"
id="p4" class="form-input <?= (validation_show_error("gambar1")) ? "is-invalid"
: ""; ?>" />
<label for="p4">Gambar Produk</label>
</section>
<?php if (validation_show_error("gambar1")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("gambar1") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="text" placeholder=" " value="<?= old("gambar2") ?>"
name="gambar2"
id="p5" class="form-input <?=(validation_show_error("gambar2")) ? "is-invalid" :
""; ?>" />
<label for="p5">Gambar Detail 1 Produk</label>
</section>
<?php if (validation_show_error("gambar2")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("gambar2") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="text" placeholder=" " value="<?= old("gambar3") ?>"
name="gambar3"
id="p6" class="form-input <?=(validation_show_error("gambar3")) ? "is-invalid" :
""; ?>" />
<label for="p6">Gambar Detail 2 Produk</label>
</section>
<?php if (validation_show_error("gambar3")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("gambar3") ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="text" placeholder=" " value="<?= old("gambar4") ?>"
name="gambar4"
id="p7" class="form-input" />
<label for="p7">Gambar Detail 3 Produk</label>
</section>
<section class="form-group">
<input type="text" placeholder=" " value="<?= old("gambar5") ?>"
name="gambar5"
id="p8" class="form-input" />
<label for="p8">Gambar Detail 4 Produk</label>
</section>
<section class="form-group">
<textarea placeholder=" " id="p9" name="deskripsi" class="form-input
<?=(validation_show_error("deskripsi")) ? "is-invalid" : ""; ?>"></textarea>
<label for="p9" class="deskripsi">Deskripsi Produk</label>
</section>
<?php if (validation_show_error("deskripsi")) : ?>
<section class="invalid-feedback">
<span><?= validation_show_error("deskripsi") ?></span>
</section>
<?php endif; ?>
<button type="submit">Tambah Data</button>
</form>
<?= $this->endsection(); ?>