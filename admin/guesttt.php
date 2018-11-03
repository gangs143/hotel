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
                                    <th>name</th>
                                    <th>phone</th>
                                    <th>gender</th>
                                    <th>Type</th>
                                    <th>shift</th>
                                    <th>salary</th>
                                    <th>date</th>
										<th><span class="fa fa-gear"></span> Action</th>
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

	<!-- Modal Contents goes here -->
	<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
				<form method="post" id="submitForm" enctype="multipart/form-data">
							<div class="row">
								<div class="col-md-7">
									<div class="form-group">
										<label class="control-label">name</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-user"></i></span>
											<input type="text" name="name" id="name" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="control-label">email</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone"></i></span>
											<input type="email" name="email" id="email" class="form-control">
										</div>
									</div>
								</div>
							
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">phone</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-id-card"></i></span>
											<input type="number" name="phone" id="phone" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">status</label>
										<div class="input-group">
											<span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                            <input type="number" name="status" id="status" class="form-control">
										</div>
									</div>
								</div>
								<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">password</label>
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-globe"></i></span>
										<input type="password" name="password" id="password" class="form-control">
									</div>
								</div>
							</div>
                            </div>
							<div class="row">
								<div class="col-md-offset-4 col-md-4 col-md-offset-4">
									<input type="hidden" name="action" id="action" value="insert">
									<input type="submit" name="sendData" id="sendData" class="btn btn-success btn-block">
								</div>
							</div>
						</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
<?php include('../includes/footer.php') ?>
<script>
		$(document).ready(function() {
			loadData();
			$('#btnInsertModal').on('click', function() {
				$('#modalInsert').modal('show');
			});
			$('#action').val('insertstaff');
			$('#submitForm').on('submit', function(e) {
				e.preventDefault();
				var name = $('#name').val();
				var phone = $('#phone').val();
				var gender = $('#gender').val();
				var type = $('#type').val();
				var shift = $('#shift').val();
				var salary = $('#salary').val();
				if(name == '' || city == '' || address == ''){
                    alert("fadlan xafada ciyaarta ka daaa");
				return false
                }
                else{
				$.ajax({
					url: "operations/insert.php",
					method: "post",
					data: new FormData(this),
					contentType: false,
					processData: false,
					success: function(data) {
						alert(data);
						$('#modalInsert').modal('hide');
				
					}
				})
				}
			})
			
			$(document).on('click', '.btn-edit', function() {
				var id = $(this).attr("id");
				var selectstaff = "selectstaff";
				$('#updateid').val(id);
				$.ajax({
					url: "operations/select.php",
					method: "POST",
					data: {id: id, selectstaff: selectstaff},
					dataType: "json",
					success: function(data) {
						$('#uname').val(data.name);
						$('#uphone').val(data.phone);
						$('#ugender').val(data.gender);
						$('#utype').val(data.type);
						$('#ushift').val(data.shift);
						$('#usalary').val(data.salary);
					
					}
				})
				$('#modalUpdate').modal('show');
			});

			$('#btn-update').on('click', function() {
				var updatestaff = "updatestaff";
				var id = $('#updateid').val();
				var uname = $('#uname').val();
				var uphone = $('#uphone').val();
				var ugender = $('#ugender').val();
				var utype = $('#utype').val();
				var ushift = $('#ushift').val();
				var usalary = $('#usalary').val();
				$.ajax({
					url: "operations/updates.php",
					method: "post",
					data: {
						id: id,
						updatestaff: updatestaff,
						uname: uname,
						uphone: uphone,
						ugender: ugender,
						utype: utype,
						ushift: ushift,
						usalary: usalary
					},
					success: function(data) {
						console.log(data);
					}
				})
				$('#modalUpdate').modal('hide');
			});
			$(document).on('click', '.btn-delete', function() {
				var id = $(this).attr("id");
				var delroomtype = "delroomtype";
				if(confirm("ma hubtaa inaa tirtirayso")) {
					$.ajax({
						url: "operations/delete.php",
						method: "post",
						data: {id: id, delguest: delguest},
						success: function(data) {
							console.log(data);
							loadData();
						}
					})
				}
				else {
					return false;
				}
			})
			function loadData() {
				var loadstaff = "loadstaff";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {loadstaff: loadstaff},
					success: function(data) {
						$('#tbody').html(data);
					}
				})
			}
			$(document).ajaxComplete(function() {
				$('#checkstate').each(function() {
					var check = $(this).text();
					if(check == 1) {

				}
				else {
					$(this).removeClass('label label-danger');
					$(this).addClass('label label-success');
				}
				});
				
			})
		});
	</script>