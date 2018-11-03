<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Room</h3>
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
						<div id="tbody">
							
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
						<h5 class="modal-title" id="exampleModalLabel">Insert Room Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">RoomType</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<select id="roomType" name="roomType" class="form-control rooms"></select>
										<!-- <input type="text" id="RoomType" name="RoomType" class="form-control rooms"> -->
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Floor</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<select id="floor" name="floor" class="form-control floor"></select>
										<!-- <input type="text" id="floor" name="floor" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control"> -->
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">RoomNo</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="roomno" name="roomno"  class="form-control">
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Beds</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="beds" name="beds"  class="form-control">
									</div>
								</div>
						</div>
							</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="insertRooms">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>

	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Room Form...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form id="updateForm" method="post">
						<div class="modal-body">
							<input type="hidden" name="updateid" id="updateid">
							<div class="row">
								<div class="col-md-4">
									<label class="control-label">RoomNo</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="uproomno" name="uproomno"  class="form-control">
									</div>
								</div>
								<div class="col-md-3">
									<label class="control-label">Type</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<!-- <input type="text" id="upfloor_id" name="upfloor_id" data-parsley-type="number" data-parsley-trigger="keyup" class="form-control"> -->
										<select id="uptype_id" name="uptype_id" class="form-control rooms"></select>
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Floor</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<!-- <input type="text" id="upfloor_id" name="upfloor_id"  class="form-control"> -->
										<select id="upfloor_id" name="upfloor_id" class="form-control floor"></select>
									</div>
								</div>
								<div class="col-md-4">
									<label class="control-label">Beds</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upbeds" name="upbeds"  class="form-control">
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<input type="hidden" name="UpdateRooms">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button id="updateData" class="btn btn-primary btnDisable">Update Data</button>
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
<?php include('../includes/footer.php') ?>
<script>
	$(document).ready(function() {
		loadData();
		loadFloors();
		loadRoomType();
		$('#modalOpen').on('click', function() {
			$('#modalInsert').modal('show');
		});

		$('#submitForm').on('submit', function(e) {
			e.preventDefault();
			var isValid = true;
			$($(this).find('input[type="text"]')).each(function() {
				if($(this).val().length == 0) {
					isValid = false;
					$(this).css({
						'border': '1px solid red',
						'background-color': '#FFCECE'
					});
				}
				else {
					$('input[type="text"]').on('keyup', function() {
						$('input[type="text"]').css({
							'border': "",
							'background-color': ""
						})
					})
				}
			})
			if(isValid == true) {
				if($('#submitForm').parsley().isValid()) {
					$.ajax({
						url: "operations/insert.php",
						method: "post",
						data: $(this).serialize(),
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							$('#modalInsert').modal('hide');
							loadData();
							$('#submitForm')[0].reset();
						}
					})
				}
			}	
		});
		
		$(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var closes = $(this).closest('tr');
			$('#uproomno').val(closes.find('td:eq(0)').text());
			$('#uptype_id').val(closes.find('td:eq(1)').data('type'));
			$('#upfloor_id').val(closes.find('td:eq(2)').data('floor'));
			$('#upbeds').val(closes.find('td:eq(3)').text());
			$('#modalUpdate').modal('show');
		});

		$('#updateForm').on('submit', function(e) {
			e.preventDefault();
			var isValid = true;
			$($(this).find('input[type="text"]')).each(function() {
				if($(this).val().length == 0) {
					isValid = false;
					$(this).css({
						'border': '1px solid red',
						'background-color': '#FFCECE'
					});
				}
				else {
					$('input[type="text"]').on('keyup', function() {
						$('input[type="text"]').css({
							'border': "",
							'background-color': ""
						})
					})
				}
			})
			if(isValid == true) {
				if($('#updateForm').parsley().isValid()) {
					$.ajax({
						url: "operations/updates.php",
						method: "post",
						data: $('#updateForm').serialize(),
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							loadData();
							$('#modalUpdate').modal('hide');
						}
					})
				}
			}
			
		});

		$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr("id");
			var delbail = "delbail";
			if(confirm("ma hubtaa inaa tirtirayso")) {
				$.ajax({
					url: "operations/delete.php",
					method: "post",
					data: {id: id, delbail: delbail},
					success: function(data) {
						success('SUCCESS', data);
						loadData();
					}
				})
			}
			else {
				return false;
			}
		})
		function loadData() {
			var loadRooms = "loadRooms";
			$.ajax({
				url: "operations/select.php",
				method: "post",
				data: {loadRooms: loadRooms},
				beforeSend: function(){
					$('#tbody').html(loadwaiter());
					$('.lds-spinner').css('display', 'block')
				},
				success: function(data) {
					$('.lds-spinner').css('display', 'none');
					$('#tbody').html(data);
				}
			})
		}

		function loadFloors() {
			var loadFloor = "loadFloor";
			$.ajax({
				url: "operations/select.php",
				method: "post",
				data: {loadFloor: loadFloor},
				success: function(data) {
					$('.floor').append(data);
				}
			});
		}
		function loadRoomType() {
			var loadType = "loadType";
			$.ajax({
				url: "operations/select.php",
				method: "post",
				data: {loadType: loadType},
				success: function(data) {
					console.log("some data", data.length);
					$('.rooms').html(data);
					$('.rooms').children().first().remove(); 
				}
			});
		}

		$(document).ajaxComplete(function(){
        	limit('displayLimit','tbl');
        	search('search','tbl');
        });
        $('#submitForm, #updateForm').attr('autocomplete', 'off');
	});
</script>