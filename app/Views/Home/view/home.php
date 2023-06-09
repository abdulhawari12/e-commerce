<?= $this->extend("Home/Layout/template") ?>
<?= $this->section("main") ?>
<?= $this->include("Home/Components/navbot") ?>
<section class="img-slider">
  <section class="slider">
    <img src="/assets/image/slider/1.jpg" alt="Slider 1" loading="lazy" />
  <img src="/assets/image/slider/2.jpg" alt="Slider 2" loading="lazy" />
<img src="/assets/image/slider/3.jpg" alt="Slider 3" loading="lazy" />
<img src="/assets/image/slider/4.jpg" alt="Slider 4" loading="lazy" />
<img src="/assets/image/slider/5.jpg" alt="Slider 5" loading="lazy" />
</section>
</section>
<section class="text-title p-10px d-flex justify-between align-center">
<h3>Produk terbaru</h3>
<a href="/Produk" class="lainnya">
<span>Lainnya</span><i class="ri-lg ri-arrow-right-line"></i>
</a>
</section>
<?php if ($produk == null) : ?>
<section class="notfound">
<img src="/assets/image/4.0.4.png" alt="No Data Found" loading="lazy" />
<h3>Opps...</h3>
<span>Tidak ada produk</span>
</section>
<?php else : ?>
<div class="box-card p-10px">
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
<section class="tersedia">
<h3>Tersedia juga di</h3>
<section class="tersedia-body">
<a href="#" class="tersedia-items">
<img src="/assets/image/tokopedia.png" alt="tokopedia" loading="lazy" />
</a>
<a href="#" class="tersedia-items">
<img src="/assets/image/blibli.png" alt="blibli" loading="lazy" />
</a>
<a href="#" class="tersedia-items">
<img src="/assets/image/shopee.png" alt="shopee" loading="lazy" />
</a>
<a href="#" class="tersedia-items">
<img src="/assets/image/lazada.png" alt="lazada" loading="lazy" />
</a>
<a href="#" class="tersedia-items">
<img src="/assets/image/bukalapak.png" alt="bukalapak" loading="lazy" />
</a>
<a href="#" class="tersedia-items">
<img src="/assets/image/tiktok.png" alt="tiktok" loading="lazy" />
</a>
</section>
</section>
<?= $this->endsection() ?>