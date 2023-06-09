<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="theme-color" media="(prefers-color-scheme: light)" content="#4e73df" />
<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#4e73df" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="/css/errorpage.css" type="text/css" media="all" />
<link rel="stylesheet" href="/assets/fonts/remixicon.css" type="text/css" media="all" />
<title><?= lang('Errors.pageNotFound') ?></title>
</head>
<body>
<div class="wrap">
  <img src="/assets/image/4.0.4.png" alt="Errors 4.0.4" loading="lazy"/>
  <h3>Opps...</h3>
<p>
<?php if (ENVIRONMENT !== 'production') : ?>
<?= nl2br(esc($message)) ?>
<?php else : ?>
<?= lang('Errors.sorryCannotFind') ?>
<?php endif ?>
</p>
</div>
</body>
</html>