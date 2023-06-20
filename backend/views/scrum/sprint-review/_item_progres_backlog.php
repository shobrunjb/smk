<?php
if(isset($model->productBacklog)){
	$model_pb = $model->productBacklog;
	$satuanWaktu = "";
	if(isset($model_pb->satuanWaktu)){
		$satuanWaktu = $model_pb->satuanWaktu->time_metric_id;
	}

	$sprintassign = "-- belum diassign --";
	$checked = "";
	$style = 'display: block;';
	$contribution = 0;
	$idi = \common\utils\EncryptionDB::encryptor('encrypt', $model_pb->id_product_backlog);
	$id = $model_pb->id_product_backlog;

	//Difilter yang ditampilkan hanya yang belum diassign dan yang sesuai dengan sprintnya
	if($model->id_sprint == $sprint->id_sprint) {
		$progress = $model_pb->progres_by_team; //Progres dinilai tim sendiri
		$progres_po = $model_pb->progres_by_owner;
		

		$sb = \backend\models\SprintBacklog::find()
        ->where([
            'id_project' => $sprint->id_project,
            'id_sprint' => $sprint->id_sprint,
            'id_product_backlog' => $model_pb->id_product_backlog,
        ])->one();
        if($sb != null){
        	$progres_po = $sb->last_progres_by_owner;
        }
        $contribution = $progres_po;
?>

<tr>
	<td width="20px">#<?= $model_pb->order_number ?></td>	
	<td><i><?= $model_pb->product_backlog ?></i></td>


	<td><span class="badge bg-green"><?= $progress ?>%</span></td>
	<td>
		<?php
		$yourrole = \backend\models\ProjectMember::getYourRole($sprint->id_project, 2); 
        $po_role = \backend\models\AppSettingSearch::getValueByKey("ROLE PRODUCT OWNER");
        if($yourrole == $po_role){
        	if($sprint->is_closed != 2){
		?>
		<div class="slidecontainer" id="slidecontainer_<?= $id ?>" style="<?= $style ?>">
		  <input type="range" min="0" max="100" class="slider" id="my_progress_<?= $model_pb->id_product_backlog ?>"  name="my_progress_<?= $model_pb->id_product_backlog ?>" value="<?= $progres_po ?>">
		  <p>Progres : <span id="result_<?= $id ?>"></span></p>
		</div>
		<?php
			}else{
				echo '-- dikunci --';
			}
		}else{
			echo '<div class="badge bg-orange">Diisi oleh '.$po_role.'</div>';
		}
		?>
		<Script>
			var start_<?= $id ?> = <?= $progres_po ?>;
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
			  kontribusi_<?= $id ?>.innerHTML = nowval;
			  txt_contribute_<?= $id ?>.value = nowval;
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
		<p><span id="kontribusi_<?= $id ?>" class="badge bg-blue"><?= $contribution ?>%</span></p>
		<input type="hidden" id="txt_contribute_<?= $id ?>" value="<?= $contribution ?>">
		</div>
	</td>

</tr>
<?php 
	}
}
?>
