<?php snippet('header') ?>

	<?php $prog = getProg($page); ?>
	<?php $phases = $prog->children()->filterBy('template', 'phase') ?>
	<?php $team = $prog->children()->filterBy('template', 'team') ?>
	<?php $projects = $prog->children()->filterBy('template', 'projects') ?>
	<?php $documents = $prog->files() ?>

	
	<?= snippet('top-nav', array('prog'=>$prog, 'team'=>$team)) ?>

	<div class="container-fluid bg-white">
        <div class="row row-height">
        	<?= snippet('sidebar-left', array('prog'=>$prog)) ?>

        	<!-- content here -->
        	<div class="col-md-10 col-right">
	            
	            <section class="people">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <span class="text-muted text-small"><?= $documents->count() ?> résultats</span>
                                </div>
                                <form class="d-flex align-items-center">
                                    <span class="mr-2 text-muted text-small text-nowrap">Classer par :</span>
                                    <select class="custom-select">
                                        <option value="alpha">Alphabetique</option>
                                        <option value="old-new" selected>Date</option>
                                        <option value="status">Type</option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                    <div class="row">
                        <div class="col">
                            <table class="table table-borderless table-hover align-items-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Titre</th>
                                        <th scope="col">Créateur</th>
                                        <th scope="col">Date d'ajout</th>
                                        <th scope="col"></th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php foreach ($documents as $doc) : ?>
	                                    <tr class="bg-white">
	                                        <th scope="row">
	                                            <a class="media align-items-center" href="<?= $doc->url() ?>" download>
	                                            	<?php $type = $doc->type() ?>
	                                            	<?php if ($type == 'image') {
	                                            		$type = 'image';
	                                            	} else if ($type == 'archive') {
	                                            		$type = 'folder';
	                                            	} else if ($type == 'video') {
	                                            		$type = 'film';
	                                            	} else {
	                                            		$type = 'doc';
	                                            	} ?>
	                                                <img alt="Image" src="<?= $site->url() ?>/assets/images/<?= $type ?>.jpg" class="avatar rounded avatar-sm" />
	                                                <div class="media-body">
	                                                    <span class="h6 mb-0">
	                                                    	<?php if($doc->niceName() != '') {
	                                                    		echo $doc->niceName();
	                                                    	} else {
	                                                    		echo $doc->fileName();
	                                                    	} ?>
	                                                    	<?= $type ?>
	                                                    </span>
	                                                    <span class="text-muted uppercase"><?= $doc->extension() ?> (<?= $doc->niceSize() ?>)</span>
	                                                </div>
	                                            </a>
	                                        </th>
	                                        <td>
	                                        	<?= $doc->author() ?>
	                                        </td>
	                                        <td>
	                                        	<?= $doc->date('d/m/y','creationDate') ?>
	                                        </td>
	                                        <td>
	                                        	<?php if ($doc->fileType() != '') : ?>
	                                        		<?php $type = $doc->fileType() ?>
	                                        		<?php if ($type == 'communication') {
	                                        			$b = 'badge-success';
	                                        		} else if ($type == 'template') {
	                                        			$b = 'badge-warning';
	                                        		} else {
	                                        			$b = 'badge-danger';
	                                        		} ?>
		                                            <span class="badge badge-pill <?= $b ?> capitalize">
		                                            	<?= $type ?>
		                                        	</span>
		                                        <?php endif ?>
	                                        </td>
	                                        <td>
	                                            <i class="fas fa-download"></i>
	                                        </td>
	                                    </tr>
	                                    <tr class="table-divider"></tr>
	                                <?php endforeach ?>


                                </tbody>
                            </table>
                        </div>
                        <!--end of col-->
                    </div>
                    <!--end of row-->
                </div>
                <!--end of container-->
            </section>
            <!--end of section-->

	        </div>
        </div>
    </div>

<?php snippet('footer') ?>