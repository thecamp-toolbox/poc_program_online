<a class="list-group-item list-group-item-action <?= isPageActive($beacon, $page) ?>" href="<?= $beacon->url() ?>" role="tab">
  <span class="d-flex justify-content-between align-items-center">
    <p><?= $beacon->title() ?></p>
    <i class="<?php e(isPhaseOver($beacon), 'fas fa-check-circle', 'far fa-circle') ?>"></i>
  </span>
  <small>
    <?php $mode = page('modes')->children()->find($beacon->format()) ?>
  <?php if(!empty($mode)) : ?>
    <i class="fas fa-<?= $mode->fa() ?> opacity-50 mr-1"></i>
    <?php if ($beacon->target() != '') : ?>
      <?= $beacon->date('d/m/y','target'); ?>
    <?php endif ?>
  <?php endif ?>
  </small>
</a>
