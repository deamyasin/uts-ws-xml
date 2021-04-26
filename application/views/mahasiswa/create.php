<!DOCTYPE html>
<html>

<head>
	<title>Tambah Data</title>

	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css" />
	<script src="http://code.jquery.com/jquery.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			// Basic confirmation
			$("#link").popConfirm();

			// Custom Title, Content and Placement
			$("#button").popConfirm({
				title: "Confirmation",
				content: "Are you sure want to Delete !",
				placement: "right"
			});
		});
	</script>
</head>

<script src="js/script.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script type="text/javascript" src="bootstrap/js/jquery.popconfirm.js"></script>
<style type="text/css">
	body {
		padding-top: 60px;
	}

	@media (max-width: 979px) {
		body {
			padding-top: 0px;
		}
	}
</style>

<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<?php echo form_open_multipart('Mahasiswa/create'); ?>
				<table class="table table-bordered table-striped table-hover">

					<tr>
						<td>Nama</td>
						<td><?php echo form_input('Nama'); ?></td>
					</tr>
					<tr>
						<td>NPM</td>
						<td><?php echo form_input('NPM'); ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?php echo form_input('Email'); ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td><?php echo form_input('Alamat'); ?></td>
					</tr>
					<tr>
						<td>NoHP</td>
						<td><?php echo form_input('Nomor'); ?></td>
					</tr>
					<tr>
						<td colspan="2">
							<?php echo form_submit('submit', 'Simpan'); ?>
							<?php echo anchor('mahasiswa', 'Kembali'); ?>
						</td>
					</tr>
				</table>
				<?php echo form_close(); ?>
</body>

</html>