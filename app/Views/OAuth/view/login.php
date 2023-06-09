<?= $this->extend("OAuth/layout/template"); ?>
<?= $this->section("main"); ?>

<form class="user" action="<?= url_to('login') ?>" method="post">
  <?= csrf_field(); ?>
  <img src="/assets/image/login.webp" />
<h3>Sign In</h3>
<?php if (session()->has('error')) : ?>
<section class="invalid-feedback">
  <?= view('Myth\Auth\Views\_message_block') ?>
</section>
<?php endif;?>
<?php if ($config->validFields === ["email"]) : ?>
<section class="form-group">
  <input type="email" name="login" placeholder=" " id="p1" autocomplete="off"
  autofocus="" class="form-input <?= (session('errors.login')) ? 'is-invalid' :
  ''; ?>" />
<label for="p1">Email Address</label>
</section>
<?php else : ?>
<section class="form-group">
<input type="text" name="login" placeholder=" " id="p2" class="form-input <?=
(session('errors.login')) ? 'is-invalid' : ''; ?>" autocomplete="off" />
<label for="p2">Email or Username</label>
</section>
<?php endif; ?>
<?php if (session('errors.login')): ?>
<section class="invalid-feedback">
<span><?= session('errors.login'); ?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="password" name="password" placeholder=" " id="p3" class="form-input
<?=(session('errors.password')) ? 'is-invalid' : ''; ?>" autocomplete="off" />
<label for="p3">Password</label>
</section>
<?php if (session('errors.password')): ?>
<section class="invalid-feedback">
<span><?= session('errors.password'); ?></span>
</section>
<?php endif; ?>
<section class="form-remember">
<input type="checkbox" name="remember" id="remember" <?php if (old('remember')) : ?> checked <?php endif ?> />
<label for="remember">Remember Me</label>
</section>
<button type="submit">Sign In</button>
<?php if ($config->allowRegistration) : ?>
<a href="<?= url_to('register') ?>" class="link">don't have an account?SignUp</a>
<?php endif; ?>
</form>
<?= $this->endsection(); ?>