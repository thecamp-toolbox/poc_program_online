$('.collapse').collapse();

collapseList($('.list-head'));

collapseList($('.list-head').first());

$('.list-head').click(function() {
	collapseList($(this));
});

function collapseList(item) {
	item.parent().find('.list-group-item-action').toggleClass('collapse');
	item.find('.fas').toggleClass('fa-caret-down');
	item.find('.fas').toggleClass('fa-caret-right');
}