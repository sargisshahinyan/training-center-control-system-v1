<?php
$students = !empty($students) ? $students : [];
$branches = !empty($branches) ? $branches : [];
$branchId = !empty($branchId) ? $branchId : null;
?>
<article class="container">
	<div class="row">
		<div class="form-group col-md-3">
			<select id="branch" class="form-control">
				<option value="">Բոլորը</option>
				<?php foreach($branches as $branch) { ?>
				<option <?= $branchId === $branch['id'] ? 'selected' : '' ?> value="<?= $branch['id'] ?>"><?= $branch['name'] ?></option>
				<?php } ?>
			</select>
		</div>
	</div>
	<div class="row">
		<div class="list-group" id="students-list">
			<?php foreach($students as $i => $student) { ?>
			<div id="id-<?= $student['id'] ?>" data-id="<?= $student['id'] ?>" class="list-group-item row" style="background-color: <?= empty($student['payed']) ? '#ff8787' : '#fff' ?>">
				<div class="col-xs-offset-1 col-xs-7 list-item-title">
					<?= ($i + 1) . '. &nbsp;&nbsp;&nbsp;&nbsp;' . $student['name'] . ' ' . $student['surname']?>
				</div>
				<div class="col-xs-4 text-right main-menu">
					<a role="button" href="/home/edit_student/<?= $student['id'] ?>" class="edit btn btn-success"><span class="edit glyphicon glyphicon-pencil"></span></a>
				</div>
            	<div class="clearfix"></div>
			</div>
			<?php } ?>
		</div>
	</div>
</article>
<script>
	$(branch).change(function() {
		location.search = this.value ? `?branch=${this.value}` : '';
	});
</script>
