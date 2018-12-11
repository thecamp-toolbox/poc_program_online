<?php snippet('header') ?>

	<?php $prog = getProg($page); ?>
	<?php $phases = $prog->children()->filterBy('template', 'phase')->visible() ?>
	<?php $team = $prog->children()->filterBy('template', 'team') ?>
	<?php $projects = $prog->children()->filterBy('template', 'projects') ?>


	<?= snippet('top-nav', array('prog'=>$prog, 'team'=>$team, 'page'=>$page)) ?>

	<div class="container-fluid bg-white">
        <div class="row row-height">
        	<?= snippet('sidebar-left', array('prog'=>$prog)) ?>

        	<!-- content here -->
        	<div class="col-md-10 col-right">
	            <section class="bg-white space-sm">
	                <div class="container">
	                    <div class="row justify-content-between">
	                        <div class="col">
	                            <div class="media align-items-center">
	                            	<?php if ($prog->icone() != '') : ?>
	                            		<?php $theicon = $prog->icone()->toFile() ?>
		                                <img alt="Image" src="<?= $theicon->url() ?>" class="avatar avatar-lg avatar-square rounded" />
		                            <?php endif ?>
	                                <div class="media-body">
	                                    <h1 class="mb-0"><?= $prog->title() ?></h1>
	                                    <h2 class="lead mb-2"><?= $prog->baseline() ?></h2>
	                                    <div class="d-flex align-items-center">
	                                        <span class="badge badge-success mr-3">On Track</span>
	                                        <ul class="list-inline text-small d-inline-block">
																							<?php if (count($team->children()) > 0) : ?>
	                                            	<li class="list-inline-item"><i class="fas fa-users mr-1"></i>	<?= count($team->children()); ?></li>
																							<?php endif; ?>
																							<li class="list-inline-item"><i class="fas fa-calendar-alt mr-1"></i>6</li>
	                                            <?php if ($prog->sdgs() != '') : ?>
	                                            	<li class="list-inline-item">
	                                            		<i class="fas fa-globe mr-1"></i>
							                       		<?php foreach ($prog->sdgs()->split() as $sdg) : ?>
							                       			<?php $thesdg = page('sdgs')->children()->find($sdg) ?>
							                       			<a href="<?= $thesdg->ink() ?>" target="_blank">
									                       		ODD<?= $thesdg->num() ?>
									                       	</a>
									                    <?php endforeach ?>
								                	</li>
							                    <?php endif ?>
	                                        </ul>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                        <!--end of col-->
	                    </div>
	                    <!--end of row-->
	                </div>
	                <!--end of container-->
	            </section>
	            <!--end of section-->
	            <section class="bg-white space-sm flush-with-above">
	                <div class="container">
	                    <div class="row mb-3">
	                        <div class="col">
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
	                        </div>
	                        <!--end of col-->
	                    </div>
	                    <!--end of row-->
	                    <div class="row text-center">
	                    	<?php foreach ($phases as $phase) : ?>
		                        <div class="col mb-3">
		                            <span>
		                            	<span class="step-circle step-circle-sm <?php e(isPhaseOver($phase), 'bg-success') ?>"><?= $phase->num() ?></span>
		                            	<?= $phase->title() ?>
		                            </span>
		                            <br>
		                            <small class="text-muted">
		                            	<?php e(isPhaseOver($phase), 'Fini', 'Objectif') ?> :
		                            	<?php if ($phase->target() != '') {
		                            		echo $phase->date('d/m/y','target');
		                            	} else {
		                            		echo 'TBD';
		                            	} ?>
		                            </small>

		                            <hr class="tiny">
		                            <?php if ($phase->hasChildren()) : ?>
			                            <small class="justify-left">
			                            	<?php foreach ($phase->children() as $beacon) : ?>
				                            	<a href="<?= $beacon->url() ?>">
				                            		<i class="<?php e(isPhaseOver($beacon), 'fas fa-check', 'far fa-circle') ?> mr-1"></i><?= $beacon->title() ?><br>
				                            	</a>
				                            <?php endforeach ?>
			                            </small>
			                        <?php endif ?>
		                        </div>
		                        <!--end of col-->
		                    <?php endforeach ?>
	                    </div>
	                    <!--end of row-->
	                </div>
	                <!--end of container-->
	            </section>
	            <!--end of section-->
	            <section class="container bg-white space-sm flush-with-above ">
	            	<div class="alert alert-primary d-flex justify-content-between align-items-center" role="alert">
                        <span>
                            <i class="fas fa-bell mr-2"></i>Pour le prochain atelier : préparer les persona
                        </span>
                        <button class="btn btn-primary">Envoyer</button>
                    </div>
                </section>
                <section class="space-sm flush-with-above">
	                <div class="container">
	                    <div class="row justify-content-between">
	                        <div class="col-12 col-md-8 mb-3">
	                        	<article>
		                        	<?= $prog->text()->kirbytext() ?>
			                    </article>
	                        </div>

	                        <!-- right sidebar -->
	                        <div class="col-12 col-md-4 float-right">
	                        	<!-- btn group old
	                            <div class="btn-group mb-2">
	                                <button type="button" class="btn btn-success">Téléchargements</button>
	                                <button type="button" class="btn btn-success dropdown-toggle dropdown-toggle-split dropdown-toggle-no-arrow" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                                    <i class="fas fa-ellipsis-v "></i>
	                                    <span class="sr-only">Toggle Dropdown</span>
	                                </button>
	                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-sm">
	                                    <a class="dropdown-item" href="#">Action</a>
	                                    <a class="dropdown-item" href="#">Another action</a>
	                                    <a class="dropdown-item" href="#">Something else here</a>
	                                    <div class="dropdown-divider"></div>
	                                    <a class="dropdown-item" href="#">Separated link</a>
	                                </div>
		                        </div>
		                       	end of btn-group-->

		                       	<?php if ($prog->sdgs() != '') : ?>
		                       		<?php foreach ($prog->sdgs()->split() as $sdg) : ?>
		                       			<?php $thesdg = page('sdgs')->children()->find($sdg) ?>
				                       	<div class="card">
				                       		<a href="<?= $thesdg->ink() ?>" target="_blank">
				                       			<img class="card-img" src="<?= $thesdg->images()->first()->url() ?>">
				                       		</a>
				                       	</div>
				                    <?php endforeach ?>
			                    <?php endif ?>

			                    <?php $team = $team->limit(4) ?>
			                    <?php snippet('team-card', array('prog'=>$prog, 'team'=>$team)) ?>

		                        <?php $docs = $prog->files()->limit(4) ?>
		                        <?php snippet('docs-card', array('docs'=>$docs, 'prog'=>$prog)) ?>

                    		</div>
                    	</div><!-- end row -->
                    </div><!-- end container -->
	            </section>

	        </div>
        </div>
    </div>

<?php snippet('footer') ?>
