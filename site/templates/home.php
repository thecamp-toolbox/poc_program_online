<?php snippet('header') ?>

<?php $progs = page('programs')->children()->visible() ?>

<?php if ($progs != '') : ?>

<div class="container-fluid">
    <section>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col">
                    <h1 class="h2 mb-2">Programmes ouverts en cours</h1>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
    <!--end of section-->
    <section class="flush-with-above">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <span class="text-muted text-small"><?= $progs->count() ?> Résultats</span>
                        </div>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
            <div class="row">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-borderless align-items-center">
                            <thead>
                                <tr>
                                    <th scope="col">Nom</th>
                                    <th scope="col"></th>
                                    <th scope="col">Progrès</th>
                                    <th scope="col">Phase</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                            	
								<?php foreach (page('programs')->children() as $p) : ?>
	                                <tr class="bg-white">
	                                    <th scope="row">
	                                        <a class="media align-items-center" href="<?= $p->url() ?>">

	                                        	<?php if ($p->icone() != '') : ?>
				                            		<?php $theicon = $p->icone()->toFile() ?>
					                                <img alt="Image" src="<?= $theicon->url() ?>" class="avatar avatar-square rounded" />
					                            <?php endif ?>
	                                            <div class="media-body">
                                                	<span class="h6 mb-0">
                                                		<?= $p->title() ?>
                                                	</span>
	                                                
	                                            </div>
	                                        </a>
	                                    </th>
	                                    <td class="w-25">
	                                    	<span class="text-muted">
                                            	<?= $p->baseline() ?>
                                            </span>
	                                    </td>
	                                    <td class="w-50">
	                                    	<?php $count = 1 ?>
	                                    	<?php $phases = $p->children()->filterBy('template','phase') ?>
	                                    	<?php if ($phases != '') : ?>
	                                    		<?php snippet('progress-bar', array('phases'=>$phases)) ?>
				                            <?php endif ?>
	                                    </td>
	                                    <td>
	                                    	<?php if ($phases != '') : ?>
	                                    		<?php foreach ($phases as $phase) : ?>
	                                    			<?php if (isPhaseOver($phase)) : ?>
	                                    				<?php $thephase = $phase->title() ?>
	                                    			<?php endif ?>
	                                    		<?php endforeach ?>
	                                    		<?= $thephase ?>
	                                    	<?php endif ?>
	                                    </td>
	                                </tr>
	                                <tr class="table-divider"></tr>

                                <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <!--end of col-->
            </div>
            <!--end of row-->
        </div>
        <!--end of container-->
    </section>
          

	<?php if (page('programs')->hasChildren()) : ?>
		<?php foreach (page('programs')->children() as $p) : ?>
			<a href="<?= $p->url() ?>"><?= $p->title() ?></a>
		<?php endforeach ?>
	<?php endif ?>

</div>

<?php endif ?>

<?php snippet('footer') ?>