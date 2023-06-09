<section class="navbar">
  <h3><?=$title; ?></h3>
  <section class="toggle">
    <span></span>
    <span></span>
    <span></span>
  </section>
</section>
<section class="menu">
  <a href="/Admin" class="nav-items">Home</a>
  <a href="/Admin/Dashboard" class="nav-items">Dashboard</a>
  <a href="/Admin/userList" class="nav-items">Kelola User</a>
  <a href="/Admin/produkList" class="nav-items">Kelola Produk</a>
  <a href="/Admin/Settings" class="nav-items">Settings</a>
  <a href="<?= route_to("logout"); ?>" class="nav-items">Logout</a>
</section>