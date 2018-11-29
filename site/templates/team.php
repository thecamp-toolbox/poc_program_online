<?php snippet('header') ?>

	<?php $prog = getProg($page); ?>
	<?php $phases = $prog->children()->filterBy('template', 'phase') ?>
	<?php $team = $prog->children()->filterBy('template', 'team') ?>
	<?php $projects = $prog->children()->filterBy('template', 'projects') ?>

	
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
	                            <table class="table table-hover align-items-center table-borderless">
	                                <thead>
	                                    <tr>
	                                        <th scope="col">Nom</th>
	                                        <th scope="col">Organisation</th>
	                                        <th scope="col">Role</th>
	                                        <th scope="col"></th>
	                                    </tr>
	                                </thead>
	                                <tbody>

	                                	<?php foreach ($page->children() as $p) : ?>
		                                    <tr class="bg-white">
		                                        <th scope="row">
		                                            <div class="media align-items-center">
		                                            	<?php if ($p->hasImages()) : ?>
		                                                	<img alt="Image" src="<?= $p->images()->first()->url() ?>" class="avatar" />
		                                                <?php endif ?>
		                                                <div class="media-body">
		                                                    <span class="h6 mb-0"><?= $p->title() ?>
		                                                    <?php if ($p->teamrole() != '') : ?>
		                                                    	<?php $teamrole = page('roles')->children()->find($p->teamrole()) ?>
		                                                        <span class="ml-1 badge badge-pill text-white" style="background-color:<?= $teamrole->col() ?> !important">
		                                                        	<?= $teamrole->title() ?>
		                                                        </span>
		                                                    <?php endif ?>
		                                                    </span>
		                                                    <span class="text-muted">
		                                                    	<?= $p->job() ?>
		                                                    </span>
		                                                </div>
		                                            </div>
		                                        </th>
		                                        <td>
		                                        	<?php if ($p->company() != '') : ?>
		                                        		<?php if ($p->companyLink() != '') : ?>
		                                        			<a href="<?= $p->companyLink() ?>" target="_blank">
		                                        		<?php endif ?>
		                                        		<?= $p->company() ?>
		                                        		<?php if ($p->companyLink() != '') : ?>
		                                        			</a>
		                                        		<?php endif ?>
		                                        	<?php endif ?>
		                                        </td>
		                                        <td><?= $p->role() ?></td>
		                                        <td>
		                                            <?php if ($p->tw() != '') : ?>
		                                            	<a href="http://twitter.com/<?= $p->tw() ?>" target="_blank">
		                                            		<i class="fab fa-twitter ml-1"></i>
		                                            	</a>
			                                        <?php endif ?>
			                                        <?php if ($p->ln() != '') : ?>
		                                            	<a href="<?= $p->ln() ?>" target="_blank">
		                                            		<i class="fab fa-linkedin ml-1"></i>
		                                            	</a>
			                                        <?php endif ?>
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