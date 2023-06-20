<?php
	$title = "Untitled";
	if(isset($model->project)){
		$title = $model->project->nama_proyek;
		$project = $model->project;

		$box_type = "box-success";
		if($project->is_active == 1){
			$box_type = "box-success";
		}else{
			$box_type = "box-danger";
		}

		if($project->description != ""){
			$deskripsi = $project->description;
		}else{
			$deskripsi = $title;
		}
?>

<div class="box <?= $box_type ?>">
	<div class="box-header with-border">
		<h3 class="box-title"><?= $title ?></h3>
		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
			<i class="fa fa-minus"></i></button>
			<?php /*
			<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
			<i class="fa fa-times"></i></button>
			*/ ?>
		</div>
	</div>
	<div class="box-body">
		<?= $deskripsi ?>




			<div class="dropdown messages-menu">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
				<i class="fa fa-envelope-o"></i>
			</a>
			<ul class="dropdown-menu">

			<li>

				<ul class="menu" style="list-style-type:none;">
				<li>
				<a href="#">
				<i class="fa fa-users text-aqua"></i> 5 new members joined today
				</a>
				</li>
				<li>
				<a href="#">
				<i class="fa fa-warning text-yellow"></i> Very long description here that may not fit into the
				page and may cause design problems
				</a>
				</li>
				<li>
				<a href="#">
				<i class="fa fa-users text-red"></i> 5 new members joined
				</a>
				</li>
				<li>
				<a href="#">
				<i class="fa fa-shopping-cart text-green"></i> 25 sales made
				</a>
				</li>
				<li>
				<a href="#">
				<i class="fa fa-user text-red"></i> You changed your username
				</a>
				</li>
				</ul>
				</li>

			</ul>

			</div>





	</div>

</div>



<?php 
}
?>