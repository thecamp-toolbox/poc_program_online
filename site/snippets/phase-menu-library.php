<a class="list-group-item list-group-item-action <?= isPageActive($library, $page) ?>" href="<?= $library->url() ?>" role="tab">
  <span class="d-flex justify-content-between align-items-center">
    <p><?= $library->title() ?></p>
    <i class="fas fa-lightbulb"></i>
  </span>
</a>
