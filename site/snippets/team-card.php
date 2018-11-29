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
            <?php if ($totalteam != '') : ?>
                <a href="<?= $totalteam->url() ?>">
                	<small>Voir tous &rsaquo;</small>
                </a>
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
                                <img alt="Image" src="<?= $p->images()->first()->url() ?>" class="avatar avatar-sm mr-3" />
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