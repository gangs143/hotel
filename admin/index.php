<?php   include '../classes/Databases.php'; 
  $db = new Databases;?>
<?php include('../includes/header.php') ?>
<?php include('../includes/side.php') ?>
  <div class="page-content fade-in-up">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-primary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="mr-5" id="curr_guest">26 New Messages!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="checking.php">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
            </div>
          </div>
        <div class="col-xl-6 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-home"></i>
              </div>
              <div class="mr-5" id="av_room">11 New Tasks!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
<!--         <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-success o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Orders!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-danger o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-life-ring"></i>
              </div>
              <div class="mr-5">13 New Tickets!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="#">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div> -->
      </div>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-chart-area"></i>
          daily transections</div>
        <div class="card-body">
          <canvas id="myAreaChart" width="100%" height="30"></canvas>
        </div>
        <!-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> -->
      </div>
    </div>
  </div>

  <!-- Area Chart Example-->
    


<?php include('../includes/footer.php') ?>
<script>
  $(document).ready(function() {

    dislpayCards();
    showLineChart();

    $('.mr-5').css({
      'font-size': '20px',
      'font-weight': 'bold'
    })
    function  dislpayCards() {
      var queryCards = "queryCards";
      $.ajax({
        url: 'operations/select.php',
        type: 'POST',
        data: {queryCards: queryCards},
        dataType: 'json',
        success: function(data) {
          var values = [];
          var names = [];
          for(var i=0; i<data.length; i++) {
            if(i==0) {
              continue;
            }
            // console.log(data[i]);
            var key_values = data[i].key_data;
            var key_names = data[i].key_name;
            // console.log(key_values);
            values.push(key_values);
            names.push(key_names);
            // $('#curr_guest').text(data[i].key_data + " " + data[i].key_name);
            // $('#curr_guest').text(data[i].key_data + " " + data[i].key_name);
          }
          console.log(values);
          $('#curr_guest').text(values[0] + " " + names[0]);
          $('#av_room').text(values[1] + " " + names[1]);
        }
      })
    }

    function showLineChart() {
      var displayChart = "displayChart";
      $.ajax({
        url: 'operations/select.php',
        type: 'POST',
        data: {displayChart: displayChart},
        dataType: 'json',
        success: function(data) {
          var month = [];
          var expense = [];
          for(var i=0; i<data.length; i++) {
            var month_obj = data[i].month_name;
            month.push(month_obj);
            var expense_obj = data[i].month_value;
            expense.push(expense_obj);
          }
          showChart(month, expense);
        }
      });
    }
  });
</script>
        