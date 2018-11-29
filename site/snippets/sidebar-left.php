<nav class="col-md-2 col-left">
  <div class="sidebar-sticky">
  	<div class="row">
  		<?php $phases = $prog->children()->filterBy('template', 'phase') ?>
  		<?php if ($phases != '') : ?>
  			<?php foreach ($phases->invisible() as $phase) : ?>
  				<?= snippet('phase-menu', array('phase'=>$phase, 'prog'=>$prog)) ?>
  			<?php endforeach ?>
  			<?php foreach ($phases->visible() as $phase) : ?>
  				<?= snippet('phase-menu', array('phase'=>$phase, 'prog'=>$prog)) ?>
  			<?php endforeach ?>
  		<?php endif ?>

  		<!-- link to tools -->
		<div class="list-group list-group-flush w-100" id="listz" role="tablist">
			<span class="list-group-item tools">
				<ul class="list-inline text-small d-inline-block">
                    <a href="">
                    	<li class="list-inline-item"><i class="fab fa-dropbox mr-1"></i></li>
                    </a>
                    <a href="">
                        <li class="list-inline-item"><i class="fas fa-book mr-1"></i></li>
                    </a>
                    <a href="">
                        <li class="list-inline-item"><i class="fab fa-slack mr-1"></i></li>
                    </a>
                </ul>
			    
            </span>
		</div>					
	</div><!-- end row -->
  </div>
</nav><!-- end col -->