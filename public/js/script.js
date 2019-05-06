$(document).ready(function(){
    $(".hideShow").hide();
    
  $("#gridRadios1").click(function(){
    $(".hideShow").hide();
  });


  $("#gridRadios2").click(function(){
    $(".hideShow").show();
  });
    
  $("#gridRadios3").click(function(){
    $(".hideShow").hide();
  });

  $("#gridRadios4").click(function(){
    $(".groupHideShow").hide();
    $(".hideShow").show();
  });

// collective action

$(document).ready(function(){
  $(".groupHideShow").hide()
});
  
$("#showGroup").click(function(){
  $(".hideShow").hide();
  $(".groupHideShow").show();
});


$("#hideGroup").click(function(){
  $(".groupHideShow").hide();
  $(".hideShow").show();
});

  $('#dataTable2').DataTable();
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
  $('#dataTable3').DataTable();
  $('#dataTable4').DataTable();
  $('#dataTable5').DataTable();
  
  var randomScalingFactor = function() {
    return Math.round(Math.random() * 100);
  };

  var config = {
    type: 'pie',
    data: {
      datasets: [{
        data: [
          randomScalingFactor(),
          randomScalingFactor()
        ],
        backgroundColor: [
          window.chartColors.yellow,
          window.chartColors.blue,
        ]
      }],
      labels: [
        'Open',
        'Completed'
      ]
    },
    options: {
      responsive: true
    }
  };

  // window.onload = function() {
  //   var ctx = document.getElementById('chart-area').getContext('2d');
  //   window.myPie = new Chart(ctx, config);
  // };

  
  var color = Chart.helpers.color;
		var barChartData = {
			labels: ['Club', 'Homework', 'Workshop','Sport'],
			datasets: [{
				label: 'Categories',
				backgroundColor: color(window.chartColors.red).alpha(0.5).rgbString(),
				borderColor: window.chartColors.red,
				borderWidth: 1,
				data: [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}]

    };

    // Line chart
   	var configs = {
			type: 'line',
			data: {
				labels: ['Current Week', 'Next Week', 'Week+2', 'Week+3'],
				datasets: [{
					label: 'Homework',
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [
						0,
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
					fill: false,
				}, {
					label: 'Clubs',
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [
						0,
						randomScalingFactor(),
						randomScalingFactor(),
						randomScalingFactor()
					],
				}]
			},
			options: {
				responsive: true,
				title: {
					display: true,
					text: 'Workload Per Week:'
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Weeks'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				}
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('line').getContext('2d');
			window.myLine = new Chart(ctx, configs);

      var ctx = document.getElementById('chart-area').getContext('2d');
      window.myPie = new Chart(ctx, config);

			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					responsive: true,
					legend: {
						position: 'top'
					}
				}
			});

		};

});
<<<<<<< HEAD
=======
});
>>>>>>> facbfeee901dde6456e05e96d6dbe483faffc969
=======
>>>>>>> d6ade5ed2fcc77b6b215248631747309d5662f52
