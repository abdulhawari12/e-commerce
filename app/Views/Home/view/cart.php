<?= $this->extend("Home/Layout/templates") ?>
<?= $this->section("main") ?>
<?= $this->include("Home/Components/header") ?>
<section class="box-container <?= ($cart == null) ? "d-none" : ""; ?>">
  <section class="box-cart">
    <?php foreach ($cart as $c): ?>
    <section class="cart">
      <img src="<?=$c["gambar"] ?>" alt="<?= $c["nama"] ?>" loading="lazy" />
    <section class="cart-body">
      <section class="cart-title">
        <h3><?= $c["nama"] ?></h3>
        <a href="/Cart/Delete/<?= $c["id"] ?>" class="deleted"><i class="ri-lg
          ri-delete-bin-2-line"></i></a>
      </section>
      <section class="cart-price">
        <span>Rp <?php
          $harga = $c["harga"];
          $qty = $c["jumlah"];
          $total = $harga * $qty;
          echo number_format($total, 0, ".", ",")
          ?>,-</span>
        <section class="quantity">
          <span class="minus" onclick="decrement(event,this)"><i class="ri-lg ri-indeterminate-circle-line"></i></span>
          <input type="number" class="qty" value="<?=$c["jumlah"] ?>" max="100" />
        <span class="plus" onclick="increment(event,this)"><i class="ri-lg ri-add-circle-line"></i></span>
      </section>
    </section>
  </section>
</section>
<?php endforeach; ?>
</section>
<section class="produk p-10">
<h3>Produk Lainnya</h3>
<a href="#" class="lainnya">
Lainnya <i class="ri-lg ri-arrow-right-line"></i>
</a>
</section>
<section class="box-card mb-90">
<?php foreach ($pl as $p): ?>
<a href="/Detail/<?=$p["id"] ?>" class="card">
<img src="<?=$p["gambar1"] ?>" alt="<?=$p["nama"] ?>"
loading="lazy" />
<span class="kat"><?=$p["kategori"] ?></span>
<?php if ($p["diskon"] != 0): ?>
<span class="disk"><?=$p["diskon"] ?>% OFF</span>
<?php endif; ?>
<section class="card-body">
<h3><?=$p["nama"] ?></h3>
<?php if ($p["diskon"] != 0): ?>
<span>Rp <?php
$harga = $p["harga"];
$diskon = $p["diskon"];
$jumlah = $diskon / 100;
$kali = $jumlah * $harga;
$total = $harga - $kali;
echo number_format($total, 0, ",", ",") ?>,-</span>
<?php endif; ?>
<span class="<?= ($p["diskon"] != 0) ? "h" : "" ?>">Rp <?= number_format($p["harga"], 0, ",", ",") ?>,-</span>
</section>
</a>
<?php endforeach; ?>
</section>
</section>
<?php if ($cart != null): ?>
<section class="pesanan">
<section class="totalprice">
<h3>Total Pesanan</h3>
<span>Rp <?php
$grand_total = 0;
foreach ($cart as $c) {
$hargaItem = $c["harga"] * $c["jumlah"];
$grand_total += $hargaItem;
}
echo number_format($grand_total,0,",",".");
 ?>,-</span>
</section>
<button type="submit" class="checkout">Checkout</button>
</section>
<?php endif; ?>

<?php if ($cart == null): ?>
<section class="empty-cart">
<img src="/assets/image/empty.webp" alt="empt cart" loading="lazy" />
<h3>Keranjang kamu kosong nih</h3>
<span>Tambah keranjang dulu</span>
<a href="/" class="goback">Kembali ke Halaman</a>
</section>
<?php endif; ?>
<?= $this->endsection() ?>