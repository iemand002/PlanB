// Gets total amount of slides
count = $(".slide").length;
p = count - 1;
n = count - 2;
// Sets the slide-container and individual slide size
$(".slide-container").css("width", 100*count+"%");
$(".slide").css("width", 100/count + "%");

// Conditional statement for clicking next
var curr = 0;
var dynamicHeight = $("."+curr).innerHeight();
var id;
setHeight();
$( ".next" ).click(function(e) {
	id = $(this).attr('id');
	e.preventDefault();

	$(".next").click(addOne(id));

	curr++;
	setHeight();

	$(".slide-container").css({
		marginLeft: curr*-100 + "%"
	});
});

function setHeight() {
	curr++;
	dynamicHeight = $("."+curr).innerHeight();
	$(".slide-container").css({
		height: dynamicHeight
	});
	curr--;
}

//addstuff
function addOne(id) {
  //maakt een GET request naar uw backend (laravel)
	$.get('/antwoord/'+id);
}


