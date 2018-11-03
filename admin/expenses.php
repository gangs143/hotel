
	<?php 	include '../classes/Databases.php'; 
	$db = new Databases;?>


<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
	<!-- START PAGE CONTENT-->
	<div class="page-content fade-in-up">
		<h3 class="page-title">Floor</h3>
<div class="container">
<h3 class="page-title">Payment</h3>
<div class="container-wrapper">
	<div class="row">
		<div class="col-md-12">
			<button class="btn btn-success pull-right" data-toggle="modal" data-target="#modalInsert"><i class="fa fa-plus"></i> Add Doctor</button>
		</div>
	</div><br>
	<div class="row">
		<div class="col-md-4 pull-right">
			<form class="form-inline">
				<div class="form-group">
					<label><strong>Search</strong></label>
					<input type="search" name="search" class="form-control" id="search"><br>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div id="displayTable" class="table-responsive">
				<table class="table table-bordered table-striped" id="table_guarantee">
					<thead>
	                     <tr>
                            <th>ID</th>
                            <!-- <th>Guest id</th> -->
                            <th>Transfer Expenses</th>
                            <th>Amount Of Money</th>
                            <th>Action</th>
	                     </tr>
	                </thead>
	                <tbody id="tbody">
	                </tbody>
	                <tfoot>
			    		<tr>
                            <th>ID</th>
                            <!-- <th>Guest id</th> -->
                            <th>Transfer Expenses</th>
                            <th>Amount Of Money</th>
                            <th>Action</th>
			            </tr>
			    	</tfoot>
				</table>
			</div>
		</div>
	</div>
</div>

<!-- this modal inserts data -->
<div id="modalInsert" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header insert">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Daily Expenses Table</h4>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data" id="submitForm">
                <div class="row">
						<div class="col-md-6 col-md-6">
							<div class="form-group">
								<label class="control-label">Date Transfer Money</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="date" id="TranDate" name="TranDate" class="form-control">
								</div>
							</div>
						</div>
						<div class="col-md-6 col-md-6">
							<div class="form-group">
								<label class="control-label">Amount</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-money"></i></span>
									<input type="text" id="amount" name="amount" class="form-control">
								</div>
							</div>
						</div>
					</div>
			
					<!-- <div></div> -->
					<div class="row">
						<div class="col-md-offset-4 col-md-4 col-md-offset-4">
							<input type="hidden" name="action" id="action" value="insert">
							<input type="submit" class="btn btn-success" id="sendData" name="send" value="Insert" />
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>

<!-- <div></div> -->
<div class="modal fade" id="modalUpdate" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Your Title Here</h4>
			</div>
			<div class="modal-body">
				<form method="post" id="updateForm">
					<input type="hidden" name="id" id="updateid">
					<div class="row">
						<div class="col-md-offset-1 col-md-4">
							<div class="form-group">
								<label class="control-label"> Date Transfer Money</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-user"></i></span>
									<input type="date" class="form-control" name="TranDateupdate" id="TranDateupdate">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-md-offset-2">
							<div class="form-group">
								<label class="control-label">Amount</label>
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-lock"></i></span>
									<input type="text" class="form-control" name="amounts" id="amounts">
							</div>
							</div>
						</div>
					</div>
                    
					</div>
				</form>
				<div class="row">
					<div class="col-md-offset-4 col-md-4 col-md-offset-4">
						<button id="updateData" class="btn btn-info btn-block">Update Data</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<?php include('../includes/footer.php') ?>
<script>
$(document).ready(function() {


	load_data();
	//load data to DailyExpenses table
	function load_data() {
	        var TranMoney = "TranMoney";
	        $.ajax({
	            url:"operations/select.php",
	            method:"POST",
	            data:{TranMoney:TranMoney},
	            success:function(data) {

	            	$('#tbody').html(data);

	            }
	        });
	   }

	$('#action').val('insertTranMoney');
// insert the data into database using ajax
$('#submitForm').submit(function(e) {
	event.preventDefault();
	var TranDate = $('#TranDate').val();
	var amount = $('#amount').val();
	if(TranDate == '' || amount == '' ) {
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
			//	console.log(data);
				alert(data);
				load_data();
				$('#submitForm')[0].reset();
				$('#modalInsert').modal('hide');
				/*$(document).on('click', '#formData', function() {
					$(this)[0].reset();
				})*/
			}
		});
	}
});

 /* selects and display data into update modal */
 $(document).on('click', '.btn-edit', function() {
			var id = $(this).attr('id');
			$('#updateid').val(id);
			var SelectExp = "SelectExp";

			$.ajax({
				url: "operations/select.php",
				method: "POST",
				data: {id: id, SelectExp: SelectExp},
				dataType:"json",
				success: function(data) {
					$('#TranDateupdate').val(data.transfer);
					$('#amounts').val(data.amount);
			  
				}
			});
			$('#modalUpdate').modal('show');
		});

		/* this method updates the data */
		$('#updateData').click(function() {
				var Update_Exp = "Update_Exp";
				var updateid = $('#updateid').val();
				var TranDateupdate = $('#TranDateupdate').val();
				var amounts = $('#amounts').val();
				if(TranDateupdate =="" || amounts ==""){
					alert("fadlan buuxi meelaha banaan")
				}
				else {
					$.ajax({
						url: "operations/updates.php",
						method: "POST",
						data: { // name phone gender age status address  updater
							id: updateid,
							Update_Exp:Update_Exp,
							TranDateupdate: TranDateupdate,
							amounts: amounts,    
						},
						success: function(data) {
							//console.log(data);
							//alert(data);
							$('#updateForm')[0].reset();
							$('#modalUpdate').modal('hide');
							load_data();
						}
					});
				}
			});

			// Delete Method
			//delete Method
			$(document).on('click', '.btn-delete', function() {
			var id = $(this).attr('id');
			if(confirm("ma hubtaa in aad tuurayso")) {
				$.ajax({
					url: "operations/delete.php",
					method: "post",
					data: {id: id},
					success: function(data) {
						//alert(data);
						load_data();
					}
				});
			}
			else {
				return false;
			}
		});


});

</script>


</body>
</html>



