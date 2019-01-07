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


function listFrontView () {


	$(".listly-item").each(function (){

			$(this).addClass("grid-item");

			$title = $(this).find(".ly-title-top");

			$titleH2 = $title.find("h2");
			$picture = $(this).find(".option_media");

			var title = $title[0].outerHTML;
			var titleH2 = $titleH2[0].outerHTML;
			var picture = $picture[0].outerHTML;

			$(this).find(".item_detail").remove();
			$picture.remove();

			$title.replaceWith(picture);

			$(this).find(".item_footer").prepend(titleH2);

	});

	$('.grid').masonry("reloadItems");
	$('.grid').masonry();

}

//list.ly widget custom
$( window ).on( "load", function() {

		$(".ly-list-published").addClass("grid");

			//changing list.ly widget header style
			$(".ly-additem").removeClass("listly-expand");
			$(".ly-filter").removeClass("listly-secondary");
			$(".ly-tools-a").prepend($(".ly-additem"));
			$(".ly-search-items").attr("placeholder", "Search");
			$(".ly-filter").text("Filter");
			$(".ly-additem").html($(".ly-additem").html().replace(" To List", ""));

			//Changing list.ly widget body style
			listFrontView();

			//Changing list.ly widget body style on change

			$(document).on('DOMSubtreeModified', '.listly-item', function(event) {
					event.preventDefault();
					event.stopImmediatePropagation();

			});


			$('.grid').one('DOMSubtreeModified', function(){
				setTimeout(function(){ listFrontView();  }, 1000);
			});



			$('.listly-filter-widget').bind('DOMSubtreeModified', function(){
				$('.grid').one('DOMSubtreeModified', function(){
					setTimeout(function(){ listFrontView();  }, 1000);
				});

			});

			$(document).on('click', '.ly-search-clear', function(event) {
				$('.grid').one('DOMSubtreeModified', function(){
					setTimeout(function(){ listFrontView();  }, 1000);
				});
			});

			$(document).on('keypress', '.ly-search-items', function(event) {
					if(event.which == 13) {
						$('.grid').one('DOMSubtreeModified', function(){
							setTimeout(function(){ listFrontView();  }, 1000);
						});
					}
			});
});




// Reload the page when closing popup (after adding a new item)
$(document).on('click', '.ly-additem', function(event) {

	$(".lboxcontent iframe").on("load", function () {

			$(".lboxcontent").prepend('<div class="alert alert-warning" role="alert">You can only add <b>link</b>, <b>video</b>, <b>photo</b> or <b>audio</b></div>')

			$(".lboxpopup .close_lb").click(function(event) {
						location.reload();
			});
	});

});
