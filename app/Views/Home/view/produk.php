<?= $this->extend("Home/Layout/template") ?>
<?= $this->section("main") ?>
<section class="navbot">
  <a href="/" class="navbot-items">
    <i class="ri-lg ri-home-4-line"></i>
    <span class="navbot-items-text">Home</span>
  </a>
  <a href="/Produk" class="navbot-items active">
    <i class="ri-lg ri-shopping-bag-line"></i>
    <span class="navbot-items-text">Produk</span>
  </a>
  <a href="/Settings" class="navbot-items">
    <i class="ri-lg ri-settings-line"></i>
    <span class="navbot-items-text">Settings</span>
  </a>
  <span class="navbot-dots"></span>
</section>

<section class="container">
  <form method="get" action="" class="search">
    <?= csrf_field() ?>
    <input type="search" name="keyword" placeholder="Search Something Here..."
    value="<?=($keyword !== "") ? $keyword : ""; ?>" />
  <button type="submit"><i class="ri-lg ri-search-line">
  </i></button>
</form>
<section class="text-title">
  <h3>Kategori</h3>
</section>
<section class="menu-box">
  <section class="menu-slider">
    <a href="/Produk" class="menu-slider-items">
      <img src="/assets/image/all.png" alt="Semua" loading="lazy" />
    <span>Semua</span>
  </a>
  <a href="/Produk?kategori=hijab" class="menu-slider-items">
    <img src="/assets/image/hijab.png" alt="Hijab" loading="lazy" />
  <span>Hijab</span>
</a>
<a href="/Produk?kategori=backpack" class="menu-slider-items">
  <img src="/assets/image/backpack.png" alt="Backpack" loading="lazy" />
<span>Backpak</span>
</a>
</section>
<section class="menu-slider">
<a href="/Produk?kategori=kacamata" class="menu-slider-items">
<img src="/assets/image/kacamata.png" alt="Kacamata" loading="lazy" />
<span>Kacamata</span>
</a>
<a href="/Produk?kategori=baju" class="menu-slider-items">
<img src="/assets/image/baju.png" alt="Baju" loading="lazy" />
<span>Baju</span>
</a>
<a href="/Produk?kategori=celana" class="menu-slider-items">
<img src="/assets/image/celana.png" alt="Celana" loading="lazy" />
<span>Celana</span>
</a>
</section>
<section class="menu-slider">
<a href="/Produk?kategori=jaket" class="menu-slider-items">
<img src="/assets/image/jaket.png" alt="Jaket" loading="lazy" />
<span>Jaket</span>
</a>
<a href="/Produk?kategori=sweater" class="menu-slider-items">
<img src="/assets/image/sweater.png" alt="Sweater" loading="lazy" />
<span>Sweater</span>
</a>
<a href="/Produk/?kategori=sepatu" class="menu-slider-items">
<img src="/assets/image/sepatu.png" alt="Sepatu" loading="lazy" />
<span>Sepatu</span>
</a>
</section>
<section class="menu-slider">
<a href="/Produk?kategori=sendal" class="menu-slider-items">
<img src="/assets/image/sendal.png" alt="Sendal" loading="lazy" />
<span>Sendal</span>
</a>
<a href="/Produk?kategori=jeans" class="menu-slider-items">
<img src="/assets/image/jeans.png" alt="Jeans" loading="lazy" />
<span>Jeans</span>
</a>
<a href="/Produk?kategori=jam tangan" class="menu-slider-items">
<img src="/assets/image/jam.png" alt="Jam Tangan" loading="lazy" />
<span>Jam Tangan</span>
</a>
</section>
<section class="menu-slider">
<a href="/Produk?kategori=topi" class="menu-slider-items">
<img src="/assets/image/topi.png" alt="Topi" loading="lazy" />
<span>Topi</span>
</a>
<a href="/Produk?kategori=dompet" class="menu-slider-items">
<img src="/assets/image/dompet.png" alt="Dompet" loading="lazy" />
<span>Dompet</span>
</a>
<a href="/Produk?kategori=sabuk" class="menu-slider-items">
<img src="/assets/image/sabuk.png" alt="Sabuk" loading="lazy" />
<span>Sabuk</span>
</a>
</section>
</section>
<section class="text-title">
<h3>Semua produk</h3>
</section>
<?php if ($produk == null) : ?>
<section class="notfound">
<img src="/assets/image/4.0.4.png" alt="No Data Found" loading="lazy" />
<h3>Opps...</h3>
<span>Tidak ada produk <?=$keyword ?> <?= $kategori ?></span>
<span>Cari data yang spesifik</span>
</section>
<?php else : ?>
<div class="box-card">
<?php foreach ($produk as $p) : ?>
<a href="/Detail/<?=$p["id"] ?>" class="card">
<img src="<?=$p["gambar1"] ?>" alt="<?=$p["nama"] ?>" loading="lazy" />
<span class="kategori"><?=$p["kategori"] ?></span>
<span class="diskon <?=($p["diskon"] == 0) ? "hidden" : ""; ?>"><?=$p["diskon"] ?>% OFF</span>
<section class="card-body">
<h3><?= $p["nama"] ?></h3>
<?php if ($p["diskon"] != 0): ?>
<span class="harga-diskon">Rp <?php
$harga = $p["harga"];
$diskon = $p["diskon"];
$kali = $diskon / 100;
$jumlah = $harga * $kali;
$total = $harga - $jumlah;
echo number_format($total, 0, ",", ",") ?>,-</span>
<?php endif; ?>
<span class="<?= ($p["diskon"]) ? "bg-danger" : "" ?>">Rp <?= number_format($p["harga"], 0, ",", ",") ?>,-</span>
</section>
</a>
<?php endforeach; ?>
</div>
<?php endif; ?>
<?= $pager->links("produk", "produk_paginate") ?>
</section>
<?= $this->endsection() ?>