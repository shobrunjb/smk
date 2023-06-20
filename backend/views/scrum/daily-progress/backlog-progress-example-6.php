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
	  width:600px;
	  height:300px;
	  background-color: white;
	  border:1px solid black;
	}
</style>
<div class="box-body table-responsive">
<div id="canvas"></div>
</div>
<script type="text/javascript">
	// first we need to create a stage
	var stage = new Konva.Stage({
	  container: 'canvas',   // id of container <div>
	  width: 600,
	  height: 300
	});

	// then create layer
	var layer = new Konva.Layer();

	var btnGroupExpand = new Konva.Group({
        x: 120,
        y: 40,
        //rotation: 20,
        draggable: false,
      });

	var rect4 = new Konva.Rect({
        x: 0,
        y: 0,
        width: 20,
        height: 20,
        fill: 'green',
        //shadowBlur: 10,
        //cornerRadius: 10,
        //draggable: true,
      });

	  btnGroupExpand.add(rect4);

	//Karena ikut grouping maka x, y adalah relatif terhadap koordinat groupnya
 	var text4 = new Konva.Text({
        x: 2,
        y: 2,
        fontSize: 12,
        text: '+',
        //draggable: true,
      });
 	btnGroupExpand.add(text4);

	btnGroupExpand.on("click", function() {
		console.log("click group 2");
		stage.width(stage.getWidth() + 50);
		stage.getContainer().style.backgroundColor = 'grey';
		displayBox.width(displayBox.getWidth() + 50);

	  });
	btnGroupExpand.on('mouseenter', function () {
        stage.container().style.cursor = 'pointer';
      });
    btnGroupExpand.on('mouseleave', function () {
        stage.container().style.cursor = 'default';
      });

	layer.add(btnGroupExpand);
      //stage.add(layer);

 	var displayBox = new Konva.Rect({
        x: 100,
        y: 100,
        width: 100,
        height: 40,
        fill: 'red',
        //shadowBlur: 10,
        //cornerRadius: 10,
        //draggable: true,
      });
 	layer.add(displayBox);

	// add the layer to the stage
	stage.add(layer);

	// draw the image
	layer.draw();
</script>