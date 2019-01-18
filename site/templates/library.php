<?php snippet('header') ?>

<?php $prog = getProg($page); ?>
<?php $team = $prog->children()->filterBy('template', 'team') ?>
<?php $libraryID = $page->libraryID()->value; ?>

	<?= snippet('top-nav', array('prog'=>$prog, 'team'=>$team)) ?>

			<div class="container-fluid bg-white">
	        <div class="row row-height">
	        	<?= snippet('sidebar-left', array('prog'=>$prog)) ?>

	        	<!-- content here -->
	        	<div class="col-md-10 col-right">

								<?php if(!empty($libraryID)): ?>

									<div style='text-align:left;' class="list-wrapper" id='ly_wrap_<?= $libraryID ?>' ><script type='text/javascript' src='https://list.ly/plugin/show?list=<?= $libraryID ?>&layout=gallery&per_page=25&show_list_headline=false&show_list_badges=false&show_list_stats=false&show_list_title=false&show_author=false&show_list_description=false&show_list_tools=false&show_item_tabs=false&show_item_layout=false&show_item_numbers=false&show_item_timestamp=false&show_item_relist=false&show_item_comments=false&show_item_sort=false'></script></div>

									<?php else: ?>

												<h4>Please specify a list ID in the panel to display the library</h4>

								<?php endif; ?>
						 </div>
	        </div>
	    </div>

<?php snippet('footer') ?>
