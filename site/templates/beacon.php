<?php snippet('header') ?>

	<?php $prog = getProg($page); ?>
	<?php $phases = $prog->children()->filterBy('template', 'phase')->visible() ?>
	<?php $team = $prog->children()->filterBy('template', 'team') ?>
	<?php $projects = $prog->children()->filterBy('template', 'projects') ?>
	<?php $docs = $page->files() ?>

	
	<?= snippet('top-nav', array('prog'=>$prog, 'team'=>$team)) ?>

	<div class="container-fluid bg-white">
        <div class="row row-height">
        	<?= snippet('sidebar-left', array('prog'=>$prog)) ?>

        	<!-- content here -->
        	<div class="col-md-10 col-right">

	                <div class="container">
	                	<section class="space-sm flush-with-above">
                    		<h2 class="mb-0"><?= $page->title() ?></h2>
                    		<div class="d-flex align-items-center text-small">
                    			<span class="mr-2">
	                        		<?php $mode = page('modes')->children()->find($page->format()) ?>
	                        		<i class="fas fa-<?= $mode->fa() ?> mr-1"></i>
	                        		<?= $mode->title() ?>
                        		</span>

                        		<?php e(isPhaseOver($page), 'Fini', 'Objectif') ?> : 
                        		<?php if ($page->target() != '') {
                            		echo $page->date('d/m/y','target'); 
                            	} else {
                            		echo 'TBD';
                            	} ?>
                            </div>
                        </section>
	                    <div class="row justify-content-between">
	                        <div class="col-12 col-md-8 mb-3">
		                        <article>
		                        	<?= $page->text()->kirbytext() ?>
			                    </article>
	                        </div>
	                        
	                        <!-- right sidebar -->
	                        <div class="col-12 col-md-4 float-right">
								<?php $participants = $page->team()->split() ?>	
								<?php $team = new Pages(); ?>	
								<?php foreach ($participants as $p) : ?>
									<?php $thep = $page->parents()->find($prog)->children()->filterBy('template', 'team')->first()->find($p) ?>
									<?php $team->add($thep) ?> 
								<?php endforeach ?>

								<?php snippet('team-card', array('prog'=>$prog, 'team'=>$team)) ?>

		                        <?php $docs = $page->files()->limit(4) ?>
		                        <?php snippet('docs-card', array('docs'=>$docs, 'prog'=>$prog)) ?>
		                        
                    		</div>
                    	</div><!-- end row -->
                    </div><!-- end container -->

	        </div>
        </div>
    </div>

<?php snippet('footer') ?>