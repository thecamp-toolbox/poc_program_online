<?php 

function getProg($page) {
	if ($page->template() == 'program') {
		$prog = $page;
	} else if ($page->parent()->template() == 'program') {
		$prog = $page->parent();
	} else if ($page->parent()->parent()->template() == 'program') {
		$prog = $page->parent()->parent();
	}
	return $prog;
}

function isPhaseOver($phase) {
	if ($phase->target() != '') {
		if ($phase->date('U','target') > time()) {
    		return false;
    	} else {
    		return true; 
    	}
	} else {
		return false; 
	}
}

function isPageActive($thelink,$apage) {
	if ($thelink->url() == $apage->url()) {
		return 'active';
	} else {
		return '';
	}
}

function phaseState($phase) {
	$beacons = $phase->children()->filterBy('template','beacon');
	if ($beacons != '') {
		return '';
	} else {
		return '';
	}
}

?>