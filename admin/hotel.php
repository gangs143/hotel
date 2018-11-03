<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">About Hotel</h3>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<button class="btn btn-success text-white btn-lg float-right fa fa-plus-circle" id="modalOpen"> Edit</button>
					</div>
				</div><br>
				<div class="row">
					<div class="col-md-2 lebels">
						<label class="control-label fa fa-hotel"><strong> Hotel Name: </strong></label><br>
						<label class="control-label fa fa-road"><strong>City: </strong></label><br>
						<label class="control-label fa fa-hotel"><strong>Address: </strong></label><br>
					</div>
					<div class="col-md-4">
						<label class="control-label"><strong><span id="name" name="name"></span></strong></label><br>
						<label class="control-label"><strong><span id="city" name="city"></span></strong></label><br>
						<label class="control-label"><strong><span id="address" name="address"></span></strong></label>
						
					</div>
					<div class="col-md-6">
						<div class="img-holder">
							<img src="<?php echo $_SESSION['hotelpic']; ?>">
						</div>
					</div>
				</div><br>
			</div>
		</div>


		<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<form method="post" enctype="multipart/form-data" id="submitForm">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Hotel Info...</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						</div>
						<div class="modal-body">
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" name="upname" id="upname" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<div class="col-md-6 col-sm-6">
									<label class="control-label">City</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-at fa-lg"></span>
										</div>
										<input type="text" name="uplocation" id="uplocation" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 col-sm-6">
									<label class="control-label">Address</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-at fa-lg"></span>
										</div>
										<input type="text" name="upaddress" id="upaddress" data-parsley-pattern="^[a-z /A-Z]+$" data-parsley-trigger="keyup" class="form-control">
									</div>
								</div>
								<input type="hidden" name="picname" id="picname">
								<div class="col-md-6 col-sm-6">
									<label class="control-label">Picture</label>
									<!-- <div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-at fa-lg"></span>
										</div> -->
										<input type="file" name="uppicture" id="uppicture" class="form-control">
									<!-- </div> -->
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="updateHotel" id="updateHotel">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary btnDisable" value="Update">
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
		
        $('#submitForm').attr('autocomplete', 'off');
		$('#modalOpen').on('click', function() {
			$('#upname').val($('#name').text());
			$('#uplocation').val($('#city').text());
			$('#upaddress').val($('#address').text());
			$('#picname').val($('#uppicture').data('pic'));
			$('#modalUpdate').modal('show');
		});

		$('#submitForm').on('submit', function(e) {
			e.preventDefault();
			var upname = $('#upname').val();
			var uplocation = $('#uplocation').val();
			var upaddress = $('#upaddress').val();
			var picname = $('#picname').val();
			var uppicture = $('#uppicture').val();
			var updateHotel = $('#updateHotel').val();
			$.ajax({
				url: "operations/updates.php",
				type: "POST",
				data: new FormData(this),
				processData: false,
				contentType: false,
				beforeSend: function() {
				    disableButton('btnDisable', true);
				},
				success: function(data) {
				    disableButton('btnDisable', false);
					success('SUCCESS', data);
					loadData();
				}
			});
			$('#modalUpdate').modal('hide');
		});

		function loadData() {
			var loadhotel = "loadhotel";
			$.ajax({
				url: "operations/select.php",
				method: "post",
				data: {loadhotel: loadhotel},
				dataType: 'json',
				beforeSend: function(){
					$('#tbody').html(loadwaiter());
					$('.lds-spinner').css('display', 'block')
				},
				success: function(data) {
					$('.lds-spinner').css('display', 'none');
					$('#name').text(data.name);
					$('#city').text(data.location);
					$('#address').text(data.address);
					$('#uppicture').attr('data-pic', data.picture);
				}
			})
		}
	});

	$(document).ready(function(){
		$('.lebels').css({
	      'font-size': '17px',
	      'font-weight': 'bold'
    	})
	});
</script>