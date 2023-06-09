<?= $this->extend("OAuth/layout/template"); ?>
<?= $this->section("main"); ?>

<form class="user" action="<?= url_to('register') ?>" method="post">
  <?= csrf_field(); ?>
  <img src="/assets/image/login.webp" />
<h3>Sign Up</h3>
<?php if (session()->has('error')) : ?>
<section class="invalid-feedback">
  <?= view('Myth\Auth\Views\_message_block') ?>
</section>
<?php endif; ?>

<section class="form-group">
  <input type="email" name="email" placeholder=" " id="p4" autocomplete="off"
  autofocus="" class="form-input <?= (session('errors.email')) ? 'is-invalid' :
  ''; ?>" />
<label for="p4">Email Address</label>
</section>
<section class="never">
<span><?= lang('Auth.weNeverShare'); ?></span>
</section>

<?php if (session('errors.email')): ?>
<section class="invalid-feedback">
<span><?= session('errors.email'); ?></span>
</section>
<?php endif; ?>

<section class="form-group">
<input type="text" name="username" placeholder=" " id="p5" class="form-input <?=
(session('errors.login')) ? 'is-invalid' : ''; ?>" autocomplete="off" />
<label for="p5">Username</label>
</section>

<?php if (session('errors.username')): ?>
<section class="invalid-feedback">
<span><?= session('errors.username'); ?></span>
</section>
<?php endif; ?>

<section class="form-group">
<input type="password" name="password" placeholder=" " id="p6" class="form-input
<?=(session('errors.password')) ? 'is-invalid' : ''; ?>" autocomplete="off" />
<label for="p6">Password</label>
</section>
<?php if (session('errors.password')): ?>
<section class="invalid-feedback">
<span><?= session('errors.password'); ?></span>
</section>
<?php endif; ?>

<section class="form-group">
<input type="password" name="pass_confirm" placeholder=" " id="p7" class="form-input
<?=(session('errors.pass_confirm')) ? 'is-invalid' : ''; ?>" autocomplete="off" />
<label for="p7">Confirm Password</label>
</section>
<?php if (session('errors.pass_confirm')): ?>
<section class="invalid-feedback">
<span><?= session('errors.pass_confirm'); ?></span>
</section>
<?php endif; ?>

<button type="submit">Sign Up</button>
<?php if ($config->allowRegistration) : ?>
<a href="<?= url_to('login') ?>" class="link">have an account?SignIn</a>
<?php endif; ?>
</form>
<?= $this->endsection(); ?>