<?= $this->extend("Admin/Layout/template"); ?>
<?= $this->Section("main"); ?>
<?php if (session()->getFlashData("success")) : ?>
<section class="box-modal" data-flash="<?= session()->getFlashData("success")?>">
</section>
<?php endif; ?>
<section class="tambah">
<a href="/Admin/tambah" class="btn btn-primary">Tambah Data</a>
</section>
<section class="box-card">
<?php foreach ($produk as $p): ?>
<section class="card">
<img src="<?= $p["gambar1"] ?>" alt="<?= $p["nama"] ?>" loading="lazy" />
<span class="kategori"><?= $p["kategori"] ?></span>
<section class="card-body">
<h3><?= $p["nama"] ?></h3>
<span class="rp">
Rp <?= number_format($p["harga"], 0, ",", ","); ?>,-
</span>
<section class="action">
<a href="/Admin/edit/<?=$p["id"]?>" class="btn-action edit"><i class="ri-lg ri-edit-2-line"></i></a>
<a href="/Admin/Delete/<?=$p["id"]?>" class="btn-action hapus"><i class="ri-lg ri-delete-bin-4-line"></i></a>
</section>
</section>
</section>
<?php endforeach; ?>
</section>
<?= $this->endSection(); ?>
