function success(title, message) {
    iziToast.success({
        title: title,
        titleColor: 'white',
        message: message,
        position: 'topRight',
        iconColor: 'white',
        timeout: 2000
    });
}
function errors(title, message) {
    iziToast.error({
        title: title,
        titleColor: 'white',
        message: message,
        position: 'topRight',
        iconColor: 'white'
    });
}
function date_diff(date1, date2) {
    dt1 = new Date(date1);
    dt2 = new Date(date2);
    return Math.floor((Date.UTC(dt2.getFullYear(), dt2.getMonth(), dt2.getDate()) - Date.UTC(dt1.getFullYear(), dt1.getMonth(), dt1.getDate())) / (1000 * 60 * 60 * 24));
}

function disableButton(element, state) {
    if(state === true) {
        $('.'+element).attr('disabled', 'disabled');
    }
    else {
        $('.'+element).attr('disabled', false);
    }
}

/*loading spinner html*/
  function loadwaiter() {
    var html = "<div class='lds-spinner'><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div><div></div></div>";
    return html;
  }

 //var filter = {
   //limit: function(id, tbl) {
    function limit(id, tbl) {
      if($('#'+id+' option:selected').val()==10) {
        var rowcounts = 0;
        var maxrows = $('#'+id+' option:selected').val();
        $('#'+tbl+' tr:gt(0)').each(function() {
          rowcounts++;
          if(rowcounts > parseInt(maxrows)) {
            $(this).hide();
          }
          else {
            $(this).show();
          }
        })
      }
      $('#'+id).on('change', function() {
        var rowcount = 0;
        var maxrow = parseInt($(this).val());
        var totrow = $('#'+tbl+' tbody tr').length;
        $('#'+tbl+' tr:gt(0)').each(function() {
          rowcount++;
          if(rowcount > maxrow) {
            $(this).hide();
          }
          else {
            $(this).show();
          }
        })
      })
    }
   function search(value, tbl) {
     $('#'+value).on('keyup', function() {
       var value = $(this).val().toLowerCase();
       $('#'+tbl+' tr:gt(0)').filter(function() {
         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
       })
     })
   }

   // new chart section
   // Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
  function showChart(month, expense) {
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: month,
        datasets: [{
          label: "Expenses",
          lineTension: 0.3,
          backgroundColor: "rgba(2,117,216,0.2)",
          borderColor: "rgba(2,117,216,1)",
          pointRadius: 5,
          pointBackgroundColor: "rgba(2,117,216,1)",
          pointBorderColor: "rgba(255,255,255,0.8)",
          pointHoverRadius: 5,
          pointHoverBackgroundColor: "rgba(2,117,216,1)",
          pointHitRadius: 50,
          pointBorderWidth: 2,
          data: expense,
        }],
      },
      options: {
        scales: {
          xAxes: [{
            time: {
              unit: 'date'
            },
            gridLines: {
              display: false
            },
            ticks: {
              maxTicksLimit: 7
            }
          }],
          yAxes: [{
            ticks: {
              min: 0,
              max: 300,
              maxTicksLimit: 10
            },
            gridLines: {
              color: "rgba(0, 0, 0, .125)",
            }
          }],
        },
        legend: {
          display: false
        }
      }
    });
  }


 //}