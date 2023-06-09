<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="theme-color" media="(prefers-color-scheme: light)" content="#4e73df" />
<meta name="theme-color" media="(prefers-color-scheme: dark)" content="#4e73df" />
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="/css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="/css/sweetalert2.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="/assets/fonts/remixicon.css" type="text/css" media="all" />
<title><?= $title; ?></title>
<script src="/js/jquery.js"></script>
</head>
<body>
<?= $this->rendersection('main') ?>
<?= $this->include("Admin/Components/header"); ?>
<script>
const toggle = document.querySelector(".toggle");
const menu = document.querySelector(".menu");
const totalCount = querySelector(".totalCount");
toggle.addEventListener("click", function(){
  toggle.classList.toggle("active");
  menu.classList.toggle("active");
})
</script>
<script src="/js/sweetalert2.min.js"></script>
<script src="/js/script2.js"></script>
<script src="/js/script.js"></script>
</body>
</html>