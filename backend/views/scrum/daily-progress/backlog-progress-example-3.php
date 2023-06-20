Test
<?php
//$this->registerCssFile("@web/plugins/fancybox/jquery.fancybox.css", ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('@web/js/konva/konva.min.js', [
	//'depends' => [\yii\web\JqueryAsset::className()]
	'position' => \yii\web\View::POS_HEAD
]);

//https://konvajs.org/docs/overview.html
//<script src="https://cdn.rawgit.com/konvajs/konva/0.11.1/konva.min.js"></script>
?>

<style type="text/css">
	#canvas{
	  width:1600px;
	  height:300px;
	  background-color: grey;
	  border:1px solid black;
	}
</style>
<div class="box-body table-responsive">
<div id="canvas">Oi oi</div>
</div>
<script type="text/javascript">
	// first we need to create a stage
	var stage = new Konva.Stage({
	  container: 'canvas',   // id of container <div>
	  width: 1600,
	  height: 300
	});

	// then create layer
	var layer = new Konva.Layer();

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

      var rect1 = new Konva.Rect({
        x: 20,
        y: 20,
        width: 100,
        height: 50,
        fill: 'green',
        stroke: 'black',
        strokeWidth: 4,
      });
      // add the shape to the layer
      layer.add(rect1);

      var rect2 = new Konva.Rect({
        x: 150,
        y: 40,
        width: 100,
        height: 50,
        fill: 'red',
        shadowBlur: 10,
        cornerRadius: 10,
        draggable: true,
      });
      layer.add(rect2);

      //move, crosshair, default, pointer
      //Jenisnya : https://www.w3schools.com/cssref/pr_class_cursor.php
      rect2.on('mouseenter', function () {
        stage.container().style.cursor = 'move';
      });
      rect2.on('mouseleave', function () {
        stage.container().style.cursor = 'default';
      });
      rect2.on("click", function() {
		console.log("click rect2");
	  });

      rect1.on('mouseenter', function () {
        stage.container().style.cursor = 'pointer';
      });
      rect1.on('mouseleave', function () {
        stage.container().style.cursor = 'default';
      });
      rect1.on("click", function() {
		console.log("click rect1");
	  });

	  var triangle = new Konva.RegularPolygon({
        x: 100,
        y: 150,
        sides: 3,
        radius: 70,
        fill: 'red',
        stroke: 'black',
        strokeWidth: 4,
      });
      triangle.rotate(90);
      layer.add(triangle);

	  var text = new Konva.Text({
        x: 50,
        y: 70,
        fontSize: 30,
        text: 'Rotate me',
        //draggable: true,
      });
      layer.add(text);


	  var group = new Konva.Group({
        x: 200,
        y: 250,
        rotation: 20,
      });
	  var triangle2 = new Konva.RegularPolygon({
        x: 200,
        y: 250,
        sides: 3,
        radius: 10,
        fill: 'red',
        stroke: 'black',
        strokeWidth: 1,
        rotation: 90,
      });
      //triangle2.rotate(-90);
      group.add(triangle2);

      layer.add(triangle2);

	var group = new Konva.Group({
        x: 220,
        y: 140,
        rotation: 20,
        draggable: true,
      });

      var colors = ['red', 'orange', 'yellow'];

      for (var i = 0; i < 3; i++) {
        var box = new Konva.Rect({
          x: i * 30,
          y: i * 18,
          width: 100,
          height: 50,
          name: colors[i],
          fill: colors[i],
          stroke: 'black',
          strokeWidth: 4,
        });

        group.add(box);
      }

	 var rect3 = new Konva.Rect({
        x: 150,
        y: 40,
        width: 100,
        height: 50,
        fill: 'red',
        shadowBlur: 10,
        cornerRadius: 10,
        draggable: true,
      });
	  group.add(rect3);
 	 
 	 var text3 = new Konva.Text({
        x: 250,
        y: 250,
        fontSize: 30,
        text: 'CLICK',
        //draggable: true,
      });
 	  group.add(rect3);
      layer.add(text3);
      layer.add(group);
      //stage.add(layer);

	// add the layer to the stage
	stage.add(layer);

	// draw the image
	layer.draw();
</script>