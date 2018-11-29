<div class="container-fluid">
    <div class="row">
    	<div class="bg-color col-md-2">
    		<div class="row">
	        	<nav class="navbar navbar-expand-lg navbar-dark bg-light nav-left" style="background-color: #0060a7 !important;">
                    <a class="navbar-brand " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    	<?php if ($prog->icone() != '') : ?>
                        	<?php $theicon = $prog->icone()->toFile() ?>
                    		<img src="<?= $theicon->url() ?>" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
                        	<?= $prog->title() ?>
                        <?php endif ?>
                    </a>

                    <?php if ($prog->hasSiblings()) : ?>
                        <div class="dropdown-menu w-100" aria-labelledby="navbarDropdown">
                        	<?php foreach ($prog->siblings() as $p) : ?>
						        <a class="dropdown-item" href="<?= $p->url() ?>">
						        	<?php if ($p->icone() != '') : ?>
                        				<?php $theicon = $p->icone()->toFile() ?>
						          		<img src="<?= $theicon->url() ?>" width="30" height="30" class="d-inline-block align-top mr-2" alt="">
						          	<?php endif ?>
		                            <?= $p->title() ?>
						        </a>
						    <?php endforeach ?>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="http://thecamp.fr">thecamp</a>
				        </div>
				    <?php endif ?>
                </nav>
            </div>
    	</div>
    	<div class="col-md-10">
    		<div class="row">
	        	<nav class="navbar navbar-expand-lg navbar-light bg-light nav-right">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= $prog->url() ?>" class="nav-link <?= isPageActive($prog, $page) ?>">Présentation</a>
                            </li>
                            <?php if ($team != '') : ?>
                                <?php $team = $prog->children()->filterBy('template','team')->first() ?>
                                <li class="nav-item">
                                    <a href="<?= $team->url() ?>" class="nav-link <?= isPageActive($team, $page) ?>">Équipe</a>
                                </li>
                            <?php endif ?>
                            <?php $docs = $prog->children()->filterBy('template','documents')->first() ?>
                            <?php if ($docs != '') : ?>
                                <li class="nav-item">
                                    <a href="<?= $docs->url() ?>" class="nav-link <?= isPageActive($docs, $page) ?>">Documents</a>
                                </li>
                            <?php endif ?>
                            <?php $projects = $prog->children()->filterBy('template','project') ?>
                            <?php if ($projects != '') : ?>
                                <li class="nav-item">
                                    <a href="" class="nav-link <?php e($page->isOpen(), 'active') ?>">Projets</a>
                                </li>
                            <?php endif ?>
                        </ul>

                        <!-- intégration dropdown profile 
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle dropdown-toggle-no-arrow p-lg-0" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img alt="Image" src="assets/img/avatar-male-3.jpg" class="avatar avatar-xs" />
                                    <span class="badge badge-danger">8</span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" aria-labelledby="dropdown01">
                                    <a class="dropdown-item" href="#">Notifications <span class="badge badge-danger">8</span></a>
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Settings</a>
                                    <a class="dropdown-item" href="#">Groups</a>
                                    <a class="dropdown-item" href="#">Log out</a>
                                </div>
                            </li>
                        </ul>
                    	-->

                    </div>
                    <!--end nav collapse-->
                </nav>
            </div><!-- end row -->
        </div><!-- end col -->
	</div><!-- end row -->
</div><!-- end container-fluid -->