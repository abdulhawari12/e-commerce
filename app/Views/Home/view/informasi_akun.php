<?= $this->extend("Home/Layout/templates") ?>
<?= $this->section("main") ?>
<?= $this->include("Home/Components/setting_header") ?>
<section class="setting-container">
  <form action="/users/edit/<?= user_id(); ?>" method="post" enctype="multipart/form-data">
    <?= csrf_field() ?>
    <section class="setting-profile">
      <img src="/assets/image/profile/<?= user()->profile ?>" alt="My Profile"
      loading="lazy" id="img"  />
    <input type="file" class="form-profile" id="profile" name="profile" value="" />
  <input type="hidden" name="sampulLama" value="<?= user()->profile?>" />
  <input type="hidden" name="profile" value="" id="picture" />
<label for="profile">Edit profile<i class="ri-lg ri-image-edit-fill"></i></label>
</section>
<?php if (validation_show_error("profile")) : ?>
<section class="invalid-feedback">
  <span><?= validation_show_error("profile");?></span>
</section>
<?php endif; ?>
<section class="form-group">
<input type="text" name="username" class="form-input" placeholder=" " id="p1"
value="<?= user()->username ?>" />
<label for="p1">Username</label>
</section>
<section class="form-group">
<input type="email" name="email" class="form-input" placeholder=" " id="p2"
value="<?= user()->email ?>" />
<label for="p2">Alamat Email</label>
</section>
<section class="form-group">
<input type="text" name="alamat" class="form-input" placeholder=" " id="p3"
value="<?= user()->alamat ?>" />
<label for="p3">Alamat</label>
</section>
<button type="submit" class="submit">Simpan Data</button>
</form>
</section>
<?= $this->endsection() ?>