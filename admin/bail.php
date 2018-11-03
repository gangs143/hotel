<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Floor</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success text-white btn-lg float-right fa fa-plus-circle" id="modalOpen"> Insert</button>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-4">
						<div class="form-inline">
							<label class="" for="displayLimit">Showing</label>
							<select class="form-control custom-select" id="displayLimit">
								<option>10</option>
								<option>25</option>
								<option>50</option>
								<option>100</option>
							</select>
							<label for="displayLimit">entries</label>
						</div>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="float-right">
							<div class="form-inline">
								<label class="" for="displayLimit"><strong>Search: </strong></label>
								<input type="search" name="search" class="form-control" id="search">
							</div>
						</div>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-condensed table-bordered table-sm">
								<thead class="bg-primary text-white">
									<tr>
			                            <th>ID</th>
			                            <th>Name</th>
			                            <th>phone</th>
			                            <th>Title</th>
			                            <th>Action</th>
				                     </tr>
								</thead>
								<tbody id="tbody">
									

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Guest Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="name" name="name" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Guanrante Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="name" name="name" class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="number" id="phone" name="phone" class="form-control">
									</div>
								</div>
							</div>
							<div calss="row">
								<div class="col-md-4">
								<label class="control-label">Title</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-money fa-lg"></span>
										</div>
										<input type="text" id="title" name="title" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="action" id="action" value="insert">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary" value="Insert">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- Modal Contents goes here -->

		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" id="updateForm">
						<div class="modal-body">
							<input type="hidden" name="id" id="updateid">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="updatename" name="updatename" class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="number" id="updatephone" name="updatephone" class="form-control">
									</div>
								</div>
								<div class="col-md-5">
									<label class="control-label">Title</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-data fa-lg"></span>
										</div>
										<input type="text" id="updatetitle" name="updatetitle" class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="updateData" class="btn btn-primary">Update Data</button>
						</div>
					</form>
				</div>
			</div>
		</div>


<?php include('../includes/footer.php') ?>
<script>
	$(document).ready(function() {
		loadData();

		$('#modalOpen').on('click', function() {
			$('#modalInsert').modal('show');
		});

		// insert the data into database using ajax
		$('#action').val('insertbail');
		$('#submitForm').submit(function(e) {
			event.preventDefault();
			var name = $('#name').val();
			var phone = $('#phone').val();
			var title = $('#title').val();
			if(name == '' || phone == '' || title == '') {
				alert("fadlan buuxi Meelaha banaan");
				return false;
			}
			else {
				$.ajax({
					url: "operations/insert.php",
					method: "post",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						success('Success', data);
						loadData();
						$('#submitForm')[0].reset();
						$('#modalInsert').modal('hide');
					}
				});
			}
		});

		/* selects date and display data into update modal */
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var SelectBail = "SelectBail";
			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, SelectBail: SelectBail},
				dataType:"json",
				success: function(data) {
					$('#updatename').val(data.name);
					$('#updatephone').val(data.phone);
					$('#updatetitle').val(data.title);
				}
			});
			$('#modalUpdate').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
			var UpdateBial = "UpdateBial";
			var updateid = $('#updateid').val();
			var updatename = $('#updatename').val();
			var updatephone = $('#updatephone').val();
			var updatetitle = $('#updatetitle').val();
			if(updatename =="" || updatephone ==""||updatetitle==""){
				alert("fadlan buuxi meelaha banaan")
			}
			else {
				$.ajax({
					url: "operations/updates.php",
					method: "POST",
					data: { // name phone gender age status address  updater
						id: updateid,
						UpdateBial:UpdateBial,
						updatename:updatename,
						updatephone: updatephone,  
						updatetitle:updatetitle 
					},
					success: function(data) {
						//console.log(data);
						//alert(data);
						success('Success', data);
						$('#updateForm')[0].reset();
						$('#modalUpdate').modal('hide');
						loadData();
					}
				});
			}
		});

		//load data to Bail table
		function loadData() {
			var bails = "bails";
			$.ajax({
				url:"operations/select.php",
				method:"POST",
				data:{bails:bails},
				success:function(data) {
					$('#tbody').html(data);
				}
			});
		}

		/*  closes the autocomplete for the input of the form  */
        $('#submitForm').attr('autocomplete', 'off');			
		//delete Method
		$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr('id');
			var delbails = "delbails";
			if(confirm("ma hubtaa in aad tuurayso")) {
				$.ajax({
					url: "operations/delete.php",
					method: "post",
					data: {id: id, delbails: delbails},
					success: function(data) {
						success('Success', data);
						loadData();
					}
				});
			}
			else {
				return false;
			}
		});
</script>