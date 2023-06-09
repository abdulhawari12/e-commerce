<section class="navbar">
  <section class="nav-logo">
    <section class="toggle">
      <span></span>
      <span></span>
      <span></span>
    </section>
    <h3>E-commerce</h3>
  </section>
  <a href="<?= (!logged_in()) ? route_to("login") : "/Cart/" . user_id(); ?>" class="cart">
    <i class="ri-lg ri-shopping-cart-line"></i>
    <span class="dot"><?= $cartss; ?></span>
  </a>
</section>