<?= $this->extend("Home/Layout/template") ?>
<?= $this->section("main") ?>
<section class="navbot">
  <a href="/" class="navbot-items">
    <i class="ri-lg ri-home-4-line"></i>
    <span class="navbot-items-text">Home</span>
  </a>
  <a href="/Produk" class="navbot-items">
    <i class="ri-lg ri-shopping-bag-line"></i>
    <span class="navbot-items-text">Produk</span>
  </a>
  <a href="/Settings" class="navbot-items active">
    <i class="ri-lg ri-settings-line"></i>
    <span class="navbot-items-text">Settings</span>
  </a>
  <span class="navbot-dots"></span>
</section>
<?php if (logged_in()) : ?>
<section class="profile">
  <img src="/assets/image/profile/<?= user()->profile; ?>" alt="My Profile" loading="lazy" />
<h3><?= user()->username; ?></h3>
</section>
<section class="setting-title">
<h3>Akun saya</h3>
<span>perbarui info Anda untuk mempertahankan akun Anda</span>
</section>
<section class="setting">
<a href="/Settings/akun" class="setting-items"><i class="ri-lg
ri-account-circle-fill"></i>Informasi Akun<i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-notification-4-fill"></i>Pemberitahuan <i class="ri-lg
ri-arrow-right-s-line"></i></a>
</section>
<section class="setting-title">
<h3>Privasi</h3>
<span>sesuaikan privasi Anda untuk menjadikan pengalaman lebih baik</span>
</section>
<section class="setting">
<a href="#" class="setting-items"><i class="ri-lg
ri-key-fill"></i>Keamanan <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-wallet-fill"></i>E-wallet <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-eye-off-fill"></i>Privasi <i class="ri-lg
ri-arrow-right-s-line"></i></a>
</section>
<section class="setting-title">
<h3>Tentang Kami</h3>
<span>Informasi Tentang Kami</span>
</section>
<section class="setting">
<a href="#" class="setting-items"><i class="ri-lg
ri-question-fill"></i>Tentang Kami <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-refund-fill"></i>Pengembalian Barang<i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-map-pin-fill"></i>Lokasi <i class="ri-lg
ri-arrow-right-s-line"></i></a>
</section>
<section class="setting-title">
<h3>Bantuan & Dukungan</h3>
<span>Pusat Bantuan dan Syarat Ketentuan dll</span>
</section>
<section class="setting">
<a href="#" class="setting-items"><i class="ri-lg
ri-questionnaire-fill"></i>Pusat Bantuan <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-customer-service-2-fill"></i>Layanan Pelanggan <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-shield-user-fill"></i>Syarat dan Ketentuan <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-lock-2-fill"></i>Kebijakan Privasi<i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="#" class="setting-items"><i class="ri-lg
ri-feedback-fill"></i>Laporkan Bug <i class="ri-lg
ri-arrow-right-s-line"></i></a>
<a href="<?= route_to("logout") ?>" class="setting-items logout">Logout</a>
</section>
<?php else : ?>
<section class="warning">
<img src="/assets/image/warning.webp" alt="Opps" loading="lazy" />
<h3>Oppss</h3>
<span>Anda harus login terlebih dahulu</span>
<a href="<?= route_to("login")?>" class="btn-login">Login</a>
</section>
<?php endif; ?>
<?= $this->endsection() ?>