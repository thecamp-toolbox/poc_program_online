<div class="list-group list-group-flush w-100" id="list<?= $phase->title() ?>" role="tablist">
	<a href="#" class="list-group-item list-head text-dark">
	    <i class="fas fa-caret-down mr-1"></i>
	    <?php if ($phase->isVisible()) {
	    	echo $phase->num().'. ';
	    } ?>
	    <?= $phase->title() ?>
	</a>
	<?php if ($phase->hasChildren()) : ?>
		<?php foreach ($phase->children() as $child) :?>

			<?php if ($child->template() == "beacon"): ?>
					<?= snippet('phase-menu-beacon', array('phase'=>$phase, 'prog'=>$prog, 'beacon' => $child)) ?>
			<?php elseif ($child->template() == "library"): ?>
					<?= snippet('phase-menu-library', array('phase'=>$phase, 'prog'=>$prog, 'library' => $child)) ?>
			<?php endif; ?>

		<?php endforeach ?>
	<?php endif ?>
</div>
