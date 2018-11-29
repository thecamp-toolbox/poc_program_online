<div class="list-group list-group-flush w-100" id="list<?= $phase->title() ?>" role="tablist">
	<a href="#" class="list-group-item list-head text-dark">
	    <i class="fas fa-caret-down mr-1"></i>
	    <?php if ($phase->isVisible()) {
	    	echo $phase->num().'. ';
	    } ?>
	    <?= $phase->title() ?>
	</a>
	<?php if ($phase->hasChildren()) : ?>
		<?php foreach ($phase->children() as $beacon) : ?>
		  	<a class="list-group-item list-group-item-action <?= isPageActive($beacon, $page) ?>" href="<?= $beacon->url() ?>" role="tab">
		  		<span class="d-flex justify-content-between align-items-center">
		  			<p><?= $beacon->title() ?></p>
		  			<i class="<?php e(isPhaseOver($beacon), 'fas fa-check-circle', 'far fa-circle') ?>"></i>
		  		</span>
			  	<small>
			  		<?php $mode = page('modes')->children()->find($beacon->format()) ?>
			  		<i class="fas fa-<?= $mode->fa() ?> opacity-50 mr-1"></i>
			  		<?php if ($beacon->target() != '') : ?>
				  		<?= $beacon->date('d/m/y','target'); ?>
				  	<?php endif ?>
			  	</small>
			</a>
		<?php endforeach ?>
	<?php endif ?>
</div>