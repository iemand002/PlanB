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

// piechart

var dataset = [6, 14, 5, 26, 49];

var labels = ['Love it', 'Interesting', 'No Opinion', 'Rubs wrong, but...', 'DO NOT LIKE']

var colors = ['#9e0142', '#f46d43', '#fdae61', '#e6f598', '#66c2a5'];

var width = document.querySelector('.chart-wrapper').offsetWidth,
  height = document.querySelector('.chart-wrapper').offsetHeight,
  minOfWH = Math.min(width, height) / 2,
  initialAnimDelay = 300,
  arcAnimDelay = 150,
  arcAnimDur = 3000,
  secDur = 1000,
  secIndividualdelay = 150,
  radius;

// calculate minimum of width and height to set chart radius
if (minOfWH > 200) {
  radius = 200;
} else {
  radius = minOfWH;
}

// append svg
var svg = d3.select('.chart-wrapper').append('svg')
  .attr({
    'width': width,
    'height': height,
    'class': 'pieChart'
  })
  .append('g');

svg.attr({
  'transform': 'translate(' + width / 2 + ',' + height / 2 + ')'
});

// for drawing slices
var arc = d3.svg.arc()
  .outerRadius(radius * 0.6)
  .innerRadius(radius * 0.45);

// for labels and polylines
var outerArc = d3.svg.arc()
  .innerRadius(radius * 0.85)
  .outerRadius(radius * 0.85);

// d3 color generator
// var c10 = d3.scale.category10();

var pie = d3.layout.pie()
  .value(function(d) {
    return d;
  });

var draw = function() {

  svg.append("g")
    .attr("class", "lines");
  svg.append("g")
    .attr("class", "slices");
  svg.append("g")
    .attr("class", "labels");

  // define slice
  var slice = svg.select('.slices')
    .datum(dataset)
    .selectAll('path')
    .data(pie);
  slice
    .enter().append('path')
    .attr({
      'fill': function(d, i) {
        // slice color                              
        return colors[i];
      },
      'd': arc,
      'stroke-width': '25px'
    })
    .attr('transform', function(d, i) {
      return 'rotate(-180, 0, 0)';
    })
    .style('opacity', 0)
    .transition()
    .delay(function(d, i) {
      return (i * arcAnimDelay) + initialAnimDelay;
    })
    .duration(arcAnimDur)
    .ease('elastic')
    .style('opacity', 1)
    .attr({
      'transform': 'rotate(0,0,0)'
    });

  slice.transition()
    .delay(function(d, i) {
      return arcAnimDur + (i * secIndividualdelay);
    })
    .duration(secDur)
    .attr('stroke-width', '5px');

  function midAngle(d) {
    return d.startAngle + (d.endAngle - d.startAngle) / 2;
  }

  var text = svg.select(".labels").selectAll("text")
    .data(pie(dataset));

  text.enter()
    .append('text')
    .attr('dy', '0.35em')
    .style("opacity", 0)
    .style('fill', function(d, i) {
      return colors[i];
    })
    .text(function(d, i) {
      return labels[i];
    })
    .attr('transform', function(d) {
      // calculate outerArc centroid for 'this' slice
      var pos = outerArc.centroid(d);
      // define left and right alignment of text labels                             
      pos[0] = radius * (midAngle(d) < Math.PI ? 1 : -1);
      return "translate(" + pos + ")";
    })
    .style('text-anchor', function(d) {
      return midAngle(d) < Math.PI ? "start" : "end";
    })
    .transition()
    .delay(function(d, i) {
      return arcAnimDur + (i * secIndividualdelay);
    })
    .duration(secDur)
    .style('opacity', 1);

  var polyline = svg.select(".lines").selectAll("polyline")
    .data(pie(dataset));

  polyline.enter()
    .append("polyline")
    .style("opacity", 0.5)
    .attr('points', function(d) {
      var pos = outerArc.centroid(d);
      pos[0] = radius * 0.95 * (midAngle(d) < Math.PI ? 1 : -1);
      return [arc.centroid(d), arc.centroid(d), arc.centroid(d)];
    })
    .transition()
    .duration(secDur)
    .delay(function(d, i) {
      return arcAnimDur + (i * secIndividualdelay);
    })
    .attr('points', function(d) {
      var pos = outerArc.centroid(d);
      pos[0] = radius * 0.95 * (midAngle(d) < Math.PI ? 1 : -1);
      return [arc.centroid(d), outerArc.centroid(d), pos];
    });
};

draw();

button = document.querySelector('button');

var replay = function() {

  d3.selectAll('.slices').transition().ease('back').duration(500).delay(0).style('opacity', 0).attr('transform', 'translate(0, 250)').remove();
  d3.selectAll('.lines').transition().ease('back').duration(500).delay(100).style('opacity', 0).attr('transform', 'translate(0, 250)').remove();
  d3.selectAll('.labels').transition().ease('back').duration(500).delay(200).style('opacity', 0).attr('transform', 'translate(0, 250)').remove();

  setTimeout(draw, 800);

}