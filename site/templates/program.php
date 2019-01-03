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
							<?php

							 if (!empty($prog->alert()->kirbytext()->value)) : ?>
									<section class="container bg-white space-sm flush-with-above ">
		            	<div class="alert alert-primary d-flex justify-content-between align-items-center" role="alert">
                    <div class="col-md-1">
											<svg width="30px" height="30px" viewBox="0 0 50 54" class="bell" style="margin: 0 auto;display: block;color: white !important;margin-left: 10px;">
													<path d="M1.13063517,45.0453694 C1.88439195,45.7991262 2.80138269,46.1760046 3.82399539,46.1760046 L17.2955975,46.1760046 C17.2955975,48.331653 18.0493543,50.110423 19.5592683,51.6179365 C21.0667819,53.1254501 22.8983629,53.8816074 25.0012002,53.8816074 C27.1544481,53.8816074 28.9332181,53.1254501 30.4431322,51.6179365 C31.9506457,50.110423 32.7044025,48.331653 32.7044025,46.1760046 L46.1760046,46.1760046 C47.1986173,46.1760046 48.115608,45.7991262 48.8693648,45.0453694 C49.6231216,44.2892122 50,43.3746219 50,42.3496087 C46.1760046,39.1185367 43.3194104,35.1313073 41.379807,30.3879207 C39.4402036,25.6469346 38.4704018,20.6370925 38.4704018,15.408805 C38.4704018,12.0697105 37.5006001,9.48197225 35.6138077,7.54236881 C33.6742042,5.54995439 31.033655,4.41931922 27.6945605,3.98722934 C27.8553939,3.66316194 27.9106054,3.28628355 27.9106054,2.90940516 C27.9106054,2.10043689 27.639349,1.40189159 27.0488262,0.86177925 C26.5087138,0.268855922 25.807768,0 25.0012002,0 C24.192232,0 23.5464977,0.268855922 23.0063853,0.86177925 C22.413462,1.40189159 22.1446061,2.10043689 22.1446061,2.90940516 C22.1446061,3.28628355 22.1974171,3.66316194 22.360651,3.98722934 C19.019156,4.41931922 16.3786068,5.54995439 14.4390033,7.54236881 C12.4993999,9.48197225 11.5295982,12.0697105 11.5295982,15.408805 C11.5295982,20.6370925 10.5597964,25.6469346 8.620193,30.3879207 C6.68058956,35.1313073 3.82399539,39.1185367 0,42.3496087 C0,43.3746219 0.376878391,44.2892122 1.13063517,45.0453694 L1.13063517,45.0453694 Z M20.2050026,45.6911037 C20.52907,45.6911037 20.6899035,45.8519372 20.6899035,46.1760046 C20.6899035,47.3618513 21.1195929,48.384464 21.9837726,49.1934322 C22.7903404,50.0552115 23.8153536,50.4873014 25.0012002,50.4873014 C25.3228672,50.4873014 25.4861011,50.6481348 25.4861011,50.9722022 C25.4861011,51.2938691 25.3228672,51.4571031 25.0012002,51.4571031 C23.5464977,51.4571031 22.3054395,50.9169907 21.2828268,49.894378 C20.2578136,48.8693648 19.7201018,47.6307072 19.7201018,46.1760046 C19.7201018,45.8519372 19.8809352,45.6911037 20.2050026,45.6911037 L20.2050026,45.6911037 Z"></path>
											</svg>
										</div>
										<div class="col-md-11"><?= $prog->alert()->kirbytext() ?></div>
                  </div>
	                </section>
								<?php endif; ?>
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
