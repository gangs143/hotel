
            <footer class="page-footer">
                <div class="font-13"><?php echo date('Y'); ?> © <b>Aaran Softwares</b> - All rights reserved.</div>
                <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
            </footer>
        </div>
    </div>
    <!-- BEGIN PAGA BACKDROPS-->
    <div class="sidenav-backdrop backdrop"></div>
    <div class="preloader-backdrop">
        <div class="page-preloader">Loading</div>
    </div>
    <!-- END PAGA BACKDROPS-->
    	<!-- Modal Contents goes here -->
	<div class="modal fade" id="modalProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Profile Info...</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<form method="post" id="submitForm">
						<div class="modal-body">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<label class="control-label">Name</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upname" name="upname" class="form-control rooms">
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<label class="control-label">Username</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-phone fa-lg"></span>
										</div>
										<input type="text" id="upusername" name="upusername" class="form-control">
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
									<label class="control-label">Phone</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-user fa-lg"></span>
										</div>
										<input type="text" id="upphone" name="upphone"  class="form-control">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<label class="control-label">Email</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-at fa-lg"></span>
										</div>
										<input type="text" id="upemail" name="upemail"  class="form-control">
									</div>
								</div>
								<div class="col-md-4 col-sm-4">
								    <input type="hidden" name="picname" id="picname">
									<label class="control-label">Picture</label>
									<div class="input-group mb-3 input-group-sm">
										<div class="input-group-prepend">
											<span class="input-group-text fa fa-photo fa-lg"></span>
										</div>
										<input type="file" id="uppicture" name="uppicture"  class="form-control">
									</div>
								</div>
						    </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<input type="hidden" name="updateProfile" value="updateProfile">
							<input type="submit" name="sendData" id="sendData" class="btn btn-primary" value="Update">
							
							<!-- <button type="submit" class="btn btn-primary">Save changes</button> -->
						</div>
					</form>
				</div>
			</div>
		</div>
    <!-- CORE PLUGINS-->
    <!-- <script src="./assets/vendors/jquery/dist/jquery.min.js" type="text/javascript"></script> -->
    <script src="../assets/js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../assets/js/popper.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/parsley.js" type="text/javascript"></script>
    <script src="../assets/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
    <!-- <script src="./assets/vendors/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script> -->
    <script src="../assets/js/metisMenu.min.js" type="text/javascript"></script>
    <script src="../assets/js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="../assets/js/form-validation.js" type="text/javascript"></script>
    <script src="../assets/js/dialogs.js" type="text/javascript"></script>
    <script src="../assets/js/iziToast.min.js" type="text/javascript"></script>
    <script src="../assets/js/Chart.min.js" type="text/javascript"></script>
    <script src="../assets/js/bootbox.min.js" type="text/javascript"></script>
    <!-- <script src="../assets/js/chart-area-demo.js" type="text/javascript"></script> -->
    <!-- PAGE LEVEL PLUGINS-->
    <!-- <script src="./assets/vendors/chart.js/dist/Chart.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-2.0.3.min.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="./assets/vendors/jvectormap/jquery-jvectormap-us-aea-en.js" type="text/javascript"></script> -->
    <!-- CORE SCRIPTS-->
    <script src="../assets/js/app.min.js" type="text/javascript"></script>
    <script src="../assets/js/main.js" type="text/javascript"></script>
    <!-- PAGE LEVEL SCRIPTS-->
    <!-- <script src="./assets/js/scripts/dashboard_1_demo.js" type="text/javascript"></script> -->
    <script>
        $(document).ready(function() {
            hotelInfo();
            loadData();
            $('table').draggable({
                revert: true
            });

            $('.showDate').datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayBtn: 'linked',
                todayHighlight: true
            });

            $('#logout').on('click', function() {
                var logout = "logout";
                bootbox.confirm({
                    title: "Logout Menu....",
                    message: "ma hubtaa inaa ka baxayso",
                    buttons: {
                        cancel: {
                            label: '<i class="fa fa-times"></i> Cancel'
                        },
                        confirm: {
                            label: '<i class="fa fa-sign-out"></i> Logut',
                            className: 'btn-danger'
                        }
                    },
                    callback: function(result) {
                        if(result == true) {
                            $.ajax({
                                url: 'operations/select.php',
                                method: 'post',
                                data: {logout: logout},
                                success: function(data) {
                                    success('logout', data);
                                    window.location.replace("../login");
                                }
                            })
                        }
                        // else {
                        //     return false;
                        // }
                    }
                });
            });
// <span class="brand">HOTEL
//                         <span class="brand-tip"> SYSTEM</span>
//                     </span>
            function hotelInfo() {
                var hotelbrand = "hotelbrand";
                $.ajax({
                    url: '../admin/operations/select.php',
                    method: 'post',
                    data: {hotelbrand: hotelbrand},
                    dataType: 'json',
                    success: function(data){
                        var html = "<span class='brand text-uppercase'>" + data.name + "</span>";
                        $('#brand').prepend(html);
                    }
                })
            }
            $('#btnProfile').on('click', function() {
                $('#modalProfile').modal('show');
            })
            
            $('#submitForm').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    url: '../admin/operations/updates.php',
                    type: 'post',
                    //data: $(this).serialize(),
                    data: new FormData(this),
    				processData: false,
    				contentType: false,
                    success: function(data) {
                        success('SUCCESS', data);
                        loadData();
                        $('#modalProfile').modal('hide');
                    }
                })
            })
            
            function loadData() {
                var loadProfile = "loadProfile";
                $.ajax({
                    url: '../admin/operations/select.php',
                    type: 'post',
                    data: {loadProfile: loadProfile},
                    dataType: 'json',
                    success: function(data) {
                        $('#upname').val(data.name);
                        $('#upusername').val(data.username);
                        $('#upphone').val(data.phone);
                        $('#upemail').val(data.email);
                        $('#picname').val(data.picture);
                    }
                })
            }
        });
        
        $(document).ajaxComplete(function(){
        $('.btn-edit').tooltip({
            placement:'bottom',
            title:'EDIT',
            animation:false
        }),
        $('.btn-delete').tooltip({
            placement:'bottom',
            title:'DELETE',
            animation:false
        }),
        $('.btn-review').tooltip({
            placement:'bottom',
            title:'TRANSACTION',
            animation:false
        })
        $('.btn-show').tooltip({
            placement:'bottom',
            title:'SHOW',
            animation:false
        })
    })
        $('.font-13').css({
      'font-size': '14px',
      'font-weight': 'bold'
    })
    </script>
</body>

</html>