<?php if ($team != '') : ?>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <span class="h6">
                	<?php if ($page->template() == 'program') : ?>
                		Équipe (<?= count($team->children()) ?>)
                	<?php else : ?>
                		Participants (<?= count($team) ?>)
                	<?php endif ?>
                </span>
            </div>
            <?php $totalteam = $prog->children()->filterBy('template', 'team')->first() ?>

            <?php if ($page->template() == 'program') : ?>
              <?php if ($totalteam != '') : ?>
                  <a href="<?= $totalteam->url() ?>">
                  	<small>Voir tous &rsaquo;</small>
                  </a>
              <?php endif ?>
            <?php endif ?>

        </div>
        <div class="card-body">
        	<?php if ($team->children() != '') : ?>
        		<?php $team = $team->children() ?>
        	<?php endif ?>
            <ul class="list-unstyled list-spacing-sm">
            	<?php foreach ($team->shuffle()->limit(5) as $p) : ?>
                    <li>
                        <a class="media" href="#">
                        	<?php if ($p->hasImages()) : ?>
                                <?php $image = $p->images()->first()->crop(100,100) ?>
                                <img alt="Image" src="<?= $image->url() ?>" class="avatar avatar-sm mr-3" />
                            <?php else : ?>
                                <img alt="Image" src="<?= $site->url() ?>/assets/images/avatar.png" class="avatar avatar-sm mr-3" />
                            <?php endif ?>
                            <div class="media-body">
                                <span class="h6 mb-0">
                                	<?= $p->title() ?>
                                </span>
                                <span class="text-muted">
                                	<?= $p->role() ?>
                                </span>
                            </div>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!-- end card -->
<?php endif ?>
