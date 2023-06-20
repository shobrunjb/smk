
<ul class="products-list product-list-in-box">
<?php
	$contributors = \backend\models\ScrumDailyForYesterday::find()
	    ->where([
	        'id_product_backlog' => $model_pb->id_product_backlog ,
	        'id_sprint' => $sprint->id_sprint
	    ])->all();
	foreach($contributors as $contributor){
		$id = $contributor->id_scrum_daily_for_yesterday;
		$tgl = "-";
		$deskripsi = "-";
		if(isset($contributor->scrumDaily)){
			$tgl = \common\helpers\Timeanddate::getShortDateIndo($contributor->scrumDaily->standup_date);
			$deskripsi = $contributor->scrumDaily->yesterday_todo;
		}
		$nama = "--no name --";
		if(isset($contributor->pegawai)){
			$nama = $contributor->pegawai->nama_lengkap;
		}
		//echo $contributor->id_scrum_daily." ";
		$kontribusi = $contributor->kontribusi;
		//echo $contributor->progres.",";
		//echo '<br>';

		//data-toggle="modal" data-target="#modal-default"

		echo '
			<li class="item">
			<div class="product-img">
				<i class="fa fa-user-md"></i>
			</div>
			<div class="product-info">
			<a href="#" class="product-title" data-toggle="modal" data-target="#modal-desc-'.$id.'">'.$nama.'
			<span class="badge label-info pull-right">'.$kontribusi.'%</span></a>
			<span class="product-description">
			'.$tgl.'
			</span>
			</div>
			</li>
		';

		echo '
			<div class="modal fade" id="modal-desc-'.$id.'" style="display: none;">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">×</span></button>
				<h4 class="modal-title">Daily Report</h4>
				</div>
				<div class="modal-body">
				<p> ['.$tgl.'] '.$deskripsi.'</p>
				</div>
				<div class="modal-footer">
				<button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
				</div>
				</div>

				</div>
			</div>
		';
	}
?>
</ul>

