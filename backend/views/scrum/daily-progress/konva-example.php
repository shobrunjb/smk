<script src="https://cdn.rawgit.com/konvajs/konva/0.11.1/konva.min.js"></script>

<link href='https://fonts.googleapis.com/css?family=Shadows+Into+Light' rel='stylesheet' type='text/css'>

<p><em>Sometimes</em> this pen has trouble displaying the Google Font in the lower right. I&rsquo;m still trying to figure out how to make it work consistently.<p>
<div id="canvas"></div>

<style>
	body{
	  background:#bbb;
	}

	#canvas{
	  width:600px;
	  height:600px;
	  border:1px solid black;
	}

	p{
	  width:600px;
	}
</style>
<script type="text/javascript">
	var stage = new Konva.Stage({
  container: 'canvas',
  width: 600,
  height: 600
});

var layer = new Konva.Layer();
stage.add(layer);

// Red background rectangle that fills canvas
var background = new Konva.Rect({
  x: 0,
  y: 0,
  width: 600,
  height: 600,
  fill: 'hsl(0, 50%, 50%)'
});

// White rectangles for upper right and lower left corners
var upperRight = new Konva.Rect({
  x: 300,
  y: 0,
  width: 300,
  height: 300,
  fill: '#fff'
});
var lowerLeft = upperRight.clone({
  x: 0,
  y: 300
});

// Ostrich proverb in upper left
var ostrich = new Konva.Text({
  text: 'A wise man never ties his ostrich far from the tree.',
  x: 40,
  y: 70,
  width: 220,
  fontFamily: 'sans-serif',
  fontSize: 35,
  fill: '#ddd'
});

// Dog proverb in upper right
// The \n symbols in the text cause a new line to start.
// The \' are used to show an apostophe without the computer thinking it's the end of the string. This is called escaping the apostrophe.
var dog = new Konva.Text({
  text: 'Outside of a dog, \na book is man\'s best friend. \n\nInside of a dog, it\'s too dark to read.',
  x: 340,
  y: 60,
  width: 220,
  fontFamily: 'serif',
  fontSize: 28,
  fill: '#555'
});

// Vogon poetry description in lower left
var vogon = new Konva.Text({
  text: 'Vogon poetry is said to be the third worst poetry in the entire universe.',
  x: 40,
  y: 370,
  width: 220,
  fontFamily: 'monospace',
  fontSize: 25,
  fontStyle: 'bold',
  fill: '#555'
});

// Google font example in lower right
var googleFont = new Konva.Text({
  text: 'This font comes from Google Fonts. You need to add a line into the HTML to tell the browser to download this font.',
  x: 340,
  y: 345,
  width: 220,
  align: 'center',
  fontFamily: 'Shadows Into Light',
  fontSize: 30,
  fill: '#ddd'
});

layer.add(background, upperRight, lowerLeft);
layer.add(ostrich, dog, vogon, googleFont);


// create our shape
var circle = new Konva.Circle({
  x: stage.width() / 2,
  y: stage.height() / 2,
  radius: 70,
  fill: 'red',
  stroke: 'black',
  strokeWidth: 4
});

// add the shape to the layer
layer.add(circle);

stage.draw();


</script>