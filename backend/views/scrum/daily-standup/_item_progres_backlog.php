<?php
if(isset($model->productBacklog)){
	$model_pb = $model->productBacklog;
	$satuanWaktu = "";
	if(isset($model_pb->satuanWaktu)){
		$satuanWaktu = $model_pb->satuanWaktu->time_metric_id;
	}

	$sprintassign = "-- belum diassign --";
	$checked = "";
	$style = 'display: none;';
	$contribution = 0;
	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model_pb->id_product_backlog);
	$id = $model_pb->id_product_backlog;

	//Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
	if($model->id_sprint == $sprint->id_sprint) {
		$progress = $model_pb->progres_by_team; //Progres dinilai tim sendiri

		$todos = \backend\models\ScrumDailyForYesterday::find()
        ->where([
            'id_project' => $sprint->id_project,
            'id_sprint' => $sprint->id_sprint,
            'id_pegawai' => $id_pegawai,
            'id_product_backlog' => $model_pb->id_product_backlog,
            'id_scrum_daily' => $daily->id_scrum_daily,
        ])->one();
        if($todos != null){
        	$checked = "checked";
        	$style = 'display: block;';
        	$contribution = $todos->kontribusi;
        	//echo $todos->id_scrum_daily_for_yesterday. ' '.$todos->kontribusi;
        }
?>

<tr>
	<td>
		<input type="checkbox" value="click" name="checked_prev_<?= $id ?>" id="checked_prev_<?= $id ?>" class="pull-right" <?= $checked ?> onclick="displayChecked<?= $id ?>()"/>
	</td>	
	<td width="20px">#<?= $model_pb->order_number ?></td>	
	<td><i><?= $model_pb->product_backlog ?></i></td>


	<td><span class="badge bg-green"><?= $progress ?>%</span></td>
	<td>

		<div class="slidecontainer" id="slidecontainer_<?= $id ?>" style="<?= $style ?>">
		  <input type="range" min="0" max="100" class="slider" id="my_progress_<?= $model_pb->id_product_backlog ?>"  name="my_progress_<?= $model_pb->id_product_backlog ?>" value="<?= $progress ?>">
		  <p>Progres : <span id="result_<?= $id ?>"></span></p>
		</div>
		<Script>
			var start_<?= $id ?> = <?= $progress ?>;
			var prev_contribution_<?= $id ?> = <?= $contribution ?>;
		    var slider_<?= $id ?> = document.getElementById("my_progress_<?= $model_pb->id_product_backlog ?>");
			var output_<?= $id ?> = document.getElementById("result_<?= $id ?>");
			output_<?= $id ?>.innerHTML = slider_<?= $id ?>.value; // Display the default slider value

			// Update the current slider value (each time you drag the slider handle)
			slider_<?= $id ?>.oninput = function() {
			  output_<?= $id ?>.innerHTML = this.value;
			  var nowval = this.value;
			  var totalcontribute = nowval - start_<?= $id ?> + prev_contribution_<?= $id ?>;
			  //alert(nowval + " " + start_<?= $id ?> + " " + totalcontribute);
			  var kontribusi_<?= $id ?> = document.getElementById("kontribusi_<?= $id ?>");
			  kontribusi_<?= $id ?>.innerHTML = totalcontribute;
			  txt_contribute_<?= $id ?>.value = totalcontribute;
			}
		</Script>
		<Script>
			function displayChecked<?= $id ?>() {
			  //alert('PBI<?= $id ?>');
			  var x = document.getElementById("checked_prev_<?= $id ?>");
			  var data = x.checked ;
			  //alert(data);
			  if (x.checked == true) {
			  	//alert("Show");
			    var a = document.getElementById("slidecontainer_<?= $id ?>");
			    a.style.display = "block";
			    var a2 = document.getElementById("progrescontainer_<?= $id ?>");
			    a2.style.display = "block";
			  } else {
			  	//alert("Hide");
			    var b = document.getElementById("slidecontainer_<?= $id ?>");
			    b.style.display = "none";
			    var b2 = document.getElementById("progrescontainer_<?= $id ?>");
			    b2.style.display = "none";
			  }
			}
		</Script>
	</td>
	<td>
		<div class="progrescontainer" id="progrescontainer_<?= $id ?>" style="<?= $style ?>">
		<p>Kontribusi : <span id="kontribusi_<?= $id ?>"><?= $contribution ?></span>%</p>
		<input type="hidden" id="txt_contribute_<?= $id ?>" value="<?= $contribution ?>">
		</div>
	</td>

</tr>
<?php 
	}
}
?>
