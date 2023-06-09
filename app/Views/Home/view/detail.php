<?= $this->extend("Home/Layout/templates") ?>
<?= $this->section("main") ?>
<section class="header">
  <section class="header-title">
    <a href="/Produk" class="back">
      <i class="ri-lg ri-arrow-left-line"></i>
    </a>
    <h3><?= $produk["nama"] ?></h3>
  </section>
  <a href="/Cart/<?= user_id() ?>" class="carts">
    <i class="ri-lg ri-shopping-cart-line"></i>
    <span class="dot"><?= $cartss; ?></span>
  </a>
</section>
<section class="detail-img">
  <img src="<?=$produk["gambar1"] ?>" alt="<?=$produk["nama"] ?>" loading="lazy" />
<img src="<?=$produk["gambar2"] ?>" alt="<?=$produk["nama"] ?>" loading="lazy" />
<img src="<?=$produk["gambar3"] ?>" alt="<?=$produk["nama"] ?>" loading="lazy" />
<img src="<?=$produk["gambar4"] ?>" alt="<?=$produk["nama"] ?>" loading="lazy" />
<img src="<?=$produk["gambar5"] ?>" alt="<?=$produk["nama"] ?>" loading="lazy" />
</section>
<section class="container">
<span class="kategori"><?=$produk["kategori"] ?></span>
<section class="detail-title l">
<h3><?=$produk["nama"] ?></h3>
<span class="diskon <?=($produk["diskon"] != 0) ? "display" : "" ?>">90% OFF</span>
</section>
<section class="detail-title">
<?php if ($produk["diskon"] != 0): ?>
<span class="harga-diskon">Rp <?php
$harga = $produk["harga"];
$diskon = $produk["diskon"];
$jumlah = $diskon / 100;
$kali = $jumlah * $harga;
$total = $harga - $kali;
echo number_format($total, 0, ",", ","); ?>,-</span>
<?php endif; ?>
<span class="harga <?= ($produk["diskon"] != 0) ? "bg-danger" : "" ?>">Rp <?= number_format($produk["harga"], 0, ",", ",") ?>,-</span>
</section>
<section class="detail-deskripsi">
<h3>Deskripsi</h3>
<pre class="pre">
<?=$produk["deskripsi"] ?>
</pre>
</section>

<section class="produk">
<h3>Produk serupa</h3>
<a href="/Produk?kategori=<?= $produk["kategori"] ?>" class="lainnya">
Lainnya <i class="ri-lg ri-arrow-right-line"></i>
</a>
</section>
<section class="box-card">
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
<?php if(logged_in()) :?>
<form action="/addCart/<?= user_id()?>" method="post">
<?= csrf_field(); ?>
<input type="hidden" name="nama" value="<?= $produk["nama"] ?>" />
<input type="hidden" name="gambar" value="<?= $produk["gambar1"] ?>" />
<input type="hidden" name="harga" value="<?php
$harga = $produk["harga"];
$diskon = $produk["diskon"];
$jumlah = $diskon / 100;
$kali = $jumlah * $harga;
$total = $harga - $kali;
echo $total;
?>" />
<input type="hidden" name="users_id" value="<?= user_id() ?>" />
<section class="stok">
<section class="stok-title">
<h3>Stok : <?= $produk["stok"] ?></h3>
<section class="count">
<span id="decrement" onclick="decreaseCount(event,this)"><i class="ri-lg ri-indeterminate-circle-line"></i></span>
<input type="number" class="totalCount" name="jumlah" value="1" min="1"
max="<?= $produk["stok"] ?>" />
<span id="increment" onclick="increaseCount(event,this)"><i class="ri-lg ri-add-circle-line"></i></span>
</section>
</section>
<button type="submit" class="tambah-keranjang">Add To Cart</button>
</section>
</form>
<?php endif;?>
<?= $this->endsection() ?>