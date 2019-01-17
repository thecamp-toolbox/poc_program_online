<div class="progress">
	<!-- Ajouter curseur -->
	<?php $count = 1 ?>
	<?php foreach ($phases as $phase) : ?>
		<?php if (isPhaseOver($phase)) : ?>
			<div class="progress-bar bg-success" role="progressbar" style="width:<?= 1/$phases->count()*100 ?>%" aria-valuenow="<?= 1/$phases->count()*100 ?>" aria-valuemin="0" aria-valuemax="100">
        		100%
			</div>
		<?php endif ?>
		<?php $count++ ?>
	<?php endforeach ?>
</div>