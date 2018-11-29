<?php snippet('header') ?>


<div class="container-fluid">

	<?php if (page('programs')->hasChildren()) : ?>
		<?php foreach (page('programs')->children() as $p) : ?>
			<a href="<?= $p->url() ?>"><?= $p->title() ?></a>
		<?php endforeach ?>
	<?php endif ?>

</div>

<?php snippet('footer') ?>