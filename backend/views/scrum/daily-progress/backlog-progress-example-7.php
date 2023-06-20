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

 	function createButton(_layer, _var){
		var btnCustom = new Konva.Group({
	        x: _var['x'],
	        y: _var['y'],
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

		  btnCustom.add(rect4);

		//Karena ikut grouping maka x, y adalah relatif terhadap koordinat groupnya
	 	var text4 = new Konva.Text({
	        x: 2,
	        y: 2,
	        fontSize: 16,
	        text: _var['text'],
	        //draggable: true,
	      });
	 	btnCustom.add(text4);


		btnCustom.on('mouseenter', function () {
	        stage.container().style.cursor = 'pointer';
	      });
	    btnCustom.on('mouseleave', function () {
	        stage.container().style.cursor = 'default';
	      });
	    _layer.add(btnCustom);

	    return btnCustom;
 	}

 	function createCellTable(_layer, _var){
		var blockCell = new Konva.Group({
	        x: _var['x'],
	        y: _var['y'],
	        //rotation: 20,
	        draggable: false,
	      });

		var rectx = new Konva.Rect({
	        x: 0,
	        y: 0,
	        width: 100,
	        height: 40,
	        fill: 'blue',
	        //shadowBlur: 10,
	        //cornerRadius: 10,
	        //draggable: true,
	      });

		  blockCell.add(rectx);

		//Karena ikut grouping maka x, y adalah relatif terhadap koordinat groupnya
	 	var textx = new Konva.Text({
	        x: 2,
	        y: 2,
	        fontSize: 16,
	        text: _var['text'],
	        //draggable: true,
	      });
	 	blockCell.add(textx);
	 	console.log("test");
	 	var width = Math.ceil(textx.getWidth());
	 	rectx.width(width);
	 	textx.width(100);
	 	textx.height(14);
	 	console.log("width" + width);

		blockCell.on('mouseenter', function () {
	        stage.container().style.cursor = 'pointer';
	      });
	    blockCell.on('mouseleave', function () {
	        stage.container().style.cursor = 'default';
	      });
	    _layer.add(blockCell);

	    return blockCell;
 	}

 	var _var = {
 		x: 40,
	    y: 2,
 		text: "-",
 	}
 	var btnMinus = createButton(layer, _var);
	btnMinus.on("click", function() {
		console.log("click group " + _var['text']);
		stage.width(stage.getWidth() - 50);
		stage.getContainer().style.backgroundColor = 'grey';
		displayBox.width(displayBox.getWidth() - 50);

	  });

 	var _var = {
 		x: 80,
	    y: 2,
 		text: "+",
 	}
 	var btnPlus = createButton(layer, _var);
	btnPlus.on("click", function() {
		console.log("click group " + _var['text']);
		stage.width(stage.getWidth() + 50);
		stage.getContainer().style.backgroundColor = 'grey';
		displayBox.width(displayBox.getWidth() + 50);

	  });

	var _var3 = {
 		x: 120,
	    y: 120,
 		text: "Scrum Indonesia Sudah sangat baik",
 	}
	var cell = createCellTable(layer, _var3);

	// add the layer to the stage
	stage.add(layer);

	// draw the image
	layer.draw();
</script>