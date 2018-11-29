<?php snippet('header') ?>

<div class="container pt-3 pb-3">
	<h1><?php echo $page->title()->html() ?></h1>
	<?= $page->text()->kirbytext() ?>

	<?php if ($page->hasChildren()) : ?>
		<?php foreach ($page->children() as $p) : ?>
			<a href="<?= $p->url() ?>"><?= $p->title() ?></a>
		<?php endforeach ?>
	<?php endif ?>
</div>

<?php snippet('footer') ?>