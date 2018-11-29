<?php if ($docs != '') : ?>
 	<div class="card">
        <div class="card-header d-flex justify-content-between">
            <div>
                <span class="h6">Documents (<?= $docs->count() ?>)</span>
            </div>
            <?php if ($prog->children()->filterBy('template','documents') != '') : ?>
	            <a href="<?= $prog->url() ?>/documents">
	            	<small>Voir tous &rsaquo;</small>
	            </a>
	        <?php endif ?>
        </div>
        <div class="card-body">
            <ul class="list-unstyled list-spacing-sm">
            	<?php foreach ($docs as $doc) : ?>
                    <li>
                        <i class="fas fa-file text-muted mr-1"></i>
                        <a href="<?= $doc->url() ?>" download>
                        	<?php if ($doc->niceName() != '') {
                        		echo $doc->niceName();
                        	} else {
                        		echo $doc->filename();
                        	} ?>
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>
    <!--end of card-->
<?php endif ?>