<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Checking</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-4  col text-left">
						<span class="fa fa-reply fa-lg " data-toggle="tooltip"  title="Go Back" id="modalOpen"></span>
					</div>
					<div class="col-md-8 col text-right">
						<button class="btn btn-info text-white btn-lg fa fa-plus-circle" id="modalOpenFilter"> Filter</button>
						<!-- <button class="btn btn-success text-white btn-lg fa fa-plus-circle" id="modalOpen"> Show</button> -->
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


		<div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Assign a room...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<button id="btnpanel" class="btn btn-sm btn-success">Show</button>
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-body">
							<div class="panel" id="first-pnl">
								<div class="panel-body">
									<div class="row">
										<input type="hidden" class="form-control" id="roomno" name="roomno">
										<input type="hidden" class="form-control" id="tot_price" name="tot_price">
										<div class="col-md-6">
											<label class="control-label">Name</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-user fa-lg"></span>
												</div>
												<input type="text" name="guest_id" id="guest_id" data-parsley-pattern="^[a-z 0-9 /A-Z]+$" data-parsley-trigger="keyup" class="form-control name">
											</div>
											<div id="suggestGuest" class="autoSearch">
												
											</div>
										</div>
										<div class="col-md-6">
											<label class="control-label">Booked</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-calendar fa-lg"></span>
												</div>
												<input type="text" name="booking" id="booking" class="form-control showDate">
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel" id="second-pnl">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-4">
											<label class="control-label">Checking</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-calendar fa-lg"></span>
												</div>
												<input type="text" name="checking" id="checking" class="form-control showDate">
											</div>
										</div>
										<div class="col-md-4">
											<label class="control-label">Checkout</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-calendar fa-lg"></span>
												</div>
												<input type="text" name="checkout" id="checkout" class="form-control showDate">
											</div>
										</div>
										<div class="col-md-3">
											<label class="control-label">Staying</label>
											<div class="input-group mb-3 input-group-sm">
												<div class="input-group-prepend">
													<span class="input-group-text fa fa-calendar fa-lg"></span>
												</div>
												<input type="text" name="staying" id="staying" class="form-control disabled">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="inserchecking">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Insert">
						</div>
					</form>
				</div>
			</div>
		</div>
	<!-- Modal Contents goes here -->

		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Update Checkin...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<input type="hidden" class="form-control" id="uproomno" name="uproomno">
							<input type="hidden" class="form-control" id="uptot_price" name="uptot_price">
							<div class="col-md-6">
								<label class="control-label">Name</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-user fa-lg"></span>
									</div>
									<input type="text" name="upguest_id" id="upguest_id" class="form-control name">
								</div>
								<div id="suggestGuest" class="autoSearch">
									
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<label class="control-label">Checking</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-calendar fa-lg"></span>
									</div>
									<input type="text" name="upchecking" id="upchecking" class="form-control showDate">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label class="control-label">Checkout</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-calendar fa-lg"></span>
									</div>
									<input type="text" name="upcheckout" id="upcheckout" class="form-control showDate">
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label">Staying</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-calendar fa-lg"></span>
									</div>
									<input type="text" name="upstaying" id="upstaying" class="form-control disabled">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<label class="control-label">Floor</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-calendar fa-lg"></span>
									</div>
									<select name="upfloor" id="upfloor" class="form-control floor"></select>
								</div>
							</div>
							<div class="col-md-6">
								<label class="control-label">Room</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-calendar fa-lg"></span>
									</div>
									<select name="uproom" id="uproom" class="form-control room"></select>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button name="updateData" id="updateData" class="btn btn-success btnDisable">Update</button>
						
						<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalFilter" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Choose Room...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Floor</label>
									<select id="flFilter" class="form-control input-sm floor"></select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label class="control-label">Type</label>
									<select id="rtFilter" class="form-control input-s rtFilter"></select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="table-responsive" id="contentFilter"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<!-- <input type="submit" name="btnSub" id="btnSub" class="btn btn-primary" value="Insert"> -->
						
						<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>


		<div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Balance Info...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<div class="table-responsive" id="showInfo">
							
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<input type="submit" name="btnSub" id="btnSub" class="btn btn-primary btnDisable" value="Insert">
						
						<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="modalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Transaction Info...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="idReview" name="idReview">
						<input type="hidden" id="guestReview" name="guestReview">
						<div class="row">
							<div class="col-md-12">
								<label class="control-label">Amount</label>
								<div class="input-group mb-3 input-group-sm">
									<div class="input-group-prepend">
										<span class="input-group-text fa fa-money fa-lg"></span>
									</div>
									<input type="text" name="amountReview" id="amountReview" class="form-control disabled">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button class="btn btn-primary btnDisable" id="upReview">Update</button>
						
						<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
					</div>
				</div>
			</div>
		</div>


<?php include('../includes/footer.php') ?>
<script>
		$(document).ready(function() {
			var checkPanel = true;
			loadData();
			$('#submitForm, #updateForm').parsley();
			$('#modalOpen').hide();
			
			$('#modalOpen').on('click', function() {
				loadData();
				$('#modalOpen').hide();
			})
			$('#modalOpenFilter').on('click', function() {
				loadFloors();
				//loadRoomType();
				$('#flFilter>option, #rtFilter>option').remove("");
				$('#contentFilter').empty();
				$('#modalFilter').modal('show');
				$('#second-pnl').hide();
				checkPanel = false;
			})
			$('#btnpanel').on('click', function() {
				if(checkPanel != true) {
					checkPanel = true;
					$(this).text('Hide');
					$(this).attr('class', 'btn btn-danger btn-sm');
					$('#second-pnl').show();
				}
				else {
					checkPanel = false;
					$(this).text('Show');
					$(this).attr('class', 'btn btn-success btn-sm');
					$('#second-pnl').hide();
					$('#second-pnl input').val('');
				}
			});
			/* calculates the difference betweeen checking and checkout */
			$('#checkout').on('change', function() {
				var checking = $('#checking').val();
				var checkout = $('#checkout').val();
				
				$('#staying').val(date_diff(checking, checkout));
			});

			/* calculates the difference betweeen checking and checkout */
			$('#upcheckout').on('change', function() {
				var checking = $('#upchecking').val();
				var checkout = $('#upcheckout').val();
				
				$('#upstaying').val(date_diff(checking, checkout));
			})

			$('#status').on('change', function() {
				alert($(this).state());
			})
			$('#submitForm').on('submit', function(e) {
				e.preventDefault();
				var guest = $('#guest_id').attr('data-id');
				var guest_id = $('#guest_id').val(guest);
				var booking = $('#booking').val();
				var roomno = $('#roomno').val();
				var staying = $('#staying').val();
				//var status = $('#status').val();
				var tot_price = $('#tot_price').val();
				if(checkPanel == true) {
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
								data: new FormData(this),
								contentType: false,
								processData: false,
        						beforeSend: function() {
        						    disableButton('btnDisable', true);
        						},
        						success: function(data) {
        						    disableButton('btnDisable', false);
									success('Success', data);
									loadData();
									$('#submitForm')[0].reset();
									$('#modalInsert').modal('hide');
								}
							})
						}
					}
				}
				else {
					var isValid = true;
					$($('#first-pnl').find('input[type="text"]')).each(function() {
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
								data: new FormData(this),
								contentType: false,
								processData: false,
        						beforeSend: function() {
        						    disableButton('btnDisable', true);
        						},
        						success: function(data) {
        						    disableButton('btnDisable', false);
									success('Success', data);
									loadData();
									$('#submitForm')[0].reset();
									$('#modalInsert').modal('hide');
							
								}
							})
						}
					}
				}
			})
            loadFloors();
			$(document).on('click', '.btn-edit', function() {				
				var id = $(this).attr("id");
				var type_id = $(this).attr("data-type");
				var beforeroom = $(this).attr('data-room');
				var price = $(this).attr('data-price')
				$('#uproomno').val(id);
				$('.autoSearch').fadeOut();
				//var name = $('#upguest_id').val();
				$('#upguest_id').attr('data-id', $(this).attr('data-guest'));
				$('#upguest_id').attr('data-type', type_id);
				$('#upguest_id').attr('data-beforeroom', beforeroom);
				var closes = $(this).closest('tr');
				$('#uptot_price').val(price);
				$('#upguest_id').val(closes.find('td:eq(0)').text());
				$('#upchecking').val(closes.find('td:eq(1)').text());
				$('#upcheckout').val(closes.find('td:eq(2)').text());
				$('#upstaying').val(closes.find('td:eq(6)').text());
				$('#upfloor').val($(this).attr('data-floor'));
				$('#uproom').html('<option value="'+$(this).attr('data-room')+'" data-price="'+price+'">'+closes.find("td:eq(4)").text()+'</option>');
				$('#modalUpdate').modal('show');
			});
				

			$('#updateData').on('click', function() {
				var id = $('#uproomno').val();
				var type_id = $('#upguest_id').data('type');
				var beforeroom = $('#upguest_id').data('beforeroom');
				var price = $('#uptot_price').val();
				var guest_id = $('#upguest_id').attr('data-id');
				var checkdate = $('#upchecking').val();
				var checkout = $('#upcheckout').val();
				var staying = $('#upstaying').val();
				var room = $('#uproom').val();
				var updateChecking = "updateChecking";
				$.ajax({
					url: "operations/updates.php",
					type: "post",
					data: {
						id: id,
						type_id: type_id,
						updateChecking: updateChecking,
						price: price,
						guest_id: guest_id,
						checkeddate: checkdate,
						checkout: checkout,
						staying: staying,
						beforeroom: beforeroom,
						room: room
					},
					beforeSend: function() {
					    disableButton('btnDisable', true);
					},
					success: function(data) {
					    disableButton('btnDisable', false);
						success('Success', data);
                        loadData();
					}
				})
				$('#modalUpdate').modal('hide');
			});

			$(document).on('click', '.btn-review', function() {
				var id = $(this).attr("id");
				var checkid = $(this).data('checkin');
				var loadReveiw = "loadReveiw";
				$('#modalOpen').show();
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, checkid: checkid, loadReveiw: loadReveiw},
					success: function(data) {
						$('#tbody').html(data);
					}
				});
			});

			$(document).on('click', '.btn-edit-review', function() {
				var id = $(this).attr('id');
				var guest_id = $(this).attr('data-guest');
				$('#idReview').val(id);
				$('#guestReview').val(guest_id);
				$('#amountReview').val($(this).closest('tr').find('td:eq(1)').text());
				$('#modalReview').modal('show');
			})

			$('#upReview').on('click', function() {
				var id = $('#idReview').val();
				var guest_id = $('#guestReview').val();
				var amount = $('#amountReview').val();
				var updateReview = "updateReview";
				$.ajax({
					url: 'operations/updates.php',
					method: 'post',
					data: {
						id: id, guest_id: guest_id, amount: amount, updateReview: updateReview
					},
					beforeSend: function() {
					    disableButton('btnDisable', true);
					},
					success: function(data) {
					    disableButton('btnDisable', false);
						$('#modalReview').modal('hide');
						success('SUCCESS', data);
						//alert(data);
						loadData();
						$('#modalOpen').hide();
					}
				})
			})

			$(document).on('click', '.btn-show', function() {
				var id = $(this).attr("id");
				var showCheck = "showCheck";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, showCheck: showCheck},
					success: function(data) {
						$('#showInfo').html(data);
					}
				})
				$('#modalShow').modal('show');
			});

			$('#btnSub').on('click', function() {
				// subCheckin => subtract checkin
				var subCheckin = "subCheckin";
				var paid = $('#subRem').text();
				var guest_id = $('.checkId').attr('name');
				var id = $('.checkId').attr('id');
				if($.isNumeric(paid)) {
					$.ajax({
						url: 'operations/updates.php',
						method: 'post',
						data: {subCheckin: subCheckin, paid: paid, id: id, guest_id: guest_id},
						beforeSend: function() {
						    disableButton('btnDisable', true);
						},
						success: function(data) {
						    disableButton('btnDisable', false);
							success('SUCCESS', data);
							loadData();
							$('#subRem').text("");
							$('#modalShow').modal('hide');
						}
					})
				}
				else {
					errors('ERROR', 'Please Enter a money');
				}
			})

			$(document).on('keyup', '#subRem', function() {
				var balance = parseFloat($('#curr_remain').text().slice(2));
				var amount = parseFloat($(this).text());
				if((amount > balance || amount < 1)) {
					errors('ERROR','Please enter a valid money');
					$(this).text('');
				}
			})

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
			});
			$('#floor').on('change', function() {
				var id = $(this).val();
				var loadRoom = "loadRoom";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, loadRoom: loadRoom},
					success: function(data) {
						$('#roomno').html(data);
					}
				});
			})

			$('#upfloor').on('change', function() {
				var id = $(this).val();
				var loadRoomFloor = "loadRoomFloor";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, loadRoomFloor: loadRoomFloor},
					success: function(data) {
						$('#uproom').html(data);
					}
				});
			})

			$('#uproom').on('click change', function() {
				//var price = $(this).find(':selected').data('price');
				var price = $(this).find(':selected').data('price');
				$('#uptot_price').val(price);
			})

			$('#flFilter').on('change focus', function() {
				var id = $(this).val();
				var filterFloor = "filterFloor";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, filterFloor: filterFloor},
					success: function(data) {
						$('#contentFilter').html(data);
						loadRoomType();
					}
				});
			})

			$('#rtFilter').on('change', function() {
				var id = $(this).val();
				var floor_id = $('#flFilter').val();
				var filterType = "filterType";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {id: id, floor_id: floor_id, filterType: filterType},
					success: function(data) {
						$('#contentFilter').html(data);
					}
				});
			})

			// $('#upfloor').on('click', function() {
			// 	loadFloors();
			// })

			$(document).on('click', '#bookNow', function() {
				$('#roomno').val($(this).attr('name'));
				var id = $(this).closest('tr').find('td:eq(2)').text()
				//alert(id.slice(2));
				$('#tot_price').val(id.slice(2));
				 $('#modalFilter').modal('hide');
				 $('#modalInsert').modal('show');
			})
			function loadData() {
				var loadchecking = "loadchecking";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {loadchecking: loadchecking},
					beforeSend: function(){
						$('#tbody').html(loadwaiter());
						$('.lds-spinner').css('display', 'block')
					},
					success: function(data) {
						$('.lds-spinner').css('display', 'none');
						$('#tbody').html(data);
					}
				});
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
						$('#rtFilter').html(data);
					}
				});
			}
			function loadRooms() {
				var loodRooms = "loodRooms";
				$.ajax({
					url: "operations/select.php",
					method: "post",
					data: {loadRooms: loadRooms},
					success: function(data) {
						$('#uproom').html(data);
					}
				});
			}

			$('.name').on('keyup', function() {
				var search = $(this).val();
				// sgtguest => suggest guest
				var sgtguest = "sgtguest";
				if(search) {
					$.ajax({
						url: 'operations/select.php',
						method: 'post',
						data: {search: search, sgtguest: sgtguest},
						success: function(data) {
							$('.autoSearch').fadeIn();
							$('.autoSearch').html(data);
						}
					});
				}
				else {
					$('.autoSearch').fadeOut();
				}
			});
			$(document).on('click', '.selected', function() {
				var id = $(this).attr('data-id');
				var name = $(this).text();
				$('.name').val(name);
				$('.name').attr('data-id', id);
				$('.autoSearch').fadeOut();
			});
			
            $('#submitForm').attr('autocomplete', 'off');
			$(document).ajaxComplete(function(){
	        	limit('displayLimit','tbl');
	        	search('search','tbl');
	        });
			$('#submitForm, #updateForm').attr('autocomplete', 'off');
		});
	</script>
</script>