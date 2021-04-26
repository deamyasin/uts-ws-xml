<html>

<head>
	<title>Bootstrap table</title>

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


	<font color="orange">
		<?php echo $this->session->flashdata('hasil'); ?>
	</font>


	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Edit Contact</h4>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>



	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Data Mahasiswa ( CRUD XML )</a>
			</div>
		</div>
	</div>


	<div class="container">
		<div class="row">
			<div class="col-md-12">

				<table class="table table-bordered table-striped table-hover">
					<thead style="height:30px;">
						<tr>
							<th>ID</th>
							<th>Nama</th>
							<th>NPM</th>
							<th>Email</th>
							<th>Alamat</th>
							<th>Nomor</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach ($dataMahasiswa as $mahasiswa) {
							echo
							"<tr>
						<td>$mahasiswa->id</td>
			              <td>$mahasiswa->Nama</td>
			              <td>$mahasiswa->NPM</td>
						  <td>$mahasiswa->Email</td>
						  <td>$mahasiswa->Alamat</td>
						  <td>$mahasiswa->Nomor</td>
			              <td>" . anchor('mahasiswa/edit/' . $mahasiswa->id, 'Edit') . "
			                  " . anchor('mahasiswa/delete/' . $mahasiswa->id, 'Delete') . "</td>
					</tr>";
						}
						?>

					</tbody>
				</table>


			</div>
		</div>
	</div>


	<hr>

	<div class="navbar navbar-fixed-bottom navbar-inverse" role="navigation">
		<div class="container">
			<div class="navbar-header">
				<a class="navbar-brand" href="/"></a>
			</div>
			<!-- /.nav-collapse -->
		</div>
		<!-- /.container -->
	</div>
</body>

</html>


<a type="button" class="btn btn-primary" href="/mahasiswa/create">Tambah data</a> </span>