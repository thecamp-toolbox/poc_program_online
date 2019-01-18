<?php if ($docs != '') : ?>
 	<div class="card docs-card">
        <div class="card-header d-flex justify-content-between">
            <div>
              <?php $totaldocs = $page->files(); ?>
                <span class="h6">Documents (<?= $totaldocs->count() ?>)</span>
            </div>
            <?php if ($prog->children()->filterBy('template','documents') != '') : ?>
	            <a href="<?= $prog->url() ?>/documents">
	            	<small>Voir tous &rsaquo;</small>
	            </a>
	        <?php endif ?>
        </div>
        <div class="card-body">
              <table class="table table-borderless table-hover align-items-center">
                  <tbody>
                    <?php foreach ($docs as $doc) : ?>
                        <tr class="bg-white">
                            <th scope="row">
                                <a class="media align-items-center" href="<?= $doc->url() ?>" download>
                                  <?php $type = $doc->type() ?>
                                  <?php if ($type == 'image') {
                                    $type = 'image';
                                  } else if ($type == 'archive') {
                                    $type = 'folder';
                                  } else if ($type == 'video') {
                                    $type = 'film';
                                  } else {
                                    $type = 'doc';
                                  } ?>
                                    <img alt="Image" src="<?= $site->url() ?>/assets/images/<?= $type ?>.jpg" class="avatar rounded avatar-sm" />
                                    <div class="media-body">
                                        <span class="text-muted mb-0">
                                          <?php if($doc->niceName() != '') {
                                            echo $doc->niceName();
                                          } else {
                                            echo $doc->fileName();
                                          } ?>
                                          <?= $type ?>
                                        </span>
                                    </div>
                                </a>
                            </th>

                            <td>
                                <a class="media align-items-center" href="<?= $doc->url() ?>" download><i class="fas fa-download"></i></a>
                            </td>
                        </tr>
                        <tr class="table-divider"></tr>
                    <?php endforeach ?>
                  </tbody>
              </table>
        </div>
    </div>
    <!--end of card-->
<?php endif ?>
