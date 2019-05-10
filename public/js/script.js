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
$("#showGroup").click(function(){
  $(".hideShow").hide();
  $(".groupHideShow").show();
});


$("#hideGroup").click(function(){
  $(".groupHideShow").hide();
  $(".hideShow").show();
});
  $('#dataTable2').DataTable();
  $('#dataTable3').DataTable();
  $('#dataTable4').DataTable();
	$('#dataTable5').DataTable();
});

$(document).ready(function(){
    new Chart(document.getElementById("pie-chart"), {
        type: 'pie',
        data: {
            labels: ["Open", "Completed"],
            datasets: [{
            backgroundColor: ["#c21e56", "green"],
            data: [40,30]
            }]
        }
    }); 
	
	new Chart(document.getElementById("bar-chart"), {
		type: 'bar',
		data: {
				labels: ["Club", "Homework", "Workshop", "Sport"],
				datasets: [
				{
						default:0,
						label: "Number of Tasks",
						backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9"],
						data: [10,3,8,5]
				}
				]
		},
		options: {
				legend: { display: false }
		}
	});

	new Chart(document.getElementById("line-chart"), {
		type: 'line',
		data: {
		labels: ['Current Week','Next Week','Week +2','Week +3'],
		datasets: [{
				data: [0,5,3,12],
				label: "Club Meeting",
				borderColor: "#3e95cd",
				fill: false
				}, {
				data: [0,3,8,15],
				label: "Sports",
				borderColor: "#8e5ea2",
				fill: false
				}, {
				data: [0,6,5,13],
				label: "Homework",
				borderColor: "#c45850",
				fill: false
				}
		]
		}
	})
});
});