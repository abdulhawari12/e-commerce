<?php $pager->setSurroundCount(1); ?>
<section class="paginate">
  <?php if ($pager->hasPrevious()) : ?>
  <a href="<?= $pager->getPrevious() ?>" class="previous">
    <i class="ri-lg ri-arrow-left-circle-line"></i>
  </a>
  <?php endif ?>
  <?php foreach ($pager->links() as $link) : ?>
  <a href="<?= $link['uri'] ?>" class="items  <?= $link['active'] ? 'active' :
    '' ?>"><?= $link['title'] ?></a>
  <?php endforeach ?>
  <?php if ($pager->hasNext()) : ?>
  <a href="<?= $pager->getNext() ?>" class="next">
    <i class="ri-lg ri-arrow-right-circle-line"></i>
  </a>
  <?php endif ?>
</section>