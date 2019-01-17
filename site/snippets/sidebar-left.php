<?php $tools = $prog->toolbox();?>

<nav class="col-md-2 col-left col-sidebar">
  <div class="sidebar-sticky">
  	<div class="row">
      <div class="sidebar-phase">
        <?php $phases = $prog->children()->filterBy('template', 'phase') ?>
    		<?php if ($phases != '') : ?>
    			<?php foreach ($phases->invisible() as $phase) : ?>
    				<?= snippet('phase-menu', array('phase'=>$phase, 'prog'=>$prog)) ?>
    			<?php endforeach ?>
    			<?php foreach ($phases->visible() as $phase) : ?>
    				<?= snippet('phase-menu', array('phase'=>$phase, 'prog'=>$prog)) ?>
    			<?php endforeach ?>
    		<?php endif ?>
      </div>
      <? if(!$tools->empty()):?>
    		<!-- link to tools -->
    		<div class="sidebar-tools list-group list-group-flush w-100" id="listz" role="tablist">
    			<span class="list-group-item tools">
    				<ul class="list-inline text-small d-inline-block">
              <?php foreach ($tools->toStructure() as $tool) : ?>
                <a target="_blank" href="<?= $tool->url() ?>">
                  <li class="list-inline-item"><i class="fab fa-<?= $tool->icon() ?> mr-1"></i></li>
                </a>
              <?php endforeach ?>
              </ul>
          </span>
    		</div>
      <? endif; ?>

	 </div><!-- end row -->
  </div>
</nav><!-- end col -->
